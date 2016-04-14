<h1 class="page-header">
    <?php echo 'Nuevo Grupo de Parametro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=grupo_parametro " style="color: #263340";>Grupo de Parametro </a></li>
    <li >Nuevo Registro</li>
</ol>

<form id="frm-producto" action="?c=grupo_parametro&a=guardar" 
      method="post" enctype="multipart/form-data" >
    <input type="hidden" name="pkgrupo_parametro" value="" />

     <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre" required />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
        
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Observacion</label>
                <textarea class="form-control" placeholder="Ingrese la Observacion" name="observacion" rows="3" style="resize: none;"></textarea>
            </div>
        </div>
    </div>


    <hr/>
    <div class="text-center">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

