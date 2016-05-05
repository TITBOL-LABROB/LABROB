<?php
require_once 'FluentPDO/FluentPDO.php';
  $fluent=null;

    $bd = 'mysql:host=localhost;port=3306;dbname=labrob';
            $username = 'root';
            $password = 'chars';
            $pdo = new PDO($bd, $username, $password);
            // Habilitar excepciones
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $fluent = new FluentPDO($pdo);

  $pkmatriz=$_POST['pkmatriz'];
  $pkproforma=$_POST['pkproforma'];
  $detalle=getDetalleProforma($pkproforma,$pkmatriz,$fluent);

  if(isset($_POST['delete']))
  {
    foreach ($detalle as $de) 
    {
       EliminarDetalleNorma($de->pkdetalle_matriz,$fluent);
       EliminarDetalle($de->pkdetalle_matriz,$fluent);
    }
    EliminarDetalleGrupo($pkproforma,$pkmatriz,$fluent); 

  }else{
 $detalle=getDetalle($pkmatriz,$fluent);
 foreach ($detalle as $de) 
 {

   $datos=array(
          'fkproforma'=>$pkproforma,
          'fkmatriz'=>$pkmatriz,
          'fkensayo'=>$de->fkensayo,
          'fkmetodo'=>$de->fkmetodo,
          'costo'=>$de->costo
    );
   $fluent->insertInto('detalle_matriz_proforma', $datos)->execute();
   $id=GetLatId($fluent); echo "<h1>$id->id</h1>"; //exit;
   $detalleN=getDetalleNorma($de->pkdetalle_matriz, $fluent);
   
          foreach ($detalleN as $dn)
          {
             $datosN=array('fkdetalle_matriz'=>$id->id,'fknorma'=>$dn->fknorma,'limite'=>$dn->limite);
             $fluent->insertInto('detalle_matriz_norma_proforma', $datosN)->execute();
          }
   
 }

 $detalleG=getDetalleGrupo($pkmatriz, $fluent);
 foreach ($detalleG as $de)
 {
   $datosG=array('fkmatriz'=>$pkmatriz,'fkgrupo'=>$de->fkgrupo,'fkproforma'=>$pkproforma);
   $fluent->insertInto('detalle_matriz_grupo_proforma', $datosG)->execute();
 }

}


 function getDetalleGrupo($pkmatriz,$fluent) {
        try {
           return $fluent
         ->from('detalle_matriz_grupo de')
         ->select('de.*') 
         ->where('de.fkmatriz',$pkmatriz)     
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

 function GetLatId($fluent)
    {
     try {
          return $fluent->from('detalle_matriz_proforma p')
                     ->select('MAX(p.pkdetalle_matriz) as id')
                     ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }

    }   

 function getDetalleNorma($pkdetalle_matriz,$fluent) {
        try {
           return $fluent
         ->from('detalle_matriz_norma dm')
         ->select('dm.*')
         ->where('fkdetalle_matriz',$pkdetalle_matriz)       
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

  function getDetalle($pkmatriz,$fluent)
  {
        try {
          return $fluent
         ->from('detalle_matriz dm')
         ->select('dm.*')
         ->where('dm.fkmatriz',$pkmatriz)      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
  } 

  function getDetalleProforma($pkproforma,$pkmatriz,$fluent)
  {
        try {
          return $fluent
         ->from('detalle_matriz_proforma dm')
         ->select('dm.*')
         ->where('dm.fkproforma=? and dm.fkmatriz=?',$pkproforma,$pkmatriz)      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
  }

   function EliminarDetalle($pkdetalle_matriz,$fluent)
    {
      try 
        {
           $fluent->deleteFrom('detalle_matriz_proforma')
                     ->where('pkdetalle_matriz', $pkdetalle_matriz)
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function EliminarDetalleNorma($pkdetalle_matriz,$fluent)
    {
      try 
        {
           $fluent->deleteFrom('detalle_matriz_norma_proforma')
                     ->where('fkdetalle_matriz', $pkdetalle_matriz)
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    function EliminarDetalleGrupo($fkproforma,$pkmatriz,$fluent)
    {
      try 
        {
           $fluent->deleteFrom('detalle_matriz_grupo_proforma')
                     ->where('fkproforma=? and fkmatriz=?', $fkproforma,$pkmatriz)
                     ->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }       
?>                                   