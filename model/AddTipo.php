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

if(isset($_POST['getLast'])) {
          $pkdetalle_matriz=$fluent->from('detalle_matriz p')
                        ->select('MAX(p.pkdetalle_matriz) as id')
                        ->fetchAll();
    
    echo json_encode($pkdetalle_matriz);
    return;
}

if(isset($_POST['getLastG'])) {
          $pkdetalle_matriz=$fluent->from('detalle_grupo p')
                        ->select('MAX(p.pkdetalle_grupo) as id')
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
        $fluent->deleteFrom('detalle_matriz_norma')
                     ->where('fkdetalle_matriz=? and fknorma=?', $datos['fkdetalle_matriz'],$datos['fknorma'])
                     ->execute();
                   
       }else{
         
         $existe= $fluent
         ->from('detalle_matriz_norma')
         ->select('detalle_matriz_norma.*')
         ->where('fkdetalle_matriz=? and fknorma=?', $datos['fkdetalle_matriz'],$datos['fknorma'])          
         ->fetch();   

         if($existe=="") {
          $fluent->insertInto('detalle_matriz_norma', $datos)->execute();}
       }
        

            $result=$fluent->from('detalle_matriz_norma dm')
                 ->join('detalle_matriz d on dm.fkdetalle_matriz=d.pkdetalle_matriz')
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

if(isset($_POST['pkdetalle_grupo'])&&isset($_POST['pknorma'])) {
       $pkdetalle_grupo=$_POST['pkdetalle_grupo'];
       $limite="";
        if(isset($_POST['limite'])) $limite=$_POST['limite'];

       $datos=array(
            'fkdetalle_grupo'=> $_POST['pkdetalle_grupo'],
            'fknorma'=> $_POST['pknorma'],
            'limite'=> $limite
        );

       if(isset($_POST['delete']))
       {
        $fluent->deleteFrom('detalle_grupo_norma')
                     ->where('fkdetalle_grupo=? and fknorma=?', $datos['fkdetalle_grupo'],$datos['fknorma'])
                     ->execute();
       }else{
         
         $existe= $fluent
         ->from('detalle_grupo_norma')
         ->select('detalle_grupo_norma.*')
         ->where('fkdetalle_grupo=? and fknorma=?', $datos['fkdetalle_grupo'],$datos['fknorma'])          
         ->fetch();   

         if($existe=="") $fluent->insertInto('detalle_grupo_norma', $datos)->execute();
       }

            $result=$fluent->from('detalle_grupo_norma dm')
                 ->join('detalle_grupo d on dm.fkdetalle_grupo=d.pkdetalle_grupo')
                 ->join('norma n on dm.fknorma=n.pknorma')
                 ->where('fkdetalle_grupo',$pkdetalle_grupo)
                 ->select("dm.fkdetalle_grupo,dm.fknorma,CONCAT_WS('-',n.codigo,n.gestion,n.acapite) as norma")      
         ->fetchAll();
        $html="";
                                       foreach ($result as $de) 
                                       {   
                                         $html.="<tr><td><input type='hidden' value='$de->fknorma' /></td>"; 
                                         $html.="<td><input type='hidden' value='$de->norma' />$de->norma</td>";
                                         $html.="<td><input type='hidden' value='$de->limite' />$de->limite</td>";
                                         $html.="<td><a href='#' onclick='QuitarEnsayoNorma($de->fkdetalle_grupo,$de->fknorma)' class='btn btn-outline btn-danger btn-circle'  style='color: darkred'><i class='fa fa-trash'></i></a></td></tr>";
                                       } 
     echo $html;  
     return;
}


if(isset($_POST['fkmatriz'])&&isset($_POST['fkgrupo'])) 
{
   $pkmatriz=$_POST['fkmatriz']; $refresh=$_POST['refresh'];
   
   $datos=array(
           'fkmatriz'=> $pkmatriz,
           'fkgrupo'=> $_POST['fkgrupo']
       );
   
   if($refresh=='no'){
   if(isset($_POST['delete'])) 
   {
         $fluent->deleteFrom('detalle_matriz_grupo')
                     ->where('fkmatriz=? and fkgrupo=?',$pkmatriz,$_POST['fkgrupo'])
                     ->execute();

   }else{ 
    $fluent->insertInto('detalle_matriz_grupo', $datos)->execute(); }
  }  

   $detalleG=$fluent
         ->from('detalle_matriz_grupo de')
         ->join('grupo_ensayo p on de.fkgrupo=p.pkgrupo_ensayo')
         ->join('matriz pr on de.fkmatriz=pr.pkmatriz')
         ->select('de.fkmatriz,de.fkgrupo,p.nombre as grupo,p.costo')
         ->where('de.fkmatriz',$pkmatriz)      
         ->fetchAll();
    
    $precios=$fluent
         ->from('detalle_matriz dm')
         ->select('SUM(dm.costo) as total')
         ->where('dm.fkmatriz',$pkmatriz)   
         ->fetch();
    $total=0;     
   $html="";       
                                  foreach ($detalleG as $de) 
                                       {   
                                         $html.="<tr id='grupo$de->fkgrupo'><td>$de->grupo</td>"; 
                                         $html.="<td>$de->costo</td>";
                                         $html.="<td><a href='#' onclick='QuitarGrupo($de->fkmatriz,$de->fkgrupo)' class='btn btn-outline btn-danger btn-circle'  style='color: darkred'><i class='fa fa-trash'></i></a></td></tr>";
                                         $total=$total+$de->costo;
                                       }

                                    $total=$precios->total+$total;
                                    $html.="<tr><td colspan='5'><label style='color: #800000; font-size: 20px'>Precio total:$total</label></td></tr>";    
        echo $html;
         return;
}

?>