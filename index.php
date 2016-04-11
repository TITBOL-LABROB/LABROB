<?php

//session_start();
$_controllers_permitidos = array("cliente","departamento","cargo","matriz","usuario","tipo_servicio","tipo_cliente","tipo_muestra","localidad","tipo_recipiente","bitacora","area","parametro","laboratorio","solicitud");
$_acciones_permitidos = array("enviar");
if (!isset($_REQUEST['c'])) {
   /* if (!isset($_SESSION['usuario'])) {
        header('Location: login.php');
    }
    else
    {*/
        require_once 'view/header.php';
      //  require_once 'view/panel.php';
        require_once 'view/footer.php';
   // }
} else {
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    // Instanciamos el controlador
    if (file_exists("controller/$controller.controller.php") && is_readable("controller/$controller.controller.php")) {
        //Validacion de privilegios del usuario que se encuentra en esta session
        /*if (!in_array($controller,$_controllers_permitidos) ) {    
                $menu = $facademodel->obtenerMenu($_SESSION['user_sistem']);
        }*/
        require_once ("controller/".$controller.".controller.php");
        $controller = ucwords($controller) . 'Controller';
        $controller = new $controller;
        if (method_exists($controller, $accion)) {
            call_user_func(array($controller, $accion));
        } else {
            header('Location: index.php');
        }
    } else {
        header('Location: index.php');
    }
}

?>