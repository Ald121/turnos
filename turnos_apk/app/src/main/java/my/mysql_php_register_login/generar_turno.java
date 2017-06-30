package my.mysql_php_register_login;

import android.content.Intent;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.Spinner;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedInputStream;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class generar_turno extends AppCompatActivity {
    ArrayList<String> listItems=new ArrayList<>();
    ArrayAdapter<String> adapter;
    String parametros;
    Spinner departamentos;
    URL url=null;
    Button generar;

    private RequestQueue requestQueue;
    private static String sharedData=Globals.getServerPath();
    private static final String URL = sharedData+"generar_turno.php";
    private StringRequest request;
    Intent intent;
    String departamento_selected;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_generar_turno);

        parametros=getIntent().getStringExtra("usuario");
        //Toast.makeText(getApplicationContext(), parametros, Toast.LENGTH_SHORT).show();

        requestQueue = Volley.newRequestQueue(this);

        departamentos = (Spinner) findViewById(R.id.cmb_depa);
        adapter=new ArrayAdapter<String>(this,R.layout.spinner_departamentos,R.id.txt,listItems);
        departamentos.setAdapter(adapter);
        generar=(Button) findViewById(R.id.btn_generar);


        departamentos.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parentView, View selectedItemView, int position, long id) {
                departamento_selected=departamentos.getSelectedItem().toString();
            }

            @Override
            public void onNothingSelected(AdapterView<?> parentView) {
                // your code here
            }

        });
        generar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                request = new StringRequest(Request.Method.POST, URL, new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONArray jsonarray = new JSONArray(response);
                            for(int i=0; i < jsonarray.length(); i++) {
                                JSONObject jsonobject = jsonarray.getJSONObject(i);
                                System.out.println(jsonobject.getString("resul"));
                                if (jsonobject.getString("resul").equals("2TURNOS")){
                                    Toast.makeText(getApplicationContext(),"SOLO ESTA PERMITIDO LA GENERACION DE 2 TURNO POR DÍA", Toast.LENGTH_SHORT).show();
                                }
                                if (jsonobject.getString("resul").equals("DEPYAGENERADO")){
                                    Toast.makeText(getApplicationContext(),"USTED YA A GENERADO UN TURNO PARA ESTE DEPARTAMENTO", Toast.LENGTH_SHORT).show();
                                }
                                if (jsonobject.getString("resul").equals("OK")){
                                    Toast.makeText(getApplicationContext(),"!! CORRECTO !! turno generado para: "+departamento_selected, Toast.LENGTH_SHORT).show();
                                }
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }


                    }
                }, new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {

                    }
                }) {
                    @Override
                    protected Map<String, String> getParams() throws AuthFailureError {
                        HashMap<String, String> hashMap = new HashMap<String, String>();
                        hashMap.put("usuario", parametros);
                        hashMap.put("departamento", departamento_selected);

                        return hashMap;
                    }
                };

                requestQueue.add(request);
            }
        });

    }

    public void onStart(){
        super.onStart();
        BackTask bt=new BackTask();
        bt.execute();
    }
    private class BackTask extends AsyncTask<Void,Void,Void> {
        ArrayList<String> list;
        protected void onPreExecute(){
            super.onPreExecute();
            list=new ArrayList<>();
        }
        protected Void doInBackground(Void...params){
            InputStream is=null;
            String result="";
            try{
                url = new URL(sharedData+"get_depa.php");
                HttpURLConnection urlConnection = (HttpURLConnection) url.openConnection();
                is = new BufferedInputStream(urlConnection.getInputStream());
            }catch(IOException e){
                e.printStackTrace();
            }
            //convert response to string
            try{
                BufferedReader reader = new BufferedReader(new InputStreamReader(is,"utf-8"));
                String line = null;
                while ((line = reader.readLine()) != null) {
                    result+=line;
                }
                is.close();
                //result=sb.toString();
            }catch(Exception e){
                e.printStackTrace();
            }
            // parse json data
            try{
                JSONArray jArray =new JSONArray(result);
                for(int i=0;i<jArray.length();i++){
                    JSONObject jsonObject=jArray.getJSONObject(i);
                    // add interviewee name to arraylist
                    list.add(jsonObject.getString("nombre_depa"));
                }
            }
            catch(JSONException e){
                e.printStackTrace();
            }
            return null;
        }
        protected void onPostExecute(Void result){
            listItems.addAll(list);
            adapter.notifyDataSetChanged();
        }
    }

}
