<?php
 require_once 'singleton/database.php';

class Detalle_Matriz{

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
         ->from('detalle_matriz dm')
         ->join('ensayo p on dm.fkensayo=p.pkensayo')
         ->join('matriz m on dm.fkmatriz=m.pkmatriz')
         ->select('p.nombre as ensayo,m.nombre as matriz,dm.costo')      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
     public function ListaPrecio() {
        try {
           return $this->pdo
         ->from('detalle_matriz dm')
         ->join('ensayo p on dm.fkensayo=p.pkensayo')
         ->join('matriz m on dm.fkmatriz=m.pkmatriz')
         ->select('dm.fkmatriz,SUM(dm.costo) as total')
         ->groupBy('dm.fkmatriz')      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListaPrecio1() {
        try {
           return $this->pdo
         ->from('grupo_ensayo')
         ->select('costo,pkgrupo_ensayo')
         ->where('estado=1')     
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar($datos)
    {
         try {
          return $this->pdo->insertInto('detalle_matriz', $datos)->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
   
    public function Existedetalle_matriz($fkmatriz,$fkparametro)
    {
       try 
        {
          return $this->pdo
         ->from('detalle_matriz')
         ->select('detalle_matriz.*')
         ->where('fkmatriz=? and fkensayo=?',$fkmatriz,$fkparametro)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($datos)
    {
      try 
        {
           $this->pdo->deleteFrom('detalle_matriz')
                     ->where('fkensayo=? and fkmatriz=?', $datos['fkensayo'],$datos['fkmatriz'])
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>