<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo BASE_PATH_CONTROL; ?>favicon.png?v=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo PAGE_TITLE; ?> - Login</title>
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE_PATH_CONTROL; ?>assets/vendors/material-icons/material-icons.css" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE_PATH_CONTROL; ?>assets/vendors/mono-social-icons/monosocialiconsfont.css" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE_PATH_CONTROL; ?>assets/vendors/feather-icons/feather.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE_PATH_CONTROL; ?>assets/css/style.css?v=1" rel="stylesheet" type="text/css">
    <!-- Head Libs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>

<body class="body-bg-full profile-page" style="background-image: url(assets/img/piscina1.jpg)">
    <div id="wrapper" class="row wrapper">
        <div class="container-min-full-height d-flex justify-content-center align-items-center">
            <div class="login-center">
                <div class="navbar-header text-center mt-2 mb-4">
                    <a href="#">
                        <img alt="" class="logo" src="<?php echo BASE_PATH_CONTROL; ?>assets/img/logo-light.png?id=1.2">
                    </a>
                    <h6>Recuperar contraseña</h6>
                </div>
                <!-- /.navbar-header -->
                <?php
                $db = Db::getInstance();
                $sql = "SELECT * FROM com_passrecover WHERE clave = :clave AND usuario = :usuario LIMIT 1";
                $bind = array(
                   ':clave' => $unique,
                   ':usuario' => $id
                );

                $cont = $db->run($sql, $bind);


	if ($cont > 0) {
            $db1 = Db::getInstance();
			$rowff1 = $db1->fetchAll($sql, $bind);
                        if ($rowff1[0]['estado'] == 0) {
                        ?>
                <form action="recover_pass1.php" method="post" id="form_login">
                <?php if ($act=='OK') { ?>

          <div class="col-md-12 azul paddsup"><?php echo $var['FORGOT_MSG_OK']; ?></div>
          <?php } else  if ($err=='1') { ?>
            <div class="col-md-12 paddsup">
            <div class="alert alert-danger" role="alert">
              Email no registrado en la base de datos
            </div>
            
          </div>
         
          <?php }?>

          <div class="col-md-12 paddsup">
            <div class="" role="alert">
              Configure su nuevo password
            </div>            
          </div>
          <input type="hidden" value="<?php echo $id?>" name="id">
								 <input type="hidden" value="<?php echo $unique?>" name="unique">
                    <div class="form-group">
                        <label for="example-password">Password</label>
                        <input type="password" placeholder="password" id="password" name="password" class="form-control form-control-line">
                    </div>
                    <div class="form-group">
                        <label for="example-password">Repita Password</label>
                        <input type="password" placeholder="password" id="password2" name="password2" class="form-control form-control-line">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-lg btn-primary text-uppercase fs-12 fw-600" type="submit">Guardar</button>
                    </div>
                    <div class="form-group no-gutters mb-0">
                        <div class="col-md-12 d-flex">
                            <!--<div class="checkbox checkbox-primary mr-auto mr-0-rtl ml-auto-rtl">
                                <label class="d-flex">
                                    <input type="checkbox"> <span class="label-text">Remember me</span>
                                </label>
                            </div>--><a href="forgot.php" id="to-recover" class="my-auto pb-2 text-right"><i class="material-icons mr-2 fs-18">lock</i> Olvidó su password?</a>
                        </div>
                        <!-- /.col-md-12 -->
                    </div>
                    <!-- /.form-group -->
                </form>
                <!-- /.form-material -->
                <?php } else { ?>
              <div class="roja">La url de recuperación de contraseña ya fue utilizada</div>
              <?php }  ?>
        <?php } else { ?>
              <div class="roja">La url de recuperación de contraseña es inválida</div>
              <?php }  ?>
                
                <!-- /.btn-list -->
                <footer class="col-sm-12 text-center">
                    <hr>
                    <p>Tu Club no está registrado aún? <a href="registro.php" class="text-primary m-l-5"><b>Regístrate</b></a>
                    </p>
                    <p style="color:#ff0000"> Si necesitas asistencia durante el proceso de registro<br>
                     no dudes en contactarnos via whatsapp al +56 9 3352 9666<br> o via correo electronica a info@pulpro.com</p>
                </footer>
            </div>
            <!-- /.login-center -->
        </div>
        <!-- /.d-flex -->
    </div>
    <!-- /.body-container -->
    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_PATH_CONTROL; ?>assets/js/material-design.js"></script>
    
    <script src="<?php echo BASE_PATH_CONTROL; ?>assets/js/jquery.Rut.js" type="text/javascript"></script>
    <script src="<?php echo BASE_PATH_CONTROL; ?>assets/js/jquery.validate.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo BASE_PATH_CONTROL; ?>assets/js/jquery.numeric.js"></script>
    <script type="text/javascript">
        
    $('#rut').Rut({  
        format_on: 'keyup'
    });
    
     $.validator.addMethod("rut", function(value, element) {
  return this.optional(element) || $.Rut.validar(value);
}, "Este campo debe ser un rut valido.");
    
    $("#form_login").validate({
  rules: {
    rut: {
      required: true,
      rut:true
    },
    password: {
      required: true
    }
  },
    messages: {
       rut: {
        required: "Debe ingresar el rut",
        rut:"Este campo debe ser un rut valido"
      }, 
      password: {
        email: "debe escribir su password"
      }
    }
});
</script>
</body>

</html>