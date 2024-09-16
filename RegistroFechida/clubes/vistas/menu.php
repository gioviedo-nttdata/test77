        <aside class="site-sidebar scrollbar-enabled" data-suppress-scroll-x="true">
            <!-- User Details -->
          <div class="side-user">
                <figure class="side-user-bg" style="background-image: url(assets/demo/user-image-cropped.jpg)">
                    <img src="assets/demo/user-image-cropped.jpg" alt="" class="d-none">
                </figure>
                <!-- /.col-sm-12 -->
            </div>
            <!-- /.side-user -->
            <!-- Sidebar Menu -->
            <nav class="sidebar-nav">
                <ul class="nav in side-menu">
                    <li class="menu-item-has-children<?php if ($_page=='intro') { ?> current-page<?php } ?>"><a href="<?php echo BASE_PATH_CONTROL; ?>intro.php"><i class="list-icon material-icons">home</i> <span class="hide-menu">Intro</span></a>
                    </li>

                    <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon fas fa-swimmer"></i> <span class="hide-menu" style="line-height: 1.2;">Solicitudes de torneo</span></a>
                        <ul class="list-unstyled sub-menu">
                            <li><a href="solicitudes_torneo_up.php">Subir solicitud</a> </li>
							<li><a href="solicitudes_torneo.php">Ver solicitudes</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children<?php if ($_menu == 'nadadores') { ?> active<?php } ?>"><a href="javascript:void(0);"><i class="list-icon fas fa-swimmer"></i> <span class="hide-menu"> Atletas <!--<span class="badge bg-primary">6</span>--></span></a>
                        <ul class="list-unstyled sub-menu">
                           
                            <li><a href="nadadores.php?disciplina=1">Natación</a>
							<li><a href="nadadores.php?disciplina=5">Aguas Abiertas</a></li>
                            </li>
                            <li><a href="nadadores.php?disciplina=3">Nado Artístico</a></li>
                           
                            <li><a href="nadadores.php?disciplina=2">Waterpolo</a>
                            </li>
                            <li><a href="nadadores.php?disciplina=4">Clavados</a></li>
                           
                        
                            
                        </ul>
                    </li>
                    <li class="menu-item-has-children<?php if ($_menu == 'entrenadores') { ?> active<?php } ?>"><a href="javascript:void(0);"><i class="list-icon fas fa-medal"></i> <span class="hide-menu">Entrenadores</span></a>
                        <ul class="list-unstyled sub-menu">
                             <!--<li><a href="entrenadores_add.php">Agregar Entrenador</a>
                            </li>-->
                            
                            <li><a href="entrenadores.php">Ver Entrenadores</a></li>
                            
                            
                        </ul>
                    </li>
					
					<li class="menu-item-has-children<?php if ($_menu == 'documentos') { ?> active<?php } ?>"><a href="javascript:void(0);"><i class="list-icon fas fa-file-alt"></i> <span class="hide-menu">Documentación</span></a>
                        <ul class="list-unstyled sub-menu">
                             <!--<li><a href="entrenadores_add.php">Agregar Entrenador</a>
                            </li>-->
                            
                            <li><a href="documentos.php">Documentación</a></li>
                            
                            
                        </ul>
                    </li>

                    <li class="menu-item-has-children<?php if ($_menu == 'renovar') { ?> active<?php } ?>"><a href="javascript:void(0);"><i class="list-icon fas fa-star"></i> <span class="hide-menu">LICENCIAS</span></a>
                        <ul class="list-unstyled sub-menu">
                             <!--<li><a href="entrenadores_add.php">Agregar Entrenador</a>
                            </li>-->
                            
                            <li><a href="renovar.php">Pagar Licencia</a></li>
                            
                            
                        </ul>
                    </li>
                     <li class="menu-item-has-children<?php if ($_menu == 'nadadores') { ?> active<?php } ?>"><a href="javascript:void(0);"><i class="list-icon fas fa-swimmer"></i> <span class="hide-menu"> Pases <!--<span class="badge bg-primary">6</span>--></span></a>
                        <ul class="list-unstyled sub-menu">
                           
                            <li><a href="pases.php">Inciar Pases</a>
							
                           
                        
                            
                        </ul>
                    </li>

                    <li class="menu-item-has-children<?php if ($_menu == 'ayuda') { ?> active<?php } ?>"><a href="javascript:void(0);"><i class="list-icon fas fa-question-circle"></i> <span class="hide-menu">Ayuda</span></a>
                        <ul class="list-unstyled sub-menu">
                             <!--<li><a href="entrenadores_add.php">Agregar Entrenador</a>
                            </li>-->
                            
                            <li><a href="/ayuda_club.php" target="_blank">Ver Video</a></li>
                            <li><a data-toggle="modal" data-target=".bs-modal-lg-primary6">Solicitar ayuda</a></li>
                            
                            
                        </ul>
                    </li>
                   
                    
                     
                
                    <li class="menu-item-has-children<?php if ($_menu == 'config') { ?> active<?php } ?>"><a href="javascript:void(0);"><i class="list-icon  material-icons">settings</i> <span class="hide-menu">Configuraciones</span></a>
                        <ul class="list-unstyled sub-menu">
                            <li><a href="colegios.php">Colegios</a></li>
                            <li><a href="grupos.php">Grupos</a>
                            </li>
                            <li><a href="categorias.php">Categorias</a>
                            </li>
                            <li><a href="federaciones.php">Federaciones</a>
                            </li>
                            <li><a href="pruebas.php">Pruebas</a>
                            </li>
                            <li class="menu-item-has-children active"><a href="javascript:void(0);">Usuarios</a>
                                <ul class="list-unstyled sub-menu<?php if ($_page == 'usuarios' or $_page == 'usuarios_add') { ?> active<?php } ?>">
                                    <li><a href="usuarios_add.php">Agregar Usuario</a></li>
                                    <li><a href="usuarios.php">Ver Usuarios</a></li>
                                </ul>
                            </li>
                           
                           
                        </ul>
                    </li>

                    
                   
                </ul>
				<!--<p style="text-align:center"><img class="logo-expand" alt="" src="<?php echo BASE_PATH_CONTROL; ?>assets/img/logo-dark4.png?v=3.6"></p>-->
                <!-- /.side-menu -->
            </nav>
            <!-- /.sidebar-nav -->
        </aside>