<?php
require_once 'singleton/database.php';

class ensayo {

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
           return $this->pdo->from('ensayo p')
                      ->Join('unidad_medida u on u.pkunidad=p.fkunidad')
                      ->Join('unidad_medida u on u.pkunidad=p.fkunidad')
                      ->Join('area l on l.pkarea=p.fkarea')
                      ->select('p.*,u.nombre as medida,l.nombre as area,u.nombre as medida,p.costo')
                      ->where('p.estado=1')  
                      ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Registrar($datos)
    {
      try 
        {
           $this->pdo->insertInto('ensayo', $datos)->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Editar($datos)
    {
         try {
           $this->pdo->update('ensayo')
                     ->set($datos)
                     ->where('pkensayo=?', $datos['pkensayo'])
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
         ->from('ensayo')
         ->select('ensayo.*')
         ->where('pkensayo=?',$id)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Baja($id)
    {
      try 
        {
           $this->pdo->update('ensayo')
                     ->set('estado',0)
                     ->where('pkensayo', $id)
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>