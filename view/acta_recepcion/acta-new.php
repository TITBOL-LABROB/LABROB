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
                    <td style="width: 15%;"><b>Codigo de Muestra:</b></td>
                    <td style="width: 35%;"><b>Producto:</b></td>
                    <td style="width: 35%;"><b>Marca:</b></td>
                    <td style="width: 15%;"><b>Cantidad de Muestra:</b></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>50570</td>
                    <td><input type="text" class="form-control" name="producto1" value="Jugo Lacteo" /></td>
                    <td><input type="text" class="form-control" name="marca1" value="Alimentacion Complementaria Escolar" /></td>
                    <td><input type="text" class="form-control" name="cantidad1" value="5250" />
                    <select class="form-control" name="fkmuestra" style="width: 100%;" >
                        <?php foreach ($muestra as $m): ?>
                            <option value="<?php echo $m->pkmuestra; ?>" ><?php echo $m->nombre; ?></option>
                        <?php endforeach; ?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>50570</td>
                    <td><input type="text" class="form-control" name="producto1" value="Jugo Lacteo" /></td>
                    <td><input type="text" class="form-control" name="marca1" value="Alimentacion Complementaria Escolar" /></td>
                    <td><input type="text" class="form-control" name="cantidad1" value="5250" />
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

    <hr/>
    <div class="text-center">
        <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>

