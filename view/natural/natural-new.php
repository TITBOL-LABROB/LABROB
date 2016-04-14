<h1 class="page-header">
    <?php echo 'Nuevo natural'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=natural" style="color: #263340";>Cliente Natural</a></li>
    <li class="active"><?php echo 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=natural&a=guardar" method="post" autocomplete="off">
    <input type="hidden" name="pknatural" value="0" />
   <div class="row">
        <div class="col-md-6">
            
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control"  
                       placeholder="Ingrese su Nombre" required />
            </div>
            <div class="form-group">
                <label>Direccion</label>
                <input type="text" name="direccion" class="form-control" 
                       placeholder="Ingrese su Direccion" required />
            </div>
            <div class="form-group">
               <label>Tipo de Cliente</label>
               <select class="form-control" name="tipo_cliente" >
                 <option value="Periodico">Periodico</option>
                 <option value="Esporadico">Esporadico</option>
               </select>
            </div>
            <div class="form-group">
                <label>Fijo</label>
                <input type="text" name="fijo" class="form-control"  
                       placeholder="Ingrese Telefono Fijo" />
            </div>
            <div class="form-group">
                <label>Correo</label>
                <input type="email" name="correo" class="form-control"  
                       placeholder="Ingrese su Correo" required />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>CI</label>
                <input type="text" name="ci" class="form-control" 
                       placeholder="Ingrese su numero de carnet" required >
            </div>    
            <div class="form-group">
                <label>Contacto</label>
                <input type="text" name="contacto" class="form-control"  
                       placeholder="Ingrese la Perosna de Contacto"  />
            </div>
            <div class="form-group">
                <label>Celular</label>
                <input type="text" name="celular" class="form-control"  
                       placeholder="Ingrese su celular"  />
            </div>
            
            <div class="form-group">
                <label>Fax</label>
                <input type="text" name="fax" class="form-control"  
                       placeholder="Ingrese su Fax"  />
            </div>
            <div class="form-group">
                <label>Descuento</label>
                <input type="number" name="descuento" class="form-control"  
                       placeholder="Ingrese su Descuento Porcentual"  />
            </div>
        </div>
   

</div>


    <hr/>
    <div class="text-center">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

