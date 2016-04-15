<h1 class="page-header">
    <?php echo $institucion->nit != null ? $institucion->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=institucion" style="color: #263340";>Cliente institucion</a></li>
    <li class="active"><?php echo $institucion->nit != null ? $institucion->nombre : 'Nuevo Registro'; ?></li>
</ol>
<form  action="?c=institucion&a=guardarcambios" method="post" autocomplete="off" >
    <input type="hidden" name="pkinstitucion" value="<?php echo $institucion->pkinstitucion; ?>" />
    <div class="form-group">
      
        <div class="col-md-6">
            
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $institucion->nombre; ?>" 
                       placeholder="Ingrese su Nombre" required />
            </div>
            <div class="form-group">
                <label>Direccion</label>
                <input type="text" name="direccion" class="form-control" value="<?php echo $institucion->direccion; ?>"
                       placeholder="Ingrese su Direccion" required />
            </div>
            <div class="form-group">
                <label>Telefono</label>
                <input type="text" name="telefono" class="form-control" value="<?php echo $institucion->telefono; ?>" 
                       placeholder="Ingrese su Telefono" required />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>NIT</label>
                <input type="text" name="nit" class="form-control" value="<?php echo $institucion->nit; ?>"
                       placeholder="Ingrese su Nit" required >
            </div>
            <div class="form-group">
                <label>Correo</label>
                <input type="email" name="correo" class="form-control" value="<?php echo $institucion->correo; ?>" 
                       placeholder="Ingrese su Correo" />
            </div>    
            <div class="form-group">
                <label>Fax</label>
                <input type="text" name="fax" class="form-control"  value="<?php echo $institucion->fax; ?>"
                       placeholder="Ingrese su Fax"  />
            </div>
        </div>
      

        <hr/>
        <div class="text-center">
            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
        </div>
    </div>
</form>