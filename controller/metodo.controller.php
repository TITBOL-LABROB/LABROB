<?php
require_once 'view/metodo/metodo.view.php';
require_once 'model/metodo.php';

class MetodoController {

    private $model;
    private $vista;

    public function __CONSTRUCT() {
        $this->model = new Metodo();
        $this->vista = new MetodoView();
    }

    public function Index() {
        $listaroles = $this->model->Listar();        
        $this->vista->View($listaroles);
    }

    public function Nuevo() {
        $this->vista->Nuevo();
    }

    public function Editar() {
        $metodo = $this->model->Obtener($_REQUEST['id']);
        $this->vista->Editar($metodo);
    }

    public function Guardar() {
      
        $datos = array(
            'nombre' => $_REQUEST['nombre'],
            'descripcion' => $_REQUEST['descripcion'],
            'palabras_claves' => $_REQUEST['palabras_claves']
        );

        if($this->model->Existemetodo($datos['nombre'])!="")
          {
            header("Location: ?c=metodo&a=nuevo&item=usuario&tmetodo=username&exito=si");
            exit;
          }             
            $pkmetodo = $this->model->Registrar($datos);

        header("Location: ?c=metodo&item=metodo&tmetodo=agregar&exito=si");
    }
    public function GuardarCambios() {
      

        $datos = array(
            'pkmetodo'=> $_REQUEST['pkmetodo'],
            'nombre' => $_REQUEST['nombre'],
            'descripcion' => $_REQUEST['descripcion'],
            'palabras_claves' => $_REQUEST['palabras_claves']
        );        
        /*if($this->model->Existemetodo($datos['nombre'])!="")
          {
            header("Location: ?c=metodo&a=editar&id=".$_REQUEST['pkmetodo_usuario']." &item=usuario&tmetodo=username&exito=si");
            exit;
          } */
            $pkmetodo = $this->model->Editar($datos);

        header("Location: ?c=metodo&item=metodo&tmetodo=modificar&exito=si");
    }

    public function Eliminar() {
        $this->model->Eliminar($_REQUEST['id']);
         header("Location: ?c=metodo&item=metodo&tmetodo=eliminar&exito=si");
    }

    public function validar() {
        if (!isset($_SESSION['user_sistem'])) {
            header("Location: ?c=metodo&item=metodo de usuario&tmetodo=eliminar&exito=si");
        }
    }

}
?>