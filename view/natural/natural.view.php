<?php
 class NaturalView {

    public function __CONSTRUCT() {
        
    }

    public function View($natural) {
        require_once 'view/header.php';
        require_once 'view/natural/natural-admin.php'; //html
        require_once 'view/footer.php';
    }

    public function Nuevo() {
        require_once 'view/header.php';
        require_once 'view/natural/natural-new.php';
        require_once 'view/footer.php';
    }


    public function Editar($natural) {
        require_once 'view/header.php';
        require_once 'view/natural/natural-editar.php';
        require_once 'view/footer.php';
    }
   }
  ?>