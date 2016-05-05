<h1 class="page-header">
    <?php echo $area->pkarea != null ? $area->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=acta" style="color: #263340";>Area</a></li>
    <li class="active"><?php echo $area->pkarea != null ? $area->pkarea : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-producto" action="?c=acta&a=guardarcambios" 
      method="post"  enctype="multipart/form-data"   >
    <input type="hidden" name="pkarea" value="<?php echo $area->pkarea; ?>" />
   
    <div class="form-group">
        <label>Nombre</label>
        <input type="text"  name="nombre" value="<?php echo $area->nombre; ?>" 
               class="form-control" placeholder="Ingrese el nombre" required />
    </div>
    <div class="form-group">
        <label>Descripcion</label>
        <input type="text" name="descripcion" value="<?php echo $area->descripcion; ?>" 
               class="form-control"  placeholder="Ingrese la Descripcion" data-validacion-area="requerido|min:3" />
    </div>
    <div class="form-group">
        <label>Tipo de area</label>
        <select class="form-control" name="tipo_area" >
            <option value="Interno" <?php if ('Interno' == $area->tipo_area) echo "selected"; ?>>Interno</option>
            <option value="Externo" <?php if ('Externo' == $area->tipo_area) echo "selected"; ?>>Externo</option>
        </select>
    </div>

    <hr/>
    <div class="text-center">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

