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
                    
					
					<li class="menu-item-has-children<?php if ($_menu == 'asociaciones') { ?> active<?php } ?>"><a href="javascript:void(0);"><i class="list-icon fas fa-file-alt"></i> <span class="hide-menu">Asociaciones</span></a>
                        <ul class="list-unstyled sub-menu">
                             <!--<li><a href="entrenadores_add.php">Agregar Entrenador</a>
                            </li>-->                            
                            <li><a href="asociaciones.php">Listado</a></li>
                            <li><a href="asociaciones_regiones.php">Por Región</a></li>
                            <!--<li><a href="asociaciones_buscar.php">Buscar</a></li>-->
                            
                            
                        </ul>
                    </li>

                    <li class="menu-item-has-children<?php if ($_menu == 'clubes') { ?> active<?php } ?>"><a href="javascript:void(0);"><i class="list-icon fas fa-file-alt"></i> <span class="hide-menu">Clubes</span></a>
                        <ul class="list-unstyled sub-menu">
                             <!--<li><a href="entrenadores_add.php">Agregar Entrenador</a>
                            </li>-->                            
                            <li><a href="clubes.php">Listado</a></li>
                            <!--<li><a href="clubes_region.php">Por Región</a></li>
                            <li><a href="clubes_asociacion.php">Por Asociaciones</a></li>
                            <li><a href="clubes_buscar.php">Buscar</a></li>-->
                        </ul>
                    </li>


                    <li class="menu-item-has-children<?php if ($_menu == 'atletas') { ?> active<?php } ?>"><a href="javascript:void(0);"><i class="list-icon fas fa-file-alt"></i> <span class="hide-menu">Atletas</span></a>
                        <ul class="list-unstyled sub-menu">
                             <!--<li><a href="entrenadores_add.php">Agregar Entrenador</a>
                            </li>-->                            
                            <li><a href="atletas.php">Listado</a></li>
                            <li><a href="atletas_regiones.php">Por Región</a></li>
                            <!--<li><a href="atletas_disciplina.php">Por Disciplina</a></li>
                            <li><a href="atletas_region.php">Por Región</a></li>
                            <li><a href="atletas_asociaciones.php">Por Asociaciones</a></li>
                            <li><a href="atletas_clubes.php">Por Clubes</a></li>
                            <li><a href="atletas_buscar.php">Buscar</a></li>-->
                        </ul>
                    </li>

                    <li class="menu-item-has-children<?php if ($_menu == 'entrenadores') { ?> active<?php } ?>"><a href="javascript:void(0);"><i class="list-icon fas fa-file-alt"></i> <span class="hide-menu">Entrenadores</span></a>
                        <ul class="list-unstyled sub-menu">                            
                            <li><a href="entrenadores.php">Listado</a></li>
                            <li><a href="entrenadores_region.php">Por Región</a></li>
                            
                        </ul>
                    </li>


                    <li class="menu-item-has-children<?php if ($_menu == 'jueces') { ?> active<?php } ?>"><a href="javascript:void(0);"><i class="list-icon fas fa-file-alt"></i> <span class="hide-menu">Jueces</span></a>
                        <ul class="list-unstyled sub-menu">                            
                            <li><a href="jueces.php">Listado</a></li>
                            <li><a href="jueces_region.php">Por Región</a></li>
                            
                        </ul>
                    </li>

                    <li class="menu-item-has-children<?php if ($_menu == 'jueces') { ?> active<?php } ?>"><a href="javascript:void(0);"><i class="list-icon fas fa-file-alt"></i> <span class="hide-menu">Master</span></a>
                        <ul class="list-unstyled sub-menu">                            
                            <li><a href="master.php">Listado</a></li>
                            
                        </ul>
                    </li>
                     <li class="menu-item-has-children<?php if ($_menu == 'pases') { ?> active<?php } ?>"><a href="javascript:void(0);"><i class="list-icon fas fa-file-alt"></i> <span class="hide-menu">Pases</span></a>
                        <ul class="list-unstyled sub-menu">                            
                            <li><a href="pases.php">Listado</a></li>
                            
                        </ul>
                    </li>

                    <li class="menu-item-has-children<?php if ($_menu == 'pases') { ?> active<?php } ?>"><a href="javascript:void(0);"><i class="list-icon fas fa-file-alt"></i> <span class="hide-menu">Licencias</span></a>
                        <ul class="list-unstyled sub-menu">                            
                            <li><a href="licencias.php">Licencias pagadas</a></li>
                            <li><a href="licencias_pagos.php">Aprobacion de pagos</a></li>
                            <li><a href="licencias_pagadas.php">Pagos Procesados</a></li>
                            
                        </ul>
                    </li>
                    
                   
                </ul>
				<!--<p style="text-align:center"><img class="logo-expand" alt="" src="<?php echo BASE_PATH_CONTROL; ?>assets/img/logo-dark4.png?v=3.6"></p>-->
                <!-- /.side-menu -->
            </nav>
            <!-- /.sidebar-nav -->
        </aside>