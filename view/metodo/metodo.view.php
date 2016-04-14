<?php
 class MetodoView {

    public function __CONSTRUCT() {
        
    }

    public function View($lista) {
        require_once 'view/header.php';
        require_once 'view/metodo/metodo-admin.php'; //html
        require_once 'view/footer.php';
    }

    public function Nuevo() {
        require_once 'view/header.php';
        require_once 'view/metodo/metodo-new.php';
        require_once 'view/footer.php';
    }


    public function Editar($metodo) {
        require_once 'view/header.php';
        require_once 'view/metodo/metodo-editar.php';
        require_once 'view/footer.php';
    }
   }
  ?>