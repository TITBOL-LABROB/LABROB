<?php
  $estaPrecio=false;
?>

<h1 class="page-header"><i class="fa fa-table fa-fw fa-2x"></i>Matriz</h1>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a class="btn btn-primary" href="?c=matriz&a=nuevo"><i class="fa fa-plus"></i> Nueva Matriz</a>
            </div>
            <div class="panel-body" style="overflow: scroll; height: 450px">
                <div class="panel-group" id="accordion">
                    <?php foreach ($lista as $r): ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" style="color:#337ab7" href="#<?php echo $r->pkmatriz; ?>"><?php echo $r->nombre; ?> <i class="fa fa-angle-down"></i></a>
                                <div class="pull-right">
                                    <a href="?c=matriz&a=editar&id=<?php echo $r->pkmatriz; ?>" style="color: #263340"><i class="fa fa-pencil"></i> Cambiar Nombre</a>
                                    <a href="#" onclick="eliminar('<?php echo $r->pkmatriz; ?>','<?php echo $r->nombre;?>','matriz')" style="color: darkred"><i class="fa fa-trash"></i> Eliminar Matriz</a>
                                </div>
                            </div>
                            <div id="<?php echo $r->pkmatriz; ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="btn-group">
                                        <select  class="parcmb" id="parcmb<?php echo $r->pkmatriz; ?>">
                                            <?php foreach ($ensayos as $p): ?>
                                                <option value='<?php echo $p->pkensayo;?>'><?php echo $p->nombre;?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <select  class="parcmb" id="parcmb2<?php echo $r->pkmatriz; ?>">
                                            <?php foreach ($metodos as $m): ?>
                                                <option value='<?php echo $m->pkmetodo;?>'><?php echo $m->nombre." #".$m->palabras_claves;?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <a href="#" onclick="Agregarensayomatriz('<?php echo $r->pkmatriz; ?>','parcmb<?php echo $r->pkmatriz; ?>','parcmb2<?php echo $r->pkmatriz; ?>')" class="btn btn-outline btn-primary" id="agregar<?php echo $r->pkmatriz; ?>"><i class="fa fa-plus"></i> Agregar Ensayo</a>

                                    </div>

                                    <div class="btn-group" style="float: right;">
                                     <select  class="parcmb" id="parcmbG<?php echo $r->pkmatriz; ?>">
                                            <?php foreach ($grupos as $g): ?>
                                                <option value='<?php echo $g->pkgrupo_ensayo;?>'><?php echo $g->nombre;?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <a href="#" onclick="AgregarGrupo('<?php echo $r->pkmatriz; ?>','parcmbG<?php echo $r->pkmatriz;?>','no')" class="btn btn-outline btn-primary" id="agregar<?php echo $r->pkmatriz; ?>"><i class="fa fa-plus"></i> Agregar Grupo</a>   
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
                                            <tbody id="tablaM<?php echo $r->pkmatriz; ?>">
                                            <?php foreach ($detalle as $d): ?>
                                                <?php if ($d->fkmatriz == $r->pkmatriz){ ?>
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
                                                                    <a href="#" onclick="Quitarensayo('<?php echo $r->pkmatriz; ?>','<?php echo $r->nombre; ?>' ,'<?php echo $d->fkensayo; ?>','<?php echo $d->ensayo; ?>')" class="btn btn-outline btn-danger btn-circle"  style="color: darkred"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                <?php } ?>
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
                                            <tbody id="tablaMG<?php echo $r->pkmatriz; ?>">
                                                  <?php foreach ($detalleG as $dg): ?>
                                                <?php if ($dg->fkmatriz == $r->pkmatriz){ ?>
                                                         <tr id="grupo<?php echo $dg->fkgrupo;?>">
                                                             <td><?php echo $dg->grupo;?></td>
                                                             <td><?php echo $dg->costo;?></td>
                                                             <td><a href="#" onclick="QuitarGrupo('<?php echo $dg->fkmatriz; ?>','<?php echo $dg->fkgrupo; ?>')" class="btn btn-outline btn-danger btn-circle"  style="color: darkred"><i class="fa fa-trash"></i></a>
                                                             </td>
                                                         </tr>
                                                <?php } ?>
                                                <?php endforeach ?> 

                                                <tr>
                                                <td colspan="5">
                                                    <?php foreach ($precios as $pr): $estaPrecio=false;  ?>
                                                     <?php foreach ($precioG as $pg): ?>
                                                        <?php if ($pr->fkmatriz == $r->pkmatriz && $pg->fkmatriz==$r->pkmatriz){ ?>
                                                            <label style="color: #800000; font-size: 20px">Precio total: <?php echo $pr->total+$pg->total; $estaPrecio=true; ?></label>
                                                        <?php } ?>
                                                             <?php if ($pr->fkmatriz == $r->pkmatriz && !$estaPrecio
                                                             ){ ?>
                                                              <label style="color: #800000; font-size: 20px">Precio total: <?php echo $pr->total; $estaPrecio=true; ?></label>
                                                        <?php } ?>
                                                      <?php endforeach ?>  
                                                    <?php endforeach ?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                     </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div >
</div>
<div id="modals"></div>
<!-- jQuery para buscador y paginacion-->
<script src="resources/bower_components/jquery/dist/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.parcmb').multiselect({
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            filterPlaceholder: 'Buscar',
            maxHeight:'500'
        });
         $('.parcmb4').multiselect({
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            filterPlaceholder: 'Buscar',
            maxHeight:'500'
        });
    });
