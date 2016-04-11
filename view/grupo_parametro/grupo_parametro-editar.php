<h1 class="page-header">
    <?php echo $grupo_parametro->pkgrupo_parametro != null ? $grupo_parametro->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=grupo_parametro" style="color: #263340";>Grupo de Paramtro</a></li>
    <li class="active"><?php echo $grupo_parametro->pkgrupo_parametro != null ? $grupo_parametro->pkgrupo_parametro : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-producto" action="?c=grupo_parametro&a=guardarcambios" 
      method="post"  enctype="multipart/form-data"   >
    <input type="hidden" name="pkgrupo_parametro" value="<?php echo $grupo_parametro->pkgrupo_parametro; ?>" />
   
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre" 
                value="<?php echo $grupo_parametro->nombre ?>" required />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
        
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Observacion</label>
                <textarea class="form-control" placeholder="Ingrese la Observacion" name="observacion"
                 rows="3" style="resize: none;"><?php echo $grupo_parametro->observacion ?></textarea>
            </div>
        </div>
    </div>
   

    <hr/>
    <div class="text-center">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

