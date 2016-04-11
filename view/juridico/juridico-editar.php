<h1 class="page-header">
    <?php echo $juridico->nit != null ? $juridico->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=juridico" style="color: #263340;">Cliente Juridico</a></li>
    <li class="active"><?php echo $juridico->nit != null ? $juridico->nombre : 'Nuevo Registro'; ?></li>
</ol>
<form  action="?c=juridico&a=guardarcambios" method="post" autocomplete="off" >

    <input type="hidden" name="pkcliente" value="<?php echo $juridico->pkcliente; ?>" />
    <input type="hidden" name="pkjuridico" value="<?php echo $juridico->nit; ?>" />
    <div class="form-group">
      
          <div class="col-md-6">
           
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $juridico->nombre ?>"  
                       placeholder="Ingrese su Nombre" required />
            </div>
             <div class="form-group">
                <label>Representante</label>
                <input type="text" name="representante" class="form-control" value="<?php echo $juridico->representante ?>"
                       placeholder="Ingrese su Representante Legal"  />
            </div>
            <div class="form-group">
                <label>Direccion</label>
                <input type="text" name="direccion" class="form-control" value="<?php echo $juridico->direccion ?>"
                       placeholder="Ingrese su Direccion" required />
            </div>
            <div class="form-group">
                <label>Fijo</label>
                <input type="text" name="fijo" class="form-control"  value="<?php echo $juridico->fijo ?>"
                       placeholder="Ingrese su Telefono Fijo" />
            </div>
            <div class="form-group">
                <label>Correo</label>
                <input type="email" name="correo" class="form-control"  value="<?php echo $juridico->correo ?>"
                       placeholder="Ingrese su Correo" required />
            </div>
             
            
        </div>    
        <div class="col-md-6">
            <div class="form-group">
                <label>NIT</label>
                <input type="text" name="nit" class="form-control" value="<?php echo $juridico->nit ?>"
                       placeholder="Ingrese su numero de Nit" required >
            </div>
            <div class="form-group">
                <label>CI Representante</label>
                <input type="text" name="ci_representante" class="form-control" value="<?php echo $juridico->ci_representante ?>"
                       placeholder="Ingrese CI del Representante Legal"  />
            </div>
            <div class="form-group">
                <label>Contacto</label>
                <input type="text" name="contacto" class="form-control"  value="<?php echo $juridico->contacto ?>"
                       placeholder="Ingrese la Perona de Contacto"  />
            </div>
            <div class="form-group">
                <label>Celular</label>
                <input type="text" name="celular" class="form-control"  value="<?php echo $juridico->celular ?>"
                       placeholder="Ingrese su celular"  />
            </div>
            
            <div class="form-group">
                <label>Fax</label>
                <input type="text" name="fax" class="form-control"  value="<?php echo $juridico->fax ?>"
                       placeholder="Ingrese su Fax"  />
            </div>
        </div>
      

        <hr/>
        <div class="text-center">
            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
        </div>
    </div>
</form>