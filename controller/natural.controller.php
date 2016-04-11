<?php
 require_once 'view/natural/natural.view.php';
require_once 'model/natural.php';
require_once 'model/cliente.php';

class NaturalController {

    private $model;
    private $vista;
    private $natural;

    public function __CONSTRUCT() {
        $this->model = new Cliente();
        $this->vista= new NaturalView();
        $this->natural=new Natural ();
    }

    public function Index() {
        $lista = $this->model->ListarNatural();        
        $this->vista->View($lista);
    }

    public function Nuevo() {
        $this->vista->Nuevo();
    }

    public function Editar() {
        $natural = $this->model->ObtenerNatural($_REQUEST['id'],$_REQUEST['ci']);
        $this->vista->Editar($natural);
    }

    public function Guardar() {
      
        $datoscliente = array(
            'contacto' => $_REQUEST['contacto'],
            'fijo' => $_REQUEST['fijo'],
            'celular' => $_REQUEST['celular'],
            'correo' => $_REQUEST['correo'],
            'fktipo_cliente'=>$_REQUEST['ci'],
            'fax' => $_REQUEST['fax'],
        );
        $datosnatural = array(
            'ci' => $_REQUEST['ci'],
            'nombre' => $_REQUEST['nombre'],
            'direccion' => $_REQUEST['direccion'],
        );
       
            $this->natural->Registrar($datosnatural);
            $this->model->Registrar($datoscliente);
         
        header("Location: ?c=natural&item=cliente&tarea=agregar&exito=si");
    }
    public function GuardarCambios() {
      
        $datoscliente = array(
            'pkcliente' => $_REQUEST['pkcliente'],
            'contacto' => $_REQUEST['contacto'],
            'fijo' => $_REQUEST['fijo'],
            'celular' => $_REQUEST['celular'],
            'correo' => $_REQUEST['correo'],
            'fktipo_cliente'=>$_REQUEST['ci'],
            'fax' => $_REQUEST['fax']
        );
        $datosnatural = array(
            'ci' => $_REQUEST['ci'],
            'nombre' => $_REQUEST['nombre'],
            'direccion' => $_REQUEST['direccion']
        ); 
             $pknatural=$_REQUEST['pknatural'];            
             $this->natural->Editar($datosnatural,$pknatural);
             $this->model->Editar($datoscliente);

        header("Location: ?c=natural&item=cliente&tarea=modificar&exito=si");
    }

    public function Eliminar() {
        $this->model->Baja($_REQUEST['id']);
        header("Location: ?c=natural&item=cliente&tarea=eliminar&exito=si");
    }

    public function validar() {
        if (!isset($_SESSION['user_sistem'])) {
            header('Location: ?c=home');
        }
    }

}
?>