<!DOCTYPE html>
<html lang="en">

<?php include('header.php');?>

<body class="sidebar-light sidebar-expand navbar-brand-dark">
    <div id="wrapper" class="wrapper">
        <!-- HEADER & TOP NAVIGATION -->
        <?php include('cabeza.php');?>
    <!-- /.navbar -->
    <div class="content-wrapper">
        <!-- SIDEBAR -->
        <?php include('menu.php');?>
        <!-- /.site-sidebar -->
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="container-fluid">
                <div class="row page-title clearfix">
                    <div class="page-title-left">
                        <h6 class="page-title-heading mr-0 mr-r-5"><a href="intro.php">Intro</a></h6>
                        <p class="page-title-description mr-0 d-none d-md-inline-block"></p>
                    </div>
                    <!-- /.page-title-left -->
                    <div class="page-title-right d-none d-sm-inline-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Intro</a>
                            </li>
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div>
                    <!-- /.page-title-right -->
                </div>
                <!-- /.page-title -->
            </div>
            <!-- /.container-fluid -->
            <!-- =================================== -->
            <!-- Different data widgets ============ -->
            <!-- =================================== -->
            <div class="container-fluid">
                <div class="widget-list row">
				
				<div class="widget-holder col-lg-6">
                        <div class="widget-bg">
                            <div class="widget-heading">
                                <h5 class="widget-title">Club: <?php 
								echo $clubes[0]['club'];?></h5>
                                <div class="widget-graph-info">
                                    <div class="dropdown"><a href="javascript:void(0)" class="dropdown-toggle text-muted fs-16" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">more_horiz</i></a>
                                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a>  <a class="dropdown-item" href="#">Another action</a>  <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.widget-graph-info -->
                            </div>
                            <!-- /.widget-heading -->
                            <div class="widget-body">
                                <div class="widget-top-countries-views">
								<?php 
									
									if(!empty($club)) {  ?>
                                    <ol>
									
									<?php $total = 0;
									$contador = 0;
									foreach($esp->row as $row_pais) { 									
										$conta_atle = Usuario::getAtletas ($id,$row_pais['id']);
									$contador ++;
										
										$total = $total + $conta_atle;
									
									?>
																	   
																	  <li><span class="country-tag bg-primary"><?php echo $row_pais['abreviatura'];?></span>  <span class="country-name"><?php echo $row_pais['especialidad'];?></span>  <span class="country-views"><?php echo $conta_atle;?> <span class="text-muted">atletas</span></span>
                                        </li>
																	<?php } ?>
																	
                                        
                                        
                                    </ol>
									
									<!--<div><strong>TOTAL DE ATLETAS: <?php echo $total;?></strong></div>-->
									<?php } else { ?>
									
									En la segunda fase de Registro de Instituciones en el Sistema de Registro de FECHIDA se registrarán los clubes.</br>
									Los Clubes afiliados a su Asociación se irán mostrando en esta sección a medida que se registren.
									<?php } ?>
                                </div>
                                <!-- /.widget-top-countries-views -->
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
					
					 <div class="widget-holder col-lg-4">
                        <div class="widget-bg text-inverse1">
                            <div class="widget-body">
                             
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
					
					
				</div>	
					
               
                
               
        
                
                <!-- /.widget-list -->
            </div>
            <!-- /.container-fluid -->
        </main>
        <!-- /.main-wrappper -->
        <!-- RIGHT SIDEBAR -->
     
        <!-- CHAT PANEL -->
       
        <!-- /.chat-panel -->
    </div>
    <!-- /.content-wrapper -->
    <!-- FOOTER -->
    <?php include('footer.php');?>
    </div>
    <!--/ #wrapper -->
    <?php include('cierre.php');?>
</body>

</html>