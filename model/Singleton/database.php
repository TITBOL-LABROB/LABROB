<?php

/**
 * Clase que envuelve una instancia de la clase PDO
 * para el manejo de la base de datos
 */
class Singleton {

    /**
     * Única instancia de la clase
     * PD. PHP no es un lenguaje tipado
     */
    private static $instance = null;

    /**
     * Instancia de PDO equivalente al Conn de Java
     */
    private static $pdo;

    final private function __construct() {
        try {
            // Crear nueva conexión PDO
            self::getPDO();
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
            $bd = 'mysql:host=localhost;port=3306;dbname=lr';
            $username = 'root';
            $password = '';
            self::$pdo = new PDO($bd, $username, $password);

            // Habilitar excepciones
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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





