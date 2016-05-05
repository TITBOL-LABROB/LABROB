<?php
require_once 'view/matriz/matriz.view.php';
require_once 'model/matriz.php';
require_once 'model/detalle_matriz.php';
require_once 'model/detalle_matriz_proforma.php';
require_once 'model/ensayo.php';
require_once 'model/norma.php';
require_once 'model/metodo.php';
require_once 'model/grupo_ensayo.php';
require_once 'model/detalle_matriz_norma.php';
require_once 'model/detalle_matriz_norma_proforma.php';
require_once 'model/detalle_matriz_grupo.php';

class MatrizController {

    private $model;
    private $vista;
    private $detalle;
    private $ensayo;
    private $norma;
    private $grupo;
    private $metodo;
    private $detalleN;
    private $detalleG;
    private $detalleP;
    private $detalleNP;

    public function __CONSTRUCT() {
        $this->model = new Matriz();
        $this->vista = new MatrizView();
        $this->detalle=new Detalle_Matriz();
        $this->ensayo=new ensayo();
        $this->norma=new Norma();
        $this->metodo=new Metodo();
        $this->grupo=new grupo_ensayo();
        $this->detalleN=new detalle_matriz_norma();
        $this->detalleG=new detalle_matriz_grupo();
        $this->detalleP=new detalle_matriz_proforma();
        $this->detalleNP=new detalle_matriz_norma_proforma();
    }

    public function Index() {
        $listaroles = $this->model->Listar(); 
        $ensayos=$this->ensayo->Listar();
        $detalle=$this->detalle->listar();
        $normas=$this->norma->Listar();
        $metodos=$this->metodo->Listar();
        $grupos=$this->grupo->Listar();    
        $precios=$this->detalle->listaPrecio();
        $precioG=$this->detalleG->listaPrecio();
        $detalleN=$this->detalleN->Listar();
        $detalleG=$this->detalleG->Listar();

       // echo "<pre>";print_r($precios); echo "<pre>";print_r($precioG); //  exit;   
        $this->vista->View($listaroles,$ensayos,$detalle,$precios,$normas,$metodos,$detalleN,$grupos,$detalleG,$precioG);       
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

        $pkmatriz = $this->model->Registrar($datos);

        header("Location: ?c=matriz&item=matriz&tarea=agregar&exito=si");
    }
    public function Guardar_Cambios() {
      
        $datos = array(
            'pkmatriz'=> $_REQUEST['pkmatriz'],
            'nombre' => $_REQUEST['nombre'],
            'descripcion' => $_REQUEST['descripcion']
        );    

        $pkmatriz = $this->model->Editar($datos);

        header("Location: ?c=matriz&item=matriz de usuario&tarea=modificar&exito=si");
    }

    public function Agregarensayo(){
        $ensayo=$this->ensayo->Obtener($_REQUEST['pkensayo']);
        $datos = array(
            'fkmatriz' => $_REQUEST['pkmatriz'],
            'fkensayo' => $_REQUEST['pkensayo'],
            'fknorma' => $_REQUEST['pknorma'],
            'limite' => $_REQUEST['limite'],
            'costo' => $ensayo->costo
        );
    
        if($this->detalle->Existedetalle_matriz($datos['fkmatriz'],$datos['fkensayo'])=="")
        {
            $this->detalle->Registrar($datos);
            header('Location: ?c=matriz&item=matriz&tarea=agregar&exito=si');
        }else{
            header("Location: ?c=matriz&item=matriz&tarea=detalle_matriz&exito=si"); exit;
        }
        
    }

    public function Quitarensayo(){
        $datos = array(
            'fkmatriz' => $_REQUEST['pkmatriz'],
            'fkensayo' => $_REQUEST['pkensayo']
        );
    $detalle=$this->detalle->GetDetalle($datos);           
    $this->detalleN->Eliminar($detalle->pkdetalle_matriz); 

    $detalleP=$this->detalleP->GetDetalle($datos);   
    $this->detalleNP->Eliminar($detalleP->pkdetalle_matriz);  
    
    $this->detalle->Eliminar($datos); $this->detalleP->Eliminar($datos);
        header('Location: ?c=matriz&item=ensayo de una matriz&tarea=eliminar&exito=si');
    }

    public function AgregarNormaEnsayo()
    {
        $datos = array(
            'fkdetalle_matriz' => $_REQUEST['pkdetalle_matriz'],
            'fknorma' => $_REQUEST['pknorma'],
            'limite' => $_REQUEST['limite']
        );
        $this->detalleN->Registrar($datos);
         header('Location: ?c=matriz&item=norma asociada a un ensayo&tarea=eliminar&exito=si');
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
//7,6,2,8
}
?>