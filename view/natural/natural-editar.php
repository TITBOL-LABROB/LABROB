<h1 class="page-header">
    <?php echo $natural->ci != null ? $natural->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=natural" style="color: #263340";>Cliente Natural</a></li>
    <li class="active"><?php echo $natural->ci != null ? $natural->nombre : 'Nuevo Registro'; ?></li>
</ol>
<form  action="?c=natural&a=guardarcambios" method="post" autocomplete="off" >

    <input type="hidden" name="pkcliente" value="<?php echo $natural->pkcliente; ?>" />
    <input type="hidden" name="pknatural" value="<?php echo $natural->ci; ?>" />
    <input type="hidden" name="pass" value="" />
    <div class="form-group">
      
        <div class="col-md-6">
            
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $natural->nombre ?>"  
                       placeholder="Ingrese su Nombre" required />
            </div>
            <div class="form-group">
                <label>Direccion</label>
                <input type="text" name="direccion" class="form-control" value="<?php echo $natural->direccion ?>" 
                       placeholder="Ingrese su Direccion" required />
            </div>

            <div class="form-group">
               <label>Tipo de Cliente</label>
               <select class="form-control" name="tipo_cliente" >
                  <option value="Periodico" <?php if ('Periodico' == $natural->tipo_cliente) echo "selected"; ?>>Periodico</option>
                  <option value="Esporadico" <?php if ('Esporadico' == $natural->tipo_cliente) echo "selected"; ?>>Esporadico</option>
               </select>
            </div>
            
            <div class="form-group">
                <label>Fijo</label>
                <input type="text" name="fijo" class="form-control"  value="<?php echo $natural->fijo ?>"
                       placeholder="Ingrese Telefono Fijo" />
            </div>
            <div class="form-group">
                <label>Correo</label>
                <input type="email" name="correo" class="form-control"  value="<?php echo $natural->correo ?>"
                       placeholder="Ingrese su Correo" required />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>CI</label>
                <input type="text" name="ci" class="form-control" value="<?php echo $natural->ci ?>" 
                       placeholder="Ingrese su numero de carnet" required >
            </div>
            <div class="form-group">
                <label>Contacto</label>
                <input type="text" name="contacto" class="form-control" value="<?php echo $natural->contacto ?>" 
                       placeholder="Ingrese la Persona de Contacto"  />
            </div>    
            <div class="form-group">
                <label>Celular</label>
                <input type="text" name="celular" class="form-control"  value="<?php echo $natural->celular ?>"
                       placeholder="Ingrese su celular"  />
            </div>
            
            <div class="form-group">
                <label>Fax</label>
                <input type="text" name="fax" class="form-control"  value="<?php echo $natural->fax ?>"
                       placeholder="Ingrese su Fax"  />
            </div>
            <div class="form-group">
                <label>Descuento</label>
                <input type="Decimal" name="descuento" class="form-control"  value="<?php echo $natural->descuento; ?>" 
                       placeholder="Ingrese su Descuento Porcentual"  />
            </div>
        </div>
      

        <hr/>
        <div class="text-center">
            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
        </div>
    </div>
</form>