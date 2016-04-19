<?php
 require_once 'view/proforma/proforma.view.php';
require_once 'model/proforma.php';
require_once 'model/grupo_ensayo.php';
require_once 'model/cliente.php';
require_once 'model/ensayo.php';
require_once 'model/institucion.php';
require_once 'model/detalle_proforma.php';
require_once 'model/detalle_grupo.php';

class ProformaController {

    private $model;
    private $vista;
    private $grupo;
    private $cliente;
    private $ensayo;
    private $detalle;
    private $detalleG;
    private $institucion;

    public function __CONSTRUCT() {
        $this->model = new Proforma();
        $this->vista = new ProformaView();
        $this->grupo=new grupo_ensayo();
        $this->cliente=new Cliente();
        $this->ensayo=new Ensayo();
        $this->detalle=new detalle_proforma();
        $this->detalleG=new detalle_grupo();
        $this->institucion=new Institucion();
    }

    public function Index() {
        $lista = $this->model->Listar();
        $clientes = $this->cliente->Listar();          
        $this->vista->View($lista,$clientes);
    }

    public function Nuevo() {
         $grupos=$this->grupo->Listar();
         $clientes=$this->cliente->Listar();
         $instituciones=$this->institucion->Listar();
        $this->vista->Nuevo($grupos,$clientes,$instituciones);
    }

    public function editar() {
        $proformas = $this->model->Obtener($_REQUEST['id']);
        $grupos=$this->grupo->Listar();
        $clientes = $this->cliente->Listar();
        $instituciones=$this->institucion->Listar();
        $detalle = $this->detalle->Listar(); 
        $detalleG = $this->detalleG->Listar();     
        $this->vista->Detalle($proformas,$clientes,$detalle,$detalleG,$grupos,$instituciones);
    }
    
    public function contrato() 
    {
        $proformas = $this->model->Obtener($_REQUEST['id']);
        $clientes = $this->cliente->Listar();
        $detalle = $this->detalle->Listar();  
        $precios=$this->detalle->listaPrecio();      
        $this->vista->Contrato($proformas,$clientes,$detalle,$ensayos,$precios);
    }

    public function Guardar() {
        date_default_timezone_set("America/La_Paz");
        $fecha=date("Y"); $codigo="";
        
        $last=$this->model->GetLast();
        $time = strtotime($last->fecha);
        $fechalast = date('Y',$time);

        $num=$this->getCodigo($last->codigo);

        if($fecha>$fechalast)
        {
           $num=1; $codigo="".$num."/".$fecha;
        }else
        {
           $num++; $codigo="".$num."/".$fecha;
        } 
        
        $fkinstitucion=null;
        if(isset($_REQUEST['fkinstitucion'])){
          $fkinstitucion=$_REQUEST['fkinstitucion'];
        }

        $datos = array(
            'codigo'=>$codigo,
            'fecha' => $_REQUEST['fecha'],
            'nombre' => $_REQUEST['nombre'],
            'fkcliente' => $_REQUEST['pkcliente'],
            'persona_solicitante' => $_REQUEST['persona_solicitante'],
            'correo_solicitante' => $_REQUEST['correo_solicitante'],
            'fkinstitucion' => $fkinstitucion,
            'telefono_solicitante' => $_REQUEST['telefono_solicitante'],
            'dias' => $_REQUEST['dias'],
            'diriguido' => $_REQUEST['diriguido'],
        ); 
        $pkproforma=$this->model->Registrar($datos);
        header("Location: ?c=proforma&item=proforma&tarea=agregar&exito=si");
    }
     
     public function getCodigo($last)
     {
      $codigo="";  $i=0; $num=0;
        while($i< strlen($last))
        { 
         if($last{$i}=='/') break;
            
         $codigo=$codigo."".$last{$i};
         $i++; 
        }  
        $num=(int)$codigo;
        return $num;
     }
     
     public function AgregarEnsayo(){
        $array = json_decode($_REQUEST['datos'],true);
        $pkproforma=($_REQUEST['pkproforma']);

         foreach ($array as $r):
            $datos = array(
                'fkproforma' => $pkproforma,
                'fkensayo' => $r
            );
            $this->detalle->Registrar($datos);
        endforeach ;
            header("Location: ?c=proforma&item=Asignacion de ensayos&tarea=agregar&exito=si");
        
    }

    public function Quitarensayo(){
         $pkproforma=($_REQUEST['pkproforma']);
        $datos = array(
            'fkproforma' => $_REQUEST['pkproforma'],
            'fkensayo' => $_REQUEST['pkensayo']
        );
        $this->detalle->Eliminar($datos);
        header("Location: ?c=proforma&a=editar&id=$pkproforma&item=ensayo de la  proforma&tarea=eliminar&exito=si");
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