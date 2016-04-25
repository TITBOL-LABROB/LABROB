<h1 class="page-header"><i class="fa fa-wrench fa-fw fa-2x"></i>Matriz</h1>
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
                                        <input id="limite<?php echo $r->pkmatriz;?>" type="text" class="btn btn-outline" placeholder="Ingrese el Limite"></input>
                                        <select  class="parcmb" id="parcmb2<?php echo $r->pkmatriz; ?>">
                                            <?php foreach ($normas as $p): ?>
                                                <option value='<?php echo $p->pknorma;?>'><?php echo $p->codigo."-".$p->gestion."-".$p->acapite;?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <a href="#" onclick="Agregarensayomatriz('<?php echo $r->pkmatriz; ?>','parcmb<?php echo $r->pkmatriz; ?>','parcmb2<?php echo $r->pkmatriz; ?>')" class="btn btn-outline btn-primary" id="agregar<?php echo $r->pkmatriz; ?>"><i class="fa fa-plus"></i> Agregar ensayo</a>

                                    </div>
                                    
                                    <div class="table-responsive">
                                        <table class="table" >
                                            <thead>
                                            <tr>
                                                <th>Ensayo</th>
                                                <th>Norma</th>
                                                <th>Limite</th>
                                                <th>Costo</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($detalle as $d): ?>
                                                <?php if ($d->fkmatriz == $r->pkmatriz){ ?>
                                                    <?php foreach ($ensayos as $p): ?>
                                                        <?php if ($p->pkensayo == $d->fkensayo){ ?>
                                                            <tr>
                                                                <td><?php echo $p->nombre; ?></td>
                                                                <td><?php echo $d->norma; ?></td>
                                                                <td><?php echo $d->limite; ?></td>
                                                                <td><?php echo $p->costo; ?></td>
                                                                <td><a href="#" class="btn btn-outline btn-info btn-circle" data-toggle="modal" data-target="#myModal<?php echo $d->pkdetalle_matriz;?>"><i class="fa fa-eye"></i></a>

<div id="myModal<?php echo $d->pkdetalle_matriz;?>" class="modal fade" role="dialog" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" >&times;</button>
        <h4 style="text-align: center;" class="modal-title">Normas Asociadas al ensayo: <?php echo " ".$p->nombre; ?></h4>
      </div>
      <div class="modal-body">
                                     <div class="btn-group" style="margin: center;">  
                                       <select  class="parcmb" id="parcmb3<?php echo $d->pkdetalle_matriz; ?>">
                                            <?php foreach ($normas as $n): ?>
                                                <option value='<?php echo $n->pknorma;?>'><?php echo $n->codigo."-".$n->gestion."-".$n->acapite;?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <input id="limite2<?php echo $d->pkdetalle_matriz;?>" type="text" class="btn btn-outline" placeholder="Ingrese el Limite"></input>
                                        <a href="#" onclick="AgregarNormaEnsayo('<?php echo $d->pkdetalle_matriz; ?>','parcmb3<?php echo $d->pkdetalle_matriz; ?>')" class="btn btn-outline btn-primary" id="agregar<?php echo $d->pkdetalle_matriz; ?>"><i class="fa fa-plus"></i> Agregar Norma</a>
                                     </div>   
       

        <div class="table-responsive">
                                        <table class="table" >
                                            <thead>
                                            <tr>
                                                <th>Normas</th>
                                                <th>Limite</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="norma<?php echo $d->pkdetalle_matriz;?>">
                                            
                                                <?php foreach ($detalleN as $de) {
                                                    if($d->pkdetalle_matriz==$de->fkdetalle_matriz){
                                                        echo "<tr><td>".$de->norma."</td>";
                                                        echo "<td>".$de->limite."</td>"; ?>
                                                        <td>
                                                                    <a href="#" onclick="QuitarEnsayoNorma('<?php echo $de->fkdetalle_matriz; ?>','<?php echo $de->fknorma; ?>')" class="btn btn-outline btn-danger btn-circle"  style="color: darkred"><i class="fa fa-trash"></i></a>
                                                                </td></tr>
                                               <?php }} ?>
                                            
                                            </tbody>
                                        </table>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#F64;color: #FFF; ">Cerrar</button>
      </div>
    </div>

  </div>
</div>
</div>

                                                                </td>
                                                                <td>
                                                                    <a href="#" onclick="Quitarensayo('<?php echo $r->pkmatriz; ?>','<?php echo $r->nombre; ?>' ,'<?php echo $p->pkensayo; ?>','<?php echo $p->nombre; ?>')" class="btn btn-outline btn-danger btn-circle"  style="color: darkred"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    <?php endforeach ?>
                                                <?php } ?>
                                            <?php endforeach ?>
                                            <tr>
                                                <td colspan="5">
                                                    <?php foreach ($precios as $pr): ?>
                                                        <?php if ($pr->fkmatriz == $r->pkmatriz){ ?>
                                                            <label style="color: #800000; font-size: 20px">Precio total: <?php echo $pr->total; ?></label>
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
<!-- Modal -->

    
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
function AgregarNormaEnsayo(pkdetalle_matriz,idcmb3)
{
   var pknorma =  $('#'+idcmb3).val();
   var limite =  $('#limite2'+pkdetalle_matriz).val();

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
        $('#agregar'+pkmatriz).html("<i class='fa fa-spinner fa-spin'></i> Agregar ensayo");
        $('#agregar'+pkmatriz).attr("disabled", "disabled");
        var pkensayo =  $('#'+idcmb).val();
        var pknorma =  $('#'+idcmb2).val();
        var limite=$('#limite'+pkmatriz).val(); 
        var ubicacion = '?c=matriz&a=Agregarensayo&pkmatriz='+pkmatriz+'&pkensayo='+pkensayo+'&pknorma='+pknorma+'&limite='+limite;
        window.location = ubicacion;
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
</script>