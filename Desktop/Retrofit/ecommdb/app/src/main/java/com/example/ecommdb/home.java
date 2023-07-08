package com.example.ecommdb;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

public class home extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);
        Button Logout=findViewById(R.id.logout_btn);
        Logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                SharedPreferences sp = getSharedPreferences("credential", MODE_PRIVATE);

                // Clear the username and password values
                SharedPreferences.Editor editor = sp.edit();
                editor.remove("username");
                editor.remove("password");
                editor.apply();
                // Revert to the Login_Page
                Intent intent=new Intent(home.this,MainActivity.class);
                startActivity(intent);
                finish();

                // Show a toast or perform any other action to indicate that the values have been deleted
                Toast.makeText(getApplicationContext(), "Username and password deleted", Toast.LENGTH_SHORT).show();
            }
        });
    }
}