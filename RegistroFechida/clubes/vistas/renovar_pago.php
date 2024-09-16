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
                        <p class="page-title-description mr-0 d-none d-md-inline-block">Eventos</p>
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
                                
                                <div class="widget-graph-info">
                                    <div class="dropdown"><a href="javascript:void(0)" class="dropdown-toggle text-muted fs-16" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">more_horiz</i></a>
                                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a>  <a class="dropdown-item" href="#">Another action</a>  <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.widget-graph-info -->
                            </div>
                            <!-- /.widget-heading -->

                            <div class="widget-bg bg-primary text-inverse">
                                                    <div class="widget-body">
                                                        <div class="counter-w-info media">
                                                            <div class="media-body w-50">



                            
                                <?php if ($pagoActivo['tipopago'] != 0) { ?>
                                          

                                          <?php if ($pagoActivo['pago'] != 0) { ?>

                                              <p>El pago de esta orden ya fue realizado</p>

                                             




                                          <?php } else if ($pagoActivo['tipopago'] == 1 && $pagoActivo['comprobante'] == 0) {  ?>

                                              <p>Tu solicitud de pago fue recibida, debes enviar la información de tu transferencia bancaria para finalizar, sube aqui tu comprobante</p>
                                              <div>
                                                  <small>Banco Crédito e Inversiones<br>
                                                      Federación Chilena de Deportes Acuáticos.<br>
                                                      Cuenta Corriente<br>
                                                      No. de cuenta: 13303279<br>
                                                      RUT: 70.047.600-6<br></small>
                                                  <br><br>
                                              </div>
                                              <div id="dropzone1" class="dropzone" style="font-size:12px"></div>


                                          <?php } else if ($pagoActivo['tipopago'] == 1 && $pagoActivo['comprobante'] == 1) {  ?>

                                              <p>Tu pago está en proceso de validación. En breve las licencias estarán activas.</p>

                                          <?php } else if ($pagoActivo['tipopago'] == 2) {  ?>

                                              <p>PROCESA TU PAGO:</p>
                                              <a href="enlinea.php?id=<?php echo $pagoActivo['id'] ?>" class="zoom-btn btn">PAGAR EN LINEA</a>

                                          <?php }   ?>

                                          <br><br>
                                          <p class="rojo">Para asistencia técnica por favor comunicarse via email a info@pulpro.com o via whatsapp al +56 9 4294 4264 para asistencia técnica.</p>



                                      <?php } else { 
                                          
                                          
                                          
                                          ?>

                                                          
                                                              <p class="text-muted mr-b-5 fw-600">Pago de Licencia</p><span class="counter-title d-block"><span class="counter"><?php echo $monto;?></span>$</span>
                                                              <!-- /.counter-title --><!-- <a id="cinscripcion" href="#" class="btn btn-link btn-underlined btn-xs fs-11 btn-yellow text-white">Pagar</a>-->
                                                             

<div id="infopago" style="color:#ffffff">
  <form action="renovar_pago_tipo.php" method="post">
      <input type="hidden" name="idpago" value="<?php echo $id ?>">
      <p class="text-muted mr-b-5 fw-600">Selecciona forma de pago</p>
      <div class="row">
          <div class="col-lg-12">
              <div class="form-group">
                  <label for="pago2" style="color:#ffffff"><input type="radio" name="pago" id="pago2" value="2"> Pago en Linea (SOLO CHILE): </label>
              </div>
              <div style="background: #ffffff; padding:10px; border: 1px solid #ff0000;">
                  <img src="img/pagos/webpay.png" style="width: 75px"><img src="img/pagos/onepay.png" style="width: 75px">
                  <img src="img/pagos/multicaja.png" style="width: 75px">
                  <img src="img/pagos/servipag.png" style="width: 75px">
                  <img src="img/pagos/mach.png" style="width: 75px">
                  <br><br>
              </div>
              <hr />
          </div>


          <div class="col-lg-12">
              <div class="form-group">
                  <label for="pago1" style="color:#ffffff"><input type="radio" name="pago" id="pago1" value="1"> Transferencia Bancaria: </label>
              </div>
              <div>
                  <small>Banco Crédito e Inversiones<br>
                      Federación Chilena de Deportes Acuáticos.<br>
                      Cuenta Corriente<br>
                      No. de cuenta: 13303279<br>
                      RUT: 70.047.600-6<br></small>
                  <br><br>
              </div>
              <hr />
          </div>



          <button type="submit" id="cconfirm" class="enroll-btn">Confirmar</button>

      </div>
  </form>
</div>
                                                              <?php }  ?>
                                </div>
                                <!-- /.widget-top-countries-views -->
                            </div></div></div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
					
					
				</div>	
					
                <div class="widget-list row">
                    <div class="widget-holder widget-full-height widget-flex col-lg-8">
                        <div class="widget-bg">
                            <div class="widget-heading">
                                <h5 class="widget-title"></h5>
                               
                                <!-- /.widget-graph-info -->
                            </div>
                            <div class="widget-body">
                                <div id="calendar"></div>
                            </div>
                    
                 
                   
                        </div>
                    </div>
                    
                    
                      
                   
                    <!-- /.widget-holder -->
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