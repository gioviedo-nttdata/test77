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
                                <h6 class="page-title-heading mr-0 mr-r-5">Pases</h6>
                                <p class="page-title-description mr-0 d-none d-md-inline-block">Listado de Pases</p>
                            </div>
                            <!-- /.page-title-left -->
                            <div class="page-title-right d-none d-sm-inline-flex">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Intro</a>
                                    </li>
                                    <li class="breadcrumb-item active">Pases</li>
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
                                                <div>
						<a id="bt_buscar" rel="oculto" class="btn btn-primary btn-rounded ripple" style="color:#fff"><i class="fas fa-eye"></i> <span>&nbsp;Iniciar Pase</span></a>
												</div>
                                                <div id="buscador_div" class="oculto">
                                                   
                                                      <div class="form-group row">
                                                        <label class="col-md-3 col-form-label" for="l0">Rut *</label>
                                                        <div class="col-md-9">
                                                             <input class="form-control" id="rut" name="rut" placeholder="Rut" type="text" required>
                                                              <label   id="rut-error" class="error col-md-6" for="rut"></label>
                                                        </div>
                                                     </div>
                                                </div>
                                                <div id="buscador_div3" class="oculto">
                                                      <form action="pases_add.php" method="post" id="formUP">
                                                    <input type="text" name="idUser" id="idUser" >
                                                    <input type="hidden" name="idClubOrigen" id="idClubOrigen" >

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-4 col-form-label" for="l0">Apellido Paterno *</label>
                                                                <div class="col-md-8">
                                                                    <input class="form-control" id="ape1" name="ape1" placeholder="Apellido paterno" type="text" required readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-4 col-form-label" for="l0">Apellido Materno</label>
                                                                <div class="col-md-8">
                                                                    <input class="form-control" id="ape2" name="ape2" placeholder="Apellido Materno" type="text"  readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-4 col-form-label" for="l0">Nombre *</label>
                                                                <div class="col-md-8">
                                                                    <input class="form-control" id="nombre" name="nombre" placeholder="Nombre" type="text" required readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-4 col-form-label" for="l0">Club Origen *</label>
                                                                <div class="col-md-8">
                                                                    <input class="form-control" id="clubOrigen" name="clubOrigen" placeholder="Club Origen" type="text" required readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="col-md-6">
                                                            <div class="form-group row">
                                                                 <label class="col-md-4 col-form-label" for="l0">Comentario</label>
                                                               <div class="col-md-8">
                                                            <input class="form-control" id="comentarioClubDestino" name="comentarioClubDestino" placeholder="Comentario" type="text">
                                                                 </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="form-actions btn-list">
                                                        <button class="btn btn-primary" type="submit">Iniciar Pase</button>
                                                    </div>
                                                </form>
                                                </div>

                                            </div>
                                        </div>
                                        <h5 class="box-title">Pases</h5>
										<?php if (!empty($pases->row)) { ?>
                                        <p>Pases: <?php echo $pases->total_results; ?> <br> Pagina: <?php echo $pases->pag; ?> de <?php echo $pases->total_pages; ?>
                                        </p>

                                        <table class="tablesaw color-table table-hover table tablesaw-stack table-striped tablesaw-row-zebra" data-tablesaw-mode="stack">
                                            <thead>
                                                <tr>
													<th>Foto</th>
                                                    <th>Rut</th>
                                                    <th>Nombre</th>
                                                    <th>Apellidos</th>
													<th>Club Origen</th>
                                                    <th>Club Destino</th>
                                                    <th>Estatus</th>
                                                   
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($pases->row as $Elem) { ?>
                                                    <tr>
													
                                                         <td><?php if (!empty($Elem['imagen'])) { ?>
                                                                <img src="<?php $baseUrl ?>uploads/p_nadador_<?php echo $Elem['user']; ?>_<?php echo $Elem['imagen']; ?>.jpg" style="max-width: 70px;" alt="User Wall">
                                                            <?php } else { ?>
                                                                <img src="assets/demo/users/fotoperfil.jpg" style="max-width: 70px;" alt="User Wall">
                                                            <?php } ?></td>
                                                        <td><?php echo $Elem['rut']; ?></td>
														<td><?php echo $Elem['nombre']; ?></td>
                                                        <td><?php echo $Elem['apellido']; ?></td>
                                                        <td><?php echo $Elem['club_origen']; ?></td>
                                                        <td><?php echo $Elem['club_destino']; ?></td>
                                                        <td><?php echo $Elem['estatus']; ?></td>
                                                     
                                                        
                                                        <td>
															
                                                           
                                                            <a href="<?php echo BASE_PATH_CONTROL; ?>pases_up.php?id=<?php echo $Elem['id']; ?>" class="btn mini" title="Documentacion" alt="Documentacion"><i class="fas fa-file-alt">Documentacion</i></a>
															<a href="<?php echo BASE_PATH_CONTROL; ?>pases_elim.php?id=<?php echo $Elem['id']; ?>" class="btn mini" title="Eliminar" alt="Eliminar" onClick="return confirm('Seguro de eliminar este pase?');"><i class="fa fa-fw fa-trash">Eliminar</i></a>
                                               
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
                                                    $pagemin = $pases->pag - 3;
                                                    $pagemax = $pases->pag + 3;
                                                    $PagAnt = $pases->pag - 1;
                                                    $PagSig = $pases->pag + 1;
                                                    ?>
                                                    <?php if ($pases->pag >= 1) { ?>
                                                        <li class="page-item"><a class="page-link" href="<?php echo BASE_PATH_CONTROL; ?>pases.php?pagi=1&<?php echo $listvar ?>">&laquo;</a></li>

<?php } ?>
<?php if ($pases->pag > 1) { ?>

                                                        <li class="page-item"><a class="page-link" href="<?php echo BASE_PATH_CONTROL; ?>pases.php?pagi=<?php echo $PagAnt; ?>&<?php echo $listvar ?>">&lt;</a></li>


                                                    <?php } ?>
                                                    <?php while ($contpag <= $pases->total_pages) {
                                                        ?>
    <?php if ($pases->pag == 1) { ?>
                                                            <li class="page-item<?php if ($contpag == $pases->pag) { ?> active<?php } ?> <?php if ($contpag > 9) echo 'oculto'; ?>"><a class="page-link" href="<?php echo BASE_PATH_CONTROL; ?>pases.php?pagi=<?php echo $contpag; ?>&<?php echo $listvar ?>"><?php echo $contpag; ?></a></li>

                                                            <?php
                                                            $contpag = $contpag + 1;
                                                        }
                                                        elseif ($pases->pag < 5) {
                                                            ?>
                                                            <li class="page-item<?php if ($contpag == $pases->pag) { ?> active<?php } ?> <?php if ($contpag > 7) echo 'oculto'; ?>"  >
                                                                <a class="page-link" href="<?php echo BASE_PATH_CONTROL; ?>pases.php?pagi=<?php echo $contpag; ?>&<?php echo $listvar ?>"><?php echo $contpag; ?></a>
                                                            </li>
                                                            <?php
                                                            $contpag = $contpag + 1;
                                                        } elseif ($pases->pag > $pases->total_pages - 5) {
                                                            ?>
                                                            <li class="page-item<?php if ($contpag == $pases->pag) { ?> active<?php } ?> <?php if ($contpag < $pases->total_pages - 7) echo 'oculto'; ?>"  >
                                                                <a class="page-link" href="<?php echo BASE_PATH_CONTROL; ?>pases.php?pagi=<?php echo $contpag; ?>&<?php echo $listvar ?>"><?php echo $contpag; ?></a>
                                                            </li>
        <?php $contpag = $contpag + 1;
    } else {
        ?>
                                                            <li class="page-item<?php if ($contpag == $pases->pag) { ?> active<?php } ?> <?php if ($contpag < $pagemin || $contpag > $pagemax) echo 'oculto'; ?>"  >
                                                                <a class="page-link" href="<?php echo BASE_PATH_CONTROL; ?>pases.php?pagi=<?php echo $contpag; ?>&<?php echo $listvar ?>"><?php echo $contpag; ?></a>
                                                            </li><?php
                                                    $contpag = $contpag + 1;
                                                }
                                            }
?>
                                                    <?php if ($pases->pag < $pases->total_pages) { ?>

                                                        <li class="page-item"><a class="page-link" href="<?php echo BASE_PATH_CONTROL; ?>pases.php?pagi=<?php echo $PagSig; ?>&<?php echo $listvar ?>">&gt;</a></li>

<?php } ?>
<?php if ($pases->pag >= 1) { ?>
                                                        <li class="page-item"><a class="page-link" href="<?php echo BASE_PATH_CONTROL; ?>pases.php?pagi=<?php echo $pases->total_pages; ?>&<?php echo $listvar ?>">&raquo;</a>
                                                        </li>
<?php } ?>
                                                </ul>
                                            </nav>



                                        </div>
										
										<?php } else { ?>
										El club no tiene Inicio de Pases registrados
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
