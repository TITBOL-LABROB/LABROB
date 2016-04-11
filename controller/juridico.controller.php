<?php
 require_once 'view/juridico/juridico.view.php';
require_once 'model/juridico.php';
require_once 'model/cliente.php';

class JuridicoController {

    private $model;
    private $vista;
    private $juridico;

    public function __CONSTRUCT() {
        $this->model = new Cliente();
        $this->vista= new JuridicoView();
        $this->juridico=new Juridico ();
    }

    public function Index() {
        $lista = $this->model->ListarJuridico();        
        $this->vista->View($lista);
    }

    public function Nuevo() {
        $this->vista->Nuevo();
    }

    public function Editar() {
        $juridico = $this->model->Obtenerjuridico($_REQUEST['id'],$_REQUEST['ci']);
        $this->vista->Editar($juridico);
    }

    public function Guardar() {
      
        $datoscliente = array(
            'contacto' => $_REQUEST['contacto'],
            'fijo' => $_REQUEST['fijo'],
            'celular' => $_REQUEST['celular'],
            'correo' => $_REQUEST['correo'],
            'fktipo_cliente'=>$_REQUEST['nit'],
            'fax' => $_REQUEST['fax'],
        );
        $datosjuridico = array(
            'nit' => $_REQUEST['nit'],
            'nombre' => $_REQUEST['nombre'],
            'direccion' => $_REQUEST['direccion'],
            'representante' => $_REQUEST['representante'],
            'ci_representante' => $_REQUEST['ci_representante']
        );
       
            $this->juridico->Registrar($datosjuridico);
            $this->model->Registrar($datoscliente);

        header("Location: ?c=juridico&item=cliente&tarea=agregar&exito=si");
    }
    public function GuardarCambios() {
      
        $datoscliente = array(
            'pkcliente' => $_REQUEST['pkcliente'],
            'contacto' => $_REQUEST['contacto'],
            'fijo' => $_REQUEST['fijo'],
            'celular' => $_REQUEST['celular'],
            'correo' => $_REQUEST['correo'],
            'fktipo_cliente'=>$_REQUEST['nit'],
            'fax' => $_REQUEST['fax']
        );
        $datosjuridico = array(
            'nit' => $_REQUEST['nit'],
            'nombre' => $_REQUEST['nombre'],
            'direccion' => $_REQUEST['direccion'],
            'representante' => $_REQUEST['representante'],
            'ci_representante' => $_REQUEST['ci_representante']
        ); 
             $pkjuridico=$_REQUEST['pkjuridico'];            
             $this->juridico->Editar($datosjuridico,$pkjuridico);
             $this->model->Editar($datoscliente);

        header("Location: ?c=juridico&item=cliente&tarea=modificar&exito=si");
    }

    public function Eliminar() {
        $this->model->Baja($_REQUEST['id']);
        header("Location: ?c=juridico&item=cliente&tarea=eliminar&exito=si");
    }

    public function validar() {
        if (!isset($_SESSION['user_sistem'])) {
            header('Location: ?c=home');
        }
    }

}
?>