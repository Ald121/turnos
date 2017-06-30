package my.mysql_php_register_login;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.text.Editable;
import android.text.TextWatcher;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
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


public class registrar extends AppCompatActivity {

    EditText cedula,nombres,apellidos,telefono,direccion,correo,usuario,pass;
    RadioGroup sexo;
    Button btn_registrar;
    String textsexo;
    private RequestQueue requestQueue;
    private static String sharedData=Globals.getServerPath();
    private static final String URL = sharedData+"registro_clientes.php";
    private static final String URL_VALIDAR_CEDULA = sharedData+"validar_cedula.php";
    private StringRequest request,request2,request3;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registrar);

        sexo=(RadioGroup) findViewById(R.id.rbtng_sexo);
        btn_registrar=(Button) findViewById(R.id.btnregistrar);

        requestQueue = Volley.newRequestQueue(this);
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

        cedula.addTextChangedListener(new TextWatcher() {
            @Override
            public void beforeTextChanged(CharSequence s, int start, int count, int after) {

            }
            @Override
            public void onTextChanged(CharSequence s, int start, int before, int count) {
               if (s.length()==10){
                   request2 = new StringRequest(Request.Method.POST, URL_VALIDAR_CEDULA, new Response.Listener<String>() {
                       @Override
                       public void onResponse(String response) {
                           try {
                               JSONObject jsonObject = new JSONObject(response);
                             //  Toast.makeText(getApplicationContext(),jsonObject.getString("respuesta"), Toast.LENGTH_LONG).show();
                                   if (jsonObject.getString("respuesta").equals("REPETIDA")){
                                       Toast.makeText(getApplicationContext(),"Cedula ya esta registrada", Toast.LENGTH_LONG).show();
                                   }

                           } catch (JSONException e) {
                               e.printStackTrace();
                               //Toast.makeText(getApplicationContext(),"Comprueba tu conexion", Toast.LENGTH_LONG).show();
                           }

                       }
                   }, new Response.ErrorListener() {
                       @Override
                       public void onErrorResponse(VolleyError error) {
                           //Toast.makeText(getApplicationContext(),"Comprueba tu conexion", Toast.LENGTH_LONG).show();
                       }
                   }){
                       @Override
                       protected Map<String, String> getParams() throws AuthFailureError {
                           HashMap<String, String> hashMap = new HashMap<String, String>();
                           hashMap.put("cedula", cedula.getText().toString());
                           return hashMap;
                       }
                   };
                   requestQueue.add(request2);

               }

            }
            @Override
            public void afterTextChanged(Editable s) {

            }
        });

        correo.addTextChangedListener(new TextWatcher() {
            @Override
            public void beforeTextChanged(CharSequence s, int start, int count, int after) {

            }
            @Override
            public void onTextChanged(CharSequence s, int start, int before, int count) {

                request3 = new StringRequest(Request.Method.POST, URL_VALIDAR_CEDULA, new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            try {
                                JSONObject jsonObject = new JSONObject(response);
                                if (jsonObject.getString("respuesta").equals("EMAILREPETIDO")){
                                    Toast.makeText(getApplicationContext(),"Email ya esta registrado", Toast.LENGTH_LONG).show();
                                }
                            } catch (JSONException e) {
                                e.printStackTrace();
                                //Toast.makeText(getApplicationContext(),"Comprueba tu conexion", Toast.LENGTH_LONG).show();
                            }

                        }
                    }, new Response.ErrorListener() {
                        @Override
                        public void onErrorResponse(VolleyError error) {
                            //Toast.makeText(getApplicationContext(),"Comprueba tu conexion", Toast.LENGTH_LONG).show();
                        }
                    }){
                        @Override
                        protected Map<String, String> getParams() throws AuthFailureError {
                            HashMap<String, String> hashMap = new HashMap<String, String>();
                            hashMap.put("email", correo.getText().toString());
                            return hashMap;
                        }
                    };
                    requestQueue.add(request3);



            }
            @Override
            public void afterTextChanged(Editable s) {

            }
        });
        btn_registrar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Toast.makeText(getApplicationContext(), "!!CORRECTO!! Hemos Enviado un correo a " + correo.getText().toString() + " revisalo para activar su cuenta", Toast.LENGTH_LONG).show();
                startActivity(new Intent(getApplicationContext(), LoginActivity.class));
                request = new StringRequest(Request.Method.POST, URL, new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            if (jsonObject.names().get(0).equals("success")) {
                            } else {
                                Toast.makeText(getApplicationContext(), "!!!ERROR!!" + jsonObject.getString("error"), Toast.LENGTH_LONG).show();
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
                requestQueue.add(request);
            }
        });

    }

}
