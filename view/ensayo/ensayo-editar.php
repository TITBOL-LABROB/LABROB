<h1 class="page-header">
    <?php echo $ensayo->pkensayo != null ? $ensayo->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=ensayo" style="color: #263340";>Ensayo</a></li>
    <li class="active"><?php echo $ensayo->pkensayo != null ? $ensayo->nombre : 'Nuevo Registro'; ?></li>
</ol>
<form  action="?c=ensayo&a=guardarcambios" method="post" autocomplete="off" >

    <input type="hidden" name="pkensayo" value="<?php echo $ensayo->pkensayo; ?>" />
    <div class="row">
      
        <div class="col-md-6">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control"  value="<?php echo $ensayo->nombre ?>" 
                       placeholder="Ingrese su Nombre" required />
            </div>
            <div class="form-group">
                <label>Unidad de Medida</label>
                <select class="form-control" name="pkunidad" >
                    <?php foreach ($medidas as $u): ?>
                        <option value="<?php echo $u->pkunidad; ?>" <?php if ($ensayo->fkunidad == $u->pkunidad) echo "selected"; ?> ><?php echo $u->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>metodo</label>
                <input type="text" name="metodo" class="form-control" value="<?php echo $ensayo->metodo ?>" 
                       placeholder="Ingrese el metodo" required />
            </div>
            
            <div class="form-group">
                <label>Limite Cuantifocable</label>
                <input type="text" name="limite_cuantificable" class="form-control"  value="<?php echo $ensayo->limite_cuantificacion ?>"
                       placeholder="Ingrese el limite de cuantificacion" required />
            </div>
            <div class="form-group">
                <label>Limite Detectable</label>
                <input type="text" name="limite_detectable" class="form-control" value="<?php echo $ensayo->limite_detectable ?>" 
                       placeholder="Ingrese el limite de cuantificacion" required />
            </div>
        </div>
        <div class="col-md-6">    
            <div class="form-group">
                <label>Limite Admisible</label>
                <input type="text" name="limite_admisible" class="form-control" value="<?php echo $ensayo->limite_admisible ?>" 
                       placeholder="Ingrese el limite de cuantificacion" required />
            </div>
        <div class="form-group">
                <label>area</label>
                <select class="form-control" name="pkarea" >
                    <?php foreach ($areas as $l): ?>
                        <option value="<?php echo $l->pkarea; ?>" <?php if ($ensayo->fkarea == $l->pkarea) echo "selected"; ?> ><?php echo $l->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <div class="form-group">
                <label>Matriz</label>
                <select class="form-control" name="pkmatriz" >
                    <?php foreach ($matrices as $m): ?>
                        <option value="<?php echo $m->pkmatriz; ?>" <?php if ($ensayo->fkmatriz == $m->pkmatriz) echo "selected"; ?>><?php echo $m->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
        </div>
        <div class="form-group">
                <label>Costo</label>
                <input type="text" name="costo" class="form-control"  value="<?php echo $ensayo->costo ?>"
                       placeholder="Ingrese el Costo" required />
        </div>
        <div class="form-group">
                <label>Moneda</label>
                  <select class="form-control" name="moneda" >
            <option value="Bolivianos" <?php if ('Bolivianos' == $ensayo->moneda) echo "selected"; ?>>Bolivianos</option>
            <option value="Dolares" <?php if ('Dolares' == $ensayo->moneda) echo "selected"; ?>>Dolares</option>
        </select>
        </div>
    </div>            
</div>
        

        <hr/>
        <div class="text-left">
            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
        </div>
    </div>
</form>