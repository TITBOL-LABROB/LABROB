<h1 class="page-header">Cliente Natural</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" style="overflow: scroll; height: 500px">
            <div class="panel-heading">
                <a class="btn btn-primary" href="?c=natural&a=nuevo"><i class="fa fa-plus"></i> Nuevo Cliente Natural</a>
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th >CI</th>
                <th >Nombre</th>
                <th >Direccion</th>
                <th >Tipo de Cliente</th>
                <th >Contacto</th>
                <th >Fijo</th>
                <th >Celular</th>
                <th >Correo</th>
                <th >Fax</th>
                <th >Descuento</th>
                <th >Acciones</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($natural as $r): ?>
                <tr>
                    <td><?php echo $r->ci; ?></td>
                    <td><?php echo $r->nombre; ?></td>
                    <td><?php echo $r->direccion; ?></td>
                    <td><?php echo $r->tipo_cliente; ?></td>
                    <td><?php echo $r->contacto; ?></td>
                    <td><?php echo $r->fijo; ?></td>
                    <td><?php echo $r->celular; ?></td>
                     <td><?php echo $r->correo; ?></td>
                      <td><?php echo $r->fax; ?></td>
                      <td><?php echo $r->descuento; ?></td>
                    <td>
                          <a style="margin-right:8px;color: #000;" href="?c=natural&a=editar&id=<?php echo $r->pkcliente; ?>&ci=<?php echo $r->ci;?>" ><i class="fa fa-pencil"></i>Editar</a>
                          <a href="#" onclick="eliminar('<?php echo $r->pkcliente; ?>','<?php echo $r->nombre;?>','natural')" style="color: darkred"><i class="fa fa-trash"></i> Eliminar</a>
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