<?php
require_once 'view/medida/medida.view.php';
require_once 'model/medida.php';

class MedidaController {

    private $model;
    private $vista;

    public function __CONSTRUCT() {
        $this->model = new Unidad_Medida();
        $this->vista = new MedidaView();
    }

    public function Index() {
        $listaroles = $this->model->Listar();        
        $this->vista->View($listaroles);
    }

    public function Nuevo() {
        $this->vista->Nuevo();
    }

    public function Editar() {
        $medida = $this->model->Obtener($_REQUEST['id']);
        $this->vista->Editar($medida);
    }

    public function Guardar() {
      
        $datos = array(
            'nombre' => $_REQUEST['nombre']
        );

       /* if($this->model->Existemedida($datos['nombre'])!="")
          {
            header("Location: ?c=medida&a=nuevo&item=usuario&tarea=username&exito=si");
            exit;
          }             */
            $this->model->Registrar($datos);

        header("Location: ?c=medida&item=Unidad de Medida&tarea=agregar&exito=si");
    }
    public function GuardarCambios() {
      

        $datos = array(
            'pkunidad'=> $_REQUEST['pkunidad'],
            'nombre' => $_REQUEST['nombre']
        );        
        /*if($this->model->Existemedida($datos['nombre'])!="")
          {
            header("Location: ?c=medida&a=editar&id=".$_REQUEST['pkmedida_usuario']." &item=usuario&tarea=username&exito=si");
            exit;
          } */
            $pkmedida = $this->model->Editar($datos);

        header("Location: ?c=medida&item=Unidad de Medida&tarea=modificar&exito=si");
    }

    public function Eliminar() {
        $this->model->Eliminar($_REQUEST['id']);
        header("Location: ?c=medida&item=Unidad de Medida&tarea=eliminar&exito=si");
    }

    public function validar() {
        if (!isset($_SESSION['user_sistem'])) {
            header("Location: ?c=medida&item=Unidad de Medida&tarea=eliminar&exito=si");
        }
    }

}
?>