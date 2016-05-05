<?php
 require_once 'singleton/database.php';

class detalle_matriz_proforma{

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
         ->from('detalle_matriz_proforma de')
         ->join('ensayo p on de.fkensayo=p.pkensayo')
         ->join('proforma pr on de.fkproforma=pr.pkproforma')
         ->select('de.fkproforma,de.fkensayo,p.nombre as ensayo,p.costo')      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarProformaProductos($pkproforma) {
        try {
           return $this->pdo
         ->from('detalle_matriz_proforma de')
         ->join('proforma pr on de.fkproforma=pr.pkproforma')
         ->join('matriz m on de.fkmatriz=m.pkmatriz')
         ->select('m.nombre as matriz,de.pkdetalle_matriz')
         ->where('pr.pkproforma',$pkproforma)
         ->groupBy('m.nombre')      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarProformaAreas($pkproforma) {
        try {
           return $this->pdo
         ->from('detalle_matriz_proforma de')
         ->join('ensayo p on de.fkensayo=p.pkensayo')
         ->join('proforma pr on de.fkproforma=pr.pkproforma')
         ->join('area a on p.fkarea=a.pkarea')
         ->select('a.pkarea,a.nombre')
         ->where('pr.pkproforma',$pkproforma)
         ->groupBy('a.pkarea,a.nombre')      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarProforma($pkproforma) {
        try {
           return $this->pdo
         ->from('detalle_matriz_proforma de')
         ->join('ensayo p on de.fkensayo=p.pkensayo')
         ->join('proforma pr on de.fkproforma=pr.pkproforma')
         ->join('unidad_medida u on p.fkunidad=u.pkunidad')
         ->join('area a on p.fkarea=a.pkarea')
         ->select('de.fkproforma,de.fkensayo,p.nombre as ensayo,u.nombre as medida,a.pkarea,a.nombre as area,p.costo')
         ->where('pr.pkproforma',$pkproforma)
         ->orderBy('a.nombre')      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
     public function ListaPrecio() {
        try {
           return $this->pdo
         ->from('detalle_matriz_proforma de')
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
          $this->pdo->insertInto('detalle_matriz_proforma', $datos)->execute();
          return $this->GetLatId();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
   
   public function GetLatId()
    {
     try {
          return $this->pdo->from('detalle_matriz_proforma p')
                     ->select('MAX(p.pkdetalle_matriz) as id')
                     ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }

    }
    public function Existedetalle_proforma($fkproforma,$fkprametro)
    {
       try 
        {
          return $this->pdo
         ->from('detalle_matriz_proforma')
         ->select('detalle_matriz_proforma.*')
         ->where('fkproforma=? and fkensayo=?',$fkproforma,$fkprametro)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($fkproforma)
    {
      try 
        {
           $this->pdo->deleteFrom('detalle_matriz_proforma')
                     ->where('fkproforma',$fkproforma)
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>