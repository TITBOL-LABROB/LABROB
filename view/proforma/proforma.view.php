<?php
 class ProformaView {

    public function __CONSTRUCT() {
        
    }

    public function View($proformas,$clientes) {
        require_once 'view/header.php';
        require_once 'view/proforma/proforma-admin.php'; //html
        require_once 'view/footer.php';
    }

    public function Nuevo($grupos,$clientes,$instituciones) {
        require_once 'view/header.php';
        require_once 'view/proforma/proforma-new.php';
        require_once 'view/footer.php';
    }

    public function Detalle($proformas,$clientes,$detalle,$detalleG,$detalleM,$grupos,$matrices,$instituciones,$listaRegistrados,$listaRegistradosG) {
        require_once 'view/header.php';
        require_once 'view/proforma/proforma-detalle.php';
        require_once 'view/footer.php';
    }
    public function Ver($proformas,$detalle,$detalleG,$area)
    {
        require_once 'view/proforma/proformaprint.php';
    }
    public function Contrato($proformas,$clientes,$detalle,$parametros,$precios) {
        require_once 'view/header.php';
        require_once 'view/proforma/proforma-contrato.php';
        require_once 'view/footer.php';
    }
   }
  ?>