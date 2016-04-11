<?php
 require_once 'view/parametro/parametro.view.php';
require_once 'model/parametro.php';
require_once 'model/medida.php';
require_once 'model/matriz.php';
require_once 'model/laboratorio.php';

class ParametroController {

    private $model;
    private $vista;
    private $medida;
    private $matriz;
    private $laboratorio;

    public function __CONSTRUCT() {
        $this->model = new Parametro();
        $this->vista = new ParametroView();
        $this->medida=new Unidad_Medida();
        $this->matriz=new Matriz();
        $this->laboratorio=new laboratorio();
    }

    public function Index() {
        $lista = $this->model->Listar();        
        $this->vista->View($lista);
    }

    public function Nuevo() {
         $medidas=$this->medida->Listar();
         $matrices=$this->matriz->Listar();
         $laboratorios=$this->laboratorio->Listar();
        $this->vista->Nuevo($medidas,$matrices,$laboratorios);
    }

    public function Editar() {
        $parametro = $this->model->Obtener($_REQUEST['id']);
        $medidas=$this->medida->Listar();
        $matrices=$this->matriz->Listar();
        $laboratorios=$this->laboratorio->Listar();
        $this->vista->Editar($parametro,$medidas,$matrices,$laboratorios);
    }

    public function Guardar() {
      
        $datos = array(
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

        $this->model->Registrar($datos);
        header("Location: ?c=parametro&item=parametro&tarea=agregar&exito=si");
    }
    public function GuardarCambios() {
      
        $datos = array(
            'pkparametro' => $_REQUEST['pkparametro'],
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
           

            $pkparametro = $this->model->Editar($datos);
           

        header("Location: ?c=parametro&item=parametro&tarea=modificar&exito=si");
    }

    public function Eliminar() {
        $this->model->Baja($_REQUEST['id']);
        header("Location: ?c=parametro&item=parametro&tarea=eliminar&exito=si");
    }

    public function validar() {
        if (!isset($_SESSION['user_sistem'])) {
            header('Location: ?c=home');
        }
    }

}
?>