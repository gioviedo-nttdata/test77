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
                                <h6 class="page-title-heading mr-0 mr-r-5">Usuarios</h6>
                                <p class="page-title-description mr-0 d-none d-md-inline-block">Listado de Asociaciones</p>
                            </div>
                            <!-- /.page-title-left -->
                            <div class="page-title-right d-none d-sm-inline-flex">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Intro</a>
                                    </li>
                                    <li class="breadcrumb-item active">Asociaciones</li>
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
                                        <div class="row">
                                            
                                            <div class="col-md-12 text-right">
                                              
                                                
                                            </div>
                                        </div>
                                        <h5 class="box-title">Asociaciones</h5>
										<?php if (!empty($regiones)) { ?>
                                        <p>Asociaciones: <?php echo $users->total_results; ?> <br> Pagina: <?php echo $users->pag; ?> de <?php echo $users->total_pages; ?>
                                        </p>

                                        <table class="tablesaw color-table table-hover table tablesaw-stack table-striped tablesaw-row-zebra" data-tablesaw-mode="stack">
                                            <thead>
                                                <tr>
													<th>Region</th>
                                                    <th>Asociaciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($regiones as $Elem) { ?>
                                                    <tr>
													
                                                        <td><?php echo $Elem['region']; ?></td>
                                                       
                                                     
                                                        <td>
															
                                                            <a href="<?php echo BASE_PATH_CONTROL; ?>asociaciones.php?region=<?php echo $Elem['id']; ?>" class="btn mini" title="Ver Clubes" alt="Editar User">Asociaciones (<?php echo Asociacion::contarAsocRegion($Elem['id']);?>) </a>
															
                                                        </td>
                                                    </tr>
<?php } ?>

                                            </tbody>
                                        </table>


                                        <div class="row1">
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination">
                                                    <?php $contpag = 1; ?>
                                                    <?php
                                                    $pagemin = $users->pag - 3;
                                                    $pagemax = $users->pag + 3;
                                                    $PagAnt = $users->pag - 1;
                                                    $PagSig = $users->pag + 1;
                                                    ?>
                                                    <?php if ($users->pag >= 1) { ?>
                                                        <li class="page-item"><a class="page-link" href="<?php echo BASE_PATH_CONTROL; ?>nadadores.php?pagi=1&<?php echo $listvar ?>">&laquo;</a></li>

<?php } ?>
<?php if ($users->pag > 1) { ?>

                                                        <li class="page-item"><a class="page-link" href="<?php echo BASE_PATH_CONTROL; ?>nadadores.php?pagi=<?php echo $PagAnt; ?>&<?php echo $listvar ?>">&lt;</a></li>


                                                    <?php } ?>
                                                    <?php while ($contpag <= $users->total_pages) {
                                                        ?>
    <?php if ($users->pag == 1) { ?>
                                                            <li class="page-item<?php if ($contpag == $users->pag) { ?> active<?php } ?> <?php if ($contpag > 9) echo 'oculto'; ?>"><a class="page-link" href="<?php echo BASE_PATH_CONTROL; ?>nadadores.php?pagi=<?php echo $contpag; ?>&<?php echo $listvar ?>"><?php echo $contpag; ?></a></li>

                                                            <?php
                                                            $contpag = $contpag + 1;
                                                        }
                                                        elseif ($users->pag < 5) {
                                                            ?>
                                                            <li class="page-item<?php if ($contpag == $users->pag) { ?> active<?php } ?> <?php if ($contpag > 7) echo 'oculto'; ?>"  >
                                                                <a class="page-link" href="<?php echo BASE_PATH_CONTROL; ?>nadadores.php?pagi=<?php echo $contpag; ?>&<?php echo $listvar ?>"><?php echo $contpag; ?></a>
                                                            </li>
                                                            <?php
                                                            $contpag = $contpag + 1;
                                                        } elseif ($users->pag > $users->total_pages - 5) {
                                                            ?>
                                                            <li class="page-item<?php if ($contpag == $users->pag) { ?> active<?php } ?> <?php if ($contpag < $users->total_pages - 7) echo 'oculto'; ?>"  >
                                                                <a class="page-link" href="<?php echo BASE_PATH_CONTROL; ?>nadadores.php?pagi=<?php echo $contpag; ?>&<?php echo $listvar ?>"><?php echo $contpag; ?></a>
                                                            </li>
        <?php $contpag = $contpag + 1;
    } else {
        ?>
                                                            <li class="page-item<?php if ($contpag == $users->pag) { ?> active<?php } ?> <?php if ($contpag < $pagemin || $contpag > $pagemax) echo 'oculto'; ?>"  >
                                                                <a class="page-link" href="<?php echo BASE_PATH_CONTROL; ?>nadadores.php?pagi=<?php echo $contpag; ?>&<?php echo $listvar ?>"><?php echo $contpag; ?></a>
                                                            </li><?php
                                                    $contpag = $contpag + 1;
                                                }
                                            }
?>
                                                    <?php if ($users->pag < $users->total_pages) { ?>

                                                        <li class="page-item"><a class="page-link" href="<?php echo BASE_PATH_CONTROL; ?>nadadores.php?pagi=<?php echo $PagSig; ?>&<?php echo $listvar ?>">&gt;</a></li>

<?php } ?>
<?php if ($users->pag >= 1) { ?>
                                                        <li class="page-item"><a class="page-link" href="<?php echo BASE_PATH_CONTROL; ?>nadadores.php?pagi=<?php echo $users->total_pages; ?>&<?php echo $listvar ?>">&raquo;</a>
                                                        </li>
<?php } ?>
                                                </ul>
                                            </nav>



                                        </div>
										
										<?php } else { ?>
										El club no tiene entrenadores registrados
										<?php } ?>


                                    </div>
                                    <!-- /.widget-body -->
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
			<!-- /.modal -->
                                    <div class="modal modal-primary fade bs-modal-lg-primary" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel2" aria-hidden="true" style="display: none">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header text-inverse">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h5 class="modal-title" id="myLargeModalLabel2">Subir excel de pruebas</h5>
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
            <!-- FOOTER -->
<?php include('footer.php'); ?>
        </div>
        <!--/ #wrapper -->
<?php include('cierre.php'); ?>
    </body>

</html>