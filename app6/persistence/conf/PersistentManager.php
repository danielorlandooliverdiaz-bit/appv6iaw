<?php

class PersistentManager {

    // Instancia privada de conexión.
    private static $instance = null;
    //Conexión a BD
    private static $connection = null;
    //Parámetros de conexión a la BD.
    private $userBD = "";
    private $psswdBD = "";
    private $nameBD = "";
    private $hostBD = "";

    //Get de la conexión
    public static function getInstance() {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    //Constructor
    private function __construct() {
        $this->establishCredentials();
        
        PersistentManager::$connection = mysqli_connect($this->hostBD, $this->userBD, $this->psswdBD, $this->nameBD)
                or die("Could not connect to db: " . mysqli_error(PersistentManager::$connection));
        
        // Es buena práctica verificar si connection es válido antes de usarlo
        if (PersistentManager::$connection) {
            mysqli_query(PersistentManager::$connection, "SET NAMES 'utf8'");
        }
    }
    
    private function establishCredentials() {
        // CORRECCIÓN 1: Usar __DIR__ para buscar el json en la MISMA carpeta que este archivo php
        $jsonPath = __DIR__ . '/credentials.json';

        if (file_exists($jsonPath)) {
            $credentialsJSON = file_get_contents($jsonPath);
            $credentials = json_decode($credentialsJSON, true);

            // CORRECCIÓN 2: Corregido userDB por userBD (typo original)
            $this->userBD = $credentials["user"];
            $this->psswdBD = $credentials["password"];
            
            // CORRECCIÓN 3: Soportar clave 'database' o 'name'
            if (isset($credentials["database"])) {
                 $this->nameBD = $credentials["database"];
            } else {
                 $this->nameBD = $credentials["name"];
            }

            $this->hostBD = $credentials["host"];
        } else {
            // Fallback (esto fallará en docker, pero lo dejamos por si acaso)
            $this->userBD = "root";
            $this->psswdBD = "";
            $this->nameBD = "roleplayinggamedb";
            $this->hostBD = "localhost";
        }        
    }
    
    public function close_connection() {
        if (PersistentManager::$connection) {
            mysqli_close(PersistentManager::$connection);
        }
    }

    function get_connection() {
        return PersistentManager::$connection;
    }
}
?>
