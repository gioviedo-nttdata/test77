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
    <link href="assets/css/style.css?v=8" rel="stylesheet" type="text/css">
    <!-- Head Libs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>

<body class="body-bg-full profile-page" style="background-image: url(clubes/assets/img/piscina1.jpg)">
    <div id="wrapper" class="row wrapper">
        <div class="container-min-full-height d-flex justify-content-center align-items-center">
            <div class="login-center">
                <div class="navbar-header text-center mt-2 mb-4">
                    <a href="#">
                        <img alt="" class="logo" src="<?php echo BASE_PATH_CONTROL; ?>assets/img/logo-dark.png?id=1.2">
                    </a>
                    <h6>Sistema de Registro</h6>
                </div>
                <!-- /.navbar-header -->
                <div class="row" style="max-width:70vw">
                    <div class="col-md-4 mr-b-30">
                        <div class="card blog-post-new">
                            <div class="card-header sub-heading-font-family border-bottom-0 p-0">
                                <figure><a href="ayuda.php" class="btn btn-rounded btn-primary btn-xs" style="float:right">Ayuda</a>
                                    <a href="javascript:void(0);">
                                        <img class="card-img-top" src="<?php echo BASE_PATH_CONTROL; ?>assets/demo/cards/blog-post-new-1.jpeg" alt="">
                                    </a>
                                </figure><span class="badge badge-danger text-uppercase">Asociaciones</span>


                            </div>
                            <div class="card-body sub-heading-font-family">
                                <h5 class="card-title sub-heading-font-family mb-3">Registro de Asociaciones</h5>
                                <p class="card-text text-muted">Si eres directivo de una asociación ingresa al sistema de Registro de Asociaciones afiliadas a la Federación.<br>
                                    <span class="azul">El Sistema de Asociaciones actualmente habilitado</span></p>
                                <div class="card-action d-flex border-0">
                                    <a href="/asociaciones/" class="btn btn-block btn-rounded btn-warning ripple">Entrar</a>
                                </div>
                                <div class="card-action d-flex border-0">


                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 mr-b-30">
                        <div class="card blog-post-new">
                            <div class="card-header sub-heading-font-family border-bottom-0 p-0">
                                <figure><a href="ayuda_club.php" class="btn btn-rounded btn-primary btn-xs" style="float:right">Ayuda</a>
                                    <a href="javascript:void(0);">
                                        <img class="card-img-top" src="<?php echo BASE_PATH_CONTROL; ?>assets/demo/cards/blog-post-new-2.jpeg" alt="">
                                    </a>
                                </figure><span class="badge badge-info text-uppercase">Clubes</span>

                            </div>
                            <div class="card-body sub-heading-font-family">
                                <h5 class="card-title sub-heading-font-family mb-3">Registro de Clubes</h5>
                                <p class="card-text text-muted">Si eres directivo de un Club perteneciente a una Asociación afiliada a la Federación ingresa al Sistema de Registro de Clubes.<br>
                                    <span class="azul">El registro para clubes ya está activo</span>
                                </p>
                                <div class="card-action d-flex border-0">
                                    <a href="/clubes/" class="btn btn-block btn-rounded btn-warning ripple">Entrar</a>


                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="col-md-4 mr-b-30">
                        <div class="card blog-post-new">
                            <div class="card-header sub-heading-font-family border-bottom-0 p-0">
                                <figure><a href="ayuda_jueces.php" class="btn btn-rounded btn-primary btn-xs" style="float:right">Ayuda</a>
                                    <a href="javascript:void(0);">
                                        <img class="card-img-top" src="<?php echo BASE_PATH_CONTROL; ?>assets/demo/cards/blog-post-new-2.jpeg" alt="">
                                    </a>
                                </figure><span class="badge badge-warning text-uppercase">Jueces</span>

                            </div>
                            <div class="card-body sub-heading-font-family">
                                <h5 class="card-title sub-heading-font-family mb-3">Registro de Arbitros y Jueces</h5>
                                <p class="card-text text-muted">Si eres un Juez o Arbitro afiliado a la Federación de Deportes Acuáticos ingresa al Sistema de Registro de Jueces.<br>
                                <span class="azul">El registro para jueces ya está activo</span></p>
                            </div>
                            <div class="card-action d-flex border-0">
                            <a href="/jueces/" class="btn btn-block btn-rounded btn-warning ripple">Entrar</a>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.form-material -->

                <!-- /.btn-list -->

            </div>
            <!-- /.login-center -->
        </div>
        <!-- /.d-flex -->
    </div>


    <!-- /.body-container -->
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.9/metisMenu.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.min.js"></script>


    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_PATH_CONTROL; ?>assets/js/material-design.js"></script>

</body>

</html>