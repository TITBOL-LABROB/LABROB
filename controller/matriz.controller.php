<?php
require_once 'view/matriz/matriz.view.php';
require_once 'model/matriz.php';

class MatrizController {

    private $model;
    private $vista;

    public function __CONSTRUCT() {
        $this->model = new Matriz();
        $this->vista = new MatrizView();
    }

    public function Index() {
        $listaroles = $this->model->Listar();        
        $this->vista->View($listaroles);
    }

    public function Nuevo() {
        $this->vista->Nuevo();
    }

    public function Editar() {
        $matriz = $this->model->Obtener($_REQUEST['id']);
        $this->vista->Editar($matriz);
    }

    public function Guardar() {
      
        $datos = array(
            'nombre' => $_REQUEST['nombre'],
            'descripcion' => $_REQUEST['descripcion']
        );

       /* if($this->model->Existematriz($datos['nombre'])!="")
          {
            header("Location: ?c=matriz&a=nuevo&item=usuario&tarea=username&exito=si");
            exit;
          }*/             
            $pkmatriz = $this->model->Registrar($datos);

        header("Location: ?c=matriz&item=matriz de usuario&tarea=agregar&exito=si");
    }
    public function GuardarCambios() {
      

        $datos = array(
            'pkmatriz'=> $_REQUEST['pkmatriz'],
            'nombre' => $_REQUEST['nombre'],
            'descripcion' => $_REQUEST['descripcion']
        );        
        /*if($this->model->Existematriz($datos['nombre'])!="")
          {
            header("Location: ?c=matriz&a=editar&id=".$_REQUEST['pkmatriz_usuario']." &item=usuario&tarea=username&exito=si");
            exit;
          } */
            $pkmatriz = $this->model->Editar($datos);

        header("Location: ?c=matriz&item=matriz de usuario&tarea=modificar&exito=si");
    }

    public function Eliminar() {
        $this->model->Eliminar($_REQUEST['id']);
         header("Location: ?c=matriz&item=matriz de usuario&tarea=eliminar&exito=si");
    }

    public function validar() {
        if (!isset($_SESSION['user_sistem'])) {
            header("Location: ?c=matriz&item=matriz de usuario&tarea=eliminar&exito=si");
        }
    }

}
?>