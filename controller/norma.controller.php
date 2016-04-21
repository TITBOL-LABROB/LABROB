<?php
require_once 'view/norma/norma.view.php';
require_once 'model/norma.php';

class NormaController {

    private $model;
    private $vista;

    public function __CONSTRUCT() {
        $this->model = new Norma();
        $this->vista = new NormaView();
    }

    public function Index() {
        $listaroles = $this->model->Listar();        
        $this->vista->View($listaroles);
    }

    public function Nuevo() {
        $this->vista->Nuevo();
    }

    public function Editar() {
        $norma = $this->model->Obtener($_REQUEST['id']);
        $this->vista->Editar($norma);
    }

    public function Guardar() {
      
        $datos = array(
            'codigo' => $_REQUEST['codigo'],
            'gestion' => $_REQUEST['gestion'],
            'acapite' => $_REQUEST['acapite']
        );            
        $this->model->Registrar($datos);
        header("Location: ?c=norma&item=norma&tnorma=agregar&exito=si");
    }
    public function GuardarCambios() {
      

        $datos = array(
            'pknorma'=> $_REQUEST['pknorma'],
            'codigo' => $_REQUEST['codigo'],
            'gestion' => $_REQUEST['gestion'],
            'acapite' => $_REQUEST['acapite']
        ); 
            $pknorma = $this->model->Editar($datos);

        header("Location: ?c=norma&item=norma&tnorma=modificar&exito=si");
    }

    public function Eliminar() {
        $this->model->Eliminar($_REQUEST['id']);
         header("Location: ?c=norma&item=norma&tnorma=eliminar&exito=si");
    }

    public function validar() {
        if (!isset($_SESSION['user_sistem'])) {
            header("Location: ?c=norma&item=norma de usuario&tnorma=eliminar&exito=si");
        }
    }

}
?>