<?php
require_once 'singleton/database.php';

class parametro {

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
           return $this->pdo->from('parametro p')
                      ->Join('unidad_medida u on u.pkunidad=p.fkunidad')
                      ->Join('matriz m on m.pkmatriz=p.fkmatriz')
                      ->Join('laboratorio l on l.pklaboratorio=p.fklaboratorio')
                      ->select('p.*,u.nombre as medida,m.nombre as matriz,l.nombre as laboratorio')
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
           $this->pdo->insertInto('parametro', $datos)->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Editar($datos)
    {
         try {
           $this->pdo->update('parametro')
                     ->set($datos)
                     ->where('pkparametro=?', $datos['pkparametro'])
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
         ->from('parametro')
         ->select('parametro.*')
         ->where('pkparametro=?',$id)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Baja($id)
    {
      try 
        {
           $this->pdo->update('parametro')
                     ->set('estado',0)
                     ->where('pkparametro', $id)
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>