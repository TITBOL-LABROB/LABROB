<script >
$(document).ready(function() {
    var $nombre = $("#nombre");
    var $direccion = $("#direccion");
    var $telefono = $("#telefono");
    var $nit = $("#nit");
    var $correo = $("#correo");
    var $fax = $("#fax");

     var $cmbArea = $("#pkarea");
     $( "#nombre_busq" ).keyup(function() {
            var $texto = $(this).val();
                var datos = {
                    nombre_institucion: $texto
                };

                        $nombre.attr('value','');
                        $direccion.attr('value','');
                        $telefono.attr('value','');
                        $nit.attr('value','');
                        $correo.attr('value','');
                        $fax.attr('value','');
                if($texto!=""){        
                $.post("model/AddTipo.php", datos, function (instituciones) {
                        $.each(instituciones, function (index, institucion) {
                            $nombre.attr('value', institucion.nombre);
                            $direccion.attr('value', institucion.direccion);
                            if(institucion.celular!="") $telefono.attr('value', institucion.celular);
                            if(institucion.fijo!="") $telefono.attr('value', institucion.fijo);
                            $nit.attr('value', institucion.nit);
                            $correo.attr('value', institucion.correo);
                            $fax.attr('value', institucion.fax);
                        });
                    }, 'json');
                }
             
      });
   });          
</script>
<h1 class="page-header">
    <?php echo 'Nueva Institucion/Empresa'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=institucion" style="color: #263340";>Institucion</a></li>
    <li class="active"><?php echo 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=institucion&a=guardar" method="post" autocomplete="off">
    <input type="hidden" name="pkinstitucion" value="0" />
   <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Busqueda por Nombre</label>
                <input type="text" id="nombre_busq" name="nombre" class="form-control"  
                       placeholder="Ingrese su Nombre" required />
            </div>
        </div>    
        <div class="col-md-6">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control"  
                       placeholder="Ingrese su Nombre" required />
            </div>
            <div class="form-group">
                <label>Direccion</label>
                <input type="text" id="direccion" name="direccion" class="form-control" 
                       placeholder="Ingrese su Direccion" required />
            </div>
            <div class="form-group">
                <label>Telefono</label>
                <input type="text" id="telefono" name="telefono" class="form-control"  
                       placeholder="Ingrese su Telefono" required />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>NIT</label>
                <input type="text" id="nit" name="nit" class="form-control" 
                       placeholder="Ingrese su Nit" required >
            </div>
            <div class="form-group">
                <label>Correo</label>
                <input type="email" id="correo" name="correo" class="form-control"  
                       placeholder="Ingrese su Correo" />
            </div>    
            <div class="form-group">
                <label>Fax</label>
                <input type="text" id="fax" name="fax" class="form-control"  
                       placeholder="Ingrese su Fax"  />
            </div>
        </div>
   

</div>


    <hr/>
    <div class="text-center">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

