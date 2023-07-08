package com.example.ecommdb;


import androidx.appcompat.app.AppCompatActivity;

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

public class register extends AppCompatActivity
{
    EditText regemail,regmobile,regpassord;
    Button regsubmit;
    TextView tv;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        getSupportActionBar().hide();

        regemail=(EditText)findViewById(R.id.reg_email);
        regmobile=(EditText)findViewById(R.id.reg_mobile);
        regpassord=(EditText)findViewById(R.id.reg_password);
        tv=(TextView)findViewById(R.id.signup_report_tv);

        regsubmit=(Button)findViewById(R.id.reg_submit);
        regsubmit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                userregister(regemail.getText().toString(),regmobile.getText().toString(),regpassord.getText().toString());
            }
        });
    }

    public void userregister(String email, String mobile, String password)
    {
        String name="not applicable";
        String address="not applicable";

        Call<signup_response_model> call=apicontroller.getInstance()
                .getapi()
                .getregister(name,email,password,mobile,address);

        call.enqueue(new Callback<signup_response_model>() {
            @Override
            public void onResponse(Call<signup_response_model> call, Response<signup_response_model> response) {
                signup_response_model obj=response.body();
                String result=obj.getMessage().trim();
                if(result.equals("inserted"))
                {
                    tv.setText("Successfully Registered");
                    tv.setTextColor(Color.GREEN);
                    regemail.setText("");
                    regmobile.setText("");
                    regpassord.setText("");
                }
                if(result.equals("exist"))
                {
                    tv.setText("Sorry...! You are already registered");
                    tv.setTextColor(Color.RED);
                    regemail.setText("");
                    regmobile.setText("");
                    regpassord.setText("");
                }
            }

            @Override
            public void onFailure(Call<signup_response_model> call, Throwable t) {
                Log.e("API Call", "Failed", t);
                tv.setText("Something went wrong");
                tv.setTextColor(Color.RED);
                regemail.setText("");
                regmobile.setText("");
                regpassord.setText("");
            }
        });
    }

}