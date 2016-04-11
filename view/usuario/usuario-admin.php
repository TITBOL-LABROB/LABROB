<h1 class="page-header">Usuario</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" style="overflow: scroll; height: 500px">
            <div class="panel-heading">
                <a class="btn btn-primary" href="?c=usuario&a=nuevo"><i class="fa fa-plus"></i> Nuevo Tipo de Usuario</a>
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th style="width:50px;">CI</th>
                <th style="width:150px;">Nombre</th>
                <th style="width:180px;" >Direccion</th>
                <th style="width:180px; ">Telefono</th>
                <th style="width:180px; ">Correo</th>
                <th style="width:180px; ">Tipo de Usuario</th>
                <th style="width:250px;">Acciones</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $r): ?>
                <tr>
                    <td><?php echo $r->ci; ?></td>
                    <td><?php echo $r->nombre; ?></td>
                    <td><?php echo $r->direccion; ?></td>
                    <td><?php echo $r->telefono; ?></td>
                    <td><?php echo $r->correo; ?></td>
                    <td><?php echo $r->tipo; ?></td>
                    <td>
                         <a style="margin-right:8px;color: #263340;" href="?c=privilegio&a=editar&id=<?php echo $r->pkusuario; ?>" ><i class="fa fa-lock"></i> Permisos</a>
                          <a style="margin-right:8px;color: #263340;" href="?c=usuario&a=editar&id=<?php echo $r->pkusuario; ?>"  ><i class="fa fa-pencil"></i>Editar</a>
                          <a href="#" onclick="eliminar('<?php echo $r->pkusuario; ?>','<?php echo $r->nombre;?>','usuario')" style="color: darkred"><i class="fa fa-trash"></i> Eliminar</a>
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