<!DOCTYPE html>
<html lang="en">

<?php include('header.php'); ?>

<body class="sidebar-light sidebar-expand navbar-brand-dark">
    <div id="wrapper" class="wrapper">
        <!-- HEADER & TOP NAVIGATION -->
        <?php include('cabeza.php'); ?>
        <!-- /.navbar -->
        <div class="content-wrapper">
            <!-- SIDEBAR -->
            <?php include('menu.php'); ?>
            <!-- /.site-sidebar -->
            <main class="main-wrapper clearfix">
                <!-- Page Title Area -->
                <div class="container-fluid">
                    <div class="row page-title clearfix">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Mis Datos</h6>
                            <p class="page-title-description mr-0 d-none d-md-inline-block">Mis datos</p>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Intro</a>
                                </li>
                                <li class="breadcrumb-item active">Informacion Personal</li>
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
                        <div class="col-md-12 widget-holder">
                            <div class="widget-bg">
                                <div class="widget-body">
                                    <h5 class="box-title">Mis datos personales</h5>
                                    <?php if (!empty($err)) { ?>
                                        <div class="alert alert-icon alert-danger border-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button> <i class="material-icons list-icon">not_interested</i> <strong>Error!</strong>
                                            <?php if ($err == 1) { ?>
                                                Algún campo está vacio.
                                            <?php } else if ($err == 2) { ?>
                                                El rut ya está en uso como usuario. Puede cambiar los roles del usuario.
                                            <?php }  ?>
                                        </div>
                                    <?php } ?>
                                    
                                        <input type="hidden" name="id" value="<?php echo $authj->rowff['id']; ?>">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="widget-user-profile">
                                                    <figure class="profile-wall-img">
                                                        <img src="assets/demo/user-widget-bg.jpg" alt="User Wall">
                                                    </figure>
                                                    <div class="profile-body">
                                                        <figure class="profile-user-avatar thumb-md" id="foto_perfil">
                                                            <?php include('foto_perfil.php'); ?>
                                                        </figure>
                                                        <h6 class="h3 profile-user-name"><?php echo $authj->rowff['nombre'] . " " . $authj->rowff['apellido'] . " " . $authj->rowff['apellido2']; ?></h6><small class="profile-user-address"><?php echo $roles; ?></small>
                                                        <hr class="profile-seperator">

                                                        <!-- /.profile-user-description -->
                                                        <div class="mb-5"><a data-toggle="modal" data-target=".bs-modal-lg-primary" class="btn btn-outline-primary btn-rounded btn-lg px-5 border-thick text-uppercase mr-2 mr-0-rtl ml-2-rtl fw-700 fs-11 heading-font-family">Cambiar foto</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal -->
                                            <div class="modal modal-primary fade bs-modal-lg-primary" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel2" aria-hidden="true" style="display: none">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-inverse">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h5 class="modal-title" id="myLargeModalLabel2">Cambiar foto de perfil</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="formulario">
                                                                <!-- /.box-header -->
                                                                <!-- form start -->
                                                                <div id="dropzone" class="dropzone"></div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger btn-rounded ripple text-left" data-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->

                                            <div class="col-md-8">


                                            <div class="widget-holder widget-sm col-lg-12 col-md-12 widget-full-height">
                                                <div class="widget-bg bg-primary text-inverse">
                                                    <div class="widget-body">
                                                        <div class="counter-w-info media">
                                                            <div class="media-body w-50">

                                                            <?php if ($act == 'flow' and $estado == '2') { ?>
                                            <div class="col-md-12 paddsup">
                                                <div class="alert alert-success" role="alert">
                                                    Pago realizado correctamente ya estas inscrito para la Certificación.
                                                </div>

                                            </div>
                                        <?php } ?>

                                        <?php if ($authj->rowff['tipopago'] != 0) { ?>
                                          

                                            <?php if ($authj->rowff['pago'] != 0) { ?>

                                                <p>Tu licencia está activa</p>

                                                <p class="verde">TU CÓDIGO ES: <?php echo $authj->rowff['licencia'] ?></p>

                                                <div id="descarga_lic">

                                                <?php if (!empty($authj->rowff['imagen'] != 0)) { ?>
                                                    <div class="verde"><a href="descargar_licencia.php" class="zoom-btn btn">Descargar Licencia</a></div>
                                                <?php } else { ?>
                                                    <p class="verde">Debes actualizar tu foto de perfil antes de descargar tu licencia</p>
                                                <?php } ?>

                                                </div>




                                            <?php } else if ($authj->rowff['tipopago'] == 1 && $authj->rowff['comprobante'] == 0) {  ?>

                                                <p>Estas pre-inscrito en la certificación, debes enviar la información de tu transferencia bancaria para acceder a la certificacion, sube aqui tu comprobante</p>
                                                <div>
                                                    <small>Banco Crédito e Inversiones<br>
                                                        Federación Chilena de Deportes Acuáticos.<br>
                                                        Cuenta Corriente<br>
                                                        No. de cuenta: 13303279<br>
                                                        RUT: 70.047.600-6<br></small>
                                                    <br><br>
                                                </div>
                                                <div id="dropzone1" class="dropzone" style="font-size:12px"></div>


                                            <?php } else if ($authj->rowff['tipopago'] == 1 && $authj->rowff['comprobante'] == 1) {  ?>

                                                <p>Tu pago está en proceso de validación. En breve tu licencia estará activa.</p>

                                            <?php } else if ($authj->rowff['tipopago'] == 2) {  ?>

                                                <p>PROCESA TU PAGO:</p>
                                                <a href="enlinea.php?id=<?php echo $authj->rowff['id'] ?>" class="zoom-btn btn">PAGAR EN LINEA</a>

                                            <?php }   ?>

                                            <br><br>
                                            <p class="rojo">Para asistencia técnica por favor comunicarse via email a info@pulpro.com o via whatsapp al +56 9 3352 9666 para asistencia técnica.</p>



                                        <?php } else {  ?>

                                                            
                                                                <p class="text-muted mr-b-5 fw-600">Pago de Licencia</p><span class="counter-title d-block"><span class="counter">17.000</span>$</span>
                                                                <!-- /.counter-title --> <a id="cinscripcion" href="#" class="btn btn-link btn-underlined btn-xs fs-11 btn-yellow text-white">Pagar</a>
                                                               

<div class="oculto" id="infopago" style="color:#ffffff">
    <form action="certificado_inscribir.php" method="post">
        <input type="hidden" name="certificado" value="<?php echo $eventos['id'] ?>">
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
                                                            <!-- /.media-body -->
                                                            
                                                        </div>
                                                        <!-- /.counter-w-info -->
                                                    </div>
                                                    <!-- /.widget-body -->
                                                </div>
                                                <!-- /.widget-bg -->
                                            </div>


                                                
                                            <form method="post" action="misdatos1.php" id="formU">

                                                <?php if ($reg1 == 'OK') { ?>
                                                    <div class="alert alert-icon alert-success border-success alert-dismissible fade show" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                                        </button> <i class="material-icons list-icon">check_circle</i> <strong>Cambios realizados!</strong> Los datos se han actualizado correctamente.</div>

                                                <?php } ?>
                                                <div class="form-group">
                                                    <label class="form-control-label">Rut</label>
                                                    <input class="form-control" id="rut" name="rut" placeholder="Rut" type="text" required="true" value="<?php echo getPuntosRut($authj->rowff['rut']); ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label">Nombres</label>
                                                    <input class="form-control" id="nombre" name="nombre" placeholder="Nombre" type="text" required="true" value="<?php echo $authj->rowff['nombre']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label" for="l0">Apellido paterno</label>
                                                    <input class="form-control" id="apellido" name="apellido" placeholder="Apellido paterno" type="text" required="true" value="<?php echo $authj->rowff['apellido']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label" for="l0">Apellido materno</label>
                                                    <input class="form-control" id="apellido2" name="apellido2" placeholder="Apellido materno" type="text" value="<?php echo $authj->rowff['apellido2']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label" for="l0">Género</label>
                                                    <select class="form-control" id="genero" name="genero" required="true">
                                                        <option value="">Seleccionar</option>
                                                        <option value="1" <?php if ($authj->rowff['genero'] == 1) { ?> selected<?php } ?>>Femenino</option>
                                                        <option value="2" <?php if ($authj->rowff['genero'] == 2) { ?> selected<?php } ?>>Masculino</option>
                                                    </select>
                                                </div>

                                               


                                                <div class="form-group">
                                                    <label class="form-control-label" for="l0">Email</label>
                                                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" required="true" value="<?php echo $authj->rowff['email']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-control-label">Fecha de nacimiento</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control datepicker" name="fecnac" id="fecnac" value="<?php echo $authj->rowff['fecnac']; ?>" readonly>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text"><i class="list-icon material-icons">date_range</i>
                                                            </div>
                                                            <!-- /.input-group-text -->
                                                        </div>
                                                        <!-- /.input-group-append -->
                                                    </div>
                                                    <!-- /.input-group -->
                                                </div>


                                                <div class="form-group">
                                                    <label class="form-control-label">Dirección</label>
                                                    <select class="form-control" name="region" id="region" autocomplete="off">
                                                        <option value="">Seleccionar Region</option>
                                                        <?php
                                                       
                                                        foreach ($regiones as $row_pais) {
                                                        ?>
                                                            <option value="<?php echo $row_pais['id']; ?>"<?php if ($authj->rowff['region'] == $row_pais['id']) { ?> selected<?php } ?>><?php echo $row_pais['region']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>



                                                <div class="form-group">
                                                    <label class="form-control-label">Dirección</label>
                                                    <input class="form-control" id="direccion" name="direccion" placeholder="Dirección" type="text" required="true" value="<?php echo $authj->rowff['direccion']; ?>">
                                                </div>





                                                <div class="form-group">
                                                    <label class="form-control-label" for="l0">Teléfono</label>
                                                    <input type="text" id="telefono" name="telefono" class="form-control mb-0" maxlength="14" value="<?php echo $authj->rowff['telefono']; ?>">
                                                </div>



                                                <div class="form-actions btn-list">
                                                    <button class="btn btn-primary" type="submit">Enviar</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>












                                        <!-- /.form-group -->

                                        <!-- /.form-group -->

                                        <!-- /.form-group -->
                                    
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
        <?php include('footer.php'); ?>
    </div>
    <!--/ #wrapper -->
    <?php include('cierre.php'); ?>
    <script type="text/javascript">
$( "#cinscripcion" ).click(function() {
		
		$("#infopago").removeClass('oculto');
    $("#cinscripcion").addClass('oculto');
		
		
		});


    Dropzone.autoDiscover = false;
		
		$("#dropzone1").dropzone({
			url: "pagos/pagos.php",
			addRemoveLinks: true,
			dictResponseError: "Ha ocurrido un error en el server",
			acceptedFiles: 'image/*,.jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF',
			uploadMultiple: false,
			maxFiles: 1,
			maxfilesexceeded: function(file) {
        		this.removeAllFiles();
				this.addFile(file);
			},
			params: {
				id: '<?php echo $prox->row[0]['id'];?>',
				usuario: '<?php echo $authj->rowff['id'];?>'
			},
			complete: function(file, response)
			{
				if(file.status == "success")
				{
                                        console.log("si llega aqui");
                                        location.reload();
					//alert("El siguiente archivo ha subido correctamente: " + response);
                                       // $( "#foto_perfil" ).load( "admin_eventos_foto.php?id=<?php echo $prox->row[0]['id'];?>", function() {
										//console.log("y aqui tambein");
           
				
					this.removeFile(file);
					
				}
			},
			error: function(file)
			{
				alert("Error subiendo el archivo " + file.name);
			},
			removedfile: function(file, serverFileName)
			{
				var name = file.name;
				
							var element;
							(element = file.previewElement) != null ? 
							element.parentNode.removeChild(file.previewElement) : 
							false;
					
			}
		});

    </script>
</body>

</html>