<h1 class="page-header">
    <?php echo 'Nueva Norma'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=norma" style="color: #263340";>Norma </a></li>
    <li >Nuevo Registro</li>
</ol>

<form id="frm-producto" action="?c=norma&a=guardar" 
      method="post" enctype="multipart/form-data" >
    <input type="hidden" name="pknorma" value="" />

    <div class="form-group">
        <label>Codigo</label>
        <input type="text" name="codigo" 
               class="form-control" placeholder="Ingrese el codigo" required />
    </div>

    <div class="form-group">
        <label>Año</label>
        <input type="text" name="gestion"
               class="form-control"  placeholder="Ingrese el año" 
               data-validacion-norma="requerido" />
    </div>

    <div class="form-group">
        <label>Acapite</label>
        <input type="text" name="acapite" 
               class="form-control"  placeholder="Ingrese el acapite" />
    </div>


    <hr/>
    <div class="text-left">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

