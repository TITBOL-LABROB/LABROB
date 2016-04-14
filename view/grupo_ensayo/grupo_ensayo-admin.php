<h1 class="page-header"><i class="fa fa-wrench fa-fw fa-2x"></i>Grupo de Ensayos</h1>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a class="btn btn-primary" href="?c=grupo_ensayo&a=nuevo"><i class="fa fa-plus"></i> Nuevo Grupo de Ensayos</a>
            </div>
            <div class="panel-body" style="overflow: scroll; height: 450px">
                <div class="panel-group" id="accordion">
                    <?php foreach ($lista as $r): ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" style="color:#337ab7" href="#<?php echo $r->pkgrupo_ensayo; ?>"><?php echo $r->nombre; ?> <i class="fa fa-angle-down"></i></a>
                                <div class="pull-right">
                                    <a href="?c=grupo_ensayo&a=editar&id=<?php echo $r->pkgrupo_ensayo; ?>" style="color: #263340"><i class="fa fa-pencil"></i> Cambiar Nombre</a>
                                    <a href="#" onclick="eliminar('<?php echo $r->pkgrupo_ensayo; ?>','<?php echo $r->nombre;?>','grupo_ensayo')" style="color: darkred"><i class="fa fa-trash"></i> Eliminar grupo</a>
                                </div>
                            </div>
                            <div id="<?php echo $r->pkgrupo_ensayo; ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="btn-group">
                                        <select class="parcmb" id="parcmb<?php echo $r->pkgrupo_ensayo; ?>">
                                            <?php foreach ($ensayos as $p): ?>
                                                <option value='<?php echo $p->pkensayo;?>'><?php echo $p->nombre;?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <a href="#" onclick="Agregarensayo('<?php echo $r->pkgrupo_ensayo; ?>','parcmb<?php echo $r->pkgrupo_ensayo; ?>')" class="btn btn-outline btn-primary" id="agregar<?php echo $r->pkgrupo_ensayo; ?>"><i class="fa fa-plus"></i> Agregar ensayo</a>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table" >
                                            <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Costo</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($detalle as $d): ?>
                                                <?php if ($d->fkgrupo == $r->pkgrupo_ensayo){ ?>
                                                    <?php foreach ($ensayos as $p): ?>
                                                        <?php if ($p->pkensayo == $d->fkensayo){ ?>
                                                            <tr>
                                                                <td><?php echo $p->nombre; ?></td>
                                                                <td><?php echo $p->costo; ?></td>
                                                                <td>
                                                                    <a href="#" onclick="Quitarensayo('<?php echo $r->pkgrupo_ensayo; ?>','<?php echo $r->nombre; ?>' ,'<?php echo $p->pkensayo; ?>','<?php echo $p->nombre; ?>')" class="btn btn-outline btn-danger btn-circle"  style="color: darkred"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    <?php endforeach ?>
                                                <?php } ?>
                                            <?php endforeach ?>
                                            <tr>
                                                <td colspan="5">
                                                    <?php foreach ($precios as $pr): ?>
                                                        <?php if ($pr->fkgrupo == $r->pkgrupo_ensayo){ ?>
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
</div>
<!-- jQuery para buscador y paginacion-->
<script src="resources/bower_components/jquery/dist/jquery.min.js"></script>
<script>
    $(document).ready(function() {
      /*  $('.parcmb').multiselect({
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            filterPlaceholder: 'Buscar'
        });*/
    });

    function Agregarensayo(pkgrupo_ensayo,idcmb){
        $('#agregar'+pkgrupo_ensayo).html("<i class='fa fa-spinner fa-spin'></i> Agregar ensayo");
        $('#agregar'+pkgrupo_ensayo).attr("disabled", "disabled");
        var pkensayo =  $('#'+idcmb).val();
        var ubicacion = '?c=grupo_ensayo&a=Agregarensayo&pkgrupo_ensayo='+pkgrupo_ensayo+'&pkensayo='+pkensayo;
        window.location = ubicacion;
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