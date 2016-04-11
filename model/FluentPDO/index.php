<?php

// Cargamos Vendor
include_once "FluentPDO/FluentPDO.php";

$pdo = new PDO('mysql:host=mysql4.000webhost.com;dbname=a1066824_calidad;charset=utf8','a1066824_calidad', 'calidad1');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$fluent = new FluentPDO($pdo);

$action = isset($_GET['a']) ? $_GET['a'] : null;

switch($action) {
    case 'listar_promotores':
        header('Content-Type: application/json');
        print_r(json_encode(listar_promotor($fluent)));
        break;
    case 'obtener_promotor':
        header('Content-Type: application/json');
        print_r(json_encode(obtener_promotor($fluent, $_GET['id'])));
        break;
    case 'registrar_promotor':
        header('Content-Type: application/json');
        $data = json_decode(utf8_encode(file_get_contents("php://input")), true);
        print_r(json_encode(registrar_promotor($fluent, $data)));
        break;
    case 'eliminar_promotor':
        header('Content-Type: application/json');
        print_r(json_encode(eliminar_promotor($fluent, $_GET['id'])));
        break;

    case 'listar_clientes':
        header('Content-Type: application/json');
        print_r(json_encode(listar_cliente($fluent)));
        break;
    case 'obtener_cliente':
        header('Content-Type: application/json');
        print_r(json_encode(obtener_cliente($fluent, $_GET['id'])));
        break;
    case 'registrar_cliente':
        header('Content-Type: application/json');
        $data = json_decode(utf8_encode(file_get_contents("php://input")), true);
        print_r(json_encode(registrar_cliente($fluent, $data)));
        break;
    case 'eliminar_cliente':
        header('Content-Type: application/json');
        print_r(json_encode(eliminar_cliente($fluent, $_GET['id'])));
        break;

    case 'listar_detalle':
        header('Content-Type: application/json');
        print_r(json_encode(listar_detalle($fluent)));
        break;
    case 'listar_detalle_cliente':
        header('Content-Type: application/json');
        print_r(json_encode(listar_detalle_cliente($fluent, $_GET['id'])));
        break;
    case 'obtener_detalle_cliente':
        header('Content-Type: application/json');
        print_r(json_encode(obtener_detalle_cliente($fluent, $_GET['id'])));
        break;
    case 'registrar_detalle':
        header('Content-Type: application/json');
        $data = json_decode(utf8_encode(file_get_contents("php://input")), true);
        print_r(json_encode(registrar_detalle($fluent, $data)));
        break;
    case 'eliminar_detalle':
        header('Content-Type: application/json');
        print_r(json_encode(eliminar_detalle($fluent, $_GET['id'], $_GET['fk'])));
        break;
    case 'promotores':
        header('Content-Type: application/json');
        print_r(json_encode(promotores($fluent)));
        break;
}


function listar_promotor($fluent)
{
    return $fluent
         ->from('promotor')
         ->select('promotor.*')		     
         ->fetchAll();
}

function obtener_promotor($fluent, $id)
{
    return $fluent->from('promotor')
	              ->select('promotor.*')->where('pkpromotor', $id)->fetch();
}

function eliminar_promotor($fluent, $id)
{
    $fluent->deleteFrom('promotor')->where('pkpromotor', $id)->execute();
    
    return true;
}

function registrar_promotor($fluent, $data)
{
    $fluent->insertInto('promotor', $data)->execute();
    return true;
}




function listar_cliente($fluent)
{
    return $fluent
         ->from('cliente')
         ->select('cliente.*')          
         ->fetchAll();
}

function obtener_cliente($fluent, $id)
{
    return $fluent->from('cliente')->select('cliente.*')->where('pkcliente', $id)->fetch();
}

function eliminar_cliente($fluent, $id)
{
    $fluent->deleteFrom('cliente')->where('pkcliente', $id)->execute();
    return true;
}

function registrar_cliente($fluent, $data)
{
    $fluent->insertInto('cliente', $data)->execute();
    return true;
}


function listar_detalle($fluent)
{
    return $fluent->from('cliente')->select('cliente.*')->fetchAll();
}

function listar_detalle_cliente($fluent,$id)
{
    return $fluent->from('detalle_pedido')->Join('promotor on promotor.pkpromotor=detalle_pedido.fkpromotor')->select('promotor.nombre as nombre_promotor,detalle_pedido.*')->where('detalle_pedido.fkcliente',$id)->fetchAll();
}

function obtener_detalle_cliente($fluent, $id)
{
    return $fluent->from('cliente')->select('cliente.*')->where('pkcliente', $id)->fetch();
}

function eliminar_detalle($fluent, $id, $fk)
{
    $fluent->deleteFrom('detalle_pedido')->where('fkcliente=? AND fkpromotor=?', $id, $fk)->execute();
    return true;
}

function registrar_detalle($fluent, $data)
{
    $fluent->insertInto('detalle_pedido', $data)->execute();
    return true;
}

function promotores($fluent)
{
    return $fluent
         ->from('promotor')
         ->fetchAll();
}

