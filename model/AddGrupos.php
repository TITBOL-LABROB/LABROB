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

  $pkgrupo_ensayo=$_POST['grupos'];
  $grupo=getgrupo($pkgrupo_ensayo,$fluent);
  $detalle=getDetalle($pkgrupo_ensayo,$fluent);
  $ensayos=getEnsayos($fluent);
  Viewhtml($grupo,$detalle,$ensayos);

  function getgrupo($pkgrupo_ensayo,$fluent)
  { 
  	try 
        {
           return $fluent
         ->from('grupo_ensayo')
         ->select('grupo_ensayo.*')
         ->where('pkgrupo_ensayo',$pkgrupo_ensayo)          
         ->fetch();
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
         ->join('metodo me on p.fkmetodo=me.pkmetodo')
         ->join('unidad_medida u on p.fkunidad=u.pkunidad')
         ->select('dm.fkgrupo,dm.fkensayo,p.nombre as ensayo,me.nombre as metodo,u.nombre as medida,m.nombre as grupo,dm.costo')
         ->where('dm.fkgrupo',$pkgrupo_ensayo)      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
  }      
  
  function getEnsayos($fluent)
  {
        try {
           return $fluent
                      ->from('ensayo p')
                      ->Join('unidad_medida u on u.pkunidad=p.fkunidad')
                      ->Join('metodo m on m.pkmetodo=p.fkmetodo')
                      ->Join('unidad_medida u on u.pkunidad=p.fkunidad')
                      ->Join('area l on l.pkarea=p.fkarea')
                      ->select('p.*,u.nombre as medida,m.nombre as metodo,l.nombre as area,u.nombre as medida,p.costo')
                      ->where('p.estado=1')  
                      ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
 }

 ?>

 <?php function Viewhtml($grupo,$detalle,$ensayos) {?>           

                     <div class="panel panel-default" id="grupo<?php echo $grupo->pkgrupo_ensayo;?>">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordionG" style="color:#337ab7" href="#G<?php echo $grupo->pkgrupo_ensayo; ?>"><?php echo $grupo->nombre; ?> <i class="fa fa-angle-down"></i></a>
                                 <a style="color:#337ab7; text-decoration: none; padding:0% 15%; " href="#G<?php echo $grupo->pkgrupo_ensayo; ?>">  Costo :<?php echo $grupo->costo; ?><i class="fa fa-usd"></i></a>
                               <div class="pull-right">
                                    <a href="#" onclick="EliminarGrupo('<?php echo $grupo->pkgrupo_ensayo; ?>')" style="color: darkred"><i class="fa fa-trash"></i> Eliminar Grupo</a>
                                </div> 
                            </div>
                            <div id="G<?php echo $grupo->pkgrupo_ensayo; ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table" >
                                            <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Metodo</th>
                                                <th>U/Medida</th>
                                                <th>Costo</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="tablaG<?php echo $grupo->pkgrupo_ensayo;?>">
                                            <?php foreach ($detalle as $d): ?>
                                                <?php if ($d->fkgrupo == $grupo->pkgrupo_ensayo){ ?>
                                                    <?php foreach ($ensayos as $p): ?>
                                                        <?php if ($p->pkensayo == $d->fkensayo){ ?>
                                                            <tr id="<?php echo $p->pkensayo; ?>">
                                                                <td><?php echo $p->nombre; ?></td>
                                                                <td><?php echo $p->metodo; ?></td>
                                                                <td><?php echo $p->medida; ?></td>
                                                                <td><?php echo $p->costo; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    <?php endforeach ?>
                                                <?php } ?>
                                            <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                      <script>
                      	
                      	$(document).ready(function() {
                         $('.parcmb3').multiselect({
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            filterPlaceholder: 'Buscar'
        });
                      	});
                      </script>  
<?php  } ?>                                   