package my.mysql_php_register_login;

import android.content.Intent;
import android.graphics.Color;
import android.graphics.Typeface;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.Gravity;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.RelativeLayout;
import android.widget.ScrollView;
import android.widget.Spinner;
import android.widget.TableLayout;
import android.widget.TableRow;
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

import java.io.BufferedInputStream;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Iterator;
import java.util.Map;

public class modulos extends AppCompatActivity {
    ArrayList<String> listItems=new ArrayList<>();
    ArrayAdapter<String> adapter;
    String parametros;
    Spinner departamentos;
    URL url=null;
    Button generar;

    private RequestQueue requestQueue;
    private static final String URL = "http://192.168.1.1/turnos_app/web_services/modulos.php";
    private StringRequest request;
    Intent intent;
    String departamento_selected;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_modulos);
        parametros=getIntent().getStringExtra("usuario");
        // Toast.makeText(getApplicationContext(), parametros, Toast.LENGTH_SHORT).show();
        ScrollView barra = (ScrollView) findViewById(R.id.v_scroll);
        /* Find Tablelayout defined in main.xml */


        requestQueue = Volley.newRequestQueue(this);
        request = new StringRequest(Request.Method.POST, URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    JSONArray jsonarray = new JSONArray(response);
                    // System.out.println();
                    TableLayout tl = (TableLayout) findViewById(R.id.tbl_layer);
                    for(int i=0; i < jsonarray.length(); i++) {
                        JSONObject jsonobject = jsonarray.getJSONObject(i);
                        String nombre_modulo     = jsonobject.getString("nombre_modulo");
                        String turno_actual     = jsonobject.getString("turno_actual");
                        String siguiente_turno     = jsonobject.getString("siguiente_turno");
                        //Toast.makeText(getApplicationContext(),nombre_modulo, Toast.LENGTH_SHORT).show();
                        TableRow tr = new TableRow(getApplicationContext());
                        tr.setLayoutParams(new TableRow.LayoutParams(TableRow.LayoutParams.MATCH_PARENT, TableRow.LayoutParams.MATCH_PARENT));
                        RelativeLayout b = new RelativeLayout(getApplicationContext());
                        b.setBackgroundColor(Color.parseColor("#242B5D"));
                        b.setLayoutParams(new TableRow.LayoutParams(TableRow.LayoutParams.MATCH_PARENT, TableLayout.LayoutParams.MATCH_PARENT));
                        TextView espacio = new TextView(getApplicationContext());
                        espacio.setBackgroundColor(Color.parseColor("#FFFFFFFF"));
                        espacio.setLayoutParams(new TableRow.LayoutParams(TableRow.LayoutParams.MATCH_PARENT, 20));
                        TextView titulo = new TextView(getApplicationContext());
                        titulo.setText("\n   " + nombre_modulo + "\n    TURNO ACTUAL");
                        titulo.setTextSize(25);
                        titulo.setTypeface(titulo.getTypeface(), Typeface.BOLD);
                        titulo.setTextColor(Color.parseColor("#FFFFFFFF"));
                        TextView lbl_siguienteturno = new TextView(getApplicationContext());
                        lbl_siguienteturno.setText("\n \n \n \n \nSIGUIENTE TURNO\n");
                        lbl_siguienteturno.setTextSize(25);
                        lbl_siguienteturno.setTypeface(lbl_siguienteturno.getTypeface(), Typeface.BOLD);
                        lbl_siguienteturno.setTextColor(Color.parseColor("#FFFFFFFF"));
                        TextView txt_turno_actual = new TextView(getApplicationContext());
                        txt_turno_actual.setText("\n \n    " + turno_actual);
                        txt_turno_actual.setTextSize(35);
                        txt_turno_actual.setTextColor(Color.parseColor("#fcb322"));
                        TextView txt_turno_siguiente = new TextView(getApplicationContext());
                        txt_turno_siguiente.setText("\n \n \n \n   " + siguiente_turno + "\n");
                        txt_turno_siguiente.setTextSize(35);
                        txt_turno_siguiente.setTextColor(Color.parseColor("#fcb322"));
                        b.setGravity(Gravity.CENTER);
                        tr.setGravity(Gravity.CENTER);
                        titulo.setGravity(Gravity.CENTER);
                        lbl_siguienteturno.setGravity(Gravity.CENTER);
                        txt_turno_actual.setGravity(Gravity.CENTER);
                        txt_turno_siguiente.setGravity(Gravity.CENTER);
                        b.addView(espacio);
                        b.addView(titulo);
                        b.addView(txt_turno_actual);
                        b.addView(lbl_siguienteturno);
                        b.addView(txt_turno_siguiente);
                        tr.addView(b);
                        tl.addView(tr, new TableLayout.LayoutParams(TableLayout.LayoutParams.MATCH_PARENT, TableLayout.LayoutParams.MATCH_PARENT));
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

                return hashMap;
            }
        };
        requestQueue.add(request);
    }



}
