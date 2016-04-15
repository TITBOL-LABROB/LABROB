<?php
require_once 'singleton/database.php';

class Institucion {

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
           return $this->pdo->from('institucion n')
                      ->select('n.*')
                      ->where('n.estado=1')  
                      ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
  
    public function Registrar($datos)
    {
      try 
        {
           $this->pdo->insertInto('institucion', $datos)->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Editar($datos)
    {
         try {
           $this->pdo->update('institucion')
                     ->set($datos)
                     ->where('pkinstitucion=?', $datos['pkinstitucion'])
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
         ->from('institucion c')
         ->select('c.*')
         ->where('c.pkinstitucion',$id)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function Baja($id)
    {
      try 
        {
           $this->pdo->update('institucion')
                     ->set('estado',0)
                     ->where('pkinstitucion', $id)
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>