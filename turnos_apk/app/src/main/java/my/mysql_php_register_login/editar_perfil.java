package my.mysql_php_register_login;

import android.content.Intent;
import android.graphics.Color;
import android.graphics.Typeface;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.Gravity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.RelativeLayout;
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

import java.util.HashMap;
import java.util.Map;


public class editar_perfil extends AppCompatActivity {

    EditText cedula,nombres,apellidos,telefono,direccion,correo,usuario,pass;
RadioGroup sexo;
Button btneditar;
    String textsexo, parametros;
    private RequestQueue requestQueue,requestQueue2;
    private static final String URL = "http://192.168.1.1/turnos_app/web_services/cargar_perfil.php";
    private StringRequest request,request2;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.editar_perfil);
        parametros=getIntent().getStringExtra("usuario");
       // Toast.makeText(getApplicationContext(), parametros, Toast.LENGTH_SHORT).show();

        sexo=(RadioGroup) findViewById(R.id.rbtng_sexo);
        btneditar=(Button) findViewById(R.id.btn_editar);

        requestQueue = Volley.newRequestQueue(this);
        requestQueue2 = Volley.newRequestQueue(this);
        sexo.setOnCheckedChangeListener(new RadioGroup.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(RadioGroup group, int checkedId) {
                RadioButton radioButton = (RadioButton) group.findViewById(checkedId);
                textsexo = radioButton.getText().toString();
            }
        });
        cedula=(EditText) findViewById(R.id.txtcedula);
                nombres=(EditText) findViewById(R.id.txtnombres);
                apellidos= (EditText) findViewById(R.id.txtapellidos);
                telefono=(EditText) findViewById(R.id.txttelefono);
                direccion=(EditText) findViewById(R.id.txtdireccion);
                correo=(EditText) findViewById(R.id.txtcorreo);
                usuario=(EditText) findViewById(R.id.txtusuario);
                pass=(EditText) findViewById(R.id.txtpass);



        request = new StringRequest(Request.Method.POST, URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    JSONArray jsonarray = new JSONArray(response);
                    for(int i=0; i < jsonarray.length(); i++) {
                        JSONObject jsonobject = jsonarray.getJSONObject(i);
                        if (jsonobject.getString("sexo").equals("MASCULINO")||jsonobject.getString("sexo").equals("Hombre")){
                            textsexo=jsonobject.getString("sexo");
                            sexo.check(R.id.rbtn_hombre);
                        }else{
                            textsexo=jsonobject.getString("sexo");
                            sexo.check(R.id.rbtn_mujer);
                        }
                        cedula.setText(jsonobject.getString("cedula"));
                        //cedula.setEnabled(false);
                        nombres.setText(jsonobject.getString("nombre"));
                        apellidos.setText(jsonobject.getString("apellido"));
                        telefono.setText(jsonobject.getString("telefono"));
                        direccion.setText(jsonobject.getString("direccion"));
                        correo.setText(jsonobject.getString("email"));
                        usuario.setText(jsonobject.getString("usuario"));
                        pass.setText(jsonobject.getString("pass"));
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

        btneditar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                String URL_editar = "http://192.168.1.1/turnos_app/web_services/editar_perfil.php";
                request2 = new StringRequest(Request.Method.POST, URL_editar, new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            if (jsonObject.getString("resultado").equals("OK")) {
                                Toast.makeText(getApplicationContext(), "!!!CORRECTO!! Tus datos se an guardado", Toast.LENGTH_LONG).show();
                            } else {
                                Toast.makeText(getApplicationContext(), "!!!ERROR!! Contactatese con tu Administrador", Toast.LENGTH_LONG).show();
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
                        hashMap.put("idusuario", parametros);
                        hashMap.put("cedula", cedula.getText().toString());
                        hashMap.put("nombres", nombres.getText().toString());
                        hashMap.put("apellidos", apellidos.getText().toString());
                        hashMap.put("telefono", telefono.getText().toString());
                        hashMap.put("direccion", direccion.getText().toString());
                        hashMap.put("correo", correo.getText().toString());
                        hashMap.put("usuario", usuario.getText().toString());
                        hashMap.put("pass", pass.getText().toString());
                        hashMap.put("sexo", textsexo);

                        return hashMap;
                    }
                };
                requestQueue2.add(request2);
            }
        });

    }

}
