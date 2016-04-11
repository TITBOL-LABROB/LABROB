<h1 class="page-header">
    <?php echo 'Nueva Unidad de Medida'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=medida" style="color: #263340";>Unidad de Medida </a></li>
    <li >Nuevo Registro</li>
</ol>

<form id="frm-producto" action="?c=medida&a=guardar" 
      method="post" enctype="multipart/form-data" >
    <input type="hidden" name="pkunidad" value="" />

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" 
               class="form-control" placeholder="Nombre de la unidad de medida" required />
    </div>


    <hr/>
    <div class="text-left">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

