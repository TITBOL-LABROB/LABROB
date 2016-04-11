<?php
require_once 'singleton/database.php';

class Natural {

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
           $this->pdo->insertInto('cliente_natural', $datos)->execute();
    
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Editar($datos,$pknatural)
    {
         try {
           $this->pdo->update('cliente_natural')
                     ->set($datos)
                     ->where('ci=?', $pknatural)
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
         ->from('cliente_natural')
         ->select('cliente_natural.*')
         ->where('pkcliente_natural=?',$id)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    
    
    public function Baja($id)
    {
      try 
        {
           $this->pdo->update('cliente_natural')
                     ->set('estado',0)
                     ->where('pkcliente_natural', $id)
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>