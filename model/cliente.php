<?php
require_once 'singleton/database.php';

class Cliente {

    private $pdo;
    private $pdo2;

    public function __CONSTRUCT()
    {
        try 
        {
            $this->pdo = Singleton::getInstance()->getPDO();
            $this->pdo2 = Singleton::getInstance()->getPDO2();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar() {
        try 
        {

            $sql = $this->pdo2->prepare("SELECT distinct c.pkcliente, c.contacto,c.fijo,c.celular,c.correo,c.fax,CAST(CASE
             WHEN (c.fktipo_cliente=n.ci) 
             THEN (n.nombre)
  
             WHEN (c.fktipo_cliente=j.nit) 
             THEN (j.nombre)              
             end  as char)as nombre_cliente
             FROM cliente c,cliente_natural n,cliente_juridico j
             where c.estado=1 and c.fktipo_cliente=n.ci or j.nit=c.fktipo_cliente
             group by c.pkcliente,c.contacto,c.fijo,c.celular,c.correo,c.fax,n.nombre,j.nombre");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    } 

    public function ListarNatural() {
        try 
        {
           return $this->pdo->from('cliente_natural n')
                      ->Join('cliente c on c.fktipo_cliente=n.ci')
                      ->select('c.*,n.*')
                      ->where('c.estado=1')  
                      ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function ListarJuridico() {
        try 
        {
           return $this->pdo->from('cliente_juridico j')
                      ->Join('cliente c on c.fktipo_cliente=j.nit')
                      ->select('c.*,j.*')
                      ->where('c.estado=1')  
                      ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Listar2($pkinstitucion) {
        try 
        {
           return $this->pdo->from('cliente c')
         ->Join('cliente_juridico j on c.fktipo_cliente=j.nit') 
         ->select('c.*,j.*')
         ->where("j.nombre like '%$pkinstitucion%'")          
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Registrar($datos)
    {
      try 
        {
           $this->pdo->insertInto('cliente', $datos)->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Editar($datos)
    {
         try {
           $this->pdo->update('cliente')
                     ->set($datos)
                     ->where('pkcliente=?', $datos['pkcliente'])
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ObtenerNatural($id,$ci)
    {
      try 
        {
          return $this->pdo
         ->from('cliente c')
         ->Join('cliente_natural n on c.fktipo_cliente=n.ci')
         ->select('c.*,n.*')
         ->where('c.pkcliente=? and n.ci=?',$id,$ci)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function ObtenerJuridico($id,$nit)
    {
      try 
        {
          return $this->pdo
         ->from('cliente c')
         ->Join('cliente_juridico j on c.fktipo_cliente=j.nit')
         ->select('c.*,j.*')
         ->where('c.pkcliente=? and j.nit=?',$id,$nit)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    
    
    public function Baja($id)
    {
      try 
        {
           $this->pdo->update('cliente')
                     ->set('estado',0)
                     ->where('pkcliente', $id)
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>