<?php
 require_once 'singleton/database.php';

class detalle_grupo_norma{

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
         ->from('detalle_grupo_norma dm')
         ->join('detalle_grupo d on dm.fkdetalle_grupo=d.pkdetalle_grupo')
         ->join('norma n on dm.fknorma=n.pknorma')
         ->select("dm.fkdetalle_grupo,dm.fknorma,CONCAT_WS('-',n.codigo,n.gestion,n.acapite) as norma")      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar($datos)
    {
         try {
          return $this->pdo->insertInto('detalle_grupo_norma', $datos)->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
   
    public function Existedetalle_grupo_norma($fkgrupo,$fkparametro)
    {
       try 
        {
          return $this->pdo
         ->from('detalle_grupo_norma')
         ->select('detalle_grupo_norma.*')
         ->where('fkgrupo=? and fkensayo=?',$fkgrupo,$fkparametro)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($pkdetalle_grupo)
    {
      try 
        {
           $this->pdo->deleteFrom('detalle_grupo_norma')
                     ->where('fkdetalle_grupo', $pkdetalle_grupo)
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}

?>