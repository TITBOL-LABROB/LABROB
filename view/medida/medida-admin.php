<h1 class="page-header">Unidad de Medidad</h1>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" style="overflow: scroll; height: 500px">
            <div class="panel-heading">
                <a class="btn btn-primary" href="?c=medida&a=nuevo"><i class="fa fa-plus"></i> Nueva Unidad de Medidad</a>
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $r): ?>
                <tr>
                    <td><?php echo $r->pkunidad; ?></td>
                    <td><?php echo $r->nombre; ?></td>
                    <td>
                        <a href="?c=medida&a=editar&id=<?php echo $r->pkunidad; ?>" style="color: #263340; padding: 5px;"><i class="fa fa-pencil" ></i>Editar</a>
                        <a href="#" onclick="eliminar('<?php echo $r->pkunidad; ?>','<?php echo $r->nombre;?>','medida')" style="color: darkred"><i class="fa fa-trash"></i> Eliminar</a>
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
