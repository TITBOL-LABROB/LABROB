<?php
 class NormaView {

    public function __CONSTRUCT() {
        
    }

    public function View($lista) {
        require_once 'view/header.php';
        require_once 'view/norma/norma-admin.php'; //html
        require_once 'view/footer.php';
    }

    public function Nuevo() {
        require_once 'view/header.php';
        require_once 'view/norma/norma-new.php';
        require_once 'view/footer.php';
    }


    public function Editar($norma) {
        require_once 'view/header.php';
        require_once 'view/norma/norma-editar.php';
        require_once 'view/footer.php';
    }
   }
  ?>