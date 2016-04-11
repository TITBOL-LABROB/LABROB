<?php
 require_once 'singleton/database.php';

class Detalle_Grupo{

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
         ->from('detalle_grupo de')
         ->join('parametro p on de.fkparametro=p.pkparametro')
         ->join('grupo_parametro g on de.fkgrupo=g.pkgrupo_parametro')
         ->select('p.nombre as parametro,g.nombre as grupo,de.costo')      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
     public function ListaPrecio() {
        try {
           return $this->pdo
         ->from('detalle_grupo de')
         ->join('parametro p on de.fkparametro=p.pkparametro')
         ->join('grupo_parametro g on de.fkgrupo=g.pkgrupo_parametro')
         ->select('de.fkgrupo,SUM(de.costo) as total')
         ->groupBy('de.fkgrupo')      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Registrar($datos)
    {
         try {
          return $this->pdo->insertInto('detalle_grupo', $datos)->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
   
    public function Existedetalle_grupo($fkgrupo,$fkprametro)
    {
       try 
        {
          return $this->pdo
         ->from('detalle_grupo')
         ->select('detalle_grupo.*')
         ->where('fkgrupo=? and fkparametro=?',$fkgrupo,$fkprametro)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($datos)
    {
      try 
        {
           $this->pdo->deleteFrom('detalle_grupo')
                     ->where('fkparametro=? and fkgrupo=?', $datos['fkparametro'],$datos['fkgrupo'])
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>