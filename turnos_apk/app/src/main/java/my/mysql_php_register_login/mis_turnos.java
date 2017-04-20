package my.mysql_php_register_login;

import android.app.AlertDialog;
import android.app.Dialog;
import android.app.DialogFragment;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Color;
import android.graphics.Typeface;
import android.os.Bundle;
import android.support.v4.app.FragmentTransaction;
import android.support.v7.app.AppCompatActivity;
import android.view.Gravity;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.ImageButton;
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

import java.net.URL;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class mis_turnos extends AppCompatActivity {
    ArrayList<String> listItems=new ArrayList<>();
    ArrayAdapter<String> adapter;
    String parametros,idturno;
    Spinner departamentos;
    URL url=null;
    Button generar;

    private RequestQueue requestQueue;
    private static final String URL = "http://192.168.1.1/turnos_app/web_services/mis_turnos.php";
    private StringRequest request;
    Intent intent;
    String departamento_selected;
    TableLayout tl;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mis_turnos);
        parametros=getIntent().getStringExtra("usuario");
        // Toast.makeText(getApplicationContext(), parametros, Toast.LENGTH_SHORT).show();
        ScrollView barra = (ScrollView) findViewById(R.id.v_scroll);
        /* Find Tablelayout defined in main.xml */
        tl = (TableLayout) findViewById(R.id.tbl_layer);




        requestQueue = Volley.newRequestQueue(this);
        request = new StringRequest(Request.Method.POST, URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    JSONArray jsonarray = new JSONArray(response);

                    TableLayout.LayoutParams tableRowParams=
                            new TableLayout.LayoutParams
                                    (TableLayout.LayoutParams.MATCH_PARENT,TableLayout.LayoutParams.WRAP_CONTENT);
                    int leftMargin=10;
                    int topMargin=10;
                    int rightMargin=10;
                    int bottomMargin=10;



                    for (int i = 0; i <jsonarray.length(); i++) {
                        JSONObject jsonobject = jsonarray.getJSONObject(i);
                        String nroturno     = jsonobject.getString("nro_turno");
                        String fecha     = jsonobject.getString("fecha");
                        String departamento     = jsonobject.getString("nombre_departamento");
                        String estado     = jsonobject.getString("estado");

                        final TableRow row= new TableRow(getApplicationContext());
                        TableRow.LayoutParams lp = new TableRow.LayoutParams(TableRow.LayoutParams.WRAP_CONTENT);
                        row.setLayoutParams(lp);
                        row.setBackgroundColor(Color.parseColor("#C5C5C5"));
                        TextView rnroturno = new TextView(getApplicationContext());
                        rnroturno.setText(nroturno + "  ");
                        rnroturno.setTextSize(18);
                        rnroturno.setTextColor(Color.parseColor("#242B5D"));
                        TextView rdepartmamento = new TextView(getApplicationContext());
                        rdepartmamento.setText(departamento + "  ");
                        rdepartmamento.setTextSize(18);
                        rdepartmamento.setTextColor(Color.parseColor("#242B5D"));

                        TextView rfecha = new TextView(getApplicationContext());
                        rfecha.setText(fecha + "  ");
                        rfecha.setTextSize(18);
                        rfecha.setTextColor(Color.parseColor("#242B5D"));

                        TextView restado = new TextView(getApplicationContext());
                        restado.setText(estado);
                        restado.setTextSize(18);
                        restado.setTextColor(Color.parseColor("#242B5D"));
                        if (estado.equals("ATENDIDO")){
                            restado.setBackgroundColor(Color.parseColor("#32c2cd"));
                        }
                        if (estado.equals("CANCELADO")){
                            restado.setBackgroundColor(Color.parseColor("#e74955"));
                        }
                        if (estado.equals("ACTIVO")){
                            restado.setBackgroundColor(Color.parseColor("#16D274"));
                        }
                        if (estado.equals("EN ESPERA")){
                            restado.setBackgroundColor(Color.parseColor("#fcb322"));
                        }

                        Button btncancelar = new Button(getApplicationContext());
                        btncancelar.setText("CANCELAR");
                        btncancelar.setTextColor(Color.parseColor("#e74955"));

                        row.setGravity(Gravity.CENTER);
                        row.setLayoutParams(tableRowParams);
                        row.addView(rnroturno);
                        row.addView(rdepartmamento);
                        row.addView(rfecha);
                        row.addView(restado);
                        if (estado.equals("EN ESPERA")||estado.equals("ACTIVO")){
                            row.addView(btncancelar);
                        }
                        tl.addView(row,i);
                        btncancelar.setOnClickListener(new View.OnClickListener() {
                            public void onClick(View view) {
                                TableRow t = row;
                                TextView firstTextView = (TextView) t.getChildAt(0);
                                idturno = firstTextView.getText().toString();
                                dialogo(idturno);
                            }
                        });

                    }

                    tableRowParams.setMargins(leftMargin, topMargin, rightMargin, bottomMargin);
                    TableRow row_colum= new TableRow(getApplicationContext());
                    TextView colum1=new TextView(getApplicationContext());
                    TextView colum2=new TextView(getApplicationContext());
                    TextView colum3=new TextView(getApplicationContext());
                    TextView colum4=new TextView(getApplicationContext());
                    TextView colum5=new TextView(getApplicationContext());

                    colum1.setText("NROTURNO");
                    colum1.setTextColor(Color.parseColor("#FFFFFF"));
                    row_colum.addView(colum1);
                    colum2.setText(" DEPARTAMENTO");
                    colum2.setTextColor(Color.parseColor("#FFFFFF"));
                    row_colum.addView(colum2);
                    colum3.setText(" FECHA ");
                    colum3.setTextColor(Color.parseColor("#FFFFFF"));
                    row_colum.addView(colum3);
                    colum4.setText(" ESTADO ");
                    colum4.setTextColor(Color.parseColor("#FFFFFF"));
                    row_colum.addView(colum4);
                    colum5.setText(" CANCELAR TURNO ");
                    colum5.setTextColor(Color.parseColor("#FFFFFF"));
                    row_colum.addView(colum5);
                    row_colum.setGravity(Gravity.CENTER);
                    row_colum.setBackgroundColor(Color.parseColor("#242B5D"));
                    row_colum.setLayoutParams(tableRowParams);
                    tl.addView(row_colum,0);



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

public void dialogo(final String idnroturno){

    AlertDialog.Builder builder = new AlertDialog.Builder(this);
    builder
            .setTitle("Cancelar turno")
            .setMessage("¿ Esta seguro ?")
            .setIcon(android.R.drawable.ic_dialog_alert)
            .setPositiveButton("SI", new DialogInterface.OnClickListener() {
                public void onClick(DialogInterface dialog, int which) {
                    System.out.println(idnroturno);

                    RequestQueue requestQueue2 = Volley.newRequestQueue(getApplicationContext());
                    String URL_cancelar = "http://192.168.1.1/turnos_app/web_services/cancelar_turno.php";

                    StringRequest request2 = new StringRequest(Request.Method.POST, URL_cancelar, new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            try {
                                JSONObject jsonObject = new JSONObject(response);

                                if (jsonObject.getString("resultado").equals("OK")) {
                                    Toast.makeText(getApplicationContext(), "TURNO CANCELADO CORRECTAMENTE", Toast.LENGTH_LONG).show();
                                } else {
                                    Toast.makeText(getApplicationContext(), "!!!ERROR!!", Toast.LENGTH_LONG).show();
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
                            hashMap.put("idturno", idnroturno);

                            return hashMap;
                        }
                    };
                    requestQueue2.add(request2);

                }
            })
            .setNegativeButton("NO", null)						//Do nothing on no
            .show();

}

}
