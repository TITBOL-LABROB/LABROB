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
        $fluent->insertInto('detalle_matriz_norma', $datos)->execute();
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
                                             $html.="<tr><td>".$de->norma."</td>";
                                             $html.="<td>".$de->limite."</td>";
                                             $html.="<td>
                                                        <a href='#' onclick='QuitarEnsayoNorma($de->fkdetalle_matriz,$de->fknorma)' class='btn btn-outline btn-danger btn-circle'  style='color: darkred'><i class='fa fa-trash'></i></a>
                                                    </td></tr>";
                                       } 
     echo $html;  
     return;
}

?>