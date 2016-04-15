<?php
 require_once 'singleton/database.php';

class Tipo_Ensayo {

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
         ->from('tipo_ensayo t')
         ->Join('area a on t.fkarea=a.pkarea')
         ->select('t.*,a.nombre as area')
         ->where('t.estado=1')          
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Listar_por_Area($pkarea) {
        try {
           return $this->pdo
         ->from('tipo_ensayo t')
         ->select('t.*')
         ->where('t.fkarea',$pkarea)          
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Registrar($datos)
    {
         try {
           $this->pdo->insertInto('tipo_ensayo', $datos)->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Editar($datos)
    {
         try {
           $this->pdo->update('tipo_ensayo')
                     ->set($datos)
                     ->where('pktipo_ensayo', $datos['pktipo_ensayo'])
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
         ->from('tipo_ensayo')
         ->select('tipo_ensayo.*')
         ->where('pktipo_ensayo=?',$id)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Existetipo_ensayo($nombre)
    {
       try 
        {
          return $this->pdo
         ->from('tipo_ensayo')
         ->select('tipo_ensayo.*')
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
           $this->pdo->update('tipo_ensayo')
                     ->set('estado',0)
                     ->where('pktipo_ensayo', $id)
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>