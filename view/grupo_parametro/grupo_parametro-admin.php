<h1 class="page-header"><i class="fa fa-wrench fa-fw fa-2x"></i>Grupo de Parametros</h1>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a class="btn btn-primary" href="?c=grupo_parametro&a=nuevo"><i class="fa fa-plus"></i> Nuevo Grupo de Parametros</a>
            </div>
            <div class="panel-body" style="overflow: scroll; height: 450px">
                <div class="panel-group" id="accordion">
                    <?php foreach ($lista as $r): ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" style="color:#337ab7" href="#<?php echo $r->pkgrupo_parametro; ?>"><?php echo $r->nombre; ?> <i class="fa fa-angle-down"></i></a>
                                <div class="pull-right">
                                    <a href="?c=grupo_parametro&a=editar&id=<?php echo $r->pkgrupo_parametro; ?>" style="color: #263340"><i class="fa fa-pencil"></i> Cambiar Nombre</a>
                                    <a href="#" onclick="eliminar('<?php echo $r->pkgrupo_parametro; ?>','<?php echo $r->nombre;?>','grupo_parametro')" style="color: darkred"><i class="fa fa-trash"></i> Eliminar grupo</a>
                                </div>
                            </div>
                            <div id="<?php echo $r->pkgrupo_parametro; ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="btn-group">
                                        <select class="parcmb" id="parcmb<?php echo $r->pkgrupo_parametro; ?>">
                                            <?php foreach ($parametros as $p): ?>
                                                <option value='<?php echo $p->pkparametro;?>'><?php echo $p->nombre;?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <a href="#" onclick="AgregarParametro('<?php echo $r->pkgrupo_parametro; ?>','parcmb<?php echo $r->pkgrupo_parametro; ?>')" class="btn btn-outline btn-primary" id="agregar<?php echo $r->pkgrupo_parametro; ?>"><i class="fa fa-plus"></i> Agregar Parametro</a>
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
                                                <?php if ($d->fkgrupo == $r->pkgrupo_parametro){ ?>
                                                    <?php foreach ($parametros as $p): ?>
                                                        <?php if ($p->pkparametro == $d->fkparametro){ ?>
                                                            <tr>
                                                                <td><?php echo $p->nombre; ?></td>
                                                                <td><?php echo $p->costo; ?></td>
                                                                <td>
                                                                    <a href="#" onclick="QuitarParametro('<?php echo $r->pkgrupo_parametro; ?>','<?php echo $r->nombre; ?>' ,'<?php echo $p->pkparametro; ?>','<?php echo $p->nombre; ?>')" class="btn btn-outline btn-danger btn-circle"  style="color: darkred"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    <?php endforeach ?>
                                                <?php } ?>
                                            <?php endforeach ?>
                                            <tr>
                                                <td colspan="5">
                                                    <?php foreach ($precios as $pr): ?>
                                                        <?php if ($pr->fkgrupo == $r->pkgrupo_parametro){ ?>
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

    function AgregarParametro(pkgrupo_parametro,idcmb){
        $('#agregar'+pkgrupo_parametro).html("<i class='fa fa-spinner fa-spin'></i> Agregar Parametro");
        $('#agregar'+pkgrupo_parametro).attr("disabled", "disabled");
        var pkparametro =  $('#'+idcmb).val();
        var ubicacion = '?c=grupo_parametro&a=AgregarParametro&pkgrupo_parametro='+pkgrupo_parametro+'&pkparametro='+pkparametro;
        window.location = ubicacion;
    }

    function QuitarParametro(pkgrupo_parametro, ts, pkparametro, p){
        swal({
                title: 'Quitar '+ p,
                text: '¿Esta seguro que desea quitar el parametro ' + p + ' del grupo ' + ts + '?',
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
                    var ubicacion = '?c=grupo_parametro&a=QuitarParametro&pkgrupo_parametro='+pkgrupo_parametro+'&pkparametro='+pkparametro;
                    window.location = ubicacion;
                }
            }
        );
    }
</script>