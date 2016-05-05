<?php
 require_once 'view/ensayo/ensayo.view.php';
require_once 'model/ensayo.php';
require_once 'model/tipo_ensayo.php';
require_once 'model/medida.php';
require_once 'model/metodo.php';
require_once 'model/area.php';

class EnsayoController {

    private $model;
    private $vista;
    private $medida;
    private $metodo;
    private $area;
    private $tipo_ensayo;

    public function __CONSTRUCT() {
        $this->model = new ensayo();
        $this->vista = new ensayoView();
        $this->medida=new Unidad_Medida();
        $this->metodo=new Metodo();
        $this->area=new Area();
        $this->tipo_ensayo=new Tipo_Ensayo();
    }

    public function Index() {
        $lista = $this->model->Listar();        
        $this->vista->View($lista);
    }

    public function Nuevo() {
         $medidas=$this->medida->Listar();
         $metodos=$this->metodo->Listar();
         $tipos=$this->tipo_ensayo->Listar();
         $areas=$this->area->Listar();
        $this->vista->Nuevo($medidas,$metodos,$areas,$tipos);
    }

    public function Editar() {
        $ensayo = $this->model->Obtener($_REQUEST['id']);
        $medidas=$this->medida->Listar();
        $metodos=$this->metodo->Listar();
        $areas=$this->area->Listar();
        $tipos=$this->tipo_ensayo->Listar();
        $this->vista->Editar($ensayo,$medidas,$metodos,$areas,$tipos);
    }

    public function Guardar() {
      
        $datos = array(
            'nombre' => $_REQUEST['nombre'],
            'fkunidad' => $_REQUEST['pkunidad'],
            'rango_maximo' => $_REQUEST['rango_maximo'],
            'rango_minimo' => $_REQUEST['rango_minimo'],
            'acreditado' => $_REQUEST['acreditado'],
            'fkarea' => $_REQUEST['pkarea'],
            'fktipo_ensayo' => $_REQUEST['fktipo_ensayo'],
            'costo' => $_REQUEST['costo'],
            'moneda' => $_REQUEST['moneda'],
        );
        $this->model->Registrar($datos);
        header("Location: ?c=ensayo&item=ensayo&tarea=agregar&exito=si");
    }
    public function GuardarCambios() {
      
        $datos = array(
            'pkensayo' => $_REQUEST['pkensayo'],
            'fkunidad' => $_REQUEST['pkunidad'],
            'rango_maximo' => $_REQUEST['rango_maximo'],
            'rango_minimo' => $_REQUEST['rango_minimo'],
            'acreditado' => $_REQUEST['acreditado'],
            'fkarea' => $_REQUEST['pkarea'],
            'fktipo_ensayo' => $_REQUEST['fktipo_ensayo'],
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