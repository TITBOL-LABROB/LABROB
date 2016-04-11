<?php
 class UsuarioView {

    public function __CONSTRUCT() {
        
    }

    public function View($usuarios) {
        require_once 'view/header.php';
        require_once 'view/usuario/usuario-admin.php'; //html
        require_once 'view/footer.php';
    }

    public function Nuevo($tipos) {
        require_once 'view/header.php';
        require_once 'view/usuario/usuario-new.php';
        require_once 'view/footer.php';
    }


    public function Editar($usuario,$tipos) {
        require_once 'view/header.php';
        require_once 'view/usuario/usuario-editar.php';
        require_once 'view/footer.php';
    }
   }
  ?>