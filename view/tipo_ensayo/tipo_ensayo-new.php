<h1 class="page-header">
    <?php echo 'Nuevo Tipo de Ensayo'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=tipo_ensayo" style="color: #263340";>Tipo de Ensayo</a></li>
    <li >Nuevo Registro</li>
</ol>

<form id="frm-producto" action="?c=tipo_ensayo&a=guardar" 
      method="post" enctype="multipart/form-data" >
    <input type="hidden" name="pktipo_ensayo" value="" />

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" 
               class="form-control" placeholder="Ingrese el Nombre" required />
    </div>

    <div class="form-group">
        <label>Area</label>
        <select class="form-control" name="fkarea" >
           <?php foreach ($area as $a) {?>
            <option value="<?php echo $a->pkarea; ?>"><?php echo $a->nombre; ?></option>
            <?php } ?>  
        </select>
    </div>


    <hr/>
    <div class="text-left">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

