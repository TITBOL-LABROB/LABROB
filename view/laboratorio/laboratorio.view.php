<?php
 class LaboratorioView {

    public function __CONSTRUCT() {
        
    }

    public function View($lista) {
        require_once 'view/header.php';
        require_once 'view/laboratorio/laboratorio-admin.php'; //html
        require_once 'view/footer.php';
    }

    public function Nuevo() {
        require_once 'view/header.php';
        require_once 'view/laboratorio/laboratorio-new.php';
        require_once 'view/footer.php';
    }


    public function Editar($laboratorio) {
        require_once 'view/header.php';
        require_once 'view/laboratorio/laboratorio-editar.php';
        require_once 'view/footer.php';
    }
   }
  ?>