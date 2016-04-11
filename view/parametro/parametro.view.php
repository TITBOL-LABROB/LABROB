<?php
 class ParametroView {

    public function __CONSTRUCT() {
        
    }

    public function View($parametros) {
        require_once 'view/header.php';
        require_once 'view/parametro/parametro-admin.php'; //html
        require_once 'view/footer.php';
    }

    public function Nuevo($medidas,$matrices,$laboratorios) {
        require_once 'view/header.php';
        require_once 'view/parametro/parametro-new.php';
        require_once 'view/footer.php';
    }


    public function Editar($parametro,$medidas,$matrices,$laboratorios) {
        require_once 'view/header.php';
        require_once 'view/parametro/parametro-editar.php';
        require_once 'view/footer.php';
    }
   }
  ?>