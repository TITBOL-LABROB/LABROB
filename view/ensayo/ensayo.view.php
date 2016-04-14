<?php
 class EnsayoView {

    public function __CONSTRUCT() {
        
    }

    public function View($ensayos) {
        require_once 'view/header.php';
        require_once 'view/ensayo/ensayo-admin.php'; //html
        require_once 'view/footer.php';
    }

    public function Nuevo($medidas,$matrices,$areas) {
        require_once 'view/header.php';
        require_once 'view/ensayo/ensayo-new.php';
        require_once 'view/footer.php';
    }


    public function Editar($ensayo,$medidas,$matrices,$areas) {
        require_once 'view/header.php';
        require_once 'view/ensayo/ensayo-editar.php';
        require_once 'view/footer.php';
    }
   }
  ?>