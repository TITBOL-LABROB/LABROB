<h1 class="page-header">
    <?php echo 'Nuevo Laboratorio'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=laboratorio" style="color: #263340";>Laboratorio </a></li>
    <li >Nuevo Registro</li>
</ol>

<form id="frm-producto" action="?c=laboratorio&a=guardar" 
      method="post" enctype="multipart/form-data" >
    <input type="hidden" name="pklaboratorio" value="" />

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" 
               class="form-control" placeholder="Ingrese el Nombre" required />
    </div>

    <div class="form-group">
        <label>Descripcion</label>
        <input type="text" name="descripcion" id="Telefono" 
               class="form-control"  placeholder="Ingrese la Descripcion" 
               data-validacion-laboratorio="requerido" />
    </div>

    <div class="form-group">
        <label>Tipo de Laboratorio</label>
        <select class="form-control" name="tipo_laboratorio" >
            <option value="Interno">Interno</option>
            <option value="Externo">Externo</option>
        </select>
    </div>


    <hr/>
    <div class="text-left">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

