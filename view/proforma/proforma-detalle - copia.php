<h1 class="page-header"><i class="fa fa-wrench fa-fw fa-2x"></i>Asignar ensayos</h1>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
             <ol class="breadcrumb">
               <li><a href="?c=proforma" style="color: #263340";>Proforma</a></li>
             </ol>  
            </div>
            <div class="panel-body" style="overflow: scroll; height: 450px">
                <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               
                              <div class="row">
                               <div class="col-md-4"> 
                                <div class="form-group">
                                 <label>fecha</label>
                                 <input type="text" name="fecha" class="form-control" value="<?php echo $proformas->fecha; ?>" readonly />
                                </div>
                               </div> 
                               <div class="col-md-4"> 
                                <div class="form-group">
                                <label>Cliente</label>
                                 <input type="text" name="fecha" class="form-control" value="<?php
                                 foreach ($clientes as $c) 
                                 {
                                 	if($proformas->fkcliente==$c->pkcliente)
                                 	{
                                 		echo $c->nombre_cliente;
                                 	}
                                  }  ?>" readonly/>
                                </div>
                               </div>
                               <div class="col-md-4">  
                                <div class="form-group">
                                <label>Institucion</label>
                                 <input type="text" name="Institucion" class="form-control" value="<?php
                                 foreach ($instituciones as $i) 
                                 {
                                    if($proformas->fkinstitucion==$i->pkinstitucion)
                                    {
                                        echo $i->nombre;
                                    }
                                  }  ?>" readonly/>
                                </div>
                               </div>
                              </div>  
                            </div>
                            <div id="<?php echo $proformas->pkproforma; ?>" class="panel-body">
                                <div class="panel-body">
                                    <div class="btn-group">
                                        <select class="parcmb" id="parcmb<?php echo $proformas->pkproforma; ?>">
                                            <?php foreach ($grupos as $p): ?>
                                                <option value='<?php echo $p->grupos;?>'><?php echo $p->nombre;?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <a href="#" onclick="AgregarEnsayo('<?php echo $proformas->pkproforma; ?>','parcmb<?php echo $proformas->pkproforma; ?>')" class="btn btn-outline btn-primary" id="agregar<?php echo $proformas->pkproforma; ?>"><i class="fa fa-plus"></i> Agregar Matriz</a>
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
                                                    <?php foreach ($ensayos as $p): ?>
                                                        <?php if ($p->pkensayo == $d->fkensayo){ ?>
                                                            <tr>
                                                                <td><?php echo $p->nombre; ?></td>
                                                                <td><?php echo $p->costo; ?></td>
                                                                <td>
                                                                    <a href="#" onclick="QuitarEnsayo('<?php echo $proformas->pkproforma; ?>','<?php echo $proformas->nombre; ?>' ,'<?php echo $p->pkensayo; ?>','<?php echo $p->nombre; ?>')" class="btn btn-outline btn-danger btn-circle"  style="color: darkred"><i class="fa fa-trash"></i></a>
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

    function AgregarEnsayo(pkproforma,idcmb){
        $('#agregar'+pkproforma).html("<i class='fa fa-spinner fa-spin'></i> Agregar Ensayo");
        $('#agregar'+pkproforma).attr("disabled", "disabled");
        var pkensayo =  $('#'+idcmb).val();
        var ubicacion = '?c=proforma&a=Agregarensayo&pkproforma='+pkproforma+'&pkensayo='+pkensayo;
        window.location = ubicacion;
    }

    function QuitarEnsayo(pkproforma, ts, pkensayo, p){
        swal({
                title: 'Quitar '+ p,
                text: '¿Esta seguro que desea quitar el ensayo ' + p + ' de la proforma' + ts + '?',
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
                    var ubicacion = '?c=proforma&a=Quitarensayo&pkproforma='+pkproforma+'&pkensayo='+pkensayo;
                    window.location = ubicacion;
                }
            }
        );
    }
</script>