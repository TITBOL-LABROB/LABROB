<!--Estilo para el menu-->
<style>
    a{
        color: #ffffff;
    }
</style>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0 ; background-color: #263340; border-color: #263340">
        <div class="navbar-header" style="height: 70px;">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><span ><img src="resources/img/logotipo2.png" width="60" height="50"></span>LABROB</a>
        </div>
        <!-- Barra horizontal -->
        <ul class="nav navbar-top-links navbar-right" >
            <!-- Mensajes -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" >
                    <i class="fa fa-envelope fa-fw"></i><span class="badge" style="background-color: darkred;"> 1</span> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        <a href="#">
                            <div>
                                <strong>John Smith</strong>
                                                <span class="pull-right text-muted">
                                                    <em>Yesterday</em>
                                                </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <strong>John Smith</strong>
                                                <span class="pull-right text-muted">
                                                    <em>Yesterday</em>
                                                </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <strong>John Smith</strong>
                                                <span class="pull-right text-muted">
                                                    <em>Yesterday</em>
                                                </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>Read All Messages</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Notificaciones de redes sociales -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                <span class="pull-right text-muted small">12 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> Message Sent
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-tasks fa-fw"></i> New Task
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Mi perfil -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li>
                        <a href="?c=usuario&a=perfil"><i class="fa fa-user fa-fw"></i> Perfil de Usuario</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-gear fa-fw"></i> Configuraciones</a>
                    </li>
                    <li>
                        <a href="#" id='fullscreen'><i class="fa fa-expand fa-fw"></i> Pantalla completa</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="logout.php"><i class="fa fa-power-off fa-fw"></i> Cerrar sesion</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!--Menu vertical-->
        <div class="navbar-default sidebar" role="navigation" style=" background-color: #263340; margin-top: 100px;">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="index.php"><i class="fa fa-home fa-fw fa-3x"></i> Inicio</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-flask fa-fw fa-3x"></i> Analisis de Laboratorio<span class="fa arrow" style="margin-top: 20px"></span></a>
                        <ul class="nav nav-second-level">
                        <li>
                                <a href="?c=area"><i class="fa fa-building fa-fw fa-2x"></i> Area</a>
                            </li>
                            <li>
                                <a href="?c=norma"><i class="fa fa-file-text-o fa-fw fa-2x"></i>Norma</a>
                            </li>
                            <li>
                                <a href="?c=grupo_ensayo"><i class="fa fa-wrench fa-fw fa-2x"></i> Grupo de Ensayo</a>
                            </li>
                            <li>
                                <a href="?c=matriz"><i class="fa fa-table fa-fw fa-2x"></i> Matriz</a>
                            </li>
                            <li>
                                <a href="?c=tipo_ensayo"><i class="fa fa-crop fa-fw fa-2x"></i>Tipo de Ensayo</a>
                            </li>

                            <li>
                                <a href="?c=ensayo"><i class="fa fa-flask fa-fw fa-2x"></i> Ensayo</a>
                            </li>
                             <li>
                                <a href="?c=metodo"><i class="fa fa-crop fa-fw fa-2x"></i> Metodo</a>
                            </li>
                            <li>
                                <a href="?c=proforma"><i class="fa fa-file-archive-o fa-fw fa-2x" aria-hidden="true"></i> Proforma</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user fa-fw fa-3x"></i> Entidades<span class="fa arrow" style="margin-top: 20px"></span></a>
                        <ul class="nav nav-second-level">
                         <li>
                                <a href="?c=natural"><i class="fa fa-child fa-fw fa-2x"></i>Cliente Natural</a>
                            </li>
                            <li>
                                <a href="?c=juridico"><i class="fa fa-child fa-fw fa-2x"></i> Cliente Juridico</a>
                            </li>
                            <li>
                                <a href="?c=institucion"><i class="fa fa-hospital-o fa-fw fa-2x"></i> Institucion</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cog fa-fw fa-3x"></i> Configuracion<span class="fa arrow" style="margin-top: 20px"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="?c=matriz"><i class="fa fa-table fa-fw fa-2x"></i> Matriz</a>
                            </li>
                            <li>
                                <a href="?c=medida"><i class="fa fa-flask fa-fw fa-2x"></i> Unidad de Medida</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="?c=formularios"><i class="fa fa-files-o fa-fw fa-3x"></i> Formularios</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-lock fa-fw fa-3x"></i> Seguridad<span class="fa arrow" style="margin-top: 20px"></span></a>
                        <ul class="nav nav-second-level">
                         <li>
                                <a href="?c=tipo"><i class="fa fa-users fa-fw fa-2x"></i>Tipo de Usuario</a>
                            </li>
                            <li>
                                <a href="?c=usuario"><i class="fa fa-user fa-fw fa-2x"></i> Usuario</a>
                            </li>
                            <li>
                                <a href="?c=bitacora"><i class="fa fa-desktop fa-fw fa-2x"></i> Bitacora</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

