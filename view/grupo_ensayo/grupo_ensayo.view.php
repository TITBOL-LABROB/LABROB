<?php
 class Grupo_ensayoView {

    public function __CONSTRUCT() {
        
    }

    public function View($lista,$ensayos,$detalle,$precios) {
        require_once 'view/header.php';
        require_once 'view/grupo_ensayo/grupo_ensayo-admin.php'; //html
        require_once 'view/footer.php';
    }

    public function Nuevo() {
        require_once 'view/header.php';
        require_once 'view/grupo_ensayo/grupo_ensayo-new.php';
        require_once 'view/footer.php';
    }


    public function Editar($grupo_ensayo) {
        require_once 'view/header.php';
        require_once 'view/grupo_ensayo/grupo_ensayo-editar.php';
        require_once 'view/footer.php';
    }

    public function Detalle($grupo_ensayo,$ensayos,$lista) {
        require_once 'view/header.php';
        require_once 'view/grupo_ensayo/grupo_ensayo-editar.php';
        require_once 'view/footer.php';
    }
   }
  ?>