<h1 class="page-header">Norma</h1>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" style="overflow: scroll; height: 500px">
            <div class="panel-heading">
                <a class="btn btn-primary" href="?c=norma&a=nuevo"><i class="fa fa-plus"></i> Nueva Norma</a>
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th >Codigo</th>
                <th >Año<e/th>
                <th >Acapite</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $r): ?>
                <tr>
                    <td><?php echo $r->codigo; ?></td>
                    <td><?php echo $r->gestion; ?></td>
                    <td><?php echo $r->acapite; ?></td>
                    <td>
                        <a href="?c=norma&a=editar&id=<?php echo $r->pknorma; ?>" style="color: #263340;padding: 5px;"><i class="fa fa-pencil"></i>Editar</a>
                    
                        <a href="#" onclick="eliminar('<?php echo $r->pknorma; ?>','<?php echo $r->codigo."-".$r->gestion."-".$r->acapite;?>','norma')" style="color: darkred"><i class="fa fa-trash"></i> Eliminar</a>
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