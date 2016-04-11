<?php
require_once 'view/tipo/tipo.view.php';
require_once 'model/tipo.php';

class TipoController {

    private $model;
    private $vista;

    public function __CONSTRUCT() {
        $this->model = new Tipo();
        $this->vista = new TipoView();
    }

    public function Index() {
        $listaroles = $this->model->Listar();        
        $this->vista->View($listaroles);
    }

    public function Nuevo() {
        $this->vista->Nuevo();
    }

    public function Editar() {
        $tipo = $this->model->Obtener($_REQUEST['id']);
        $this->vista->Editar($tipo);
    }

    public function Guardar() {
      
        $datos = array(
            'nombre' => $_REQUEST['nombre'],
            'descripcion' => $_REQUEST['descripcion']
        );

        if($this->model->ExisteTipo($datos['nombre'])!="")
          {
            header("Location: ?c=tipo&a=nuevo&item=tipo de usuario&tarea=tipo&exito=si");
            exit;
          }             
            $pktipo = $this->model->Registrar($datos);

        header("Location: ?c=tipo&item=tipo de usuario&tarea=agregar&exito=si");
    }
    public function GuardarCambios() {
      

        $datos = array(
            'pktipo_usuario'=> $_REQUEST['pktipo_usuario'],
            'nombre' => $_REQUEST['nombre'],
            'descripcion' => $_REQUEST['descripcion']
        );        
        /*if($this->model->ExisteTipo($datos['nombre'])!="")
          {
            header("Location: ?c=tipo&a=editar&id=".$_REQUEST['pktipo_usuario']." &item=usuario&tarea=username&exito=si");
            exit;
          } */
            $pktipo = $this->model->Editar($datos);

        header("Location: ?c=tipo&item=tipo de usuario&tarea=modificar&exito=si");
    }

    public function Eliminar() {
        $this->model->Eliminar($_REQUEST['id']);
         header("Location: ?c=tipo&item=tipo de usuario&tarea=eliminar&exito=si");
    }

    public function validar() {
        if (!isset($_SESSION['user_sistem'])) {
            header("Location: ?c=tipo&item=tipo de usuario&tarea=eliminar&exito=si");
        }
    }

}
?>