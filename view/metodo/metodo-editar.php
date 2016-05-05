<h1 class="page-header">
    <?php echo $metodo->pkmetodo != null ? $metodo->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=metodo" style="color: #263340";>Metodo</a></li>
    <li class="active"><?php echo $metodo->pkmetodo != null ? $metodo->pkmetodo : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-producto" action="?c=metodo&a=guardarcambios" 
      method="post"  enctype="multipart/form-data"   >
    <input type="hidden" name="pkmetodo" value="<?php echo $metodo->pkmetodo; ?>" />
   
    <div class="form-group">
        <label>Nombre</label>
        <input type="text"  name="nombre" value="<?php echo $metodo->nombre; ?>" 
               class="form-control" placeholder="Ingrese el nombre" required />
    </div>
    <div class="form-group">
        <label>Palabras Claves</label>
       <input type="text" name="palabras_claves" value="<?php echo $metodo->palabras_claves; ?>" 
               class="form-control"  placeholder="Ingrese las palabras claves" required ></input>  
    </div>
    <div class="form-group">
        <label>Descripcion</label>
       <textarea  name="descripcion"  style="resize: none;" 
               class="form-control"  placeholder="Ingrese la Descripcion" 
               data-validacion-metodo="requerido" required><?php echo $metodo->descripcion; ?></textarea>
    </div>
    
    <hr/>
    <div class="text-center">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

