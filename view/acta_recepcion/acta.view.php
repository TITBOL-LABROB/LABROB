<?php
 class ActaView {

    public function __CONSTRUCT() {
        
    }

    public function View() {
        require_once 'view/header.php';
        require_once 'view/acta_recepcion/acta-admin.php'; //html
        require_once 'view/footer.php';
    }

    public function Nuevo($muestra) {
        require_once 'view/header.php';
        require_once 'view/acta_recepcion/acta-new.php';
        require_once 'view/footer.php';
    }


    public function Editar($area) {
        require_once 'view/header.php';
        require_once 'view/acta_recepcion/acta-editar.php';
        require_once 'view/footer.php';
    }
   }
  ?>