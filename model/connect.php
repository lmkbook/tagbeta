<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONEXION</title>
</head>
<body>
    <?php  
        class Connect{
            private static $instance = null;
            private $connection;
            private $host = '127.0.0.1';
            private $user = 'root';
            private $pass = '';
            private $db = 'tagmypet';
            private function __construct(){
                try{
                    $this->connection = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass, [
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false,
                        PDO::ATTR_PERSISTENT => false,
                    ]);
                }catch(PDOException $e){
                    error_log("Ocurrio un error con la base de datos: " . $e->getMessage());
                    die("Ocurrio un error con la conexion");
                }
            }
            public static function ObtainInstance(){
                if(!self::$instance){
                    self::$instance = new Connect();
                }
                return self::$instance->connection;
            }
        }
    ?>
</body>
</html>