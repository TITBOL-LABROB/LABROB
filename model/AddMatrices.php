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

 $matriz=null;
 $ensayos=null;
 $precios=null;          

  $pkmatriz=$_POST['matrices'];
  $matriz=getMatriz($pkmatriz,$fluent);
  $detalle=getDetalle($pkmatriz,$fluent);
  $ensayos=getEnsayos($fluent);
  Viewhtml($matriz,$detalle,$ensayos,$precios);

  function getMatriz($pkmatriz,$fluent)
  { 
  	try 
        {
           return $fluent
         ->from('matriz')
         ->select('matriz.*')
         ->where('pkmatriz',$pkmatriz)          
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
  }

  function getDetalle($pkmatriz,$fluent)
  {
        try {
          return $fluent
         ->from('detalle_matriz dm')
         ->join('ensayo p on dm.fkensayo=p.pkensayo')
         ->join('matriz m on dm.fkmatriz=m.pkmatriz')
         ->join('metodo me on p.fkmetodo=me.pkmetodo')
         ->join('unidad_medida u on p.fkunidad=u.pkunidad')
         ->select('dm.fkmatriz,dm.fkensayo,p.nombre as ensayo,me.nombre as metodo,u.nombre as medida,m.nombre as matriz,dm.costo')
         ->where('dm.fkmatriz',$pkmatriz)      
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

 <?php function Viewhtml($matriz,$detalle,$ensayos,$precios) {?>           

                     <div class="panel panel-default" id="matriz<?php echo $matriz->pkmatriz;?>">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordionM" style="color:#337ab7" href="#M<?php echo $matriz->pkmatriz; ?>"><?php echo $matriz->nombre; ?> <i class="fa fa-angle-down"></i></a>
                               <div class="pull-right">
                                    <a href="#" onclick="EliminarMatriz('<?php echo $matriz->pkmatriz; ?>')" style="color: darkred"><i class="fa fa-trash"></i> Eliminar Matriz</a>
                                </div> 
                            </div>
                            <div id="M<?php echo $matriz->pkmatriz; ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="btn-group">
                                        <select  class="parcmb3" id="parcmb<?php echo $matriz->pkmatriz; ?>">
                                            <?php foreach ($ensayos as $p): ?>
                                                <option value='<?php echo $p->pkensayo;?>,<?php echo $p->nombre;?>,<?php echo $p->metodo;?>,<?php echo $p->medida;?>,<?php echo $p->costo;?>'><?php echo $p->nombre;?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <a href="#" onclick="AgregarEnsayoMatriz('<?php echo $matriz->pkmatriz?>','parcmb<?php echo $matriz->pkmatriz?>')" class="btn btn-outline btn-primary" id="agregarM<?php echo $matriz->pkmatriz; ?>"><i class="fa fa-plus"></i> Agregar ensayo</a>
                                    </div>
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
                                            <tbody id="tablaM<?php echo $matriz->pkmatriz;?>">
                                            <?php foreach ($detalle as $d): ?>
                                                <?php if ($d->fkmatriz == $matriz->pkmatriz){ ?>
                                                    <?php foreach ($ensayos as $p): ?>
                                                        <?php if ($p->pkensayo == $d->fkensayo){ ?>
                                                            <tr id="<?php echo $p->pkensayo; ?>">
                                                                <td><?php echo $p->nombre; ?></td>
                                                                <td><?php echo $p->metodo; ?></td>
                                                                <td><?php echo $p->medida; ?></td>
                                                                <td><?php echo $p->costo; ?></td>
                                                                <td>
                                                                    <a href="#" onclick="QuitarEnsayoMatriz('<?php echo $matriz->pkmatriz?>','<?php echo $p->pkensayo ?>')" class="btn btn-outline btn-danger btn-circle"  style="color: darkred"><i class="fa fa-trash"></i></a>
                                                                </td>
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