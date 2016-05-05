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
  $pkproforma=$_POST['pkproforma'];
  $matriz=getMatriz($pkmatriz,$fluent);
  $detalle=getDetalle($pkproforma,$pkmatriz,$fluent);
  $ensayos=getEnsayos($fluent);
  $detalleN=getDetalleNorma($pkproforma,$pkmatriz,$fluent);
  $detalleG=getDetalleGrupo($pkproforma,$pkmatriz,$fluent);
  $normas=getNormas($fluent);
  $grupos=getGrupos($fluent);
  $precioG=ListaPrecio($pkproforma,$pkmatriz,$fluent);
  $precios=ListaPrecioM($pkproforma,$pkmatriz,$fluent);
  $metodos=getMetodos($fluent);
  Viewhtml($matriz,$detalle,$ensayos,$precioG,$precios,$normas,$metodos,$detalleN,$grupos,$detalleG,$pkproforma);

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

 function getGrupos($fluent) {
        try {
           return $fluent
         ->from('grupo_ensayo')
         ->select('grupo_ensayo.*')
         ->where('estado=1')          
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    } 

 function getDetalleGrupo($pkproforma,$pkmatriz,$fluent) {
        try {
           return $fluent
         ->from('detalle_matriz_grupo_proforma de')
         ->join('grupo_ensayo p on de.fkgrupo=p.pkgrupo_ensayo')
         ->join('matriz pr on de.fkmatriz=pr.pkmatriz')
         ->select('de.fkproforma,de.fkmatriz,de.fkgrupo,p.nombre as grupo,p.costo') 
         ->where('de.fkproforma=? and de.fkmatriz=?',$pkproforma,$pkmatriz)     
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

function ListaPrecioM($pkproforma,$pkmatriz,$fluent) {
        try {
           return $fluent
         ->from('detalle_matriz_proforma dm')
         ->select('dm.fkmatriz,SUM(dm.costo) as total')
         ->where('dm.fkproforma=? and dm.fkmatriz=?',$pkproforma,$pkmatriz)
         ->groupBy('dm.fkmatriz')    
         ->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

  function ListaPrecio($pkproforma,$pkmatriz,$fluent) {
        try {
           return $fluent
         ->from('detalle_matriz_grupo_proforma de')
         ->join('grupo_ensayo g on de.fkgrupo=g.pkgrupo_ensayo')
         ->select('de.fkmatriz,SUM(g.costo) as total')
         ->where('de.fkproforma=? and de.fkmatriz=?',$pkproforma,$pkmatriz) 
         ->groupBy('de.fkmatriz')     
         ->fetch();
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
         ->where('d.fkproforma=? and d.fkmatriz=?',$pkproforma,$pkmatriz)       
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
         ->where('dm.fkproforma=? and dm.fkmatriz=?',$pkproforma,$pkmatriz)      
         ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
  }      
  function getMetodos($fluent) {
        try {
           return $fluent
         ->from('metodo')
         ->select('metodo.*')
         ->where('estado=1')          
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
                      ->Join('area l on l.pkarea=p.fkarea')
                      ->select('p.*,u.nombre as medida,l.nombre as area,u.nombre as medida,p.costo')
                      ->where('p.estado=1')  
                      ->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
 }

 ?>

 <?php function Viewhtml($matriz,$detalle,$ensayos,$precioG,$precios,$normas,$metodos,$detalleN,$grupos,$detalleG,$pkproforma) {?>      

                     <div class="panel panel-default" id="matriz<?php echo $matriz->pkmatriz;?>">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordionM" style="color:#337ab7" href="#M<?php echo $matriz->pkmatriz; ?>"><?php echo $matriz->nombre; ?> <i class="fa fa-angle-down"></i></a>
                               <div class="pull-right">
                                    <a href="#" onclick="EliminarMatriz('<?php echo $pkproforma;?>','<?php echo $matriz->pkmatriz; ?>')" style="color: darkred"><i class="fa fa-trash"></i> Eliminar Matriz</a>
                                </div> 
                            </div>
                            <div id="M<?php echo $matriz->pkmatriz; ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="btn-group">
                                        <select  class="parcmb" id="parcmb<?php echo $matriz->pkmatriz; ?>">
                                            <?php foreach ($ensayos as $p): ?>
                                                <option value='<?php echo $p->pkensayo;?>'><?php echo $p->nombre;?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <select  class="parcmb" id="parcmb2<?php echo $matriz->pkmatriz; ?>">
                                            <?php foreach ($metodos as $m): ?>
                                                <option value='<?php echo $m->pkmetodo;?>'><?php echo $m->nombre." #".$m->palabras_claves;?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <a href="#" onclick="AgregarEnsayoMatriz('<?php echo $pkproforma;?>','<?php echo $matriz->pkmatriz; ?>','parcmb<?php echo $matriz->pkmatriz; ?>','parcmb2<?php echo $matriz->pkmatriz; ?>')" class="btn btn-outline btn-primary" id="agregar<?php echo $matriz->pkmatriz; ?>"><i class="fa fa-plus"></i> Agregar ensayo</a>
                                    </div>
                                    <div class="btn-group" style="float: right;">
                                     <select  class="parcmb" id="parcmbG<?php echo $matriz->pkmatriz; ?>">
                                            <?php foreach ($grupos as $g): ?>
                                                <option value='<?php echo $g->pkgrupo_ensayo;?>'><?php echo $g->nombre;?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <a href="#" onclick="AgregarGrupo('<?php echo $pkproforma;?>','<?php echo $matriz->pkmatriz; ?>','parcmbG<?php echo $matriz->pkmatriz;?>','no')" class="btn btn-outline btn-primary" id="agregar<?php echo $matriz->pkmatriz; ?>"><i class="fa fa-plus"></i> Agregar Grupo</a>   
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table" >
                                            <thead>
                                            <tr>
                                                <th>Ensayo</th>
                                                <th>U/Medida</th>
                                                <th>Metodo</th>
                                                <th>Costo</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="tablaM<?php echo $matriz->pkmatriz; ?>">
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
                                            
                                                <?php foreach ($detalleN as $de) { ?>
                                                      <?php if($de->fkdetalle_matriz==$d->pkdetalle_matriz){ ?>
                                                        <tr><td><input type="hidden" value="<?php echo $de->fknorma; ?>" /></td>
                                                        <td><input type="hidden" value="<?php echo $de->norma; ?>" /><?php echo $de->norma;?></td>
                                                        <td><input type="hidden" value="<?php echo $de->limite ?>" /><?php echo $de->limite; ?></td>
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
                                                                    <a href="#" onclick="Quitarensayo('<?php echo $pkproforma;?>','<?php echo $matriz->pkmatriz; ?>','<?php echo $d->fkensayo;?>')" class="btn btn-outline btn-danger btn-circle"  style="color: darkred"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                            <?php endforeach ?>
                                            
                                            </tbody>
                                        </table>
                                    </div>

                                     <div class="table-responsive">
                                        <table class="table" >
                                            <thead>
                                            <tr>
                                                <th>Grupo de Ensayo</th>
                                                <th>Costo</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="tablaMG<?php echo $matriz->pkmatriz; ?>">
                                                  <?php foreach ($detalleG as $dg): ?>
                                                         <tr id="grupo<?php echo $dg->fkgrupo;?>">
                                                             <td><?php echo $dg->grupo;?></td>
                                                             <td><?php echo $dg->costo;?></td>
                                                             <td><a href="#" onclick="QuitarGrupo('<?php echo $pkproforma;?>','<?php echo $dg->fkmatriz; ?>','<?php echo $dg->fkgrupo; ?>')" class="btn btn-outline btn-danger btn-circle"  style="color: darkred"><i class="fa fa-trash"></i></a>
                                                             </td>
                                                         </tr>
                                                <?php endforeach ?> 

                                                <tr>
                                                <td colspan="5">
                                                            <?php if($precioG!="") {?>
                                                            <label style="color: #800000; font-size: 20px">Precio total: <?php echo $precioG->total+$precios->total; $estaPrecio=true; ?></label>
                                                        <?php } else { ?>
                                                              <label style="color: #800000; font-size: 20px">Precio total: <?php echo $precios->total; ?></label>
                                                        <?php } ?>      
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
<script>
$(document).ready(function() {
   $('.parcmb').multiselect({
      enableFiltering: true,
      enableCaseInsensitiveFiltering: true,
      filterPlaceholder: 'Buscar'
    });
 	});

                       
</script>  
<?php  } ?>                                   