<?php
require_once 'view/laboratorio/laboratorio.view.php';
require_once 'model/laboratorio.php';

class LaboratorioController {

    private $model;
    private $vista;

    public function __CONSTRUCT() {
        $this->model = new Laboratorio();
        $this->vista = new LaboratorioView();
    }

    public function Index() {
        $listaroles = $this->model->Listar();        
        $this->vista->View($listaroles);
    }

    public function Nuevo() {
        $this->vista->Nuevo();
    }

    public function Editar() {
        $laboratorio = $this->model->Obtener($_REQUEST['id']);
        $this->vista->Editar($laboratorio);
    }

    public function Guardar() {
      
        $datos = array(
            'nombre' => $_REQUEST['nombre'],
            'descripcion' => $_REQUEST['descripcion'],
            'tipo_laboratorio' => $_REQUEST['tipo_laboratorio']
        );

        if($this->model->Existelaboratorio($datos['nombre'])!="")
          {
            header("Location: ?c=laboratorio&a=nuevo&item=usuario&tarea=username&exito=si");
            exit;
          }             
            $pklaboratorio = $this->model->Registrar($datos);

        header("Location: ?c=laboratorio&item=laboratorio&tarea=agregar&exito=si");
    }
    public function GuardarCambios() {
      

        $datos = array(
            'pklaboratorio'=> $_REQUEST['pklaboratorio'],
            'nombre' => $_REQUEST['nombre'],
            'descripcion' => $_REQUEST['descripcion'],
            'tipo_laboratorio' => $_REQUEST['tipo_laboratorio']
        );        
        /*if($this->model->Existelaboratorio($datos['nombre'])!="")
          {
            header("Location: ?c=laboratorio&a=editar&id=".$_REQUEST['pklaboratorio_usuario']." &item=usuario&tarea=username&exito=si");
            exit;
          } */
            $pklaboratorio = $this->model->Editar($datos);

        header("Location: ?c=laboratorio&item=laboratorio&tarea=modificar&exito=si");
    }

    public function Eliminar() {
        $this->model->Eliminar($_REQUEST['id']);
         header("Location: ?c=laboratorio&item=laboratorio&tarea=eliminar&exito=si");
    }

    public function validar() {
        if (!isset($_SESSION['user_sistem'])) {
            header("Location: ?c=laboratorio&item=laboratorio de usuario&tarea=eliminar&exito=si");
        }
    }

}
?>