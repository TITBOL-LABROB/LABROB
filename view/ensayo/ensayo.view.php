<?php
 class EnsayoView {

    public function __CONSTRUCT() {
        
    }

    public function View($ensayos) {
        require_once 'view/header.php';
        require_once 'view/ensayo/ensayo-admin.php'; //html
        require_once 'view/footer.php';
    }

    public function Nuevo($medidas,$metodos,$areas,$tipos) {
        require_once 'view/header.php';
        require_once 'view/ensayo/ensayo-new.php';
        require_once 'view/footer.php';
    }


    public function Editar($ensayo,$medidas,$metodos,$areas,$tipos) {
        require_once 'view/header.php';
        require_once 'view/ensayo/ensayo-editar.php';
        require_once 'view/footer.php';
    }
   }
  ?>