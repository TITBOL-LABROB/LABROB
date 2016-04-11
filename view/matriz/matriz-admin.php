<h1 class="page-header">Matriz</h1>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" style="overflow: scroll; height: 500px">
            <div class="panel-heading">
                <a class="btn btn-primary" href="?c=matriz&a=nuevo"><i class="fa fa-plus"></i> Nueva Matriz</a>
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th >Id</th>
                <th>Nombre</th>
                <th >Descripcion</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $r): ?>
                <tr>
                    <td><?php echo $r->pkmatriz; ?></td>
                    <td><?php echo $r->nombre; ?></td>
                    <td><?php echo $r->descripcion ?></td>
                    <td>
                        <a href="?c=matriz&a=editar&id=<?php echo $r->pkmatriz; ?>" style="color: #263340; padding: 5px;"><i class="fa fa-pencil"></i>Editar</a>
                    
                        <a href="#" onclick="eliminar('<?php echo $r->pkmatriz; ?>','<?php echo $r->nombre;?>','matriz')" style="color: darkred"><i class="fa fa-trash"></i> Eliminar</a>
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