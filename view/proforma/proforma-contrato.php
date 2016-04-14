<h1 class="page-header"><i class="fa fa-wrench fa-fw fa-2x"></i>Asignar Parametros</h1>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a class="btn btn-primary" href="?c=proforma&a=nuevo"><i class="fa fa-plus"></i> Nueva Proforma</a>
            </div>
            <div class="panel-body" style="overflow: scroll; height: 450px">
                <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               
                              <div class="row">
                               <div class="col-md-4"> 
                                <div class="form-group">
                                 <label>fecha</label>
                                 <input type="date" name="fecha" class="form-control" placeholder="Ingrese la Fecha" />
                                </div>
                               </div> 
                               <div class="col-md-4"> 
                                <div class="form-group">
                                <label>Cliente</label>
                                 <select class="form-control" name="pkcliente" ><?php
                                 foreach ($clientes as $c){ ?>
                                  <option value="<?php echo $c->pkcliente; ?>" ><?php echo $c->nombre_cliente; ?></option>
                                  <?php }  ?>
                                  </select>
                                </div>
                               </div>
                               <div class="col-md-4">  
                                <div class="form-group">
                                <label>Solicitante</label>
                                 <input type="text" name="Institucion" class="form-control"
                                    placeholder="Ingrese la Persona que lo solicita" required/>
                                </div>
                               </div>
                              </div>  
                            </div>
                            <div id="<?php echo $proformas->pkproforma; ?>" class="panel-body">
                                <div class="panel-body">
                                    <div class="btn-group">
                                        <select class="parcmb" id="parcmb<?php echo $proformas->pkproforma; ?>">
                                            <?php foreach ($proformas as $p): ?>
                                                <option value='<?php echo $p->pkproforma;?>'><?php echo $p->nombre;?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <a href="#" onclick="AgregarParametro('<?php echo $p->pkproforma; ?>','parcmb<?php echo $p->pkproforma; ?>')" class="btn btn-outline btn-primary" id="agregar<?php echo $p->pkproforma; ?>"><i class="fa fa-plus"></i> Agregar Parametro</a>
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
                                                <?php if ($d->fkproforma == $proformas->pkproforma){ ?>
                                                    <?php foreach ($parametros as $p): ?>
                                                        <?php if ($p->pkparametro == $d->fkparametro){ ?>
                                                            <tr>
                                                                <td><?php echo $p->nombre; ?></td>
                                                                <td><?php echo $p->costo; ?></td>
                                                                <td>
                                                                    <a href="#" onclick="QuitarParametro('<?php echo $proformas->pkproforma; ?>','<?php echo $proformas->nombre; ?>' ,'<?php echo $p->pkparametro; ?>','<?php echo $p->nombre; ?>')" class="btn btn-outline btn-danger btn-circle"  style="color: darkred"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    <?php endforeach ?>
                                                <?php } ?>
                                            <?php endforeach ?>
                                            <tr>
                                                <td colspan="5">
                                                    <?php foreach ($precios as $pr): ?>
                                                        <?php if ($pr->fkproforma == $proformas->pkproforma){ ?>
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

    function AgregarParametro(pkproforma,idcmb){
        $('#agregar'+pkproforma).html("<i class='fa fa-spinner fa-spin'></i> Agregar Parametro");
        $('#agregar'+pkproforma).attr("disabled", "disabled");
        var pkparametro =  $('#'+idcmb).val();
        var ubicacion = '?c=proforma&a=AgregarParametro&pkproforma='+pkproforma+'&pkparametro='+pkparametro;
        window.location = ubicacion;
    }

    function QuitarParametro(pkproforma, ts, pkparametro, p){
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
                    var ubicacion = '?c=proforma&a=QuitarParametro&pkproforma='+pkproforma+'&pkparametro='+pkparametro;
                    window.location = ubicacion;
                }
            }
        );
    }
</script>