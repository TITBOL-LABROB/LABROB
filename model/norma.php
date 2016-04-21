<?php
 require_once 'singleton/database.php';

class Norma {

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
         ->from('norma')
         ->select('norma.*')
         ->where('estado=1')          
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Registrar($datos)
    {
         try {
           $this->pdo->insertInto('norma', $datos)->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Editar($datos)
    {
         try {
           $this->pdo->update('norma')
                     ->set($datos)
                     ->where('pknorma', $datos['pknorma'])
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
         ->from('norma')
         ->select('norma.*')
         ->where('pknorma=?',$id)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Existenorma($nombre)
    {
       try 
        {
          return $this->pdo
         ->from('norma')
         ->select('norma.*')
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
           $this->pdo->update('norma')
                     ->set('estado',0)
                     ->where('pknorma', $id)
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>