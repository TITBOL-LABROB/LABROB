<h1 class="page-header">
    <?php echo $laboratorio->pklaboratorio != null ? $laboratorio->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=laboratorio" style="color: #263340";>Laboratorio</a></li>
    <li class="active"><?php echo $laboratorio->pklaboratorio != null ? $laboratorio->pklaboratorio : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-producto" action="?c=laboratorio&a=guardarcambios" 
      method="post"  enctype="multipart/form-data"   >
    <input type="hidden" name="pklaboratorio" value="<?php echo $laboratorio->pklaboratorio; ?>" />
   
    <div class="form-group">
        <label>Nombre</label>
        <input type="text"  name="nombre" value="<?php echo $laboratorio->nombre; ?>" 
               class="form-control" placeholder="Ingrese el nombre" required />
    </div>
    <div class="form-group">
        <label>Descripcion</label>
        <input type="text" name="descripcion" value="<?php echo $laboratorio->descripcion; ?>" 
               class="form-control"  placeholder="Ingrese la Descripcion" data-validacion-laboratorio="requerido|min:3" />
    </div>
    <div class="form-group">
        <label>Tipo de Laboratorio</label>
        <select class="form-control" name="tipo_laboratorio" >
            <option value="Interno" <?php if ('Interno' == $laboratorio->tipo_laboratorio) echo "selected"; ?>>Interno</option>
            <option value="Externo" <?php if ('Externo' == $laboratorio->tipo_laboratorio) echo "selected"; ?>>Externo</option>
        </select>
    </div>

    <hr/>
    <div class="text-center">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

