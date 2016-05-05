<?php
 require_once 'singleton/database.php';

class detalle_matriz_grupo{

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
         ->from('detalle_matriz_grupo de')
         ->join('grupo_ensayo p on de.fkgrupo=p.pkgrupo_ensayo')
         ->join('matriz pr on de.fkmatriz=pr.pkmatriz')
         ->select('de.fkmatriz,de.fkgrupo,p.nombre as grupo,p.costo')      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function ListarMatriz($pkmatriz) {
        try {
           return $this->pdo
         ->from('detalle_matriz_grupo de')
         ->join('grupo_ensayo p on de.fkgrupo=p.pkgrupo_ensayo')
         ->join('matriz pr on de.fkmatriz=pr.pkmatriz')
         ->select('de.fkmatriz,de.fkgrupo,p.nombre as grupo,p.costo')
         ->where('pr.pkmatriz',$pkmatriz)      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
     public function ListaPrecio() {
        try {
           return $this->pdo
         ->from('detalle_matriz_grupo de')
         ->join('grupo_ensayo g on de.fkgrupo=g.pkgrupo_ensayo')
         ->select('de.fkmatriz,SUM(g.costo) as total')
         ->groupBy('de.fkmatriz')
         ->orderBy('de.fkmatriz')      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Registrar($datos)
    {
         try {
          return $this->pdo->insertInto('detalle_matriz_grupo', $datos)->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
   
    public function Existedetalle_matriz_grupo($fkmatriz,$fkprametro)
    {
       try 
        {
          return $this->pdo
         ->from('detalle_matriz_grupo')
         ->select('detalle_matriz_grupo.*')
         ->where('fkmatriz=? and fkgrupo=?',$fkmatriz,$fkprametro)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($fkmatriz)
    {
      try 
        {
           $this->pdo->deleteFrom('detalle_matriz_grupo')
                     ->where('fkmatriz',$fkmatriz)
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>