function AgregarNormaEnsayo(pkdetalle_matriz,idcmb3)
{
   var pknorma =  $('#'+idcmb3).val();
   var limite =  $('#limite2'+pkdetalle_matriz).val();
   if(limite==''){ alert('Ingrese el Limite'); return;}
   var datos = {
                    pkdetalle_matriz: pkdetalle_matriz,
                    pknorma: pknorma,
                    limite: limite
                };

                $.ajax({
                data:  datos,
                url:   'model/AddTipo.php',
                type:  'post',
                success:function (response) {

                        $('#norma'+pkdetalle_matriz).html(response);
                }
              })
}

function CreateModalHtml()
{
 html= "<div id='myModal' class='modal fade' role='dialog'> "+
   "<div class='modal-dialog'>"+
    "<div class='modal-content'>"+
      "<div class='modal-header'>"+
        "<button type='button' class='close' data-dismiss='modal' >&times;</button>"+
        "<h4 style='text-align: center;' class='modal-title'> Normas Asociadas al ensayo: </h4>"+
      "</div>"+
      "<div class='modal-body'>"+
                        "<div class='btn-group' style='margin: center;'>"+  
                             "<select  class='parcmb4' id='parcmb3'>"+
                                      
                             "</select>"+
                              "<input id='limite2 id_pakdetallematriz' type='text' required class='btn btn-outline' placeholder='Ingrese el Limite' />"+
                                "<a href='#' onclick='AgregarNormaEnsayo('idpakdetallematriz','parcmb3idpakdetallematriz')' class='btn btn-outline btn-primary' id='agregar idpakdetallematriz'><i class='fa fa-plus'></i> Agregar Norma</a>"+
                                     "</div>"+   
        "<div class='table-responsive'>"+
                                        "<table class='table' >"+
                                            "<thead>"+
                                            "<tr>"+
                                                "<th></th>"+
                                                "<th>Normas</th>"+
                                                "<th>Limite</th>"+
                                                "<th></th>"+
                                            "</tr>"+
                                            "</thead>"+
                                            "<tbody id='norma idpakdetallematriz'>"+
                                            "<tr><td><input type='hidden' value='fknorma' /></td>"+
                                                "<td><input type='hidden' value='norma' /></td>"+
                                                "<td><input type='hidden' value='limite' /></td>"+
                                                        "</tr>"+
                                            "</tbody>"+
                                        "</table>"+
      "</div>"+
     "</div>"+
      "<div class='modal-footer' >"+
        "<button type='button' class='btn btn-default' data-dismiss='modal' style='background-color:#F64;color: #FFF; '>Cerrar</button>"+
      "</div>"+
  "</div>"+
"</div>"+
"</div>";
   $('#modals').append(html);
}

function QuitarEnsayoNorma(pkdetalle_matriz,pknorma)
{
   var datos = {    
                    delete: 'si',
                    pkdetalle_matriz: pkdetalle_matriz,
                    pknorma: pknorma
                };

                $.ajax({
                data:  datos,
                url:   'model/AddTipo.php',
                type:  'post',
                success:function (response) {

                        $('#norma'+pkdetalle_matriz).html(response);
                }
              })
}

    function Agregarensayomatriz(pkmatriz,idcmb,idcmb2){
        var pkensayo =  $('#'+idcmb).val();
        var pkmetodo =  $('#'+idcmb2).val();
        
        var existe=$('#tablaM'+pkmatriz+' #ensayo'+pkensayo).attr('id');

        console.log(existe);
        if(existe!=null)return;
        
        var id=0;
        var datos = { 
                    fkmatriz: pkmatriz,   
                    fkensayo: pkensayo,
                    fkmetodo: pkmetodo
                };


               $.ajax({
                data:   datos,
                url:   'model/AddEnsayos.php',
                type:  'post',
                success:function (response) {
                        $('#tablaM'+pkmatriz).html(response);
                       // console.log('html');

                      $.post("model/AddTipo.php", {getLast:pkmatriz}, function (detalle) {
                        $.each(detalle, function (index, values) {
                              id=values.id;
                        });
                        $('#tablaM'+pkmatriz+' #myModal'+id).modal("show"); 
                    }, 'json');

                }
              })
        AgregarGrupo(pkmatriz,1,'si');
    }

    function Quitarensayo(pkmatriz, ts, pkensayo, p){
        swal({
                title: 'Quitar '+ p,
                text: '¿Esta seguro que desea quitar el ensayo ' + p + ' de la matriz ' + ts + '?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: 'No',
                confirmButtonClass: 'confirm-class',
                cancelButtonClass: 'cancel-class',
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    var ubicacion = '?c=matriz&a=Quitarensayo&pkmatriz='+pkmatriz+'&pkensayo='+pkensayo;
                    window.location = ubicacion;
                }
            }
        );
    }

 function AgregarGrupo(pkmatriz,idcmb,refresh){
        var pkgrupo =  $('#'+idcmb).val();
        var existe=$('#tablaMG'+pkmatriz+' #grupo'+pkgrupo).attr('id');

        console.log(existe); 
        if(existe!=null)return;
        var datos = {
                    refresh:  refresh,  
                    fkmatriz: pkmatriz,   
                    fkgrupo:  pkgrupo
                };

               $.ajax({
                data:   datos,
                url:   'model/AddTipo.php',
                type:  'post',
                success:function (response) {
                        $('#tablaMG'+pkmatriz).html(response);
                        console.log(response);
                }
              })
    }

    function QuitarGrupo(pkmatriz,pkgrupo){
       
        var datos = { 
                    refresh : 'no',
                    delete : 'si',
                    fkmatriz: pkmatriz,   
                    fkgrupo: pkgrupo
                };

               $.ajax({
                data:   datos,
                url:   'model/AddTipo.php',
                type:  'post',
                success:function (response) {
                        $('#tablaMG'+pkmatriz).html(response);
                        console.log(response);
                }
              })
    }   
</script>