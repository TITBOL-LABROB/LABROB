
<h1 class="page-header"><i class="fa fa-wrench fa-fw fa-2x"></i>Grupo Ensayo</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a class="btn btn-primary" href="?c=grupo_ensayo&a=nuevo"><i class="fa fa-plus"></i> Nuevo Grupo Ensayo</a>
            </div>
            <div class="panel-body" style="overflow: scroll; height: 450px">
                <div class="panel-group" id="accordion">
                    <?php foreach ($lista as $r): ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                             <a data-toggle="collapse" data-parent="#accordion" style="color:#337ab7" href="#G<?php echo $r->pkgrupo_ensayo;?>"><?php echo $r->nombre; ?> <i class="fa fa-angle-down"></i></a>
                                <div class="pull-right">
                                    <a href="?c=grupo_ensayo&a=editar&id=<?php echo $r->pkgrupo_ensayo; ?>" style="color: #263340"><i class="fa fa-pencil"></i> Cambiar Nombre</a>
                                    <a href="#" onclick="eliminar('<?php echo $r->pkgrupo_ensayo; ?>','<?php echo $r->nombre;?>','grupo_ensayo')" style="color: darkred"><i class="fa fa-trash"></i> Eliminar grupo</a>
                                </div>
                            </div>
                            <div id="G<?php echo $r->pkgrupo_ensayo;?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="btn-group">
                                        <select  class="parcmb" id="parcmb<?php echo $r->pkgrupo_ensayo; ?>">
                                            <?php foreach ($ensayos as $p): ?>
                                                <option value='<?php echo $p->pkensayo;?>'><?php echo $p->nombre;?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <select  class="parcmb" id="parcmb2<?php echo $r->pkgrupo_ensayo; ?>">
                                            <?php foreach ($metodos as $m): ?>
                                                <option value='<?php echo $m->pkmetodo;?>'><?php echo $m->nombre." #".$m->palabras_claves;?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <a href="#" onclick="Agregarensayo('<?php echo $r->pkgrupo_ensayo; ?>','parcmb<?php echo $r->pkgrupo_ensayo; ?>','parcmb2<?php echo $r->pkgrupo_ensayo; ?>')" class="btn btn-outline btn-primary" id="agregar<?php echo $r->pkgrupo_ensayo; ?>"><i class="fa fa-plus"></i> Agregar ensayo</a>
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
                                            <tbody id="tablaG<?php echo $r->pkgrupo_ensayo;?>">
                                            <?php foreach ($detalle as $d): ?>
                                                <?php if ($d->fkgrupo == $r->pkgrupo_ensayo){ ?>
                                                            <tr id="<?php echo $d->fkensayo;?>">
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
                                                        <tr><td><input type="hidden" value="<?php echo $de->fknorma; ?>" /></td>
                                                        <td><input type="hidden" value="<?php echo $de->norma; ?>" /><?php echo $de->norma;?></td>
                                                        <td><input type="hidden" value="<?php echo $de->limite ?>" /><?php echo $de->limite; ?></td>
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
                                                           <a href="#" onclick="Quitarensayo('<?php echo $r->pkgrupo_ensayo; ?>','<?php echo $r->nombre; ?>' ,'<?php echo $p->pkensayo; ?>','<?php echo $p->nombre; ?>')" class="btn btn-outline btn-danger btn-circle"  style="color: darkred;"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                <?php } ?>
                                            <?php endforeach ?>
                                            <tr>
                                                <td colspan="5">
                                                    <?php foreach ($precios as $pr): ?>
                                                        <?php if ($pr->pkgrupo_ensayo == $r->pkgrupo_ensayo){ ?>
                                                            <label style="color: #800000; font-size: 20px">Precio total: <?php echo $pr->costo; ?></label>
                                                        <?php } ?>
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
    </div>
</div>
<!-- jQuery para buscador y paginacion-->
<script src="resources/bower_components/jquery/dist/jquery.min.js"></script>
<script>
    $(document).ready(function() {
       $('.parcmb').multiselect({
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            filterPlaceholder: 'Buscar'
        });
    });

function AgregarNormaEnsayo(pkdetalle_grupo,idcmb3)
{
   var pknorma =  $('#'+idcmb3).val();
   var limite =  $('#limite2'+pkdetalle_grupo).val();
   if(limite==''){ alert('Ingrese el Limite'); return;}

   var datos = {
                    pkdetalle_grupo: pkdetalle_grupo,
                    pknorma: pknorma,
                    limite: limite
                };

                $.ajax({
                data:  datos,
                url:   'model/AddTipo.php',
                type:  'post',
                success:function (response) {

                        $('#norma'+pkdetalle_grupo).html(response);
                }
              })
}

function QuitarEnsayoNorma(pkdetalle_grupo,pknorma)
{
   var datos = {    
                    delete: 'si',
                    pkdetalle_grupo: pkdetalle_grupo,
                    pknorma: pknorma
                };
               console.log(datos);
                $.ajax({
                data:  datos,
                url:   'model/AddTipo.php',
                type:  'post',
                success:function (response) {
                        $('#norma'+pkdetalle_grupo).html(response);
                }
              })
}

function Agregarensayo(pkgrupo_ensayo,idcmb,idcmb2){
        var pkensayo =  $('#'+idcmb).val();
        var pkmetodo =  $('#'+idcmb2).val();
        var existe=$('#tablaG'+pkgrupo_ensayo+' #ensayo'+pkensayo).attr('id');

        console.log(existe);
        if(existe!=null)return;
        
        var id=0;
        var datos = { 
                    fkgrupo_ensayo: pkgrupo_ensayo,   
                    fkensayo: pkensayo,
                    fkmetodo: pkmetodo
                };
                console.log(datos);
               $.ajax({
                data:   datos,
                url:   'model/AddEnsayosG.php',
                type:  'post',
                success:function (response) {
                        $('#tablaG'+pkgrupo_ensayo).html(response);
                        console.log('html');

                      $.post("model/AddTipo.php", {getLastG:pkgrupo_ensayo}, function (detalle) {
                        $.each(detalle, function (index, values) {
                              id=values.id;
                        });
                        $('#tablaG'+pkgrupo_ensayo+' #myModal'+id).modal("show"); 
                    }, 'json');

                }
              })
    }

    function Quitarensayo(pkgrupo_ensayo, ts, pkensayo, p){
        swal({
                title: 'Quitar '+ p,
                text: '¿Esta seguro que desea quitar el ensayo ' + p + ' del grupo ' + ts + '?',
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
                    var ubicacion = '?c=grupo_ensayo&a=Quitarensayo&pkgrupo_ensayo='+pkgrupo_ensayo+'&pkensayo='+pkensayo;
                    window.location = ubicacion;
                }
            }
        );
    }
</script>