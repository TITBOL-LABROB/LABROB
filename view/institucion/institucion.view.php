<?php
 class InstitucionView {

    public function __CONSTRUCT() {
        
    }

    public function View($institucion) {
        require_once 'view/header.php';
        require_once 'view/institucion/institucion-admin.php'; //html
        require_once 'view/footer.php';
    }

    public function Nuevo() {
        require_once 'view/header.php';
        require_once 'view/institucion/institucion-new.php';
        require_once 'view/footer.php';
    }


    public function Editar($institucion) {
        require_once 'view/header.php';
        require_once 'view/institucion/institucion-editar.php';
        require_once 'view/footer.php';
    }
   }
  ?>