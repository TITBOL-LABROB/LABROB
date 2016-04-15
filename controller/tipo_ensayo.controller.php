<?php

require_once 'view/tipo_ensayo/tipo_ensayo.view.php';
require_once 'model/tipo_ensayo.php';
require_once 'model/area.php';

class Tipo_EnsayoController {

    private $model;
    private $vista;
    private $area;

    public function __CONSTRUCT() {
        $this->model = new Tipo_Ensayo();
        $this->vista = new Tipo_EnsayoView();
        $this->area=new Area();
    }

    public function Index() {
        $listaroles = $this->model->Listar();        
        $this->vista->View($listaroles);
    }

    public function Nuevo() {
        $area=$this->area->Listar();
        $this->vista->Nuevo($area);
    }

    public function Editar() {
        $tipo_ensayo = $this->model->Obtener($_REQUEST['id']);
        $area=$this->area->Listar();
        $this->vista->Editar($tipo_ensayo,$area);
    }

    public function Guardar() {     
        $datos = array(
            'nombre' => $_REQUEST['nombre'],
            'fkarea' => $_REQUEST['fkarea']
        );
             
        $this->model->Registrar($datos);

        header("Location: ?c=tipo_ensayo&item=tipo de ensayo&tarea=agregar&exito=si");
    }
    public function GuardarCambios() {
      

        $datos = array(
            'pktipo_ensayo'=> $_REQUEST['pktipo_ensayo'],
            'nombre' => $_REQUEST['nombre'],
            'fkarea' => $_REQUEST['fkarea']
        );
            $pktipo_ensayo = $this->model->Editar($datos);

        header("Location: ?c=tipo_ensayo&item=tipo de ensayo&tarea=modificar&exito=si");
    }

    public function Eliminar() {
        $this->model->Eliminar($_REQUEST['id']);
         header("Location: ?c=tipo_ensayo&item=tipo de ensayo&tarea=eliminar&exito=si");
    }

    public function validar() {
        if (!isset($_SESSION['user_sistem'])) {
            header("Location: ?c=tipo_ensayo&item=tipo_ensayo de usuario&ttipo_ensayo=eliminar&exito=si");
        }
    }
  //go sms pro-Temas,Emji,Gif  codigo:DP30286
}
?>