package my.mysql_php_register_login;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

public class menu_inicio extends AppCompatActivity {

    private Button log_out,btn_miturno,btngenerar,btnmodulos,btnperfil,btnmisturnos;
    String parametros;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu_inicio);

        log_out = (Button) findViewById(R.id.btn_salir_app);
        btngenerar = (Button) findViewById(R.id.btn_generar);
        btn_miturno = (Button) findViewById(R.id.btn_mi_turno);
        parametros=getIntent().getStringExtra("usuario");
        btnmodulos = (Button) findViewById(R.id.btn_modulos);
        btnperfil= (Button) findViewById(R.id.btn_miperfil);
        btnmisturnos=(Button) findViewById(R.id.btn_misturnos);
       // Toast.makeText(getApplicationContext(),parametros, Toast.LENGTH_SHORT).show();

        log_out.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
                System.exit(0);
            }
        });

        btngenerar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(menu_inicio.this, generar_turno.class);
                intent.putExtra("usuario", parametros);
                startActivity(intent);
                //startActivity(new Intent(getApplicationContext(), generar_turno.class));
            }
        });

        btn_miturno.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(menu_inicio.this, mi_turno.class);
                intent.putExtra("usuario", parametros);
                startActivity(intent);
               // startActivity(new Intent(getApplicationContext(), mi_turno.class));
            }
        });

        btnmodulos.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(menu_inicio.this, modulos.class);
                intent.putExtra("usuario", parametros);
                startActivity(intent);
                // startActivity(new Intent(getApplicationContext(), mi_turno.class));
            }
        });
        btnperfil.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(menu_inicio.this, editar_perfil.class);
                intent.putExtra("usuario", parametros);
                startActivity(intent);
                // startActivity(new Intent(getApplicationContext(), mi_turno.class));
            }
        });
        btnmisturnos.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(menu_inicio.this, mis_turnos.class);
                intent.putExtra("usuario", parametros);
                startActivity(intent);
                // startActivity(new Intent(getApplicationContext(), mi_turno.class));
            }
        });
    }
}
