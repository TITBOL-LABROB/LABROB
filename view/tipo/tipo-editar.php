<h1 class="page-header">
    <?php echo $tipo->pktipo_usuario != null ? $tipo->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=tipo" style="color: #263340";>Tipo</a></li>
    <li class="active"><?php echo $tipo->pktipo_usuario != null ? $tipo->pktipo_usuario : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-producto" action="?c=tipo&a=guardarcambios" 
      method="post"  enctype="multipart/form-data"   >
    <input type="hidden" name="pktipo_usuario" value="<?php echo $tipo->pktipo_usuario; ?>" />
   
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" readonly name="nombre" value="<?php echo $tipo->nombre; ?>" 
               class="form-control" placeholder="Ingrese el nombre" required />
    </div>
    <div class="form-group">
        <label>Descripcion</label>
        <input type="text" name="descripcion" value="<?php echo $tipo->descripcion; ?>" 
               class="form-control"  placeholder="Ingrese la Descripcion" data-validacion-tipo="requerido|min:3" />
    </div>
   

    <hr/>
    <div class="text-center">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

