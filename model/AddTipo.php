<?php
require_once 'FluentPDO/FluentPDO.php';
    $bd = 'mysql:host=localhost;port=3306;dbname=labrob';
            $username = 'root';
            $password = '';
            $pdo = new PDO($bd, $username, $password);

            // Habilitar excepciones
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $fluent = new FluentPDO($pdo);

if(isset($_POST['codigo'])) {
          $pkarea=$_POST['codigo'];
          $datos=$fluent->from('tipo_ensayo t')
         ->select('t.*')
         ->where('t.fkarea',$pkarea)          
         ->fetchAll(); 
    $html="";
    foreach ($datos as $t) {
        $html.='<option value='."$t->pktipo_ensayo".'>'."$t->nombre".'</option>';
    }
    echo $html;
    return;
}
if(isset($_POST['nombre_institucion'])) {
  $pkinstitucion=$_POST['nombre_institucion'];

          $datos=$fluent->from('cliente c')
         ->Join('cliente_juridico j on c.fktipo_cliente=j.nit') 
         ->select('c.*,j.*')
         ->where("j.nombre like '%$pkinstitucion%'")          
         ->fetchAll(); 
    
    echo json_encode($datos);
    return;
}
?>