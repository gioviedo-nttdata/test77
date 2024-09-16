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
                                <p class="page-title-description mr-0 d-none d-md-inline-block">Listado de Entrenadores</p>
                            </div>
                            <!-- /.page-title-left -->
                            <div class="page-title-right d-none d-sm-inline-flex">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Intro</a>
                                    </li>
                                    <li class="breadcrumb-item active">Entrenadores</li>
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
												    <a id="bt_buscar" rel="oculto" class="btn btn-primary btn-rounded ripple" style="color:#fff"><i class="fas fa-eye"></i> <span>&nbsp;Agregar Entrenador</span></a>
												</div>
                                                <div id="buscador_div" class="oculto">
                                                    <form action="entrenadores_add.php" method="post" id="formU">
													
                                                        <div class="row">
														  <div class="col-md-6">
															<div class="form-group row">
                                                            <label class="col-md-4 col-form-label" for="l0">Apellido Paterno</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" id="ape1" name="ape1" placeholder="Apellido paterno" type="text" required>
                                                            </div>
                                                        </div>
														  </div>
														  <div class="col-md-6">
															<div class="form-group row">
                                                            <label class="col-md-4 col-form-label" for="l0">Apellido Materno</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" id="ape2" name="ape2" placeholder="Apellido Materno" type="text">
                                                            </div>
															</div>
														  </div>
														  
														  <div class="col-md-6">
															<div class="form-group row">
                                                            <label class="col-md-4 col-form-label" for="l0">Nombre</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" id="nombre" name="nombre" placeholder="Nombre" type="text" required>
                                                            </div>
															</div>
														  </div>
														  <div class="col-md-6">
															<div class="form-group row">
                                                            <label class="col-md-4 col-form-label" for="l0">Rut</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" id="rut" name="rut" placeholder="Rut" type="text" required>
                                                            </div>
															</div>
														  </div>
														  
														  <div class="col-md-6">
															<div class="form-group row">
                                                            <label class="col-md-4 col-form-label" for="l0">Genero</label>
                                                            <div class="col-md-8">
                                                                <select class="form-control" id="genero" name="genero" required>
                                                                    <option value="">Seleccionar</option>
                                                                    <option value="1"<?php if ($genero == "1") { ?> selected<?php } ?>>Femenino</option>
                                                                    <option value="2"<?php if ($genero == "2") { ?> selected<?php } ?>>Masculino</option>
                                                                </select>
                                                            </div>
															</div>
														  </div>
														  <div class="col-md-6">
															<div class="form-group row">
                                                            <label class="col-md-4 col-form-label" for="l0">Fecha de Nacimiento</label>
                                                            <div class="col-md-8">
                                                               <input type="text" class="form-control datepicker" name="fecnac" id="fecnac" required readonly>
																
                                                            </div>
                                                        </div>
														  </div>
														  
														   <div class="col-md-6">
															<div class="form-group row">
                                                            <label class="col-md-4 col-form-label" for="l0">Cargo</label>
                                                            <div class="col-md-8">
                                                                <select class="form-control" id="cargo" name="cargo[]" multiple="multiple" data-toggle="select2" data-plugin-options='{"minimumResultsForSearch": -1}' required>
                                                                 
                                                                    <option value="1"<?php if ($genero == "1") { ?> selected<?php } ?>>Jefe Técnico</option>
                                                                    <option value="2"<?php if ($genero == "2") { ?> selected<?php } ?>>Entrenador</option>
																	<option value="3"<?php if ($genero == "3") { ?> selected<?php } ?>>Asistente</option>
																	<option value="4"<?php if ($genero == "4") { ?> selected<?php } ?>>Preparador físco</option>
                                                                </select>
                                                            </div>
															</div>
														  </div>
														  
														  
														  <div class="col-md-6">
															<div class="form-group row">
                                                            <label class="col-md-4 col-form-label" for="l0">Disciplina</label>
                                                            <div class="col-md-8">
                                                                <select class="form-control" id="disciplina" name="disciplina[]" multiple="multiple" data-toggle="select2" data-plugin-options='{"minimumResultsForSearch": -1}' required>
																	<?php foreach($esp->row as $row_pais) { ?>
																	  <option value="<?php echo $row_pais['id'];?>"<?php if ($eventos['disciplina']==$row_pais['id']) { ?> selected<?php } ?>><?php echo $row_pais['especialidad'];?></option>
																	<?php } ?>
																</select>
                                                            </div>
															</div>
														  </div>
														  
														  <div class="col-md-6">
															<div class="form-group row">
                                                            <label class="col-md-4 col-form-label" for="l0">Email</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" id="email" name="email" placeholder="Email" type="text">
                                                            </div>
															</div>
														  </div>
														  
														  
														  
														  
														</div>
                                                                                                              
                                                                <div class="form-actions btn-list">
                                                                    <button class="btn btn-primary" type="submit">Guardar</button>
                                                                </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="box-title">Usuarios</h5>
										<?php if (!empty($users->row)) { ?>
                                        <p>Entrenadores: <?php echo $users->total_results; ?> <br> Pagina: <?php echo $users->pag; ?> de <?php echo $users->total_pages; ?>
                                        </p>

                                        <table class="tablesaw color-table table-hover table tablesaw-stack table-striped tablesaw-row-zebra" data-tablesaw-mode="stack">
                                            <thead>
                                                <tr>
													<th>Foto</th>
                                                    <th>Rut</th>
                                                    <th>Apellido</th>
                                                    <th>Nombre</th>
													<th>Disciplinaccc</th>
                                                    <th>Cargo</th>
                                                   
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($users->row as $Elem) { ?>
                                                    <tr>
													<td><?php if (!empty($Elem['imagen'])) { ?>
															<img src="<?php $baseUrl?>uploads/p_nadador_<?php echo $Elem['id'];?>_<?php echo $Elem['imagen'];?>.jpg" style="max-width: 70px;" alt="User Wall">
														<?php } else { ?>
														<img src="assets/demo/users/fotoperfil.jpg" style="max-width: 70px;" alt="User Wall">
														<?php } ?></td>
                                                        <td><?php echo getPuntosRut($Elem['rut']); ?></td>
                                                        <td><?php echo $Elem['apellido']; ?></td>
                                                        <td><?php echo $Elem['nombre']; ?></td>
														<td><?php $lista = Disciplina::getDisciplinas($Elem['id']);
															foreach ($lista as $item) {
																echo $item['especialidad']." - ";
															} 

														?></td>
                                                        
                                                        
                                                     
                                                        <td>
														
														<?php $lista = Cargo::getCargos($Elem['id']);
															foreach ($lista as $item) {
																echo $item['cargo']." - ";
															} 

														?>
														<?php //echo Cargo::getCargos($Elem['id']); 
														/*
                                                        if ($Elem['cargo'] == 1) {
                                                            echo "jefe Técnico";
                                                        }
                                                        if ($Elem['cargo'] == 2) {
                                                            echo "Entrenador<br>";
                                                        }
                                                        if ($Elem['cargo'] == 3) {
                                                            echo "Asistente";
                                                        }
														*/
                                                        
                                                        ?></td>
                                                        <td>
															
                                                            <a href="<?php echo BASE_PATH_CONTROL; ?>entrenadores_mod.php?id=<?php echo $Elem['id']; ?>" class="btn mini" title="Modificar Datos" alt="Editar User"><i class="fas fa-user-edit"></i></a>
															<a href="<?php echo BASE_PATH_CONTROL; ?>usuarios_elim.php?id=<?php echo $Elem['id']; ?>" class="btn mini" title="Eliminar" alt="Eliminar" onClick="return confirm('Seguro de eliminar este nadador?');"><i class="fa fa-fw fa-trash"></i></a>
                                               
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