<?php
require_once 'view/matriz/matriz.view.php';
require_once 'model/matriz.php';
require_once 'model/detalle_matriz.php';
require_once 'model/ensayo.php';

class MatrizController {

    private $model;
    private $vista;
    private $detalle;
    private $ensayo;

    public function __CONSTRUCT() {
        $this->model = new Matriz();
        $this->vista = new MatrizView();
        $this->detalle=new Detalle_Matriz();
        $this->ensayo=new ensayo();
    }

    public function Index() {
        $listaroles = $this->model->Listar(); 
        $ensayos=$this->ensayo->Listar();
        $detalle=$this->detalle->listar();  
        $precios=$this->detalle->listaPrecio();    
        $this->vista->View($listaroles,$ensayos,$detalle,$precios);       
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

        header("Location: ?c=matriz&item=matriz de usuario&tarea=agregar&exito=si");
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
        $this->detalle->Eliminar($datos);
        header('Location: ?c=matriz&item=ensayo de una matriz&tarea=eliminar&exito=si');
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