<?php
require_once 'singleton/database.php';

class Proforma {

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
///////
    public function Listar() {
       try 
        {

            $sql = $this->pdo2->prepare("SELECT distinct p.,CAST(CASE
             WHEN (c.fktipo_cliente=n.ci) 
             THEN (n.nombre)
  
             WHEN (c.fktipo_cliente=j.nit) 
             THEN (j.nombre)              
             end  as char)as nombre_cliente
             FROM cliente c,proforma p, cliente_natural n,cliente_juridico j,grupo_parametro g
             where c.estado=1 and c.fktipo_cliente=n.ci or j.nit=c.fktipo_cliente
             group by c.pkcliente,c.contacto,c.fijo,c.celular,c.correo,c.fax,n.nombre,j.nombre");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Registrar($datos)
    {
      try 
        {
           $this->pdo->insertInto('proforma', $datos)->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Editar($datos)
    {
         try {
           $this->pdo->update('proforma')
                     ->set($datos)
                     ->where('pkproforma=?', $datos['pkproforma'])
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
      try 
        {
          return $this->pdo
         ->from('proforma')
         ->select('proforma.*')
         ->where('pkproforma=?',$id)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Baja($id)
    {
      try 
        {
           $this->pdo->update('proforma')
                     ->set('estado',0)
                     ->where('pkproforma', $id)
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>