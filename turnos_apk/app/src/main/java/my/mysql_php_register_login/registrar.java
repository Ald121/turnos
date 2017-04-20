package my.mysql_php_register_login;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
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
    private static final String URL = "http://192.168.1.1/turnos_app/web_services/registro_clientes.php";
    private StringRequest request;
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


        btn_registrar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Toast.makeText(getApplicationContext(), "!!CORRECTO!! Hemos Enviado un correo a " + correo.getText().toString()+" revisalo para activar su cuenta", Toast.LENGTH_LONG).show();
                startActivity(new Intent(getApplicationContext(),LoginActivity.class));
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
