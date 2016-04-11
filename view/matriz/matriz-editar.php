<h1 class="page-header">
    <?php echo $matriz->pkmatriz != null ? $matriz->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=matriz" style="color: #263340";>Matriz</a></li>
    <li class="active"><?php echo $matriz->pkmatriz != null ? $matriz->pkmatriz : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-producto" action="?c=matriz&a=guardarcambios" 
      method="post"  enctype="multipart/form-data"   >
    <input type="hidden" name="pkmatriz" value="<?php echo $matriz->pkmatriz; ?>" />
   
    <div class="form-group">
        <label>Nombre</label>
        <input type="text"  name="nombre" value="<?php echo $matriz->nombre; ?>" 
               class="form-control" placeholder="Ingrese el nombre" required />
    </div>
    <div class="form-group">
        <label>Descripcion</label>
        <input type="text" name="descripcion" value="<?php echo $matriz->descripcion; ?>" 
               class="form-control"  placeholder="Ingrese la Descripcion" data-validacion-matriz="requerido|min:3" />
    </div>
   

    <hr/>
    <div class="text-center">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

