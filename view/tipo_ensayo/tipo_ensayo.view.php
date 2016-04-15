<?php
 class Tipo_EnsayoView {

    public function __CONSTRUCT() {
        
    }

    public function View($lista) {
        require_once 'view/header.php';
        require_once 'view/tipo_ensayo/tipo_ensayo-admin.php'; //html
        require_once 'view/footer.php';
    }

    public function Nuevo($area) {
        require_once 'view/header.php';
        require_once 'view/tipo_ensayo/tipo_ensayo-new.php';
        require_once 'view/footer.php';
    }


    public function Editar($tipo_ensayo,$area) {
        require_once 'view/header.php';
        require_once 'view/tipo_ensayo/tipo_ensayo-editar.php';
        require_once 'view/footer.php';
    }
   }
  ?>