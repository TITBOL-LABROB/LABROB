<?php
if(isset($_POST['codigo'])) {
    require_once 'FluentPDO/FluentPDO.php';
    $pkarea=$_POST['codigo'];
    $bd = 'mysql:host=localhost;port=3306;dbname=labrob';
            $username = 'root';
            $password = 'chars';
            $pdo = new PDO($bd, $username, $password);

            // Habilitar excepciones
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $fluent = new FluentPDO($pdo);
          
          $datos=$fluent->from('tipo_ensayo t')
         ->select('t.*')
         ->where('t.fkarea',$pkarea)          
         ->fetchAll(); 
    $html="";
    foreach ($datos as $t) {
        $html.='<option value='."$t->pktipo_ensayo".'>'."$t->nombre".'</option>';
    }
    echo $html;
}
?>