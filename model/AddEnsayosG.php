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

 if(isset($_POST['fkgrupo_ensayo'])&&isset($_POST['fkensayo'])&&isset($_POST['fkmetodo'])) {
  $pkensayo=$_POST['fkensayo'];
  $fkgrupo_ensayo=$_POST['fkgrupo_ensayo'];
   $ensayo=$fluent
         ->from('ensayo')
         ->select('ensayo.*')
         ->where('pkensayo',$pkensayo)          
         ->fetch();
  $datos=array(
        'fkgrupo'=>$fkgrupo_ensayo,
        'fkensayo'=>$_POST['fkensayo'],
        'fkmetodo'=>$_POST['fkmetodo'],
        'costo'   =>$ensayo->costo
    );
     $fluent->insertInto('detalle_grupo', $datos)->execute();  
  }            

  $pkgrupo_ensayo=$_POST['fkgrupo_ensayo'];
  $detalle=null; $precios=null; $detalleN=null;$normas=null;
  $detalle=getDetalle($pkgrupo_ensayo,$fluent);
  $detalleN=getDetalleNorma($pkgrupo_ensayo,$fluent);
  $normas=getNormas($fluent);
  $precios=ListaPrecio($pkgrupo_ensayo,$fluent);

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
 function getDetalleNorma($pkgrupo_ensayo,$fluent) {
        try {
           return $fluent
         ->from('detalle_grupo_norma dm')
         ->join('detalle_grupo d on dm.fkdetalle_grupo=d.pkdetalle_grupo')
         ->join('norma n on dm.fknorma=n.pknorma')
         ->select("dm.fkdetalle_grupo,dm.fknorma,CONCAT_WS('-',n.codigo,n.gestion,n.acapite) as norma")->where('d.fkgrupo',$pkgrupo_ensayo)       
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

  function getDetalle($pkgrupo_ensayo,$fluent)
  {
        try {
          return $fluent
         ->from('detalle_grupo dm')
         ->join('ensayo p on dm.fkensayo=p.pkensayo')
         ->join('grupo_ensayo m on dm.fkgrupo=m.pkgrupo_ensayo')
         ->join('metodo me on dm.fkmetodo=me.pkmetodo')
         ->join('unidad_medida u on p.fkunidad=u.pkunidad')
         ->select('dm.fkgrupo,dm.fkensayo,p.nombre as ensayo,me.nombre as metodo,u.nombre as medida,m.nombre as grupo,dm.costo')
         ->where('dm.fkgrupo',$pkgrupo_ensayo)      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
  } 
function ListaPrecio($pkgrupo_ensayo,$fluent) {
        try {
           return $fluent
         ->from('detalle_grupo dm')
         ->join('ensayo p on dm.fkensayo=p.pkensayo')
         ->join('grupo_ensayo m on dm.fkgrupo=m.pkgrupo_ensayo')
         ->select('dm.fkgrupo,SUM(dm.costo) as total')
         ->where('dm.fkgrupo',$pkgrupo_ensayo)
         ->groupBy('dm.fkgrupo')      
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
                                                                <td><a href="#" class="btn btn-outline btn-info btn-circle" data-toggle="modal" data-target="#myModal<?php echo $d->pkdetalle_grupo;?>"><i class="fa fa-eye"></i></a>
<div id="myModal<?php echo $d->pkdetalle_grupo;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" >&times;</button>
        <h4 style="text-align: center;" class="modal-title">Normas Asociadas al ensayo: <?php echo " ".$d->ensayo; ?></h4>
      </div>
      <div class="modal-body">
                                     <div class="btn-group" style="margin: center;">  
                                       <select  class="parcmb" id="parcmb3<?php echo $d->pkdetalle_grupo; ?>">
                                            <?php foreach ($normas as $n): ?>
                                                <option value='<?php echo $n->pknorma;?>'><?php echo $n->codigo."-".$n->gestion."-".$n->acapite;?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <input id="limite2<?php echo $d->pkdetalle_grupo;?>" type="text" required class="btn btn-outline" placeholder="Ingrese el Limite" />
                                        <a href="#" onclick="AgregarNormaEnsayo('<?php echo $d->pkdetalle_grupo; ?>','parcmb3<?php echo $d->pkdetalle_grupo; ?>')" class="btn btn-outline btn-primary" id="agregar<?php echo $d->pkdetalle_grupo; ?>"><i class="fa fa-plus"></i> Agregar Norma</a>
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
                                            <tbody id="norma<?php echo $d->pkdetalle_grupo;?>">
                                            
                                                <?php foreach ($detalleN as $de) {
                                                    if($d->pkdetalle_grupo==$de->fkdetalle_grupo){ ?>
                                                        <tr><td><?php echo $de->norma;?></td>
                                                        <td><?php echo $de->limite; ?></td>
                                                        <td>
                                                                    <a href="#" onclick="QuitarEnsayoNorma('<?php echo $de->fkdetalle_grupo; ?>','<?php echo $de->fknorma; ?>')" class="btn btn-outline btn-danger btn-circle"  style="color: darkred"><i class="fa fa-trash"></i></a>
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
                                                                    <a href="#" onclick="Quitarensayo('<?php echo $pkgrupo_ensayo; ?>','grupo' ,'<?php echo $d->fkensayo; ?>','<?php echo $d->ensayo; ?>')" class="btn btn-outline btn-danger btn-circle"  style="color: darkred"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                            <?php endforeach ?>
                                            <tr>
                                                <td colspan="5">
                                                    <?php foreach ($precios as $pr): ?>
                                                        <?php if ($pr->fkgrupo == $pkgrupo_ensayo){ ?>
                                                            <label style="color: #800000; font-size: 20px">Precio total: <?php echo $pr->total; ?></label>
                                                        <?php } ?>
                                                    <?php endforeach ?>
                                                </td>
                                            </tr>
<script>
$(document).ready(function() {
   $('.parcmb').multiselect({
      enableFiltering: true,
      enableCaseInsensitiveFiltering: true,
      filterPlaceholder: 'Buscar'
    });
  });

                       
</script>                                            