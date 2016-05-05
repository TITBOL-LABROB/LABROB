<?php
 require_once 'singleton/database.php';

class Detalle_Matriz{

    private $pdo;
    private $pdo2;
    public function __CONSTRUCT() {
        try {
            $this->pdo = Singleton::getInstance()->getPDO();
            $this->pdo2 = Singleton::getInstance()->getPDO2();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar() {
        try {
           $sql = $this->pdo2->prepare("SELECT distinct dm.pkdetalle_matriz,dm.fkmatriz,dm.fkensayo,e.nombre ensayo,u.nombre as medida,me.nombre as metodo,m.nombre as matriz,dm.costo
            FROM detalle_matriz dm,ensayo e,matriz m,unidad_medida u,metodo me
            WHERE  e.pkensayo=dm.fkensayo and m.pkmatriz=dm.fkmatriz and u.pkunidad=e.fkunidad
                  and me.pkmetodo=dm.fkmetodo");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_OBJ);
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
         ->orderBy('dm.fkmatriz')       
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function GetDetalle($datos) {
        try {
           return $this->pdo
         ->from('detalle_matriz dm')
         ->select('dm.*')
         ->where('dm.fkmatriz=? and dm.fkensayo=?',$datos['fkmatriz'],$datos['fkensayo'])
         ->fetch();
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

    public function GetLatId()
    {
     try {
          return $this->pdo->from('detalle_matriz p')
                     ->select('MAX(p.pkdetalle_matriz) as id')
                     ->fetch();
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

/*
SELECT distinct dm.fkmatriz,dm.fkensayo,e.nombre ensayo,me.nombre as metodo,u.nombre as medida,m.nombre as matriz,dm.costo,dm.limite,
             CAST(case 
               when dm.fknorma is null
               then ''
               when dm.fknorma>0
               then CONCAT_WS('-',n.codigo,n.gestion,n.acapite) 
               end as char) as norma
            FROM detalle_matriz dm,ensayo e,matriz m,unidad_medida u,metodo me,norma n
            WHERE (dm.fknorma=n.pknorma or dm.fknorma is null) 
            and e.pkensayo=dm.fkensayo and m.pkmatriz=dm.fkmatriz and u.pkunidad=e.fkunidad
            and me.pkmetodo=e.fkmetodo

create function GetPrecioGrupo (pkmatriz int)  returns float
Begin
  declare costo float
  
    set costo=SELECT sum(g.costo) FROM detalle_matriz_grupo de join grupo_ensayo g on de.fkgrupo=g.pkgrupo_ensayo WHERE de.fkmatriz=pkmatriz
       
   return costo    
end            
*/
?>