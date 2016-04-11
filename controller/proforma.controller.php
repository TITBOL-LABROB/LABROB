<?php
 require_once 'view/proforma/proforma.view.php';
require_once 'model/proforma.php';
require_once 'model/grupo_parametro.php';
require_once 'model/natural.php';
require_once 'model/juridico.php';
require_once 'model/cliente.php';

class ProformaController {

    private $model;
    private $vista;
    private $grupo;
    private $cliente;
    private $natural;
    private $juridico;

    public function __CONSTRUCT() {
        $this->model = new Proforma();
        $this->vista = new ProformaView();
        $this->grupo=new grupo_parametro();
        $this->cliente=new Cliente();
    }

    public function Index() {
        $lista = $this->model->Listar();        
        $this->vista->View($lista);
    }

    public function Nuevo() {
         $grupos=$this->grupo->Listar();
         $clientes=$this->cliente->Listar();
        $this->vista->Nuevo($grupos,$clientes);
    }

    public function Editar() {
        $proforma = $this->model->Obtener($_REQUEST['id']);
        $medidas=$this->medida->Listar();
        $matrices=$this->matriz->Listar();
        $laboratorios=$this->laboratorio->Listar();
        $this->vista->Editar($proforma,$grupos,$clientes);
    }

    public function Guardar() {
      
        $datos = array(
            'fecha' => $_REQUEST['fecha'],
            'fkgrupo' => $_REQUEST['pkgrupo'],
            'nombre' => $_REQUEST['nombre'],
            'fkcliente' => $_REQUEST['pkcliente'],
            'persona_solicitante' => $_REQUEST['persona_solicitante'],
            'correo_solicitante' => $_REQUEST['correo_solicitante'],
            'institucion' => $_REQUEST['institucion'],
            'telefono_solicitante' => $_REQUEST['telefono_solicitante'],
            'dias' => $_REQUEST['dias'],
            'diriguido' => $_REQUEST['diriguido'],
        ); 

        $this->model->Registrar($datos);
        header("Location: ?c=proforma&item=proforma&tarea=agregar&exito=si");
    }
     
     public function getCodigo()
     {

     }

    public function GuardarCambios() {
      
        $datos = array(
            'pkproforma' => $_REQUEST['pkproforma'],
            'nombre' => $_REQUEST['nombre'],
            'fkunidad' => $_REQUEST['pkunidad'],
            'metodo' => $_REQUEST['metodo'],
            'limite_cuantificacion' => $_REQUEST['limite_cuantificable'],
            'limite_detectable' => $_REQUEST['limite_detectable'],
            'limite_admisible' => $_REQUEST['limite_admisible'],
            'fklaboratorio' => $_REQUEST['pklaboratorio'],
            'fkmatriz' => $_REQUEST['pkmatriz'],
            'costo' => $_REQUEST['costo'],
            'moneda' => $_REQUEST['moneda'],
        );
           

            $pkproforma = $this->model->Editar($datos);
           

        header("Location: ?c=proforma&item=proforma&tarea=modificar&exito=si");
    }

    public function Eliminar() {
        $this->model->Baja($_REQUEST['id']);
        header("Location: ?c=proforma&item=proforma&tarea=eliminar&exito=si");
    }

    public function validar() {
        if (!isset($_SESSION['user_sistem'])) {
            header('Location: ?c=home');
        }
    }

}
?>