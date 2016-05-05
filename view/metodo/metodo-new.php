<h1 class="page-header">
    <?php echo 'Nuevo metodo'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=metodo" style="color: #263340";>metodo </a></li>
    <li >Nuevo Registro</li>
</ol>
<form id="frm-producto" action="?c=metodo&a=guardar" 
      method="post" enctype="multipart/form-data" >
    <input type="hidden" name="pkmetodo" value="" />

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" 
               class="form-control" placeholder="Ingrese el Nombre" required />
    </div>
    <div class="form-group">
        <label>Palabras Claves</label>
        <input type="text"  name="palabras_claves" 
               class="form-control"  placeholder="Ingrese las palabras claves" 
               required></input>
    </div>
    <div class="form-group">
        <label>Descripcion</label>
        <textarea  name="descripcion" id="Telefono"  style="resize: none;" 
               class="form-control"  placeholder="Ingrese la Descripcion" 
               required ></textarea>
    </div>
    


    <hr/>
    <div class="text-left">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

