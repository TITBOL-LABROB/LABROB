<h1 class="page-header">
    <?php echo $medida->pkunidad != null ? $medida->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=medida" style="color: #263340";>Unidad de Medida</a></li>
    <li class="active"><?php echo $medida->pkunidad != null ? $medida->pkunidad : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-producto" action="?c=medida&a=guardarcambios" 
      method="post"  enctype="multipart/form-data"   >
    <input type="hidden" name="pkunidad" value="<?php echo $medida->pkunidad; ?>" />
   
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo $medida->nombre; ?>" 
               class="form-control" placeholder="Ingrese el nombre" required />
    </div>
   

    <hr/>
    <div class="text-center">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

