package com.example.ecommdb;


import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class apicontroller
{
    static final String url = "http://10.0.2.2/Swadisht/";
    // if working in Mobile use IPv4 of your Machine
    private static apicontroller clientobject;
    private static Retrofit retrofit;

    apicontroller()
    {
        retrofit=new Retrofit.Builder()
                .baseUrl(url)
                .addConverterFactory(GsonConverterFactory.create())
                .build();
    }

    public static synchronized apicontroller getInstance()
    {
        if(clientobject==null)
            clientobject=new apicontroller();
        return clientobject;
    }

    apiset getapi()
    {
        return retrofit.create(apiset.class);
    }
}