
        <nav class="navbar">
            <div class="container-fluid px-0 align-items-stretch">
                <!-- Logo Area -->
                <div class="navbar-header">
                    <a href="#" class="navbar-brand">
                        <img class="logo-expand" alt="" src="<?php echo BASE_PATH_CONTROL; ?>assets/img/logo-dark.png?v=3.4">
                        <img class="logo-collapse" alt="" src="<?php echo BASE_PATH_CONTROL; ?>assets/img/logo-collapse.png?v=3.4">
                    </a>
                </div>
                <!-- /.navbar-header -->
                <!-- Left Menu & Sidebar Toggle -->
                <ul class="nav navbar-nav">
                    <li class="sidebar-toggle dropdown"><a href="javascript:void(0)" class="ripple"><i class="material-icons list-icon md-24">menu</i></a>
                    </li>
                </ul>
                <!-- /.navbar-left -->
                <!-- Search Form -->
                
                <!-- /.navbar-search -->
                <div class="spacer"></div>
                <!-- Right Menu -->
				<!--
                <ul class="nav navbar-nav d-none d-lg-flex ml-2 ml-0-rtl">
                    <li class="dropdown"><a href="#"></a>
                       
                       
                    </li>
					<li class="dropdown"><a href="#"><img class="logo-expand" alt="" src="<?php echo BASE_PATH_CONTROL; ?>assets/img/logo-dark4.png?v=3.5"></a>
                   
                    </li>
                    
                </ul>
				-->
                <!-- /.navbar-right -->
                <!-- User Image with Dropdown -->
                <ul class="nav navbar-nav">
                    <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle dropdown-toggle-user ripple" data-toggle="dropdown"><span class="avatar thumb-xs2"><?php include('foto_perfil1.php');?> <i class="material-icons list-icon">expand_more</i></span></a>
                        <div
                        class="dropdown-menu dropdown-left dropdown-card dropdown-card-profile animated flipInY">
                            <div class="card">
                                
                                <ul class="list-unstyled card-body">
                                    <li><?php echo $authj->rowff['nombre']." ".$authj->rowff['apellido']." ".$authj->rowff['apellido2'];?></li>
                                    <li><a href="misdatos.php"><span><span class="align-middle">Datos personales</span></span></a>
                                    </li>
                                    <li><a href="misdatos_pass.php"><span><span class="align-middle">Cambiar Password</span></span></a>
                                    </li>
                                    
                                    <li><a href="salir.php"><span><span class="align-middle">Salir</span></span></a>
                                    </li>
                                </ul>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
            </div>
            <!-- /.dropdown-card-profile -->
            </li>
            <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-nav -->
    </div>
    <!-- /.container-fluid -->
    </nav>
    