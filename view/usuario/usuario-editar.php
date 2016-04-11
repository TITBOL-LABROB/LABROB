<h1 class="page-header">
    <?php echo $usuario->pkusuario != null ? $usuario->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=usuario" style="color: #263340;>Usuario</a></li>
    <li class="active"><?php echo $usuario->pkusuario != null ? $usuario->nombre : 'Nuevo Registro'; ?></li>
</ol>
<form  action="?c=usuario&a=guardarcambios" method="post" autocomplete="off" >

    <input type="hidden" name="pkusuario" value="<?php echo $usuario->pkusuario; ?>" />
    <input type="hidden" name="pass" value="" />
    <div class="form-group">
      
        <div class="col-md-6">
            
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $usuario->nombre ?>"  
                       placeholder="Ingrese su Nombre" required />
            </div>
            <div class="form-group">
                <label>Correo</label>
                <input type="email" name="correo" class="form-control"  value="<?php echo $usuario->correo ?>" 
                       placeholder="Ingrese su Correo" required />
            </div>
            <div class="form-group">
                <label>Telefono</label>
                <input type="text" name="telefono" class="form-control"  value="<?php echo $usuario->telefono ?>" 
                       placeholder="Ingrese su Telefono" required />
            </div>
            
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>CI</label>
                <input type="text" name="ci" class="form-control" value="<?php echo $usuario->ci ?>" 
                       placeholder="Ingrese su numero de carnet" required >
            </div>    
            <div class="form-group">
                <label>Direccion</label>
                <input type="text" name="direccion" class="form-control" value="<?php echo $usuario->direccion ?>" 
                       placeholder="Ingrese su Direccion" required />
            </div>
            
            <div class="form-group">
            <label>Tipo de Usuario</label>
            <select class="form-control" name="pktipo_usuario" >
                <?php foreach ($tipos as $t): ?>
                    <option value="<?php echo $t->pktipo_usuario; ?>" <?php if ($t->pktipo_usuario == $usuario->fktipo_usuario) echo "selected"; ?> ><?php echo $t->nombre; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        </div>
        

        <hr/>
        <div class="text-left">
            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
        </div>
    </div>
</form>