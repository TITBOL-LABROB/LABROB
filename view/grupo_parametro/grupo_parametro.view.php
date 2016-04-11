<?php
 class Grupo_parametroView {

    public function __CONSTRUCT() {
        
    }

    public function View($lista,$parametros,$detalle,$precios) {
        require_once 'view/header.php';
        require_once 'view/grupo_parametro/grupo_parametro-admin.php'; //html
        require_once 'view/footer.php';
    }

    public function Nuevo() {
        require_once 'view/header.php';
        require_once 'view/grupo_parametro/grupo_parametro-new.php';
        require_once 'view/footer.php';
    }


    public function Editar($grupo_parametro) {
        require_once 'view/header.php';
        require_once 'view/grupo_parametro/grupo_parametro-editar.php';
        require_once 'view/footer.php';
    }

    public function Detalle($grupo_parametro,$parametros,$lista) {
        require_once 'view/header.php';
        require_once 'view/grupo_parametro/grupo_parametro-editar.php';
        require_once 'view/footer.php';
    }
   }
  ?>