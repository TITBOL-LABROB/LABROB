<?php
 require_once 'view/institucion/institucion.view.php';
require_once 'model/institucion.php';
require_once 'model/cliente.php';

class InstitucionController {

    private $model;
    private $vista;
    private $cliente;

    public function __CONSTRUCT() {
        $this->model = new Institucion();
        $this->vista= new InstitucionView();
        $this->cliente=new Cliente ();
    }

    public function Index() {
        $lista = $this->model->Listar();        
        $this->vista->View($lista);
    }

    public function Nuevo() {
        $this->vista->Nuevo();
    }

    public function Editar() {
        $institucion = $this->model->Obtener($_REQUEST['id']);
        $this->vista->Editar($institucion);
    }

    public function Guardar() {
      
        $datos = array(
            'nit' => $_REQUEST['nit'],
            'nombre' => $_REQUEST['nombre'],
            'direccion' => $_REQUEST['direccion'],
            'telefono' => $_REQUEST['telefono'],
            'correo' => $_REQUEST['correo'],
            'fax' => $_REQUEST['fax']
        );
            $this->model->Registrar($datos);
         
        header("Location: ?c=institucion&item=institucion&tarea=agregar&exito=si");
    }
    public function GuardarCambios() {
      
        $datos = array(
            'pkinstitucion' => $_REQUEST['pkinstitucion'],
            'nit' => $_REQUEST['nit'],
            'nombre' => $_REQUEST['nombre'],
            'direccion' => $_REQUEST['direccion'],
            'telefono' => $_REQUEST['telefono'],
            'correo' => $_REQUEST['correo'],
            'fax' => $_REQUEST['fax']
        );
             $this->model->Editar($datos);

        header("Location: ?c=institucion&item=institucion&tarea=modificar&exito=si");
    }

    public function Eliminar() {
        $this->model->Baja($_REQUEST['id']);
        header("Location: ?c=institucion&item=institucion&tarea=eliminar&exito=si");
    }

    public function validar() {
        if (!isset($_SESSION['user_sistem'])) {
            header('Location: ?c=home');
        }
    }

}
?>