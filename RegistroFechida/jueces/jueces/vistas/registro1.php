<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo BASE_PATH_CONTROL; ?>favicon.png">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo PAGE_TITLE; ?> - Login</title>
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE_PATH_CONTROL; ?>assets/vendors/material-icons/material-icons.css" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE_PATH_CONTROL; ?>assets/vendors/mono-social-icons/monosocialiconsfont.css" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE_PATH_CONTROL; ?>assets/vendors/feather-icons/feather.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE_PATH_CONTROL; ?>assets/css/style2.css?v=1.23" rel="stylesheet" type="text/css">
    <!-- Head Libs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <style type="text/css">
        #personal_information,
        #company_information{
            display:none;
        }
    </style>
</head>

<body class="body-bg-full profile-page" style="background-image: url(assets/img/piscina1.jpg)">
    <div id="wrapper" class="row wrapper multi-step-signup">
        <div class="container-min-full-height d-flex justify-content-center align-items-center">

            <div class="login-center">
                <div class="steps-tab clearfix" data-target="#multi-step-signup">
            <ul class="list-unstyled list-inline text-center mt-4">
                <li class="list-inline-item active"><a href="#"><span class="step">1</span> Datos del Club</a>
                </li>
                <li class="list-inline-item"><a href="#"><span class="step">2</span> Cuenta</a>
                </li>
                <li class="list-inline-item"><a href="#"><span class="step">3</span> Presidente</a>
                </li>
            </ul>
        </div>
                <div class="navbar-header text-center mt-2 mb-4">
                    <a href="#">
                        <img alt="" class="logo" src="<?php echo BASE_PATH_CONTROL; ?>assets/img/logo-light.png?id=1.2">
                    </a>
                   
                </div>
                <!-- /.navbar-header -->

                <!-- 3 Step Navigation -->
        
        <!-- /.step-tabs -->
                <form id="multi-step-signup" class="multi-step-form overflow-hidden otroform" method="post" action="action_registro.php">
                    
                <fieldset id="account_information" class="">
                    <h6 class="text-uppercase">Registo de Club</h6>
                    <p class="text-muted">Datos del Club</p>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Nombre del Club" name="club" id="club" autocomplete="off">
                        <label>Nombre del Club</label>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Rut del Club" name="rut" id="rut" autocomplete="off">
                        <label>Rut del Club</label>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="region" id="region" autocomplete="off">
                          <option value="">Seleccionar Region</option>
                          <?php
                      $db_pais = Db::getInstance();
                    $sql_pais = "SELECT * FROM regiones ORDER BY id";
                     
                      $row_pais1 = $db_pais->fetchAll($sql_pais);
                      foreach($row_pais1 as $row_pais) {
                      ?>
                          <option value="<?php echo $row_pais['id'];?>"><?php echo $row_pais['region'];?></option>
                      <?php } ?>
                        </select>
                        <label>Region</label>
                    </div>
                    <div class="form-group" id="dv_provincia">
                        <select class="form-control" name="comuna" value="" id="comuna" autocomplete="off" disabled >
              <option value="">Seleccionar Comuna*</option> </select>
                        <label>Comuna</label>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Dirección" name="direccion" id="direccion" autocomplete="off">
                        <label>Dirección</label>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="asociacion" id="asociacion" autocomplete="off">
                          <option value="">Seleccionar Asociación</option>
                          <?php
                          $db_pais1 = Null;
                      $db_pais1 = Db::getInstance();
                    $sql_pais1 = "SELECT * FROM com_asociaciones ORDER BY asociacion";
                     
                      $row_pais2 = $db_pais1->fetchAll($sql_pais1);
                      foreach($row_pais2 as $row_pais) {
                      ?>
                          <option value="<?php echo $row_pais['id'];?>"><?php echo $row_pais['asociacion'];?></option>
                      <?php } ?>
                        </select>
                        <label>Asociación</label>
                    </div>
                    
                  
                    <div class="form-group">
                        <a class="btn btn-primary btn-block ripple next-btn">Continuar</a>
                        
                    </div>

                    
                </fieldset>

                <fieldset id="company_information" class="">
                   <h6 class="text-uppercase">Cuenta</h6>
                    <p class="text-muted">Datos de la cuenta del sistema</p>
                    <div class="form-group no-gutters">
                        <input class="form-control" type="text" placeholder="Email" id="email" name="email">
                        <label>Email</label>
                    </div>
                    <div class="form-group no-gutters">
                        <input class="form-control" type="password" placeholder="Password" name="pass" id="pass" autocomplete="nope">
                        <label>Password</label>
                    </div>
                    <div class="form-group no-gutters">
                        <input class="form-control" type="password" placeholder="Confirmar Password" name="pass1" id="pass1">
                        <label>Confirmar Password</label>
                    </div>
                    <div class="form-group row text-center">
                        <div class="col-6">
                            <button class="btn btn-primary btn-block ripple prev-btn">Anterior</button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-primary btn-block ripple next-btn">Siguiente</button>
                        </div> 
                </fieldset>

                <fieldset id="personal_information" class="">
                    <h6 class="text-uppercase">Datos del Presidente</h6>
                    <p class="text-muted">Estos datos son privados</p>
                    <div class="form-group no-gutters">
                        <input class="form-control" type="text" placeholder="Nombre Presidente" name="presidente" id="presidente">
                        <label>Nombre Presidente</label>
                    </div>
                    <div class="form-group no-gutters">
                        <input class="form-control" type="text" placeholder="Telefono presidente" id="telefono" name="telefono">
                        <label>Telefono presidente</label>
                    </div>
                    
                    <div class="form-group row text-center">
                        <div class="col-6">
                            <button class="btn btn-primary btn-block ripple prev-btn">Anterior</button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-primary btn-block ripple" type="submit">Enviar</button>
                        </div>
                    </div>
                </fieldset>
            </form>
                <!-- /.form-material -->
                
                <!-- /.btn-list -->
                <footer class="col-sm-12 text-center">
                    <hr>
                    <p>Ya estás registrado? <a href="login.php" class="text-primary m-l-5"><b>Ingresa</b></a>
                    </p>
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

      
        jQuery(document).ready(function($) {

            $("#region").change(function () {
                   $("#region option:selected").each(function () {
                    elegido=$(this).val();
                    console.log(elegido);
                    $.post("/cargar_provincia.php", { region: elegido }, function(data){
                    $("#dv_provincia").html(data);
                    }); 
                             
                });
           })


                   // Custom method to validate username
            $.validator.addMethod("usernameRegex", function(value, element) {
                return this.optional(element) || /^[a-zA-Z0-9]*$/i.test(value);
            }, "Username must contain only letters, numbers");
            

            $(".next-btn").click(function(){
                var form = $("#multi-step-signup");
                form.validate({
                    errorElement: 'span',
                    errorClass: 'help-block',
                    highlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').addClass("has-error");
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').removeClass("has-error");
                    },
                    rules: {
                        club: {
                                  required: true
                                },
                                region: {
                                  required: true
                                },
                                asociacion: {
                                  required: true
                                },
                                rut: {
                                  required: true,
                                  rut:true
                                },
                                email: {
                                      required: true,
                                      email: true
                                    },
                                    pass: {
                                      required: true
                                    },
                                    pass1: {
                                       
                                        equalTo: "#pass"
                                    }   
                        
                    },
                    messages: {
                        club: {
                                      required: "Debe ingresar el nombre del club",
                                    },
                                    region: {
                                      required: "Debe ingresar la Region",
                                    },
                                    asociacion: {
                                      required: "Debe ingresar la Asociación",
                                    },
                                    rut: {
                                        required: "Debe ingresar el rut",
                                        rut:"Este campo debe ser un rut valido"
                                    },
                                    email: {
                                          required: "Escribe un email",
                                          email: "Escribe un email valido"
                                    },
                                    pass: {
                                        required: "Debes incluir un password"
                                    },
                                    pass1: {
                                    
                                        equalTo: "Los password no coinciden"
                                    }
                    }
                });
                if (form.valid() === true){
                    
                    if ($('#account_information').is(":visible")){
                        current_fs = $('#account_information');
                        next_fs = $('#company_information');
                    }else if($('#company_information').is(":visible")){
                        current_fs = $('#company_information');
                        next_fs = $('#personal_information');
                    }
                    
                    next_fs.show();
                    current_fs.hide();
                }
            });

            $('.prev-btn').click(function(){
                if($('#company_information').is(":visible")){
                    current_fs = $('#company_information');
                    next_fs = $('#account_information');
                }else if ($('#personal_information').is(":visible")){
                    current_fs = $('#personal_information');
                    next_fs = $('#company_information');
                }
                next_fs.show();
                current_fs.hide();
            });

    
        
    $('#rut').Rut({  
        format_on: 'keyup'
    });
    
$.validator.addMethod("rut", function(value, element) {
  return this.optional(element) || $.Rut.validar(value);
}, "Este campo debe ser un rut valido.");



   });

 
</script>
</body>

</html>