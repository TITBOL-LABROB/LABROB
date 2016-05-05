<?php
 require_once 'singleton/database.php';

class detalle_proforma_grupo{

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
         ->from('detalle_proforma_grupo de')
         ->join('grupo_ensayo p on de.fkgrupo=p.pkgrupo_ensayo')
         ->join('proforma pr on de.fkproforma=pr.pkproforma')
         ->select('de.fkproforma,de.fkgrupo,p.nombre as grupo,p.costo')      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Listarproforma($pkproforma) {
        try {
           return $this->pdo
         ->from('detalle_proforma_grupo de')
         ->join('grupo_ensayo p on de.fkgrupo=p.pkgrupo_ensayo')
         ->join('proforma pr on de.fkproforma=pr.pkproforma')
         ->select('de.fkproforma,de.fkgrupo,p.nombre as grupo,p.costo')
         ->where('pr.pkproforma',$pkproforma)      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
     public function ListaPrecio() {
        try {
           return $this->pdo
         ->from('detalle_proforma_grupo de')
         ->join('grupo_ensayo g on de.fkgrupo=g.pkgrupo_ensayo')
         ->select('de.fkproforma,SUM(g.costo) as total')
         ->groupBy('de.fkproforma')
         ->orderBy('de.fkproforma')      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Registrar($datos)
    {
         try {
          return $this->pdo->insertInto('detalle_proforma_grupo', $datos)->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
   
    public function Existedetalle_proforma_grupo($fkproforma,$fkprametro)
    {
       try 
        {
          return $this->pdo
         ->from('detalle_proforma_grupo')
         ->select('detalle_proforma_grupo.*')
         ->where('fkproforma=? and fkgrupo=?',$fkproforma,$fkprametro)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($fkproforma)
    {
      try 
        {
           $this->pdo->deleteFrom('detalle_proforma_grupo')
                     ->where('fkproforma',$fkproforma)
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>