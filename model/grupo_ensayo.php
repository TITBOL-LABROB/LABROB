<?php
 require_once 'singleton/database.php';

class grupo_ensayo {

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
         ->from('grupo_ensayo')
         ->select('grupo_ensayo.*')
         ->where('estado=1')          
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Registrar($datos)
    {
         try {
           $this->pdo->insertInto('grupo_ensayo', $datos)->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Editar($datos)
    {
         try {
           $this->pdo->update('grupo_ensayo')
                     ->set($datos)
                     ->where('pkgrupo_ensayo', $datos['pkgrupo_ensayo'])
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
         ->from('grupo_ensayo')
         ->select('grupo_ensayo.*')
         ->where('pkgrupo_ensayo=?',$id)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Existeproforma_ensayo($nombre)
    {
       try 
        {
          return $this->pdo
         ->from('grupo_ensayo')
         ->select('grupo_ensayo.*')
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
           $this->pdo->update('grupo_ensayo')
                     ->set('estado',0)
                     ->where('pkgrupo_ensayo', $id)
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>