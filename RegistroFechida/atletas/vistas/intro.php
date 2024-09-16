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
                        <h6 class="page-title-heading mr-0 mr-r-5">Intro</h6>
                        <p class="page-title-description mr-0 d-none d-md-inline-block">Asociaciones</p>
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
                                <h5 class="widget-title">Clubes de la Asociación</h5>
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
									foreach($clubes as $row_pais) { 
									$contador ++;
										$conta_atle = Usuario::getAtletas ($row_pais['id'],"");
										$total = $total + $conta_atle;
									
									?>
																	   
																	  <li><span class="country-tag bg-primary"><?php echo $contador;?></span>  <span class="country-name"><a href="intro_clubes.php?id=<?php echo $row_pais['id'];?>"><?php echo $row_pais['club'];?></a></span>  <span class="country-views"><?php echo $conta_atle;?> <span class="text-muted">atletas</span></span>
                                        </li>
																	<?php } ?>
																	
                                        
                                        
                                    </ol>
									
									<div><strong>TOTAL DE ATLETAS: <?php echo $total;?></strong></div>
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
                                <div class="row">
                    <div class="col-md-12 widget-holder">
                        <h5 class="box-title">Agregar Documentos (carnet de identidad y certificados de capacitaciones como juez): <?php echo $comp->rowff['club']?></h5>
                        <div class="formulario">
            		  <!-- /.box-header -->
             		  <!-- form start -->
             			<div id="dropzone" class="dropzone"></div>
            		</div>
                    </div>
                    <div class="col-md-12 widget-holder">
					<div id="statusMsg"></div>
                            <div class="widget-bg">
                                <div class="widget-body" id="docu_id">
                                    <h5 class="box-title">Documentos agregados</h5>
                                    
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Documento</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  foreach ($documentos as $Elem) { ?>
                                            <tr>
                                                <td><a href="documento_down.php?id=<?php echo $Elem['id']?>"><?php echo $Elem['nombre'].".".$Elem['extension'];?></a></td>
                                                <td>
                                                    
                                                    <a href="<?php echo BASE_PATH_CONTROL; ?>documentos_elim.php?id=<?php echo $Elem['id']; ?>" class="btn mini" title="Eliminar" alt="Eliminar" onClick="return confirm('Seguro de eliminar este documento?');"><i class="fa fa-fw fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.widget-body -->
                            </div>
                    </div>
                                    </div>
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