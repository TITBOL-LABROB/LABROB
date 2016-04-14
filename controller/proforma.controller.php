<?php
 require_once 'view/proforma/proforma.view.php';
require_once 'model/proforma.php';
require_once 'model/grupo_parametro.php';
require_once 'model/cliente.php';
require_once 'model/parametro.php';
require_once 'model/detalle_proforma.php';

class ProformaController {

    private $model;
    private $vista;
    private $grupo;
    private $cliente;
    private $parametro;
    private $detalle;

    public function __CONSTRUCT() {
        $this->model = new Proforma();
        $this->vista = new ProformaView();
        $this->grupo=new grupo_parametro();
        $this->cliente=new Cliente();
        $this->parametro=new parametro();
        $this->detalle=new detalle_proforma();
    }

    public function Index() {
        $lista = $this->model->Listar();
        $clientes = $this->cliente->Listar();          
        $this->vista->View($lista,$clientes);
    }

    public function Nuevo() {
         $grupos=$this->grupo->Listar();
         $clientes=$this->cliente->Listar();
        $this->vista->Nuevo($grupos,$clientes);
    }

    public function editar() {
        $proformas = $this->model->Obtener($_REQUEST['id']);
        $parametros=$this->parametro->Listar();
        $clientes = $this->cliente->Listar();
        $detalle = $this->detalle->Listar();  
        $precios=$this->detalle->listaPrecio();      
        $this->vista->Detalle($proformas,$clientes,$detalle,$parametros,$precios);
    }
    
    public function contrato() 
    {
        $proformas = $this->model->Obtener($_REQUEST['id']);
        $clientes = $this->cliente->Listar();
        $detalle = $this->detalle->Listar();  
        $precios=$this->detalle->listaPrecio();      
        $this->vista->Contrato($proformas,$clientes,$detalle,$parametros,$precios);
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

        $datos = array(
            'codigo'=>$codigo,
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
     
     public function AgregarParametro(){
        $parametro=$this->parametro->Obtener($_REQUEST['pkparametro']);
        $pkproforma=($_REQUEST['pkproforma']);
        $datos = array(
            'fkproforma' => $_REQUEST['pkproforma'],
            'fkparametro' => $_REQUEST['pkparametro'],
            'costo' => $parametro->costo
        );

        if($this->detalle->Existedetalle_proforma($datos['fkproforma'],$datos['fkparametro'])=="")
        {
            $this->detalle->Registrar($datos);
            header("Location: ?c=proforma&a=editar&id=$pkproforma&item=parametro para la proforma&tarea=agregar&exito=si");
        }else{
            header("Location: ?c=proforma&a=editar&id=$pkproforma&item=parametro para la proforma&tarea=agregar&exito=no"); exit;
        }

       /* if ($exito=='si') {
            $tipo_servicio = $this->model->Obtener($_REQUEST['pktipo_servicio']);
            $parametro = $this->parametro->Obtener($_REQUEST['pkparametro']);
            $DescripcionBitacora = 'se agrego el parametro '.$parametro->nombre.' al tipo de servicio '.$tipo_servicio->nombre;
            $this->bitacora->GuardarBitacora($DescripcionBitacora);
        }*/
        
    }

    public function QuitarParametro(){
         $pkproforma=($_REQUEST['pkproforma']);
        $datos = array(
            'fkproforma' => $_REQUEST['pkproforma'],
            'fkparametro' => $_REQUEST['pkparametro']
        );
        $this->detalle->Eliminar($datos);
        header("Location: ?c=proforma&a=editar&id=$pkproforma&item=parametro de la  proforma&tarea=eliminar&exito=si");
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