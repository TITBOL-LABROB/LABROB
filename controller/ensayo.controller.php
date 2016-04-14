<?php
 require_once 'view/ensayo/ensayo.view.php';
require_once 'model/ensayo.php';
require_once 'model/medida.php';
require_once 'model/matriz.php';
require_once 'model/area.php';

class EnsayoController {

    private $model;
    private $vista;
    private $medida;
    private $matriz;
    private $area;

    public function __CONSTRUCT() {
        $this->model = new ensayo();
        $this->vista = new ensayoView();
        $this->medida=new Unidad_Medida();
        $this->matriz=new Matriz();
        $this->area=new Area();
    }

    public function Index() {
        $lista = $this->model->Listar();        
        $this->vista->View($lista);
    }

    public function Nuevo() {
         $medidas=$this->medida->Listar();
         $matrices=$this->matriz->Listar();
         $areas=$this->area->Listar();
        $this->vista->Nuevo($medidas,$matrices,$areas);
    }

    public function Editar() {
        $ensayo = $this->model->Obtener($_REQUEST['id']);
        $medidas=$this->medida->Listar();
        $matrices=$this->matriz->Listar();
        $areas=$this->area->Listar();
        $this->vista->Editar($ensayo,$medidas,$matrices,$areas);
    }

    public function Guardar() {
      
        $datos = array(
            'nombre' => $_REQUEST['nombre'],
            'fkunidad' => $_REQUEST['pkunidad'],
            'metodo' => $_REQUEST['metodo'],
            'limite_cuantificacion' => $_REQUEST['limite_cuantificable'],
            'limite_detectable' => $_REQUEST['limite_detectable'],
            'limite_admisible' => $_REQUEST['limite_admisible'],
            'fkarea' => $_REQUEST['pkarea'],
            'fkmatriz' => $_REQUEST['pkmatriz'],
            'costo' => $_REQUEST['costo'],
            'moneda' => $_REQUEST['moneda'],
        ); 

        $this->model->Registrar($datos);
        header("Location: ?c=ensayo&item=ensayo&tarea=agregar&exito=si");
    }
    public function GuardarCambios() {
      
        $datos = array(
            'pkensayo' => $_REQUEST['pkensayo'],
            'nombre' => $_REQUEST['nombre'],
            'fkunidad' => $_REQUEST['pkunidad'],
            'metodo' => $_REQUEST['metodo'],
            'limite_cuantificacion' => $_REQUEST['limite_cuantificable'],
            'limite_detectable' => $_REQUEST['limite_detectable'],
            'limite_admisible' => $_REQUEST['limite_admisible'],
            'fkarea' => $_REQUEST['pkarea'],
            'fkmatriz' => $_REQUEST['pkmatriz'],
            'costo' => $_REQUEST['costo'],
            'moneda' => $_REQUEST['moneda'],
        );
           

            $pkensayo = $this->model->Editar($datos);
           

        header("Location: ?c=ensayo&item=ensayo&tarea=modificar&exito=si");
    }

    public function Eliminar() {
        $this->model->Baja($_REQUEST['id']);
        header("Location: ?c=ensayo&item=ensayo&tarea=eliminar&exito=si");
    }

    public function validar() {
        if (!isset($_SESSION['user_sistem'])) {
            header('Location: ?c=home');
        }
    }

}
?>