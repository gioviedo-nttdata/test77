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
    <link href="<?php echo BASE_PATH_CONTROL; ?>assets/css/style.css?v=1.23" rel="stylesheet" type="text/css">
    <!-- Head Libs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

 
</head>

<body class="body-bg-full profile-page" style="background-image: url(assets/img/piscina1.jpg)">
    <div id="wrapper" class="row wrapper multi-step-signup">
        <div class="container-min-full-height d-flex justify-content-center align-items-center">

            <div class="login-center">
                <div class="steps-tab clearfix" data-target="#multi-step-signup">
            <ul class="list-unstyled list-inline text-center mt-4">
                <li class="list-inline-item active"><a href="#"><span class="step">1</span> Datos de la Asociación</a>
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
        <?php if ($err=='7') { ?>
           <div class="alert alert-danger" role="alert">Demuestre que no es un robot.</div>
           <?php } else  if ($err=='5') { ?>
           <div class="alert alert-danger" role="alert">El RUT de la Asociación que está intentado registrar ya está registrado en la base de datos. <br>
          Puedes <a href="login.php" style="color:#0000FF"><u>acceder con tu email y password</u></a><br>
          Si Olvidaste tu password puedes <a href="forgot.php" style="color:#0000FF"><u>recuperarlo aqui</u></a>
          </div>
          <?php } else  if ($err=='6') { ?>
           <div class="alert alert-danger" role="alert">El email que está intentado registrar ya está registrado en la base de datos. <br>
          Puedes <a href="login.php" style="color:#0000FF"><u>acceder con tu email y password</u></a><br>
          Si Olvidaste tu password puedes <a href="forgot.php" style="color:#0000FF"><u>recuperarlo aqui</u></a>
          </div>
          <?php } ?>
        <!-- /.step-tabs -->
                <form id="multi-step-signup" class="multi-step-form overflow-hidden otroform" method="post" action="action_registro.php?action=registro">
                    
                <fieldset id="signup-step-1" class="form-material active animated fadeInRight">
                    <h6 class="text-uppercase">Registo de Asociaciones</h6>
                    <p class="text-muted">Datos de la Asociación</p>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Nombre de la Asociación" name="club" id="club" autocomplete="off">
                        <label>Nombre de la Asociación</label>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Rut de la Asociación" name="rut" id="rut" autocomplete="off">
                        <label>Rut de la Asociación</label>
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
                    
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Dirección" name="direccion" id="direccion" autocomplete="off">
                        <label>Dirección</label>
                    </div>
                    
                    
                  
                    <div class="form-group">
                        <a class="btn btn-primary btn-block ripple next-btn" style="color:#fff">Continuar</a>
                    </div>
                </fieldset>
                <fieldset id="signup-step-2" class="form-material animated fadeInRight">
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
                            <a class="btn btn-primary btn-block ripple prev-btn" style="color:#fff">Anterior</a>
                        </div>
                        <div class="col-6">
                            <a class="btn btn-primary btn-block ripple next-btn" style="color:#fff">Siguiente</a>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="signup-step-3" class="form-material animated fadeInRight">
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
                            <a class="btn btn-primary btn-block ripple prev-btn" style="color:#fff">Anterior</a>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-primary btn-block ripple" style="color:#fff" type="submit">Enviar</button>
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


                    var el = $('.multi-step-form');
                    el.each(function(){
                        var $this = $(this),
                                $stepsTab = $('.steps-tab[data-target="#' + $this.attr('id') + '"]');
                                
                        $this.find('.next-btn').on( "click", function(){
                            console.log("es aqui: "+ $this.find('fieldset.active').attr('id'));
                            actual_fieldset = $this.find('fieldset.active').attr('id');
                            var form = $("#multi-step-signup");
                            var validator = form.validate({
                                 errorElement: 'div',
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
                                  rut:true,
                                  remote: {
                                        url: "check_rut.php",
                                        type: "post",
                                        async: false,
                                        data: {
                                                rut: function() {
                                                return $( "#rut" ).val();
                                                }
                                        }
                                    }
                                },
                                email: {
                                      required: true,
                                      email: true,
                                  remote: {
                                        url: "check_email.php",
                                        type: "post",
                                        async: false,
                                        data: {
                                                rut: function() {
                                                return $( "#email" ).val();
                                                }
                                        }
                                    }
                                    },
                                    pass: {
                                      required: true
                                    },
                                    pass1: {
                                       
                                        equalTo: "#pass"
                                    } ,
                                    presidente: {
                                      required: true
                                    },
                                    telefono: {
                                      required: true
                                    },
                                    presidente: {
                                      required: true
                                    },
                                    telefono: {
                                      required: true
                                    }
                                    
                                    
                                },
                                messages: {
                                    club: {
                                      required: "Debe ingresar el nombre de la Asociación",
                                    },
                                    region: {
                                      required: "Debe ingresar la Region",
                                    },
                                    asociacion: {
                                      required: "Debe ingresar la Asociación",
                                    },
                                    rut: {
                                        required: "Debe ingresar el rut",
                                        rut:"Este campo debe ser un rut valido",
                                        remote: "Rut ya está registrado en la base de datos"
                                    },
                                    email: {
                                          required: "Escribe un email",
                                          email: "Escribe un email valido",
                                        remote: "Email ya está registrado en la base de datos"
                                    },
                                    pass: {
                                        required: "Debes incluir un password"
                                    },
                                    pass1: {
                                    
                                        equalTo: "Los password no coinciden"
                                    },
                                    presidente: {
                                        required: "Escriba el nombre del presidente de la Asociación"
                                    },
                                    telefono: {
                                    
                                        equalTo: "Escriba el telefono de contacto"
                                    }
                                }
                            });
                          

                      
              
                            if (form.valid() === true){
                                console.log ("validado") ;
                            
                                //form.resetForm();

                                   // $('.has-error').addClass("otrotama");

                                    $this.find('fieldset.active').removeClass('active').addClass('done').next('fieldset').addClass('active');
                                    $stepsTab.find('li.active').removeClass('active').addClass('done').next('li').addClass('active');

                                    
                                  

                                } else {
                                     console.log ("NO validado") ;
                                }
              
                               

                     
                        

                        });
                        $this.find('.prev-btn').on( "click", function(){
                            
                            $this.find('fieldset.active').removeClass('active').prev('fieldset').addClass('active');
                            $stepsTab.find('li.active').removeClass('active').removeClass('done').prev('li').addClass('active');
                            
                           
                        });
                    });
                });

    
        
    $('#rut').Rut({  
        format_on: 'keyup'
    });
    

    

$.validator.addMethod("rut", function(value, element) {
  return this.optional(element) || $.Rut.validar(value);
}, "Este campo debe ser un rut valido.");

function debounce(func, wait, immediate) {
    var timeout;
    return function() {
        var context = this, args = arguments;
        var later = function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
};




</script>
</body>

</html>