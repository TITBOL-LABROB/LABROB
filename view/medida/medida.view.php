<?php
 class MedidaView {

    public function __CONSTRUCT() {
        
    }

    public function View($lista) {
        require_once 'view/header.php';
        require_once 'view/medida/medida-admin.php'; //html
        require_once 'view/footer.php';
    }

    public function Nuevo() {
        require_once 'view/header.php';
        require_once 'view/medida/medida-new.php';
        require_once 'view/footer.php';
    }


    public function Editar($medida) {
        require_once 'view/header.php';
        require_once 'view/medida/medida-editar.php';
        require_once 'view/footer.php';
    }
   }
  ?>