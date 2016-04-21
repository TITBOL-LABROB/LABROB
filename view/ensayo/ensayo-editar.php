<script >

$(document).ready(function() {
     var $cmbArea = $("#pkarea");
     $cmbArea.change(function () {
            var $codigo = $(this).val();
            if ($codigo > 0) 
            {
                var datos = {
                    codigo: $codigo
                };
                $.ajax({
                data:  datos,
                url:   'model/AddTipo.php',
                type:  'post',
                success:function (response) {
                        $("#pktipo_ensayo").html(response);
                }
              })
             
            }
      });
   });          
</script>
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
                <input type="text" name="nombre" class="form-control" value="<?php echo $ensayo->nombre; ?>" 
                       placeholder="Ingrese su Nombre" required />
            </div>
            <div class="form-group">
                <label>Unidad de Medida</label>
                <select class="form-control" name="pkunidad" >
                     <?php foreach ($medidas as $m): ?>
                    <option value="<?php echo $m->pkunidad; ?>" <?php if ($m->pkunidad == $ensayo->fkunidad) echo "selected"; ?> ><?php echo $m->nombre; ?></option>
                <?php endforeach; ?>
                </select>
            </div>
               
            
            <div class="form-group">
                <label>Rango de Trabajo Maximo</label>
                <input type="number" name="rango_maximo" min="0" class="form-control" value="<?php echo $ensayo->rango_maximo; ?>" 
                       placeholder="Ingrese el rango de trabajo maximo" required />
            </div>
            <div class="form-group">
                <label>Rango de Trabajo Maximo</label>
                <input type="number" name="rango_minimo" min="0" class="form-control" value="<?php echo $ensayo->rango_minimo; ?>" 
                       placeholder="Ingrese el rango de trabajo minimo" required />
            </div>
        <div class="form-group">
                <label>Costo</label>
                <input   name="costo" class="form-control"  pattern="[0-9]{1,5}" value="<?php echo $ensayo->costo; ?>"
                       placeholder="Ingrese el Costo" required />
        </div>
         
        </div>
        <div class="col-md-6">    
            
        <div class="form-group">
                <label>Area</label>
                <select class="form-control" id="pkarea" name="pkarea" >
                   <?php foreach ($areas as $a): ?>
                    <option value="<?php echo $a->pkarea; ?>" <?php if ($a->pkarea == $ensayo->fkarea) echo "selected"; ?> ><?php echo $a->nombre; ?></option>
                <?php endforeach; ?>
                </select>
            </div>

        <div class="form-group">
                <label>Tipo de Ensayo</label>
                <select class="form-control" id="pktipo_ensayo" name="fktipo_ensayo" >
                    <?php foreach ($tipos as $t): ?>
                    <option value="<?php echo $t->pktipo_ensayo; ?>" <?php if ($t->pktipo_ensayo == $ensayo->fktipo_ensayo) echo "selected"; ?> ><?php echo $t->nombre; ?></option>
                <?php endforeach; ?>
                </select>
            </div>
         <div class="form-group">
                <label>Metodo</label>
                <select class="form-control" name="fkmetodo" >
                 <?php foreach ($metodos as $m): ?>
                    <option value="<?php echo $m->pkmetodo; ?>" <?php if ($m->pkmetodo == $ensayo->fkmetodo) echo "selected"; ?> ><?php echo $m->nombre; ?></option>
                <?php endforeach; ?>
                </select>
               </div>   
        <div class="form-group">
                <label>Limite Permitible</label>
                <input type="number" min="0" name="limite_permitible" class="form-control"  value="<?php echo $ensayo->limite_permitible; ?>"
                       placeholder="Ingrese el limite de cuantificacion" required />
        </div>
        <div class="col-md-4"> 
        <div class="form-group">
                <label>Moneda</label>
                  <select class="form-control" name="moneda" >
            <option value="Bolivianos" <?php if ('Bolivianos'==$ensayo->moneda) echo "selected"; ?>>
            <?php echo "Bolivianos" ?></option>
            <option value="Dolares" <?php if ('Dolares'==$ensayo->moneda) echo "selected"; ?>>
            <?php echo "Dolares" ?></option>
        </select>
        </div>
        </div> 
        <div class="col-md-4">   
            <div class="form-group">
                <label>Con Acreditacion</label>
                <input type="radio" id="RBCon" name="acreditado" value="Si" class="form-control" <?php  if($ensayo->acreditado=="Si") echo "checked" ?>  style="height: 30px; width: 30px;" />
            </div>
         </div>
         <div class="col-md-4">     
            <div class="form-group">
                <label>Sin Acreditacion</label>
                <input type="radio" id="RBSin" name="acreditado" value="No" class="form-control" <?php  if($ensayo->acreditado=="No") echo "checked" ?>  style="height: 30px; width: 30px;" />
            </div>
         </div>         
        </div>             
</div>
        

        <hr/>
        <div class="text-center">
            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
        </div>
    </div>
</form>