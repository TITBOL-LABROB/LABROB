<h1 class="page-header">
    <?php echo $tipo_ensayo->pktipo_ensayo != null ? $tipo_ensayo->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=tipo_ensayo" style="color: #263340";>Tipo de Ensayo</a></li>
    <li class="active"><?php echo $tipo_ensayo->pktipo_ensayo != null ? $tipo_ensayo->pktipo_ensayo : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-producto" action="?c=tipo_ensayo&a=guardarcambios" 
      method="post"  enctype="multipart/form-data"   >
    <input type="hidden" name="pktipo_ensayo" value="<?php echo $tipo_ensayo->pktipo_ensayo; ?>" />
   
    <div class="form-group">
        <label>Nombre</label>
        <input type="text"  name="nombre" value="<?php echo $tipo_ensayo->nombre; ?>" 
               class="form-control" placeholder="Ingrese el nombre" required />
    </div>
    <div class="form-group">
        <label>Area</label>
        <select class="form-control" name="fkarea" >
            <?php foreach ($area as $a): ?>
                    <option value="<?php echo $a->pkarea; ?>" <?php if ($a->pkarea == $tipo_ensayo->fkarea) echo "selected"; ?> ><?php echo $a->nombre; ?></option>
                <?php endforeach; ?>
        </select>
    </div>

    <hr/>
    <div class="text-center">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

