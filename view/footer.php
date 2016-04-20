    </div>
</div>
<!-- JavaScript bootstrap -->
<script src="resources/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <!--Inputs type add-->
    <script src="resources/bower_components/bootstrap/bootstrap-acknowledgeinput.min.js" ></script>
<!-- JavaScript para multimenu -->
<script src="resources/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- JavaScript para tablas -->
<script src="resources/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="resources/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<!-- JavaScript para fullscreen -->
<script src="resources/bower_components/fullscreen/index.js"></script>

<!-- JavaScript para Clock Cocks -->
<script type="text/javascript" src="resources/bower_components/clock/js/bootstrap-clockpicker.min.js"></script>

<!-- JavaScript para Calendario-->
<script type="text/javascript" src="resources/bower_components/calendar/js/zabuto_calendar.js"></script>

<!-- JavaScript para Multiselect -->
<script src="resources/bower_components/multiselect/js/bootstrap-multiselect.js"></script>
<script src="resources/bower_components/multiselect/js/bootstrap-multiselect-collapsible-groups.js"></script>

<!-- JavaScript principal -->
<script src="resources/js/jsprincipal.js"></script>

<script>
    var elemento='';
    var controlador='';
    var pk='';
    var existe=false;

    $(document).ready(function() {
        //Evento al presionar una tecla en los inputs. Ya que al imprimir se necesita los "Value" de los inputs
        $("input").keypress(function(){
            $(this).attr("value",$(this).val());
        });

        //Mensajes Sweet Alert
        var correcto = true;
        /*if ( == 1) {
            swal({
                imageUrl: 'resources/img/logo.png',
                title: '',
                text: 'Bienvenido de nuevo.',
                confirmButtonText: 'Cerrar',
                timer: 3000
            });
        }*/
        if (<?php echo $bandera; ?> == 1){
            var mensaje = "";
            switch ("<?php echo $tarea;?>") {
                case "agregar":
                    if ("<?php echo $exito;?>" == "si") {
                        mensaje = "Se ha agregado un nuevo ";
                    } else {
                        mensaje = "No se puede registrar un nuevo ";
                        correcto = false;
                    }
                    break;
                case "modificar":
                    if ("<?php echo $exito;?>" == "si") {
                        mensaje = "Se ha modificado un ";
                    } else {
                        mensaje = "Hubo un error al modificar un ";
                        correcto = false;
                    }
                    break;
                case "eliminar":
                    if ("<?php echo $exito;?>" == "si") {
                        mensaje = "Se ha eliminado un ";
                    } else {
                        mensaje = "Hubo un error al eliminar un ";
                        correcto = false;
                    }
                    break;
                case "username":
                    if ("<?php echo $exito;?>" == "si") {
                      ExisteUsername();
                      existe=true;
                    }
                    break;
                case "correo":
                    if ("<?php echo $exito;?>" == "si") {
                      ExisteCorreo();
                      existe=true;
                    }
                    break;
                case "tipo":
                    if ("<?php echo $exito;?>" == "si") {
                      ExisteTipo();
                      existe=true;
                    }
                    break;
                case "detalle_grupo":
                    if ("<?php echo $exito;?>" == "si") {
                      ExisteDetalleGrupo();
                      existe=true;
                    }
                    break;
                case "detalle_matriz":
                    if ("<?php echo $exito;?>" == "si") {
                      ExisteDetalleMatriz();
                      existe=true;
                    }
                    break;
                 case "detalle_proforma":
                    if ("<?php echo $exito;?>" == "si") {
                      ExisteDetalleProforma();
                      existe=true;
                    }
                    break;                       
            }
            mensaje = mensaje + "<?php echo $item;?>";
            if(existe==false) ShowMessage(mensaje, correcto);
        }
    });
    //Cuando la pagina haya cargado totalmente mostrar spinner
    $(window).load(function() {
        //$("#loader").fadeOut("slow");
        //setTimeout(function () {
        //    $("#loader").remove();
        //}, 1000);
    });

    function ShowMessage(mensaje, correcto){
        if (correcto){
            swal('Operacion completada', mensaje , 'success');
        }else{
            swal('Operacion cancelada', mensaje + '. El registro ingresado ya existe, asegurese de que los codigos no se esten repitiendo.', 'error');
        }
    }

    function confSubmit() {
        var btnguardar = document.getElementById("guardar");
        if (btnguardar != null) {
            btnguardar.innerHTML = "<i class='fa fa-spinner fa-spin'></i> Guardando por favor espere";
            btnguardar.disabled = true;
        }
        return true;
    }

    function eliminar(llave,ele,cont){
        elemento = ele;
        controlador = cont;
        pk = llave;
        swal({
                title: 'Eliminar '+elemento,
                text: '¿Esta seguro que desea eliminarlo?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: 'No',
                confirmButtonClass: 'confirm-class',
                cancelButtonClass: 'cancel-class',
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    var ubicacion = '?c='+controlador+'&a=eliminar&id='+pk;
                    window.location = ubicacion;
                }
            }
        );
    }
    
    function ExisteUsername(){
        swal({
                title: 'Registrar Usuario',
                text: 'El nombre de usuario ya existe',
                type: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Si',
                confirmButtonClass: 'confirm-class',
                closeOnConfirm: true,
            },
            function(isConfirm) {
                if (isConfirm) {
                    var ubicacion = '?c=usuario&a=nuevo';
                    window.location = ubicacion;
                }
            }
        );
    }
    function ExisteCorreo(){
        swal({
                title: 'Registrar Usuario',
                text: 'La direccion de correo ya existe',
                type: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Si',
                confirmButtonClass: 'confirm-class',
                closeOnConfirm: true,
            },
            function(isConfirm) {
                if (isConfirm) {
                    var ubicacion = '?c=usuario&a=nuevo';
                    window.location = ubicacion;
                }
            }
        );
    }
    function ExisteTipo(){
        swal({
                title: 'Registrar Tipo de Usuario',
                text: 'EL nombre del tipo de usuario ya existe',
                type: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Si',
                confirmButtonClass: 'confirm-class',
                closeOnConfirm: true,
            },
            function(isConfirm) {
                if (isConfirm) {
                    var ubicacion = '?c=tipo&a=nuevo';
                    window.location = ubicacion;
                }
            }
        );
    }

    function ExisteDetalleGrupo(){
        swal({
                title: 'Agregar Ensayo',
                text: 'EL Ensayo ya esta agregado en este grupo',
                type: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Si',
                confirmButtonClass: 'confirm-class',
                closeOnConfirm: true,
            },
            function(isConfirm) {
                if (isConfirm) {
                    var ubicacion = '?c=grupo_ensayo';
                    window.location = ubicacion;
                }
            }
        );
    }

    function ExisteDetalleMatriz(){
        swal({
                title: 'Agregar Ensayo',
                text: 'EL Ensayo ya esta agregado en esta matriz',
                type: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Si',
                confirmButtonClass: 'confirm-class',
                closeOnConfirm: true,
            },
            function(isConfirm) {
                if (isConfirm) {
                    var ubicacion = '?c=matriz';
                    window.location = ubicacion;
                }
            }
        );
    }

    function ExisteDetalleProforma(){
        swal({
                title: 'Agregar Parametro',
                text: 'EL parametro ya esta agregado en esta proforma',
                type: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Si',
                confirmButtonClass: 'confirm-class',
                closeOnConfirm: true,
            },
            function(isConfirm) {
                if (isConfirm) {
                    var ubicacion = '?c=proforma';
                    window.location = ubicacion;
                }
            }
        );
    }
    //Inicializar reloj
    $('.clockpicker').clockpicker()
        .find('input').change(function(){
            console.log(this.value);
        });
    var input = $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });

    
</script>
</body>
</html>