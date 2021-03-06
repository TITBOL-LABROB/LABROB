<?php
require_once 'view/area/area.view.php';
require_once 'model/area.php';

class AreaController {

    private $model;
    private $vista;

    public function __CONSTRUCT() {
        $this->model = new Area();
        $this->vista = new AreaView();
    }

    public function Index() {
        $listaroles = $this->model->Listar();        
        $this->vista->View($listaroles);
    }

    public function Nuevo() {
        $this->vista->Nuevo();
    }

    public function Editar() {
        $area = $this->model->Obtener($_REQUEST['id']);
        $this->vista->Editar($area);
    }

    public function Guardar() {
      
        $datos = array(
            'nombre' => $_REQUEST['nombre'],
            'descripcion' => $_REQUEST['descripcion'],
            'tipo_area' => $_REQUEST['tipo_area']
        );

        if($this->model->Existearea($datos['nombre'])!="")
          {
            header("Location: ?c=area&a=nuevo&item=usuario&tarea=username&exito=si");
            exit;
          }             
            $pkarea = $this->model->Registrar($datos);

        header("Location: ?c=area&item=area&tarea=agregar&exito=si");
    }
    public function GuardarCambios() {
      

        $datos = array(
            'pkarea'=> $_REQUEST['pkarea'],
            'nombre' => $_REQUEST['nombre'],
            'descripcion' => $_REQUEST['descripcion'],
            'tipo_area' => $_REQUEST['tipo_area']
        );        
        /*if($this->model->Existearea($datos['nombre'])!="")
          {
            header("Location: ?c=area&a=editar&id=".$_REQUEST['pkarea_usuario']." &item=usuario&tarea=username&exito=si");
            exit;
          } */
            $pkarea = $this->model->Editar($datos);

        header("Location: ?c=area&item=area&tarea=modificar&exito=si");
    }

    public function Eliminar() {
        $this->model->Eliminar($_REQUEST['id']);
         header("Location: ?c=area&item=area&tarea=eliminar&exito=si");
    }

    public function validar() {
        if (!isset($_SESSION['user_sistem'])) {
            header("Location: ?c=area&item=area de usuario&tarea=eliminar&exito=si");
        }
    }

}
?>