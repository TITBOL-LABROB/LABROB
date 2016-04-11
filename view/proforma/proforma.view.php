<?php
 class ProformaView {

    public function __CONSTRUCT() {
        
    }

    public function View($proformas) {
        require_once 'view/header.php';
        require_once 'view/proforma/proforma-admin.php'; //html
        require_once 'view/footer.php';
    }

    public function Nuevo($grupos,$clientes) {
        require_once 'view/header.php';
        require_once 'view/proforma/proforma-new.php';
        require_once 'view/footer.php';
    }


    public function Editar($proforma,$grupos,$clientes) {
        require_once 'view/header.php';
        require_once 'view/proforma/proforma-editar.php';
        require_once 'view/footer.php';
    }
   }
  ?>