<?php
 require_once 'singleton/database.php';

class detalle_proforma{

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
         ->from('detalle_proforma de')
         ->join('ensayo p on de.fkensayo=p.pkensayo')
         ->join('proforma pr on de.fkproforma=pr.pkproforma')
         ->select('p.nombre as ensayo,pr.nombre as proforma,de.costo')      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
     public function ListaPrecio() {
        try {
           return $this->pdo
         ->from('detalle_proforma de')
         ->join('ensayo p on de.fkensayo=p.pkensayo')
         ->join('proforma pr on de.fkproforma=pr.pkproforma')
         ->select('de.fkproforma,SUM(de.costo) as total')
         ->groupBy('de.fkproforma')      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Registrar($datos)
    {
         try {
          return $this->pdo->insertInto('detalle_proforma', $datos)->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
   
    public function Existedetalle_proforma($fkproforma,$fkprametro)
    {
       try 
        {
          return $this->pdo
         ->from('detalle_proforma')
         ->select('detalle_proforma.*')
         ->where('fkproforma=? and fkensayo=?',$fkproforma,$fkprametro)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($datos)
    {
      try 
        {
           $this->pdo->deleteFrom('detalle_proforma')
                     ->where('fkensayo=? and fkproforma=?', $datos['fkensayo'],$datos['fkproforma'])
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>