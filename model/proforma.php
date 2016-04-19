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

    public function Listar() {
       try 
        {
    $sql = $this->pdo2->prepare("SELECT distinct CONCAT('P0',p.codigo)as codigo_completo, p.*,c.pkcliente,
             CAST(case 
               when p.fkinstitucion is null
               then ''
               when p.fkinstitucion>0
               then i.nombre
               end as char) as institucion
            FROM proforma p,institucion i,cliente c 
            WHERE (p.fkinstitucion=i.pkinstitucion or p.fkinstitucion is null)
            and c.pkcliente=p.fkcliente and p.estado=1");
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
           return $this->GetLatId();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function GetLatId()
    {
     try {
          return $this->pdo->from('proforma p')
                     ->select('MAX(p.pkproforma) as id')
                     ->where('p.estado',1)
                     ->fetch();
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

    public function GetLast() {
       try 
        {
     return $this->pdo->from('proforma p')
                      ->select('p.*')
                      ->where('p.estado=1') 
                      ->orderBy('p.pkproforma desc') 
                      ->limit('1')
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
/**/
?>