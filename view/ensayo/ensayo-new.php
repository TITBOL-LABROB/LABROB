<h1 class="page-header">
    <?php echo 'Nuevo ensayo'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=ensayo" style="color: #263340";>Ensayo</a></li>
    <li class="active"><?php echo 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=ensayo&a=guardar" method="post" autocomplete="off">
    <input type="hidden" name="pkensayo" value="0" />
   <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control"  
                       placeholder="Ingrese su Nombre" required />
            </div>
            <div class="form-group">
                <label>Unidad de Medida</label>
                <select class="form-control" name="pkunidad" >
                    <?php foreach ($medidas as $u): ?>
                        <option value="<?php echo $u->pkunidad; ?>" ><?php echo $u->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>metodo</label>
                <input type="text" name="metodo" class="form-control"  
                       placeholder="Ingrese el metodo" required />
            </div>
            
            <div class="form-group">
                <label>Limite Cuantifocable</label>
                <input type="text" name="limite_cuantificable" class="form-control"  
                       placeholder="Ingrese el limite de cuantificacion" required />
            </div>
            <div class="form-group">
                <label>Limite Detectable</label>
                <input type="text" name="limite_detectable" class="form-control"  
                       placeholder="Ingrese el limite de cuantificacion" required />
            </div>
        </div>
        <div class="col-md-6">    
            <div class="form-group">
                <label>Limite Admisible</label>
                <input type="text" name="limite_admisible" class="form-control"  
                       placeholder="Ingrese el limite de cuantificacion" required />
            </div>
        <div class="form-group">
                <label>area</label>
                <select class="form-control" name="pkarea" >
                    <?php foreach ($areas as $l): ?>
                        <option value="<?php echo $l->pkarea; ?>" ><?php echo $l->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <div class="form-group">
                <label>Matriz</label>
                <select class="form-control" name="pkmatriz" >
                    <?php foreach ($matrices as $m): ?>
                        <option value="<?php echo $m->pkmatriz; ?>" ><?php echo $m->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
        </div>
        <div class="form-group">
                <label>Costo</label>
                <input type="text" name="costo" class="form-control"  
                       placeholder="Ingrese el Costo" required />
        </div>
        <div class="form-group">
                <label>Moneda</label>
                  <select class="form-control" name="moneda" >
            <option value="Bolivianos">Bolivianos</option>
            <option value="Dolares">Dolares</option>
        </select>
        </div>
    </div>            

</div>


    <hr/>
    <div class="text-center">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

