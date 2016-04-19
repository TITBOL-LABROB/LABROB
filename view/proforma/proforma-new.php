<script>
    $(document).ready(function() {
    var $institucion = $("#institucion");
     $( "#RBSin" ).change(function() {
            $institucion.attr('disabled',true);
         //   $institucion.attr('value',null);
      });
     $( "#RBCon" ).change(function() {
            $institucion.attr('disabled',false);
      });
   });          
</script>

<h1 class="page-header">
    <?php echo 'Nueva Proforma'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=proforma" style="color: #263340";>Proforma</a></li>
    <li class="active"><?php echo 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=proforma&a=guardar" method="post" autocomplete="off">
    <input type="hidden" name="pkproforma" value="0" />
   <div class="row">
        <div class="col-md-6">
        <div class="form-group">
                <label>Fecha Solicitud</label>
                <input <input class="form-control" type="date" name="fecha"  
                       placeholder="Ingrese el metodo" required />
            </div>
            
            <div class="form-group">
                <label>Cliente</label>
                 <select class="form-control" name="pkcliente" >
                    <?php foreach ($clientes as $c): ?>
                        <option value="<?php echo $c->pkcliente; ?>" ><?php if($c->nombre_cliente!='') echo $c->nombre_cliente; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Solicitante</label>
                <input type="text" name="persona_solicitante" class="form-control"  
                       placeholder="Ingrese la persona que lo solicita" required />
            </div>
            <div class="form-group">
                <label>Correo del Solicitante</label>
                <input type="email" name="correo_solicitante" class="form-control"  
                       placeholder="Ingrese el correo del solicitante" required />
            </div>
            <div class="form-group">
                <label>Telefono del Solicitante</label>
                <input type="text" name="telefono_solicitante" class="form-control"  
                       placeholder="Ingrese el telefono del solicitante" required />
            </div>
        </div>
        <div class="col-md-6">     
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" 
                       placeholder="Ingrese el Nombre" required />
            </div>
         <div class="col-md-6">   
            <div class="form-group">
                <label>Con Institucion</label>
                <input type="radio" id="RBCon" name="RB" class="form-control" checked style="height: 30px; width: 30px;" />
            </div>
         </div>
         <div class="col-md-6">     
            <div class="form-group">
                <label>Sin Institucion</label>
                <input type="radio" id="RBSin" name="RB" class="form-control" style="height: 30px; width: 30px;" />
            </div>
         </div>   
            <div class="form-group">
                <label>Institucion Solicitante</label>
               <select class="form-control" name="fkinstitucion" id="institucion">
           <?php foreach ($instituciones as $i) {?>
            <option value="<?php echo $i->pkinstitucion; ?>"><?php echo $i->nombre; ?></option>
            <?php } ?>  
        </select>
            </div>
            
           
            <div class="form-group">
                <label>Dias de Presentacion de informe</label>
                <input type="text" name="dias" class="form-control"  
                       placeholder="Ingrese los dias de presentacion de informe" required />
            </div>
        <div class="form-group">
                <label>A quien va diriguido</label>
                  <input type="text" name="diriguido" class="form-control"  
                       placeholder="A quien va diriguido el informe" required />
        </div>
    </div>            

</div>


    <hr/>
    <div class="text-center">
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

