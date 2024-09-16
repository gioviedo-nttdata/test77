        <aside class="site-sidebar scrollbar-enabled" data-suppress-scroll-x="true">
            <!-- User Details -->
          <div class="side-user">
                <figure class="side-user-bg" style="background-image: url(assets/demo/user-image-cropped.jpg)">
                    <img src="assets/demo/user-image-cropped.jpg" alt="" class="d-none">
                </figure>
                <div class="col-sm-12 text-center p-0 clearfix">
                    <div class="d-inline-block pos-relative mr-b-10">
                        
                            <img src="<?php echo BASE_PATH_CONTROL; ?>assets/img/logo-dark.png?v=3.5" class="rounded-circle" alt="">
                        
                    </div>
                    <!-- /.d-inline-block -->
                   
                </div>
                <!-- /.col-sm-12 -->
            </div>
            <!-- /.side-user -->
            <!-- Sidebar Menu -->
            <nav class="sidebar-nav">
                <ul class="nav in side-menu">
                    <li class="menu-item-has-children<?php if ($_page=='intro') { ?> current-page<?php } ?>"><a href="<?php echo BASE_PATH_CONTROL; ?>intro.php"><i class="list-icon material-icons">home</i> <span class="hide-menu">Intro</span></a>         
                    </li>
                    <li class="menu-item-has-children<?php if ($_menu == 'ayuda') { ?> active<?php } ?>"><a href="javascript:void(0);"><i class="list-icon fas fa-question-circle"></i> <span class="hide-menu">Ayuda</span></a>
                        <ul class="list-unstyled sub-menu">
                             <!--<li><a href="entrenadores_add.php">Agregar Entrenador</a>
                            </li>-->                            
                            <li><a href="/ayuda_jueces.php" target="_blank">Ver Video</a></li>
                            <li><a data-toggle="modal" data-target=".bs-modal-lg-primary6">Solicitar ayuda</a></li>
                        </ul>
                    </li>
                     
                    <?php if ($authj->rowff['admin'] == 1 || $authj->rowff['entrenador'] == 1 || $authj->rowff['admin'] == 1 || $authj->rowff['sysadmin'] == 1) { ?>
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
                    <?php } ?>
                    
                   
                </ul>
				<!--<p style="text-align:center"><img class="logo-expand" alt="" src="<?php echo BASE_PATH_CONTROL; ?>assets/img/logo-dark4.png?v=3.6"></p>-->
                <!-- /.side-menu -->
            </nav>
            <!-- /.sidebar-nav -->
        </aside>