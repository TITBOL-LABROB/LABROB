<?php
 class MatrizView {

    public function __CONSTRUCT() {
        
    }

    public function View($lista) {
        require_once 'view/header.php';
        require_once 'view/matriz/matriz-admin.php'; //html
        require_once 'view/footer.php';
    }

    public function Nuevo() {
        require_once 'view/header.php';
        require_once 'view/matriz/matriz-new.php';
        require_once 'view/footer.php';
    }


    public function Editar($matriz) {
        require_once 'view/header.php';
        require_once 'view/matriz/matriz-editar.php';
        require_once 'view/footer.php';
    }
   }
  ?>