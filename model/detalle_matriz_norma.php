<?php
 require_once 'singleton/database.php';

class detalle_matriz_norma{

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
         ->from('detalle_matriz_norma dm')
         ->join('detalle_matriz d on dm.fkdetalle_matriz=d.pkdetalle_matriz')
         ->join('norma n on dm.fknorma=n.pknorma')
         ->select("dm.fkdetalle_matriz,dm.fknorma,CONCAT_WS('-',n.codigo,n.gestion,n.acapite) as norma")      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar($datos)
    {
         try {
          return $this->pdo->insertInto('detalle_matriz_norma', $datos)->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
   
    public function Existedetalle_matriz_norma($fkmatriz,$fkparametro)
    {
       try 
        {
          return $this->pdo
         ->from('detalle_matriz_norma')
         ->select('detalle_matriz_norma.*')
         ->where('fkmatriz=? and fkensayo=?',$fkmatriz,$fkparametro)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($pkdetalle_matriz)
    {
      try 
        {
           $this->pdo->deleteFrom('detalle_matriz_norma')
                     ->where('fkdetalle_matriz', $pkdetalle_matriz)
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}

?>