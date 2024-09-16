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
				
				<div class="widget-holder col-lg-12">
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
                                 <div class="widget-holder widget-sm col-lg-3 col-md-6 widget-full-height">
                        <div class="widget-bg bg-primary text-inverse">
                            <div class="widget-body">
                                <div class="counter-w-info media">
                                    <div class="media-body w-50">
                                        <p class="text-muted mr-b-5 fw-600">Jueces Registrados</p><span class="counter-title d-block"><span class="counter"><?php echo $totjueces;?></span></span>
                                        <!-- /.counter-title --> 
                                    </div>
                                    <!-- /.media-body -->
                                    <div class="pull-right align-self-center">
                                        <div class="mr-t-20"><span data-toggle="sparklines" data-height="40" data-width="100" data-type="bar" data-bar-spacing="3" data-bar-width="3" data-zero-axis="false" data-bar-color="rgba(144,186,236,1)" data-color-map="

                        rgba(255,255,255,1.0);

                        rgba(255,255,255,0.4);

                        rgba(255,255,255,1.0);

                        rgba(255,255,255,0.4);

                        rgba(255,255,255,1.0);

                        rgba(255,255,255,0.4);

                        rgba(255,255,255,1.0);

                      " data-chart-range-min="0"><!-- 4,7,8,5,3,6,8 --></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.counter-w-info -->
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
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