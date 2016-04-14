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
         ->join('ensayo p on de.fkensayo=p.pkensayo')
         ->join('grupo_ensayo g on de.fkgrupo=g.pkgrupo_ensayo')
         ->select('p.nombre as ensayo,g.nombre as grupo,de.costo')      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
     public function ListaPrecio() {
        try {
           return $this->pdo
         ->from('detalle_grupo de')
         ->join('ensayo p on de.fkensayo=p.pkensayo')
         ->join('grupo_ensayo g on de.fkgrupo=g.pkgrupo_ensayo')
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
         ->where('fkgrupo=? and fkensayo=?',$fkgrupo,$fkprametro)          
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
                     ->where('fkensayo=? and fkgrupo=?', $datos['fkensayo'],$datos['fkgrupo'])
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>