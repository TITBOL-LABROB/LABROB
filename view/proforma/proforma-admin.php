<h1 class="page-header">Proforma</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" style="overflow: scroll; height: 500px">
            <div class="panel-heading">
                <a class="btn btn-primary" href="?c=proforma&a=nuevo"><i class="fa fa-plus"></i> Nueva Proforma</a>
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th >Codigo</th> 
                <th >Fecha</th>
                <th >Nombre</th>
                <th >Cliente</th>
                <th >Solicitante</th>
                <th >Correo Solicitante</th>
                <th >Institucion</th>
                <th >Telefono Solicitante</th>
                <th >Dias</th>
                <th >Diriguido a:</th>
               <th style="width: 300px;">Acciones          </th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($proformas as $r): ?>
                <tr>
                    <td><?php echo $r->codigo_completo; ?></td>
                    <td><?php echo $r->fecha; ?></td>
                    <td><?php echo $r->nombre; ?></td>
                    <td><?php
                     foreach ($clientes as $c )
                     {
                        if($c->pkcliente==$r->pkcliente) echo $c->nombre_cliente;
                     } ?> </td>
                    <td><?php echo $r->persona_solicitante; ?></td>
                    <td><?php echo $r->correo_solicitante; ?></td>
                    <td><?php echo $r->institucion; ?></td>
                    <td><?php echo $r->telefono_solicitante; ?></td>
                    <td><?php echo $r->dias; ?></td>
                    <td><?php echo $r->diriguido; ?></td>
                    <td>
                          <a style="margin-right:8px;color: #263340;" href="?c=proforma&a=editar&id=<?php echo $r->pkproforma; ?>">Agregar Matriz</a><i class="fa fa-plus" ></i>
                          <a style="margin-right:8px;color: #263;" href="?c=proforma&a=contrato&id=<?php echo $r->pkproforma; ?>"></i>Contrato</a><i class="fa fa-building" aria-hidden="true">
                          <a href="#" onclick="eliminar('<?php echo $r->pkproforma; ?>','<?php echo $r->nombre;?>','proforma')" style="color: darkred"></i> Eliminar</a><i class="fa fa-trash">
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