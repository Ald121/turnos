package my.mysql_php_register_login;

/**
 * Created by Alex on 29/06/2017.
 */
public class Globals {

    private static Globals instance = new Globals();
    private static String server_path="http://192.168.0.19/turnos/turnos_app/web_services/";

    // Getter-Setters
    public static Globals getInstance() {
        return instance;
    }

    public static String getServerPath() {
        return server_path;
    }


}
