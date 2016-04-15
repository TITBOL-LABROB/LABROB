<h1 class="page-header">Institucion</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" style="overflow: scroll; height: 500px">
            <div class="panel-heading">
                <a class="btn btn-primary" href="?c=institucion&a=nuevo"><i class="fa fa-plus"></i> Nueva Institucion</a>
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th >Nit</th>
                <th >Nombre</th>
                <th >Direccion</th>
                <th >Telefono</th>
                <th >Correo</th>
                <th >Fax</th>
                <th >Acciones</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($institucion as $r): ?>
                <tr>
                    <td><?php echo $r->nit; ?></td>
                    <td><?php echo $r->nombre; ?></td>
                    <td><?php echo $r->direccion; ?></td>
                    <td><?php echo $r->telefono; ?></td>
                     <td><?php echo $r->correo; ?></td>
                      <td><?php echo $r->fax; ?></td>
                    <td>
                          <a style="margin-right:8px;color: #000;" href="?c=institucion&a=editar&id=<?php echo $r->pkinstitucion; ?>" ><i class="fa fa-pencil"></i>Editar</a>
                          <a href="#" onclick="eliminar('<?php echo $r->pkinstitucion; ?>','<?php echo $r->nombre;?>','institucion')" style="color: darkred"><i class="fa fa-trash"></i> Eliminar</a>
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