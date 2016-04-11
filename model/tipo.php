<?php
 require_once 'singleton/database.php';

class Tipo {

    private $pdo;

    public function __CONSTRUCT() {
        try {
            $this->pdo = Singleton::getInstance()->getPDO();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar() {
        try {
           return $this->pdo
         ->from('tipo_usuario')
         ->select('tipo_usuario.*')
         ->where('estado=1')          
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Registrar($datos)
    {
         try {
           $this->pdo->insertInto('tipo_usuario', $datos)->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Editar($datos)
    {
         try {
           $this->pdo->update('tipo_usuario')
                     ->set($datos)
                     ->where('pktipo_usuario', $datos['pktipo_usuario'])
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
      try 
        {
           return $this->pdo
         ->from('tipo_usuario')
         ->select('tipo_usuario.*')
         ->where('pktipo_usuario=?',$id)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function ExisteTipo($nombre)
    {
       try 
        {
          return $this->pdo
         ->from('tipo_usuario')
         ->select('tipo_usuario.*')
         ->where('nombre=?',$nombre)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
      try 
        {
           $this->pdo->update('tipo_usuario')
                     ->set('estado',0)
                     ->where('pktipo_usuario', $id)
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>