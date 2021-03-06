<?php
require_once 'view/grupo_ensayo/grupo_ensayo.view.php';
require_once 'model/grupo_ensayo.php';
require_once 'model/detalle_grupo.php';
require_once 'model/ensayo.php';
require_once 'model/metodo.php';
require_once 'model/norma.php';
require_once 'model/detalle_grupo_norma.php';

class Grupo_ensayoController {

    private $model;
    private $vista;
    private $detalle;
    private $ensayo;
    private $metodo;
    private $norma;
    private $detalleN;


    public function __CONSTRUCT() {
        $this->model = new Grupo_ensayo();
        $this->vista = new Grupo_ensayoView();
        $this->detalle=new Detalle_Grupo();
        $this->ensayo=new ensayo();
        $this->metodo=new metodo();
        $this->norma=new norma();
        $this->detalleN=new detalle_grupo_norma();
    }

    public function Index() {
        $listaroles = $this->model->Listar();
        $ensayos=$this->ensayo->Listar();
        $detalle=$this->detalle->listar();
        $detalleN=$this->detalleN->listar();
        $metodos=$this->metodo->Listar();
        $normas=$this->norma->Listar();
        $precios=$this->detalle->listaPrecio1();      
        $this->vista->View($listaroles,$ensayos,$metodos,$normas,$detalle,$detalleN,$precios);
    }

    public function Nuevo() {
        $this->vista->Nuevo();
    }

    public function Editar() {
        $grupo_ensayo = $this->model->Obtener($_REQUEST['id']);
        $this->vista->Editar($grupo_ensayo);
    }
    
    public function Detalle()
    {   
        $grupo_ensayo = $this->model->Obtener($_REQUEST['id']);
        $ensayos=$this->ensayo->Listar();
        $lista=$this->detalle->listar();
        $this->vista->Detalle($grupo_ensayo,$ensayos,$lista);
    }
    public function Guardar() {
      
        $datos = array(
            'nombre' => $_REQUEST['nombre'],
            'observacion' => $_REQUEST['observacion'],
            'costo' => $_REQUEST['costo']
        );

        if($this->model->Existegrupo_ensayo($datos['nombre'])!="")
          {
            header("Location: ?c=grupo_ensayo&a=nuevo&item=grupo de ensayo&tarea=username&exito=si");
            exit;
          }             
            $pkgrupo_ensayo = $this->model->Registrar($datos);

        header("Location: ?c=grupo_ensayo&item=grupo de ensayo&tarea=agregar&exito=si");
    }

    public function GuardarCambios() {
      

        $datos = array(
            'pkgrupo_ensayo'=> $_REQUEST['pkgrupo_ensayo'],
            'nombre' => $_REQUEST['nombre'],
            'observacion' => $_REQUEST['observacion'],
            'costo' => $_REQUEST['costo']
        );    

        $pkgrupo_ensayo = $this->model->Editar($datos);

        header("Location: ?c=grupo_ensayo&item=grupo de ensayo&tarea=modificar&exito=si");
    }
    
    public function Agregarensayo(){
        $ensayo=$this->ensayo->Obtener($_REQUEST['pkensayo']);
        $datos = array(
            'fkgrupo' => $_REQUEST['pkgrupo_ensayo'],
            'fkensayo' => $_REQUEST['pkensayo'],
            'costo' => $ensayo->costo
        );

        if($this->detalle->Existedetalle_grupo($datos['fkgrupo'],$datos['fkensayo'])=="")
        {
            $this->detalle->Registrar($datos);
            header('Location: ?c=grupo_ensayo&item=ensayo para un grupo&tarea=agregar&exito=si');
        }else{
            header("Location: ?c=grupo_ensayo&item=ensayo para un grupo&tarea=detalle_grupo&exito=si"); exit;
        }

       /* if ($exito=='si') {
            $tipo_servicio = $this->model->Obtener($_REQUEST['pktipo_servicio']);
            $ensayo = $this->ensayo->Obtener($_REQUEST['pkensayo']);
            $DescripcionBitacora = 'se agrego el ensayo '.$ensayo->nombre.' al tipo de servicio '.$tipo_servicio->nombre;
            $this->bitacora->GuardarBitacora($DescripcionBitacora);
        }*/
        
    }

    public function Quitarensayo(){
        $datos = array(
            'fkgrupo' => $_REQUEST['pkgrupo_ensayo'],
            'fkensayo' => $_REQUEST['pkensayo']
        );
        $detalle=$this->detalle->GetDetalle($datos); 
        $this->detalleN->Eliminar($detalle->pkdetalle_grupo);
        $this->detalle->Eliminar($datos);
        header('Location: ?c=grupo_ensayo&item=ensayo para de un grupo&tarea=eliminar&exito=si');
    }

    public function Eliminar() {
        $this->model->Eliminar($_REQUEST['id']);
         header("Location: ?c=grupo_ensayo&item=grupo de ensayo&tarea=eliminar&exito=si");
    }

    public function validar() {
        if (!isset($_SESSION['user_sistem'])) {
            header("Location: ?c=grupo_ensayo&item=grupo de ensayo&tarea=eliminar&exito=si");
        }
    }

}
?>