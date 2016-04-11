<?php
require_once 'singleton/database.php';

class Juridico {

    private $pdo;

    public function __CONSTRUCT()
    {
        try 
        {
            $this->pdo = Singleton::getInstance()->getPDO();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    
    public function Registrar($datos)
    {
      try 
        {
           $this->pdo->insertInto('cliente_juridico', $datos)->execute();
    
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Editar($datos,$pkjuridico)
    {
         try {
           $this->pdo->update('cliente_juridico')
                     ->set($datos)
                     ->where('nit=?', $pkjuridico)
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
         ->from('cliente_juridico')
         ->select('cliente_juridico.*')
         ->where('pkcliente_juridico=?',$id)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
?>