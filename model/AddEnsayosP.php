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

 if(isset($_POST['fkmatriz'])&&isset($_POST['fkensayo'])&&isset($_POST['fkmetodo'])&&isset($_POST['fkproforma'])) {
  $pkensayo=$_POST['fkensayo'];
  $pkproforma=$_POST['fkproforma'];
  $fkmatriz=$_POST['fkmatriz'];
   $ensayo=$fluent
         ->from('ensayo')
         ->select('ensayo.*')
         ->where('pkensayo',$pkensayo)          
         ->fetch();
  if(isset($_POST['delete']))
  {  
     $de=$fluent
         ->from('detalle_matriz_proforma d')
         ->select('d.*')
         ->where('d.fkproforma=? and d.fkmatriz=? and d.fkensayo=?',$pkproforma,$fkmatriz,$pkensayo)          
         ->fetch();

     $fluent->deleteFrom('detalle_matriz_norma_proforma')
                     ->where('fkdetalle_matriz', $de->pkdetalle_matriz)
                     ->execute();

     $fluent->deleteFrom('detalle_matriz_proforma')
                     ->where('fkproforma=? and fkmatriz=? and fkensayo=?', $pkproforma,$fkmatriz,$pkensayo)
                     ->execute();                       
  }else{
         
  $datos=array(
        'fkmatriz'=>$fkmatriz,
        'fkproforma'=>$pkproforma,
        'fkensayo'=>$_POST['fkensayo'],
        'fkmetodo'=>$_POST['fkmetodo'],
        'costo'   =>$ensayo->costo
    );
     $fluent->insertInto('detalle_matriz_proforma', $datos)->execute();   
   }
  }


  $pkmatriz=$_POST['fkmatriz'];
  $detalle=null; $precios=null; $detalleN=null;$normas=null;
  $detalle=getDetalle($pkproforma,$pkmatriz,$fluent);
  $detalleN=getDetalleNorma($pkproforma,$pkmatriz,$fluent);
  $normas=getNormas($fluent);
  $precios=ListaPrecio($pkproforma,$pkmatriz,$fluent);

  function getNormas($fluent) {
        try {
           return $fluent
         ->from('norma')
         ->select('norma.*')
         ->where('estado=1')          
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
 function getDetalleNorma($pkproforma,$pkmatriz,$fluent) {
        try {
           return $fluent
         ->from('detalle_matriz_norma_proforma dm')
         ->join('detalle_matriz_proforma d on dm.fkdetalle_matriz=d.pkdetalle_matriz')
         ->join('norma n on dm.fknorma=n.pknorma')
         ->select("dm.fkdetalle_matriz,dm.fknorma,CONCAT_WS('-',n.codigo,n.gestion,n.acapite) as norma")
         ->where('d.fkmatriz=? and d.fkproforma=?',$pkmatriz,$pkproforma)       
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

  function getDetalle($pkproforma,$pkmatriz,$fluent)
  {
        try {
          return $fluent
         ->from('detalle_matriz_proforma dm')
         ->join('ensayo p on dm.fkensayo=p.pkensayo')
         ->join('matriz m on dm.fkmatriz=m.pkmatriz')
         ->join('metodo me on dm.fkmetodo=me.pkmetodo')
         ->join('unidad_medida u on p.fkunidad=u.pkunidad')
         ->select('dm.fkmatriz,dm.fkensayo,p.nombre as ensayo,me.nombre as metodo,u.nombre as medida,m.nombre as matriz,dm.costo')
         ->where('dm.fkmatriz=? and dm.fkproforma=?',$pkmatriz,$pkproforma)      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
  } 
function ListaPrecio($pkproforma,$pkmatriz,$fluent) {
        try {
           return $fluent
         ->from('detalle_matriz_proforma dm')
         ->join('ensayo p on dm.fkensayo=p.pkensayo')
         ->join('matriz m on dm.fkmatriz=m.pkmatriz')
         ->select('dm.fkmatriz,SUM(dm.costo) as total')
         ->where('dm.fkmatriz=? and dm.fkproforma=?',$pkmatriz,$pkproforma)
         ->groupBy('dm.fkmatriz')      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }     
 
?>

<?php foreach ($detalle as $d): ?>
                                                            <tr id="ensayo<?php echo $d->fkensayo;?>">
                                                                <td><?php echo $d->ensayo; ?></td>
                                                                <td><?php echo $d->medida; ?></td>
                                                                <td><?php echo $d->metodo; ?></td>
                                                                <td><?php echo $d->costo; ?></td>
                                                                <td><a href="#" class="btn btn-outline btn-info btn-circle" data-toggle="modal" data-target="#myModal<?php echo $d->pkdetalle_matriz;?>"><i class="fa fa-eye"></i></a>
<div id="myModal<?php echo $d->pkdetalle_matriz;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" >&times;</button>
        <h4 style="text-align: center;" class="modal-title">Normas Asociadas al ensayo: <?php echo " ".$d->ensayo; ?></h4>
      </div>
      <div class="modal-body">
                                     <div class="btn-group" style="margin: center;">  
                                       <select  class="parcmb" id="parcmb3<?php echo $d->pkdetalle_matriz; ?>">
                                            <?php foreach ($normas as $n): ?>
                                                <option value='<?php echo $n->pknorma;?>'><?php echo $n->codigo."-".$n->gestion."-".$n->acapite;?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <input id="limite2<?php echo $d->pkdetalle_matriz;?>" type="text" required class="btn btn-outline" placeholder="Ingrese el Limite" />
                                        <a href="#" onclick="AgregarNormaEnsayo('<?php echo $d->pkdetalle_matriz; ?>','parcmb3<?php echo $d->pkdetalle_matriz; ?>')" class="btn btn-outline btn-primary" id="agregar<?php echo $d->pkdetalle_matriz; ?>"><i class="fa fa-plus"></i> Agregar Norma</a>
                                     </div>   
       

        <div class="table-responsive">
                                        <table class="table" >
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>Normas</th>
                                                <th>Limite</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="norma<?php echo $d->pkdetalle_matriz;?>">
                                            
                                                <?php foreach ($detalleN as $de) {
                                                    if($d->pkdetalle_matriz==$de->fkdetalle_matriz){ ?>
                                                        <tr><td><?php echo $de->norma;?></td>
                                                        <td><?php echo $de->limite; ?></td>
                                                        <td>
                                                                    <a href="#" onclick="QuitarEnsayoNorma('<?php echo $de->fkdetalle_matriz; ?>','<?php echo $de->fknorma; ?>')" class="btn btn-outline btn-danger btn-circle"  style="color: darkred"><i class="fa fa-trash"></i></a>
                                                                </td></tr>
                                               <?php } ?>
                                               <?php } ?>
                                            
                                            </tbody>
                                        </table>
      </div>
     </div>
      <div class="modal-footer" >
        <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#F64;color: #FFF; ">Cerrar</button>
      </div>
  </div>
</div>
</div>

                                                                </td>
                                                                <td>
                                                                    <a href="#" onclick="Quitarensayo('<?php echo $pkproforma;?>','<?php echo $pkmatriz; ?>','<?php echo $d->fkensayo;?>')" class="btn btn-outline btn-danger btn-circle"  style="color: darkred"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                            <?php endforeach ?>
                                            
<script>
$(document).ready(function() {
   $('.parcmb').multiselect({
      enableFiltering: true,
      enableCaseInsensitiveFiltering: true,
      filterPlaceholder: 'Buscar'
    });
  });

                       
</script>                                            