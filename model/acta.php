<?php
 require_once 'singleton/database.php';

class Acta {

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
         ->from('area')
         ->select('area.*')
         ->where('estado=1')          
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Muestras() {
        try {
           return $this->pdo
         ->from('unidad_medida')
         ->select('unidad_medida.*')
         ->where('estado=1')          
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar($datos)
    {
         try {
           $this->pdo->insertInto('area', $datos)->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Editar($datos)
    {
         try {
           $this->pdo->update('area')
                     ->set($datos)
                     ->where('pkarea', $datos['pkarea'])
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
         ->from('area')
         ->select('area.*')
         ->where('pkarea=?',$id)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Existearea($nombre)
    {
       try 
        {
          return $this->pdo
         ->from('area')
         ->select('area.*')
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
           $this->pdo->update('area')
                     ->set('estado',0)
                     ->where('pkarea', $id)
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>