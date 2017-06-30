package my.mysql_php_register_login;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.text.format.DateFormat;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.Spinner;
import android.widget.TextView;
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

import java.net.URL;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Iterator;
import java.util.Map;

/**
 * Created by filip on 10/21/2015.
 */
public class mi_turno extends Activity {
    String parametros;
    private RequestQueue requestQueue;
    private static String sharedData=Globals.getServerPath();
    private static final String URL = sharedData+"mi_turno.php";
    private StringRequest request;
    Intent intent;
    TextView mi_turno,fecha_turno,hora_estimada,departamento,modulo;
    ArrayList<String> list;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.miturno_activity);

        parametros=getIntent().getStringExtra("usuario");
        //Toast.makeText(getApplicationContext(), parametros, Toast.LENGTH_SHORT).show();

        requestQueue = Volley.newRequestQueue(this);
        final TextView fecha_actual = (TextView) findViewById(R.id.txt_fecha_actual);
        final TextView hora_actual = (TextView) findViewById(R.id.txt_hora_actual);

        mi_turno = (TextView) findViewById(R.id.lbl_miturno);
        fecha_turno = (TextView) findViewById(R.id.lbl_fecha);
        hora_estimada = (TextView) findViewById(R.id.lbl_hora_estimanda);
        departamento = (TextView) findViewById(R.id.lbl_departamento);
        modulo = (TextView) findViewById(R.id.lbl_modulo);

        String date_actual = (DateFormat.format("dd-MM-yyyy", new java.util.Date()).toString());
        fecha_actual.setText(date_actual);

       list =new ArrayList<>();

        request = new StringRequest(Request.Method.POST, URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    JSONObject jsonObject = new JSONObject(response);
                   // System.out.println();
                    //Toast.makeText(getApplicationContext(),""+Integer.parsent(jsonObject.getString("id_usuario")), Toast.LENGTH_SHORT).show();
                    mi_turno.setText(mi_turno.getText()+" : "+jsonObject.getString("mi_turno"));
                    fecha_turno.setText(fecha_turno.getText() + " : " + jsonObject.getString("fecha_turno"));
                    hora_estimada.setText(hora_estimada.getText()+" : "+jsonObject.getString("hora_estimada"));
                    departamento.setText(departamento.getText()+" : "+jsonObject.getString("departamento"));
                    modulo.setText(jsonObject.getString("modulo"));

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

                return hashMap;
            }
        };
        requestQueue.add(request);

        Thread t = new Thread() {
            @Override
            public void run() {
                try {
                    while (!isInterrupted()) {
                        Thread.sleep(1000);
                        runOnUiThread(new Runnable() {
                            @Override
                            public void run() {
                                String hora_actal = (DateFormat.format("hh:mm:ss", new java.util.Date()).toString());
                                hora_actual.setText(hora_actal);
                            }
                        });
                    }
                } catch (InterruptedException e) {
                }
            }
        };
        t.start();


    }


    }

