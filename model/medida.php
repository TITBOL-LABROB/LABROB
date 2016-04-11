<?php
 require_once 'singleton/database.php';

class Unidad_Medida {

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
           $this->pdo->insertInto('unidad_medida', $datos)->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Editar($datos)
    {
         try {
           $this->pdo->update('unidad_medida')
                     ->set($datos)
                     ->where('pkunidad', $datos['pkunidad'])
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
         ->from('unidad_medida')
         ->select('unidad_medida.*')
         ->where('pkunidad=?',$id)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Existeunidad_medida($nombre)
    {
       try 
        {
          return $this->pdo
         ->from('unidad_medida')
         ->select('unidad_medida.*')
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
           $this->pdo->update('unidad_medida')
                     ->set('estado',0)
                     ->where('pkunidad', $id)
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>