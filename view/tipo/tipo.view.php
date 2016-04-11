<?php
 class TipoView {

    public function __CONSTRUCT() {
        
    }

    public function View($lista) {
        require_once 'view/header.php';
        require_once 'view/tipo/tipo-admin.php'; //html
        require_once 'view/footer.php';
    }

    public function Nuevo() {
        require_once 'view/header.php';
        require_once 'view/tipo/tipo-new.php';
        require_once 'view/footer.php';
    }


    public function Editar($tipo) {
        require_once 'view/header.php';
        require_once 'view/tipo/tipo-editar.php';
        require_once 'view/footer.php';
    }
   }
  ?>