<script>
    var datosM = [];
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
                           <div class="col-md-12"> 
                            <div id="cmbM" class="panel-body">
                                    <div class="btn-group">
                                        <select  class="parcmb" id="<?php echo $proformas->pkproforma; ?>">
                                            <?php foreach ($matrices as $m): ?>
                                                <option
                                         value="<?php echo $m->pkmatriz;?>"><?php echo $m->nombre;?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <a href="#" onclick="AgregarMatriz('<?php echo $proformas->pkproforma;?>','<?php echo $proformas->pkproforma;?>')" class="btn btn-outline btn-primary" id="agregar<?php echo $proformas->pkproforma; ?>"><i class="fa fa-plus"></i> Agregar Matriz</a>
                                </div>
                            </div>
                           </div> 
                            <!--//Matrices-->
                            <div class="panel-group" style="background-color: #F5F5F5;">
                            <div  class="panel-body" id="Matrices" >
                                
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
      var pkproforma = $('#pkproforma').val();
        EliminarMatriz(pkproforma,1); 
    });

 function Guardar(){
        var pkproforma = $('#pkproforma').val();
        var nro_muestras = $('#nro_muestras').val();
        var descuento = $('#descuento').val();
        var ubicacion = '?c=proforma&a=AgregarEnsayo&pkproforma='+pkproforma+'&nro_muestras='+nro_muestras+'&descuento='+descuento;
        window.location = ubicacion;
    }

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
                url:   'model/AddTipoP.php',
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
                url:   'model/AddTipoP.php',
                type:  'post',
                success:function (response) {

                        $('#norma'+pkdetalle_matriz).html(response);
                }
              })
}

    function AgregarEnsayoMatriz(pkproforma,pkmatriz,idcmb,idcmb2){
        var pkensayo =  $('#'+idcmb).val();
        var pkmetodo =  $('#'+idcmb2).val();
        
        var existe=$('#tablaM'+pkmatriz+' #ensayo'+pkensayo).attr('id');

       // console.log(existe);
        if(existe!=null)return;
        
        var id=0;
        var datos = { 
                    fkproforma: pkproforma, 
                    fkmatriz: pkmatriz,   
                    fkensayo: pkensayo,
                    fkmetodo: pkmetodo
                };


               $.ajax({
                data:   datos,
                url:   'model/AddEnsayosP.php',
                type:  'post',
                success:function (response) {
                        $('#tablaM'+pkmatriz).html(response);
                      //  console.log(response);

                      $.post("model/AddTipoP.php", {getLast:pkmatriz}, function (detalle) {
                        $.each(detalle, function (index, values) {
                              id=values.id;
                        });
                        $('#tablaM'+pkmatriz+' #myModal'+id).modal("show"); 
                    }, 'json');

                  AgregarGrupo(pkproforma,pkmatriz,1,'si');
 
                }
              })
        
    }

    function Quitarensayo(pkproforma,pkmatriz,pkensayo){
         var pkmetodo=1;
         var datos = { 
                    delete    :'si',
                    fkproforma: pkproforma, 
                    fkmatriz: pkmatriz,   
                    fkensayo: pkensayo,
                    fkmetodo: pkmetodo
                };
               
               console.log(datos); 

               $.ajax({
                data:   datos,
                url:   'model/AddEnsayosP.php',
                type:  'post',
                success:function (response) {
                        $('#tablaM'+pkmatriz).html(response);
                        
                       AgregarGrupo(pkproforma,pkmatriz,1,'si'); 
                }
              })
        
    }

 function AgregarGrupo(pkproforma,pkmatriz,idcmb,refresh){
        var pkgrupo =  $('#'+idcmb).val();
        var existe=$('#tablaMG'+pkmatriz+' #grupo'+pkgrupo).attr('id');

        console.log(existe); 
        if(existe!=null)return;
        var datos = {
                    refresh:  refresh,
                    fkproforma: pkproforma,  
                    fkmatriz: pkmatriz,   
                    fkgrupo:  pkgrupo
                };
                 console.log(datos);
               $.ajax({
                data:   datos,
                url:   'model/AddTipoP.php',
                type:  'post',
                success:function (response) {
                        $('#tablaMG'+pkmatriz).html(response);
                        console.log(response);
                }
              })
    }

    function QuitarGrupo(pkproforma,pkmatriz,pkgrupo){
       
        var datos = { 
                    refresh : 'no',
                    delete : 'si',
                    fkproforma: pkproforma, 
                    fkmatriz: pkmatriz,   
                    fkgrupo: pkgrupo
                };
              console.log(datos);
               $.ajax({
                data:   datos,
                url:   'model/AddTipoP.php',
                type:  'post',
                success:function (response) {
                        $('#tablaMG'+pkmatriz).html(response);
                        console.log(response);
                }
              })
    }   
    function AgregarMatriz($pkproforma,$pkmatriz)
    {  
        var $codigo=$('#'+$pkmatriz).val();
        var datos = {
                    pkproforma:$pkproforma,
                    pkmatriz : $codigo
                };

                $.ajax({
                data:  datos,
                url:   'model/AddMatriz.php',
                type:  'post',
                success:function (response) {
                       // console.log(response);
                        InsertMatriz($pkproforma,$pkmatriz);
                }
              })
    }

    function InsertMatriz($pkproforma,$pkmatriz)
    {
        var $codigo=$('#'+$pkmatriz).val();
          var esta=$('#matriz'+$codigo).attr('id'); 
        if(esta!=null){return;}
        datosM.push($codigo);
        if($codigo!=null){
        var datos = {
                    pkproforma:$pkproforma,
                    matrices  : $codigo
                };
                
                $.ajax({
                data:  datos,
                url:   'model/AddMatrices.php',
                type:  'post',
                success:function (response) {
                         
                        $("#Matrices").append(response);
                }
              })
          }
    }
   
    function EliminarMatriz(pkproforma,pkmatriz)
    {
      var indice = jQuery.inArray(pkmatriz, datosM);
         datosM.splice(indice,1);   
     $('#matriz' + pkmatriz).remove();


     var datos = {
                    delete    : 'si',
                    pkproforma: pkproforma,
                    pkmatriz  : pkmatriz
                };
                
                $.ajax({
                data:  datos,
                url:   'model/AddMatriz.php',
                type:  'post',
                success:function (response) {
                      //  console.log(response);
                }
              })
    }
</script>