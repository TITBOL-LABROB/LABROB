<?php
 class JuridicoView {

    public function __CONSTRUCT() {
        
    }

    public function View($juridico) {
        require_once 'view/header.php';
        require_once 'view/juridico/juridico-admin.php'; //html
        require_once 'view/footer.php';
    }

    public function Nuevo() {
        require_once 'view/header.php';
        require_once 'view/juridico/juridico-new.php';
        require_once 'view/footer.php';
    }


    public function Editar($juridico) {
        require_once 'view/header.php';
        require_once 'view/juridico/juridico-editar.php';
        require_once 'view/footer.php';
    }
   }
  ?>