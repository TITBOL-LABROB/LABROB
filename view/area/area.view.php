<?php
 class AreaView {

    public function __CONSTRUCT() {
        
    }

    public function View($lista) {
        require_once 'view/header.php';
        require_once 'view/area/area-admin.php'; //html
        require_once 'view/footer.php';
    }

    public function Nuevo() {
        require_once 'view/header.php';
        require_once 'view/area/area-new.php';
        require_once 'view/footer.php';
    }


    public function Editar($area) {
        require_once 'view/header.php';
        require_once 'view/area/area-editar.php';
        require_once 'view/footer.php';
    }
   }
  ?>