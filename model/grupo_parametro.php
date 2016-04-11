<?php
 require_once 'singleton/database.php';

class grupo_parametro {

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
         ->from('grupo_parametro')
         ->select('grupo_parametro.*')
         ->where('estado=1')          
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Registrar($datos)
    {
         try {
           $this->pdo->insertInto('grupo_parametro', $datos)->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Editar($datos)
    {
         try {
           $this->pdo->update('grupo_parametro')
                     ->set($datos)
                     ->where('pkgrupo_parametro', $datos['pkgrupo_parametro'])
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
         ->from('grupo_parametro')
         ->select('grupo_parametro.*')
         ->where('pkgrupo_parametro=?',$id)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Existegrupo_parametro($nombre)
    {
       try 
        {
          return $this->pdo
         ->from('grupo_parametro')
         ->select('grupo_parametro.*')
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
           $this->pdo->update('grupo_parametro')
                     ->set('estado',0)
                     ->where('pkgrupo_parametro', $id)
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>