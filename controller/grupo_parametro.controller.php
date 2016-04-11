<?php
require_once 'view/grupo_parametro/grupo_parametro.view.php';
require_once 'model/grupo_parametro.php';
require_once 'model/detalle_grupo.php';
require_once 'model/parametro.php';

class Grupo_parametroController {

    private $model;
    private $vista;
    private $detalle;
    private $parametro;

    public function __CONSTRUCT() {
        $this->model = new Grupo_parametro();
        $this->vista = new Grupo_parametroView();
        $this->detalle=new Detalle_Grupo();
        $this->parametro=new parametro();
    }

    public function Index() {
        $listaroles = $this->model->Listar();
        $parametros=$this->parametro->Listar();
        $detalle=$this->detalle->listar();
        $precios=$this->detalle->listaPrecio();      
        $this->vista->View($listaroles,$parametros,$detalle,$precios);
    }

    public function Nuevo() {
        $this->vista->Nuevo();
    }

    public function Editar() {
        $grupo_parametro = $this->model->Obtener($_REQUEST['id']);
        $this->vista->Editar($grupo_parametro);
    }
    
    public function Detalle()
    {   
        $grupo_parametro = $this->model->Obtener($_REQUEST['id']);
        $parametros=$this->parametro->Listar();
        $lista=$this->detalle->listar();
        $this->vista->Detalle($grupo_parametro,$parametros,$lista);
    }
    public function Guardar() {
      
        $datos = array(
            'nombre' => $_REQUEST['nombre'],
            'observacion' => $_REQUEST['observacion']
        );

        if($this->model->Existegrupo_parametro($datos['nombre'])!="")
          {
            header("Location: ?c=grupo_parametro&a=nuevo&item=grupo de parametro&tarea=username&exito=si");
            exit;
          }             
            $pkgrupo_parametro = $this->model->Registrar($datos);

        header("Location: ?c=grupo_parametro&item=grupo de parametro&tarea=agregar&exito=si");
    }
    public function GuardarCambios() {
      

        $datos = array(
            'pkgrupo_parametro'=> $_REQUEST['pkgrupo_parametro'],
            'nombre' => $_REQUEST['nombre'],
            'observacion' => $_REQUEST['observacion']
        );        
        /*if($this->model->Existegrupo_parametro($datos['nombre'])!="")
          {
            header("Location: ?c=grupo_parametro&a=editar&id=".$_REQUEST['pkgrupo_parametro_usuario']." &item=usuario&tarea=username&exito=si");
            exit;
          } */
            $pkgrupo_parametro = $this->model->Editar($datos);

        header("Location: ?c=grupo_parametro&item=grupo de parametro&tarea=modificar&exito=si");
    }
    
    public function AgregarParametro(){
        $parametro=$this->parametro->Obtener($_REQUEST['pkparametro']);
        $datos = array(
            'fkgrupo' => $_REQUEST['pkgrupo_parametro'],
            'fkparametro' => $_REQUEST['pkparametro'],
            'costo' => $parametro->costo
        );

        if($this->detalle->Existedetalle_grupo($datos['fkgrupo'],$datos['fkparametro'])=="")
        {
            $this->detalle->Registrar($datos);
            header('Location: ?c=grupo_parametro&item=parametro para un grupo&tarea=agregar&exito=si');
        }else{
            header("Location: ?c=grupo_parametro&item=parametro para un grupo&tarea=detalle_grupo&exito=si"); exit;
        }

       /* if ($exito=='si') {
            $tipo_servicio = $this->model->Obtener($_REQUEST['pktipo_servicio']);
            $parametro = $this->parametro->Obtener($_REQUEST['pkparametro']);
            $DescripcionBitacora = 'se agrego el parametro '.$parametro->nombre.' al tipo de servicio '.$tipo_servicio->nombre;
            $this->bitacora->GuardarBitacora($DescripcionBitacora);
        }*/
        
    }

    public function QuitarParametro(){
        $datos = array(
            'fkgrupo' => $_REQUEST['pkgrupo_parametro'],
            'fkparametro' => $_REQUEST['pkparametro']
        );
        $this->detalle->Eliminar($datos);
        header('Location: ?c=grupo_parametro&item=parametro para de un grupo&tarea=eliminar&exito=si');
    }

    public function Eliminar() {
        $this->model->Eliminar($_REQUEST['id']);
         header("Location: ?c=grupo_parametro&item=grupo de parametro&tarea=eliminar&exito=si");
    }

    public function validar() {
        if (!isset($_SESSION['user_sistem'])) {
            header("Location: ?c=grupo_parametro&item=grupo de parametro&tarea=eliminar&exito=si");
        }
    }

}
?>