<?php
require_once 'FluentPDO/FluentPDO.php';
    $bd = 'mysql:host=localhost;port=3306;dbname=labrob';
            $username = 'root';
            $password = 'chars';
            $pdo = new PDO($bd, $username, $password);

            // Habilitar excepciones
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $fluent = new FluentPDO($pdo);

if(isset($_POST['getLast'])) {
          $pkdetalle_matriz=$fluent->from('detalle_matriz_proforma p')
                        ->select('MAX(p.pkdetalle_matriz) as id')
                        ->fetchAll();
    
    echo json_encode($pkdetalle_matriz);
    return;
}

if(isset($_POST['getNormas'])) {
          $normas=$fluent->from('norma')
                        ->select('norma.*')
                        ->fetchAll();
    
    echo json_encode($normas);
    return;
}

if(isset($_POST['pkdetalle_matriz'])&&isset($_POST['pknorma'])) {
       $pkdetalle_matriz=$_POST['pkdetalle_matriz'];
       $limite="";
        if(isset($_POST['limite'])) $limite=$_POST['limite'];

       $datos=array(
            'fkdetalle_matriz'=> $_POST['pkdetalle_matriz'],
            'fknorma'=> $_POST['pknorma'],
            'limite'=> $limite
        );
        
       if(isset($_POST['delete']))
       {
        $fluent->deleteFrom('detalle_matriz_norma_proforma')
                     ->where('fkdetalle_matriz=? and fknorma=?', $datos['fkdetalle_matriz'],$datos['fknorma'])
                     ->execute();             
       }else{
         
         $existe= $fluent
         ->from('detalle_matriz_norma_proforma')
         ->select('detalle_matriz_norma_proforma.*')
         ->where('fkdetalle_matriz=? and fknorma=?', $datos['fkdetalle_matriz'],$datos['fknorma'])          
         ->fetch();   

         if($existe=="") {
          $fluent->insertInto('detalle_matriz_norma_proforma', $datos)->execute();}
       }
        

            $result=$fluent->from('detalle_matriz_norma_proforma dm')
                 ->join('detalle_matriz_proforma d on dm.fkdetalle_matriz=d.pkdetalle_matriz')
                 ->join('norma n on dm.fknorma=n.pknorma')
                 ->where('fkdetalle_matriz',$pkdetalle_matriz)
                 ->select("dm.fkdetalle_matriz,dm.fknorma,CONCAT_WS('-',n.codigo,n.gestion,n.acapite) as norma")      
         ->fetchAll();
        $html="";
                                       foreach ($result as $de) 
                                       {   
                                             $html.="<tr><td><input type='hidden' value='$de->fknorma'></input></td>"; 
                                             $html.="<td><input type='hidden' value='$de->norma'></input>$de->norma</td>";
                                             $html.="<td><input type='hidden' value='$de->limite'></input>$de->limite</td>";
                                             $html.="<td>
                                                        <a href='#' onclick='QuitarEnsayoNorma($de->fkdetalle_matriz,$de->fknorma)' class='btn btn-outline btn-danger btn-circle'  style='color: darkred'><i class='fa fa-trash'></i></a>
                                                    </td></tr>";
                                       } 
     echo $html;  
     return;
}

if(isset($_POST['fkmatriz'])&&isset($_POST['fkproforma'])) 
{
   $pkmatriz=$_POST['fkmatriz']; $refresh=$_POST['refresh'];
   $pkproforma= $_POST['fkproforma'];
   
  
   
   if($refresh=='no'){

    $datos=array(
           'fkproforma'=>$_POST['fkproforma'],
           'fkmatriz'=> $pkmatriz,
           'fkgrupo'=> $_POST['fkgrupo']
       );

   if(isset($_POST['delete'])) 
   {
         $fluent->deleteFrom('detalle_matriz_grupo_proforma')
                     ->where('fkproforma=? and fkmatriz=? and fkgrupo=?',$pkproforma,$pkmatriz,$_POST['fkgrupo'])
                     ->execute();                  

   }else{ 
    $fluent->insertInto('detalle_matriz_grupo_proforma', $datos)->execute(); }
  }  

   $detalleG=$fluent
         ->from('detalle_matriz_grupo_proforma de')
         ->join('grupo_ensayo p on de.fkgrupo=p.pkgrupo_ensayo')
         ->join('matriz pr on de.fkmatriz=pr.pkmatriz')
         ->select('de.fkproforma,de.fkmatriz,de.fkgrupo,p.nombre as grupo,p.costo')
         ->where('de.fkmatriz=? and de.fkproforma=?',$pkmatriz,$pkproforma)      
         ->fetchAll();
    
    $precios=$fluent
         ->from('detalle_matriz_proforma dm')
         ->select('SUM(dm.costo) as total')
         ->where('dm.fkmatriz=? and dm.fkproforma=?',$pkmatriz,$pkproforma)   
         ->fetch();
    $total=0;     
   $html="";       
                                  foreach ($detalleG as $de) 
                                       {   
                                         $html.="<tr id='grupo$de->fkgrupo'><td>$de->grupo</td>"; 
                                         $html.="<td>$de->costo</td>";
                                         $html.="<td><a href='#' onclick='QuitarGrupo($de->fkproforma,$de->fkmatriz,$de->fkgrupo)' class='btn btn-outline btn-danger btn-circle'  style='color: darkred'><i class='fa fa-trash'></i></a></td></tr>";
                                         $total=$total+$de->costo;
                                       }

                                    $total=$precios->total+$total;
                                    $html.="<tr><td colspan='5'><label style='color: #800000; font-size: 20px'>Precio total:$total</label></td></tr>";    
        echo $html;
         return;
}

?>