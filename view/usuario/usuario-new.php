<h1 class="page-header">
    <?php echo 'Nuevo Usuario'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=usuario" style="color: #263340;">Usuario</a></li>
    <li class="active"><?php echo 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=usuario&a=guardar" method="post" autocomplete="off">
    <input type="hidden" name="pkusuario" value="0" />
   <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control"  
                       placeholder="Ingrese su Nombre" required />
            </div>
            <div class="form-group">
                <label>Correo</label>
                <input type="email" name="correo" class="form-control"  
                       placeholder="Ingrese su Correo" required />
            </div>
            
            <div class="form-group">
                <label>Telefono</label>
                <input type="text" name="telefono" class="form-control"  
                       placeholder="Ingrese su Telefono" required />
            </div>
            <div class="form-group">
                <label>Tipo de Usuario</label>
                <select class="form-control" name="pktipo_usuario" >
                    <?php foreach ($tipos as $t): ?>
                        <option value="<?php echo $t->pktipo_usuario; ?>" ><?php echo $t->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>CI</label>
                <input type="text" name="ci" class="form-control" 
                       placeholder="Ingrese su numero de carnet" required >
            </div>
            <div class="form-group">
                <label>Direccion</label>
                <input type="text" name="direccion" class="form-control" 
                       placeholder="Ingrese su Direccion" required />
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username"  class="form-control"  
                       placeholder="Ingrese su nombre de usuario" required  />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="pass" class="form-control"  
                       placeholder="Ingrese su password" required />
            </div>
            
        </div>
   

</div>


    <hr/>
    <div class="text-left">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

