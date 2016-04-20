<script>
    var datos = [];
    <?php foreach ($detalle as $r): ?>
        datos.push('<?php echo $r->fkensayo; ?>');
    <?php endforeach ?>
</script>
<?php echo array_search('3',$detalle); ?> 
<h1 class="page-header"><i class="fa fa-wrench fa-fw fa-2x"></i>Asignar ensayos</h1>
<input type="hidden" id="pkproforma" value="<?php echo $proformas->pkproforma; ?>">
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
                                    <label >Matrices</label>
                                    <div class="form-group">
                                        <select multiple="multiple"  id="parcmb">
                                            <?php foreach ($grupos as $p): ?>
                                                <optgroup label="<?php echo $p->nombre; ?>">
                                               <?php foreach ($detalleG as $de): ?>
                                                <?php if($de->fkgrupo==$p->pkgrupo_ensayo){  ?>
                                                <option
                                              <?php if (in_array($de->fkensayo, $listaRegistrados)){ ?>
                                            selected="selected" <?php }?>
                                    value="<?php echo $de->fkensayo;?>,<?php echo $de->ensayo;?>,<?php echo $de->costo;?>"><?php echo $de->ensayo;?></option>
                                    <?php }?>
                                            <?php endforeach ?>
                                            </optgroup>
                                            <?php endforeach ?>
                                        </select>
                                       
                                    </div>
                                 <div class="table-responsive">
                                        <table class="table" >
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Costo</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="cuerpo">
                                            <?php foreach ($detalle as $r): ?>
                                             <tr id="<?php echo $r->fkensayo; ?>">
                                               <td><?php echo $r->fkensayo; ?></td>
                                               <td><?php echo $r->ensayo; ?></td>
                                               <td><?php echo $r->costo; ?></td>
                                            </tr>
                                            <?php endforeach ?>
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
<div class="text-center" style="margin-top: 10px; margin-bottom: 10px">
    <a type="submit" class="btn btn-success btn-lg" id="guardar" onclick="Guardar()"><i class="fa fa-floppy-o"></i> Guardar</a>
</div>
<!-- jQuery para buscador y paginacion-->

<script>
    $(document).ready(function() {
       $('#parcmb').multiselect({
            enableCollapsibleOptGroups: true,
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            filterPlaceholder: 'Buscar',
            selectAllText: 'Seleccionar todo',
            nonSelectedText : 'Ningun sistema seleccionado',
            allSelectedText: 'Todos los sistemas seleccionados',
            nSelectedText: 'seleccionados',
            checkboxName: 'multiselect[]',
            onChange: function(option, checked) {
                var sd = $(option).val();
                var sucursal = sd.split(',');
                if(checked === true) {
                    $('#cuerpo').append(NuevaFila(sucursal));
                }else{
                    var indice = jQuery.inArray(sucursal[0], datos);
                    datos.splice(indice, 1);
                    $('#' + sucursal[0]).remove();
                }
            }
        });
    });
    function NuevaFila(sucursal){
        datos.push(sucursal[0]);
        var fila = "";
        fila += "<tr id='" + sucursal[0] + "'>";
        $.each(sucursal, function (index, s) {
            fila += "<td>";
            fila += s;
            fila += "</td>";
        });
        fila += "</tr>";
        return fila;
    }

     function Guardar(){
        var pkproforma = $('#pkproforma').val();
        datos = JSON.stringify(datos);
        var ubicacion = '?c=proforma&a=AgregarEnsayo&pkproforma='+pkproforma+'&datos='+datos;
        window.location = ubicacion;
    }

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