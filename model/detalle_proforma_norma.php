<?php
 require_once 'singleton/database.php';

class detalle_proforma_norma{

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
         ->from('detalle_proforma_norma dm')
         ->join('detalle_proforma d on dm.fkdetalle_proforma=d.pkdetalle_proforma')
         ->join('norma n on dm.fknorma=n.pknorma')
         ->select("dm.fkdetalle_proforma,dm.fknorma,CONCAT_WS('-',n.codigo,n.gestion,n.acapite) as norma")      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar($datos)
    {
         try {
          return $this->pdo->insertInto('detalle_proforma_norma', $datos)->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
   
    public function Existedetalle_proforma_norma($fkproforma,$fkparametro)
    {
       try 
        {
          return $this->pdo
         ->from('detalle_proforma_norma')
         ->select('detalle_proforma_norma.*')
         ->where('fkproforma=? and fkensayo=?',$fkproforma,$fkparametro)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($datos)
    {
      try 
        {
           $this->pdo->deleteFrom('detalle_proforma_norma')
                     ->where('fkdetalle_proforma=? and fknorma=?', $datos['fkdetalle_proforma'],$datos['fknorma'])
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}

?>