<h1 class="page-header">Parametro</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" style="overflow: scroll; height: 500px">
            <div class="panel-heading">
                <a class="btn btn-primary" href="?c=parametro&a=nuevo"><i class="fa fa-plus"></i> Nuevo Parametro</a>
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th style="width:150px;">Nombre</th>
                <th style="width:50px;">U. Medida</th>
                <th style="width:180px;" >Metodo</th>
                <th style="width:180px; ">Limite Cuantificable</th>
                <th style="width:180px; ">Limite Detectable</th>
                <th style="width:180px; ">Limite Admisible</th>
                <th style="width:180px; ">Laboratorio</th>
                <th style="width:180px; ">Matriz</th>
                <th style="width:50px;">Costo</th>
                <th style="width:100px;">Moneda</th>
               <th>Acciones</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parametros as $r): ?>
                <tr>
                    <td><?php echo $r->nombre; ?></td>
                    <td><?php echo $r->medida; ?></td>
                    <td><?php echo $r->metodo; ?></td>
                    <td><?php echo $r->limite_cuantificacion; ?></td>
                    <td><?php echo $r->limite_detectable; ?></td>
                    <td><?php echo $r->limite_admisible; ?></td>
                    <td><?php echo $r->laboratorio; ?></td>
                    <td><?php echo $r->matriz; ?></td>
                    <td><?php echo $r->costo; ?></td>
                    <td><?php echo $r->moneda; ?></td>
                    <td>
                          <a style="margin-right:8px;color: #263340;" href="?c=parametro&a=editar&id=<?php echo $r->pkparametro; ?>"><i class="fa fa-pencil" ></i>Editar</a>
                          <a href="#" onclick="eliminar('<?php echo $r->pkparametro; ?>','<?php echo $r->nombre;?>','parametro')" style="color: darkred"><i class="fa fa-trash"></i> Eliminar</a>
                    </td>
                   
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>

<!-- jQuery para buscador y paginacion-->
<script src="resources/bower_components/jquery/dist/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>