<h1 class="page-header">
    <?php echo 'Nuevo Tipo de Usuario'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=tipo" style="color: #263340";>Tipo </a></li>
    <li >Nuevo Registro</li>
</ol>

<form id="frm-producto" action="?c=tipo&a=guardar" 
      method="post" enctype="multipart/form-data" >
    <input type="hidden" name="pktipo" value="" />

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" 
               class="form-control" placeholder="Nombre" required />
    </div>

    <div class="form-group">
        <label>Descripcion</label>
        <input type="text" name="descripcion" id="Telefono" 
               class="form-control"  placeholder="Descripcion" 
               data-validacion-tipo="requerido|min:3" />
    </div>


    <hr/>
    <div class="text-left">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

