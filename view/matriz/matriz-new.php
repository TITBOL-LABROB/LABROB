<h1 class="page-header">
    <?php echo 'Nueva Matriz'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=matriz " style="color: #263340";>Matriz</a></li>
    <li >Nuevo Registro</li>
</ol>

<form id="frm-producto" action="?c=matriz&a=guardar" 
      method="post" enctype="multipart/form-data" autocomplete="off" >
    <input type="hidden" name="pkgrupo_ensayo" value="" />

     <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese el Nombre" required />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
        
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Observacion</label>
                <textarea class="form-control" placeholder="Ingrese la Observacion" name="descripcion" rows="3" style="resize: none;"></textarea>
            </div>
        </div>
    </div>


    <hr/>
    <div class="text-center">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

