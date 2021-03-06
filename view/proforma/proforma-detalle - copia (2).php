<script>
    var datos = [];
    <?php foreach ($detalle as $r): ?>
        datos.push('<?php echo $r->fkensayo; ?>');
    <?php endforeach ?>

    var datosG = [];
    <?php foreach ($detalleG as $r): ?>
        datosG.push('<?php echo $r->fkgrupo; ?>');
    <?php endforeach ?>
</script>
<h1 class="page-header"><i class="fa fa-flask fa-fw fa-2x"></i>Asignar ensayos</h1>
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
                                 echo $clientes->nombre_cliente; ?>" readonly/>
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
                                  <div class="col-md-4">
                                    <label >Matrices</label>
                                    <div class="form-group">
                                        <select multiple="multiple"  id="parcmb">
                                            <?php foreach ($matrices as $m): ?>
                                                <optgroup label="<?php echo $m->nombre; ?>">
                                               <?php foreach ($detalleM as $dem): ?>
                                                <?php if($dem->fkmatriz==$m->pkmatriz){  ?>
                                                <option
                                              <?php if (in_array($dem->fkensayo, $listaRegistrados)){ ?>
                                            selected="selected" <?php }?>
                                    value="<?php echo $dem->fkensayo;?>,<?php echo $dem->ensayo;?>,<?php echo $dem->metodo;?>,<?php echo $dem->medida;?>,<?php echo $dem->costo;?>,"><?php echo $dem->ensayo;?></option>
                                    <?php }?>
                                            <?php endforeach ?>
                                            </optgroup>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                   </div>


                                   <div class="col-md-4"> 
                                    <label >Grupos de Ensayos</label>
                                    <div class="form-group">
                                        <select multiple="multiple"  id="parcmb2">
                                            <?php foreach ($grupos as $p): ?>
                                                <option <?php if (in_array($p->pkgrupo_ensayo, $listaRegistradosG)){ ?>
                                            selected="selected" <?php }?>
                                    value="<?php echo $p->pkgrupo_ensayo;?>,<?php echo $p->nombre;?>,<?php echo $p->costo;?>"><?php echo $p->nombre;?></option>
                                            <?php endforeach ?>
                                        </select>
                                       
                                    </div>
                                   </div>

                                   <div class="col-md-4"> 
                                    <label >Ensayos</label>
                                    <div class="form-group">
                                        <select  class="parcmb3" id="parcmb<?php echo $proformas->pkproforma; ?>">
                                            <?php foreach ($ensayos as $p): ?>
                                                <option value="<?php echo $p->pkensayo;?>,<?php echo $p->nombre;?>,<?php echo $p->metodo;?>,<?php echo $p->medida;?>,<?php echo $p->costo;?>"><?php echo $p->nombre;?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                   </div> 
                                 <div class="col-md-12">   
                                 <div class="table-responsive">
                                        <table class="table" >
                                            <thead>
                                           <tr><th colspan="5" style="text-align:center; text-decoration: underline;">Ensayos de Matrices</th>
                                              <th></th>
                                           </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Metodo</th>
                                                <th>U/Medida</th>
                                                <th>Costo</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="cuerpo">
                                            <?php foreach ($detalle as $r): ?>
                                             <tr id="<?php echo $r->fkensayo; ?>">
                                               <td ><?php echo $r->fkensayo; ?></td>
                                               <td><?php echo $r->ensayo; ?></td>
                                               <td><?php echo $r->metodo; ?></td>
                                               <td><?php echo $r->medida; ?></td>
                                               <td><?php echo $r->costo; ?></td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                        </table>
                                    </div>
                                   </div> 

                                    <div class="col-md-12">   
                                 <div class="table-responsive">
                                        <table class="table" >
                                            <thead>
                                           <tr><th colspan="3" style="text-align:center; text-decoration: underline;">Grupo de Ensayos</th>
                                           </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Costo</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="cuerpo2">
                                            <?php foreach ($detalleG as $r): ?>
                                             <tr id="<?php echo $r->fkgrupo; ?>">
                                               <td ><?php echo $r->fkgrupo; ?></td>
                                               <td ><?php echo $r->grupo; ?></td>
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
            <div class="col-md-4"> 
            <div class="form-group">
                <label>Nro. de Muestras</label>
                <input <input class="form-control" type="number" id="nro_muestras" value="<?php
                                 echo $proformas->nro_muestras; ?>"  
                       placeholder="Ingrese el metodo" required />
            </div>
            </div>
             <div class="col-md-4"> 
            <div class="form-group">
                <label>Descuento</label>
                <input <input class="form-control" type="text" id="descuento" value="<?php
                                 echo $clientes->descuento; ?>"  
                       placeholder="Ingrese el metodo" required />
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
                    $('#cuerpo tr#' + sucursal[0]).remove();
                }
            }
        });

       $('#parcmb2').multiselect({
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
                var grupo = sd.split(',');
                if(checked === true) {
                    $('#cuerpo2').append(NuevaFilaG(grupo));
                }else{
                    var indice = jQuery.inArray(grupo[0], datosG);
                    datosG.splice(indice, 1);
                    $('#cuerpo2 tr#' + grupo[0]).remove();
                }
            }
        });

       $('.parcmb3').multiselect({
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            filterPlaceholder: 'Buscar',
            onChange: function(option, checked) {
                var sd = $(option).val();
                var sucursal = sd.split(',');
                if(checked === true) {
                    $('#cuerpo').append(NuevaFila(sucursal));
                }else{
                    var indice = jQuery.inArray(sucursal[0], datos);
                    datos.splice(indice, 1);
                    $('#cuerpo tr#' + sucursal[0]).remove();
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
    function NuevaFilaG(grupo){
        datosG.push(grupo[0]);
        var fila = "";
        fila += "<tr id='" + grupo[0] + "'>";
        $.each(grupo, function (index, s) {
            fila += "<td>";
            fila += s;
            fila += "</td>";
        });
        fila += "</tr>";
        return fila;
    }

     function Guardar(){
        var pkproforma = $('#pkproforma').val();
        var nro_muestras = $('#nro_muestras').val();
        var descuento = $('#descuento').val();
        datos = JSON.stringify(datos);
        datosG = JSON.stringify(datosG);
        var ubicacion = '?c=proforma&a=AgregarEnsayo&pkproforma='+pkproforma+'&datos='+datos+'&datosG='+datosG+'&nro_muestras='+nro_muestras+'&descuento='+descuento;
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