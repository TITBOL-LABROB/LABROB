<script>
    var datosM = [];
    var datosG = [];
    var datos = [];
    var datos2 = [];
    var datosN=[];
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
                                        <select  class="parcmb" id="parcmb<?php echo $proformas->pkproforma; ?>">
                                            <?php foreach ($matrices as $m): ?>
                                                <option
                                         value="<?php echo $m->pkmatriz;?>"><?php echo $m->nombre;?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <a href="#" onclick="AgregarMatriz('parcmb<?php echo $proformas->pkproforma;?>')" class="btn btn-outline btn-primary" id="agregar<?php echo $proformas->pkproforma; ?>"><i class="fa fa-plus"></i> Agregar Matriz</a>
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
            filterPlaceholder: 'Buscar'
        });
    });

     function Guardar(){
        var pkproforma = $('#pkproforma').val();
        var nro_muestras = $('#nro_muestras').val();
        var descuento = $('#descuento').val();
        CargarValores();
        datos = JSON.stringify(datos);
        datos2 = JSON.stringify(datos2);
        datosN=JSON.stringify(datosN);

        var ubicacion = '?c=proforma&a=AgregarEnsayo&pkproforma='+pkproforma+'&datos='+datos+'&datosG='+datos2+'&datosN='+datosN+'&nro_muestras='+nro_muestras+'&descuento='+descuento;
        window.location = ubicacion;
    }

    function AgregarEnsayoMatriz(pkmatriz,idcmb){
         var cmb = $('#'+idcmb).val();
         var grupo = cmb.split(',');
         var c=0;
         var fila=""; var esta=null;
       //verifica si ya se encuantra este ensayo  
        var esta=$('#tablaM'+pkmatriz+' #'+grupo[0]).attr('id'); 
        if(esta!=null){return;}  
         
        fila += "<tr id='" + grupo[0] + "'>";
        $.each(grupo, function (index, s) {
            if(c>0)
            {
             fila += "<td>";
             fila += s;
             fila += "</td>";
            }
            c++;
        });
        var quitar="<td><a href='#' onclick='QuitarEnsayoMatriz("+pkmatriz+","+grupo[0]+")' class='btn btn-outline btn-danger btn-circle'  style='color: darkred'><i class='fa fa-trash'></i></a></td>";
        fila+=quitar;
        fila += "</tr>";
        $('#tablaM'+pkmatriz).append(fila);
      
    }

    function CargarValores()
    {  
        $.each(datosM, function (index, s) {
            var rows= $('#tablaM'+s+' tr');
            for (var i = 0; i < rows.length; i++)
             {
                id= $(rows[i]).attr('id');
               if(id!=undefined)
               { 
                datosN.push('-');
                datos.push(id);
               }else 
               {
                var Val1 = $('td:eq(0) input', rows[i]).val();
                 if(Val1!=undefined) datosN.push(Val1);
                 var Val2 = $('td:eq(2) input', rows[i]).val();
                 if(Val2!=undefined)datosN.push(Val2); 
               }

             }
        });
       console.log(datosN);
       console.log(datos);  console.log(datosG); 
    }

    function AgregarEnsayoGrupo(pkgrupo,idcmb){
         var cmb = $('#'+idcmb).val();
         var grupo = cmb.split(',');
         var c=0;
         var fila="";
         //verifica si ya se encuantra este ensayo  
        var esta=$('#tablaG'+pkgrupo+' #'+grupo[0]).attr('id'); 
        if(esta!=null){return;}  
         datosG.push(grupo[0]);
        fila += "<tr id='" + grupo[0] + "'>";
        $.each(grupo, function (index, s) {
            if(c>0)
            {
             fila += "<td>";
             fila += s;
             fila += "</td>";
            }
            c++;
        });
        var quitar="<td><a href='#' onclick='QuitarEnsayoGrupo("+pkgrupo+","+grupo[0]+")' class='btn btn-outline btn-danger btn-circle'  style='color: darkred'><i class='fa fa-trash'></i></a></td>";
        fila+=quitar;
        fila += "</tr>";
        $('#tablaG'+pkgrupo).append(fila);
    }

    function QuitarEnsayoMatriz(idtabla,idfila)
    {    
        var indice = jQuery.inArray(idfila, datos);
         datos.splice(indice,1);  
         $('#tablaM' + idtabla+' #'+idfila).remove();
    }

    function QuitarEnsayoGrupo(idtabla,idfila)
    {    
         var indice = jQuery.inArray(idfila, datos);
         datos.splice(indice,1);  
         $('#tablaG' + idtabla+' #'+idfila).remove();
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
    function AgregarMatriz($pkproforma)
    {
        var $codigo=$('#'+$pkproforma).val();
          var esta=$('#matriz'+$codigo).attr('id'); 
        if(esta!=null){return;}
        datosM.push($codigo);
        if($codigo!=null){
        var datos = {
                    matrices: $codigo
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
    function AgregarGrupo($pkproforma)
    {
        var $codigo=$('#'+$pkproforma).val();
         var esta=$('#grupo'+$codigo).attr('id'); 
        if(esta!=null){return;}  
        datosG.push($codigo);
        if($codigo!=null){
        var datos = {
                    grupos: $codigo
                };
                
                $.ajax({
                data:  datos,
                url:   'model/AddGrupos.php',
                type:  'post',
                success:function (response) {

                        $("#Grupos").append(response);
                }
              })
          } 
    }
    function EliminarMatriz(pkmatriz)
    {
      var indice = jQuery.inArray(pkmatriz, datosM);
         datosM.splice(indice,1);   
     $('#matriz' + pkmatriz).remove();
    }

    function EliminarGrupo(pkgrupo)
    {
      var indice = jQuery.inArray(pkgrupo, datosG);
        datosG.splice(indice,1);
     $('#grupo' + pkgrupo).remove();
    }
</script>