<h1 class="page-header">
    <?php echo $matriz->pkmatriz != null ? $matriz->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=matriz" style="color: #263340";>Matriz</a></li>
    <li class="active">Editar</li>
</ol>

<form id="frm-producto" action="?c=matriz&a=guardar_cambios" autocomplete="off" 
      method="post"  enctype="multipart/form-data"   >
    <input type="hidden" name="pkmatriz" value="<?php echo $matriz->pkmatriz; ?>" />
   
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre"
                value="<?php echo $matriz->nombre ?>" required />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
        
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Observacion</label>
                <textarea class="form-control" placeholder="Ingrese la Observacion" name="descripcion"
                 rows="3" style="resize: none;"><?php echo $matriz->descripcion ?></textarea>
            </div>
        </div>
    </div>
   

    <hr/>
    <div class="text-center">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

