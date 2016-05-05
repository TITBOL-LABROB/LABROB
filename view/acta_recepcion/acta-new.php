<h1 class="page-header">
    <?php echo 'Nuevo Acta de Recepcion'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=area" style="color: #263340";>Acta de Recepcion </a></li>
    <li>Nueva Acta</li>
</ol>

<form id="frm-producto" action="?c=acta&a=guardar" 
      method="post" enctype="multipart/form-data" >
    <input type="hidden" name="pkarea" value="" />

    <div class="form-group">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td style="width: 30%;"></td>
                    <td style="font-size: 18px;"><b>ACTA RECEPCION DE MUESTRAS</b></td>
                    <td><b>N* 26878</b></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>FR-RE-001</td>
                    <td>Version: 02</td>
                    <td>Pagina 1 de N</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" border="1">
            <thead style="background-color: black; color: white;">
                <tr>
                    <td style="width: 10%;"><b>Codigo de Muestra:</b></td>
                    <td style="width: 35%;"><b>Producto:</b></td>
                    <td style="width: 35%;"><b>Marca:</b></td>
                    <td style="width: 20%;" colspan="2"><b>Cantidad de Muestra:</b></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" class="form-control" name="Codigo1" value="50570" /></td>
                    <td><input type="text" class="form-control" name="producto1" value="Jugo Lacteo" /></td>
                    <td><input type="text" class="form-control" name="marca1" value="Alimentacion Complementaria Escolar" /></td>
                    <td><input type="text" class="form-control" name="cantidad1" value="5250" /></td>
                    <td width="10%">
                    <select class="form-control" name="fkmuestra" style="width: 100%;" >
                        <?php foreach ($muestra as $m): ?>
                            <option value="<?php echo $m->pkmuestra; ?>" ><?php echo $m->nombre; ?></option>
                        <?php endforeach; ?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="text" class="form-control" name="Codigo1" value="50571" /></td>
                    <td><input type="text" class="form-control" name="producto1" value="Jugo Lacteo" /></td>
                    <td><input type="text" class="form-control" name="marca1" value="Alimentacion Complementaria Escolar" /></td>
                    <td><input type="text" class="form-control" name="cantidad1" value="5250" /></td>
                    <td>
                    <select class="form-control" name="fkmuestra" style="width: 100%;" >
                        <?php foreach ($muestra as $m): ?>
                            <option value="<?php echo $m->pkmuestra; ?>" ><?php echo $m->nombre; ?></option>
                        <?php endforeach; ?>
                    </select>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <td><label>Caracteristica</label><textarea class="form-control" style="resize:none;" rows="3" ></textarea></td>
            </tr>
            <tr>
                <td><label>Caracteristica</label><textarea class="form-control" style="resize:none;" rows="3" ></textarea></td>
            </tr>
        </table>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <label>Propietario</label>
            <input type="text" class="form-control" name="Propietario">
        </div>
        <div class="col-md-4">
            
        </div>
        <div class="col-md-6">
            <label>Telefono</label>
            <input type="text" class="form-control" name="Telefono">
        </div>
    </div>

    <div class="form-group">
        <label for="Direccion">Direccion</label>
        <input type="text" name="Direccion" id="Direccion" class="form-control" />
    </div>

    <div class="form-group">
        <label for="Ensayos_requeridos">Ensayos Requeridos:</label>
        <input type="text" name="Ensayos_requeridos" id="Ensayos_requeridos" class="form-control" value="Segun Proforma N*.   " readonly="true" />
    </div>

    <div class="form-group">
        <label for="Observacion">Observacion</label>
        <textarea name="Observacion" id="Observacion" rows="3" class="form-control" style="resize: none;"></textarea>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label>Responsable de la Muestra:</label>
            <input type="text" class="form-control" name="Responsable_Muestra">
        </div>
        <div class="col-md-4">
            
        </div>
        <div class="col-md-6">
            <label>Fecha y hora de Recepcion:</label>
            <input type="text" class="form-control" name="Fecha_Recepcion">
        </div>
    </div>
    
    <div class="form-group">
        <label>Fecha y Hora de entrega de resultados</label>
        <input type="text" class="form-control" name="Fecha_Entrega">
    </div>

    <div class="row">
        <div class="col-md-6">
            <label>Entregado por:</label>
            <input type="text" class="form-control" name="Entregado">
        </div>
        <div class="col-md-4">
            
        </div>
        <div class="col-md-6">
            <label>CI:</label>
            <input type="text" class="form-control" name="CI_Entregado">
        </div>
    </div>
    <hr/>
    <div class="text-center">
        <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

