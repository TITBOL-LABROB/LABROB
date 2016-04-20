<?php

/**
 * Clase que envuelve una instancia de la clase PDO
 * para el manejo de la base de datos
 */
require_once"model/FluentPDO/FluentPDO.php";
class Singleton {
/*
$pdo = new PDO('mysql:host=localhost;dbname=d2;charset=utf8','root', 'chars');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$fluent = new FluentPDO($pdo);*/

    /**
     * Única instancia de la clase
     * PD. PHP no es un lenguaje tipado
     */
    private static $instance = null;

    /**
     * Instancia de PDO equivalente al Conn de Java
     */
    private static $pdo;
    private static $fluent;

    final private function __construct() {
        try {
            // Crear nueva conexión PDO
            self::getPDO();
            self::getPDO2();
        } catch (PDOException $e) {
            // Manejo de excepciones
        }
    }

    /**
     * Retorna en la única instancia de la clase
     * @return Database|null
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Crear una nueva conexión PDO basada
     * en los datos de conexión
     * @return PDO Objeto PDO
     */
    public function getPDO() {
        if (self::$pdo == null) {
            $bd = 'mysql:host=localhost;port=3306;dbname=labrob';
            $username = 'root';
            $password = '';
            self::$pdo = new PDO($bd, $username, $password);

            // Habilitar excepciones
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            self::$fluent = new FluentPDO(self::$pdo);
        }

        return self::$fluent;
    }

    public function getPDO2() {
        if (self::$pdo == null) {
            $bd = 'mysql:host=localhost;port=3306;dbname=labrob';
            $username = 'root';
            $password = '';
            self::$pdo = new PDO($bd, $username, $password);
            // Habilitar excepciones
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }

        return self::$pdo;
    }

    /**
     * Evita la clonación del objeto
     */
    final protected function __clone() {
        
    }

    function _destructor() {
        self::$pdo = null;
    }

}
?>





