<?php
/*require_once 'model/privilegio.php';
$usuario = new Privilegio();
$u = $usuario->ObtenerUsuario($_SESSION['usuario']);*/
//$primera = 0;
$bandera = 0;
$item = "ninguno";
$tarea = "ninguno";
$exito = "ninguno";
/*if (isset($_REQUEST['k'])) {
    $primera = 1;
}*/
if (isset($_REQUEST['item'])) {
    $item = $_REQUEST['item'];
    $bandera = 1;
}

if (isset($_REQUEST['tarea'])) {
    $tarea = $_REQUEST['tarea'];
    $bandera = 1;
}
if (isset($_REQUEST['exito'])) {
    $exito = $_REQUEST['exito'];
    $bandera = 1;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>EPSAS</title>
    <link rel="shortcut icon" href="resources/img/icono.ico">
    <!--Loader-->
    <link href="resources/css/loader.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="resources/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <!-- Multi Menu -->
    <link href="resources/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Tablas Personalizables -->
    <link href="resources/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <!-- CSS Principal -->
    <link href="resources/css/cssprincipal.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="resources/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Sweet alert -->
    <script src="resources/bower_components/sweetalert/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="resources/bower_components/sweetalert/sweetalert2.css">
    <!-- Clock Cocks -->
    <link rel="stylesheet" type="text/css" href="resources/bower_components/clock/css/bootstrap-clockpicker.min.css">
    <!-- Multiselect -->
    <link rel="stylesheet" type="text/css" href="resources/bower_components/multiselect/css/bootstrap-multiselect.css">
    <!-- Calendario -->
    <link rel="stylesheet" href="resources/bower_components/calendar/css/zabuto_calendar.css" />
    <!-- jQuery -->
    <script src="resources/bower_components/jquery/dist/jquery.min.js"></script>
</head>
<body>
<!--Loader-->



<!-- Menu -->
<?php
require_once 'view/menu.php';
?>
<!-- Contenido de la pagina -->
<div id="page-wrapper">
    <div class="container-fluid">

