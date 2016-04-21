<h1 class="page-header">
    <?php echo $norma->pknorma != null ? $norma->codigo."-".$norma->gestion."-".$norma->acapite : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=norma" style="color: #263340";>Norma</a></li>
    <li class="active"><?php echo $norma->pknorma != null ? $norma->pknorma : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-producto" action="?c=norma&a=guardarcambios" 
      method="post"  enctype="multipart/form-data"   >
    <input type="hidden" name="pknorma" value="<?php echo $norma->pknorma; ?>" />
   
    <div class="form-group">
        <label>Codigo</label>
        <input type="text"  name="codigo" value="<?php echo $norma->codigo; ?>" 
               class="form-control" placeholder="Ingrese el codigo" required />
    </div>
    <div class="form-group">
        <label>Año</label>
        <input type="text" name="gestion" value="<?php echo $norma->gestion; ?>" 
               class="form-control"  placeholder="Ingrese la año" required />
    </div>
    <div class="form-group">
        <label>Acapite</label>
        <input type="text" name="acapite" value="<?php echo $norma->acapite; ?>" 
               class="form-control"  placeholder="Ingrese el acapite"  />
    </div>

    <hr/>
    <div class="text-center">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

