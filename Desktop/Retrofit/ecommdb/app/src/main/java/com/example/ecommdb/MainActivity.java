package com.example.ecommdb;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.content.SharedPreferences;
import android.graphics.Color;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainActivity extends AppCompatActivity
{
    TextView tv,report;
    EditText Email,Password;
    Button btn_login;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        getSupportActionBar().hide();

        tv=(TextView)findViewById(R.id.login_tv);
        Email=findViewById(R.id.login_email);
        Password=findViewById(R.id.login_pwd);
        btn_login=findViewById(R.id.login_btn);
        report=findViewById(R.id.login_report);
        checkuser();
        tv.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(getApplicationContext(),register.class));
                finish();
            }
        });
        btn_login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                processlogin(Email.getText().toString(),Password.getText().toString());
            }
        });


    }

    private void checkuser() {
        SharedPreferences sp=getSharedPreferences("credential",MODE_PRIVATE);
        if (sp.contains("username")){
            Intent intent=new Intent(MainActivity.this,home.class);
            startActivity(intent);
            finish();
        }
    }

    private void processlogin(String email, String password) {
        Call<login_response_model> call=apicontroller.getInstance()
                .getapi()
                .getlogin(email,password);
        call.enqueue(new Callback<login_response_model>() {
            @Override
            public void onResponse(Call<login_response_model> call, Response<login_response_model> response) {
                login_response_model obj=response.body();
                String result= obj.getMessage();
                if(result.equals("exist"))
                {
                    report.setText("Successfully Registered");
                    report.setTextColor(Color.GREEN);
                    SharedPreferences sp=getSharedPreferences("credential",MODE_PRIVATE);
                    SharedPreferences.Editor editor= sp.edit();
                    editor.putString("username",email);
                    editor.putString("password",password);
                    editor.commit();
                    editor.apply();

                    Intent intent=new Intent(MainActivity.this,home.class);
                    startActivity(intent);
                    finish();
                }
                if(result.equals("notexist"))
                {
                    report.setText("Sorry...! email or Password Incorrect");
                    report.setTextColor(Color.RED);
                    Email.setText("");
                    Password.setText("");
                }
            }

            @Override
            public void onFailure(Call<login_response_model> call, Throwable t) {
                Log.e("API Call", "Failed", t);
                report.setText("Something went wrong");
                report.setTextColor(Color.RED);
                Email.setText("");
                Password.setText("");
            }
        });
    }
}