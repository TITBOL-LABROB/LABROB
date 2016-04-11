<?php
require_once 'singleton/database.php';

class Usuario {

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

    public function Listar() {
        try 
        {
           return $this->pdo->from('usuario u')
                      ->Join('tipo_usuario t on t.pktipo_usuario=u.fktipo_usuario')
                      ->select('u.*,t.nombre as tipo')
                      ->where('u.estado=1')  
                      ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Registrar($datos)
    {
      try 
        {
           $this->pdo->insertInto('usuario', $datos)->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Editar($datos)
    {
         try {
           $this->pdo->update('usuario')
                     ->set($datos)
                     ->where('pkusuario=?', $datos['pkusuario'])
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
         ->from('usuario')
         ->select('usuario.*')
         ->where('pkusuario=?',$id)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ExisteUsername($username)
    {
       try 
        {
          return $this->pdo
         ->from('usuario')
         ->select('usuario.*')
         ->where('username=?',$username)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function ExisteCorreo($correo)
    {
       try 
        {
          return $this->pdo
         ->from('usuario')
         ->select('usuario.*')
         ->where('correo=?',$correo)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Baja($id)
    {
      try 
        {
           $this->pdo->update('usuario')
                     ->set('estado',0)
                     ->where('pkusuario', $id)
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>