<?php  
class Connect {
    private static $instance = null;
    private $connection;
    private $host = '127.0.0.1';
    private $user = 'root';
    private $pass = '';
    private $db = 'tagmypet';

    // Constructor privado para implementar el patrón Singleton
    private function __construct() {
        try {
            // Establecer la conexión usando PDO
            $this->connection = new PDO(
                "mysql:host=$this->host;dbname=$this->db",
                $this->user,
                $this->pass,
                [
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // Codificación UTF-8
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,      // Modo de errores en excepción
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Modo de fetch por defecto
                    PDO::ATTR_EMULATE_PREPARES => false,              // Desactivar la emulación de sentencias preparadas
                    PDO::ATTR_PERSISTENT => false,                    // Conexión no persistente
                ]
            );
        } catch (PDOException $e) {
            // Registrar error en log y mostrar mensaje general
            error_log("Error en la base de datos: " . $e->getMessage());
            die("Ocurrió un error con la conexión a la base de datos.");
        }
    }

    // Obtener la instancia de conexión, implementando Singleton
    public static function ObtainInstance() {
        if (!self::$instance) {
            self::$instance = new Connect();
        }
        return self::$instance->connection;
    }
}
?>
