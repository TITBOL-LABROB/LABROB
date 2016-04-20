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
    <?php echo 'Nuevo ensayo'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=ensayo" style="color: #263340";>Ensayo</a></li>
    <li class="active"><?php echo 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=ensayo&a=guardar" method="post" autocomplete="off" >
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
                <label>Rango de Trabajo Maximo</label>
                <input type="number" name="rango_maximo" min="0" class="form-control"  
                       placeholder="Ingrese el rango de trabajo maximo" required />
            </div>
            <div class="form-group">
                <label>Rango de Trabajo Minimo</label>
                <input type="number" name="rango_minimo" min="0" class="form-control"  
                       placeholder="Ingrese el rango de trabajo minimo" required />
            </div>
        <div class="form-group">
                <label>Costo</label>
                <input   name="costo" class="form-control"  pattern="[0-9]{1,5}" 
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
        <div class="col-md-6">    
            
        <div class="form-group">
                <label>Area</label>
                <select class="form-control" id="pkarea" name="pkarea" >
                    <?php foreach ($areas as $l): ?>
                        <option value="<?php echo $l->pkarea; ?>" ><?php echo $l->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

        <div class="form-group">
                <label>Tipo de Ensayo</label>
                <select class="form-control" id="pktipo_ensayo" name="fktipo_ensayo" >
                    <?php foreach ($tipos as $t): ?>
                    <option value="<?php echo $t->pktipo_ensayo; ?>" <?php if ($t->fkarea == $l->pkarea) echo "selected"; ?> ><?php echo $t->nombre; ?></option>
                <?php endforeach; ?>
                </select>
            </div>
         <div class="form-group">
                <label>Metodo</label>
                <select class="form-control" name="fkmetodo" >
                    <?php foreach ($metodos as $m): ?>
                        <option value="<?php echo $m->pkmetodo; ?>" ><?php echo $m->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
               </div>   
        <div class="form-group">
                <label>Limite Permitible</label>
                <input type="number" min="0" name="limite_permitible" class="form-control"  
                       placeholder="Ingrese el limite de cuantificacion" required />
        </div>
        <div class="form-group">
                <label>Normas</label>
                <textarea name="normas" class="form-control" style="height:110px;" 
                       placeholder="Ingrese el limite de cuantificacion" required></textarea>
        </div>         
        </div>    
         
        
    </div>            



    <hr/>
    <div class="text-center">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

