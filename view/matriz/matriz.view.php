<?php
 class MatrizView {

    public function __CONSTRUCT() {
        
    }

    public function View($lista,$ensayos,$detalle,$precios,$normas,$metodos,$detalleN,$grupos,$detalleG,$precioG) {
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

    public function Detalle($grupo_ensayo,$ensayos,$lista) {
        require_once 'view/header.php';
        require_once 'view/matriz/matriz-editar.php';
        require_once 'view/footer.php';
    }
    
   }

  ?>