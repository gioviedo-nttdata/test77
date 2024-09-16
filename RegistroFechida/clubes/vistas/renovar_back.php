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
                            <h6 class="page-title-heading mr-0 mr-r-5">Atletas de: <?php echo $Ndisciplina; ?></h6>
                            <p class="page-title-description mr-0 d-none d-md-inline-block">Listado de Nadadores</p>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Intro</a>
                                </li>
                                <li class="breadcrumb-item active">Nadadores</li>
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
                                   

                                    <h5 class="box-title">Usuarios</h5>
                                  

                                    <?php

                                    if (!empty($zipErrores)) { ?>
                                        <div class="col-md-12 paddsup">
                                            <div class="alert alert-danger" role="alert">
                                                Algunos usuarios ( <?php echo count($zipErrores); ?>) no se pudieron agregar desde el ZIP<br>
                                                <a href="nadadores_zip.php?valor=<?php echo $valor; ?>&origen=zip&disciplina=<?php echo $disciplina; ?>">Ver Registros</a>

                                            </div>

                                        </div>

                                    <?php } ?>




                                    <?php if (!empty($users->row)) { ?>
                                        <p>Nadadores: <?php echo $users->total_results; ?>  </p>

                                        <p>Seleccione los atletas a los que desea renovar la licencia </p>

                                        <form action="renovar_add.php" method="post" onsubmit = "validateF(event, this);">

                                        <button type="submit" class="btn btn-primary btn-rounded ripple" style="color:#fff"><i class="fas fa-user-plus"></i> <span>&nbsp;Agregar Atletas seleccionados</span></button>
                                                   

                                        <table id="example" class="tablesaw color-table table-hover table tablesaw-stack table-striped tablesaw-row-zebra" data-tablesaw-mode="stack">
                                            <thead>
                                                <tr>
                                                    <th>Selecionar</th>
                                                    <th>Foto</th>
                                                    <th>Rut</th>
                                                    <th>Apellidos</th>
                                                    <th>Nombre</th>
                                                    <th>Fecha de Nac</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $contador = 1;
                                                foreach ($users->row as $Elem) { ?>
                                                
                                                    <tr class="chckrow">
                                                    <td>
                                                                                

                                                                                <?php 
                                                                                $pagoLic = array();
                                                                                unset($pagoLic);
                                                                                $pagoLic = Licencia::getUserLicencia($Elem['id'], $periodoLic[0]['periodo']);
                                                                                if ($pagoLic[0]['pagado']==1) { ?>
                                                                              
                                                                                <i class="fas fa-star" style="color: #F9CD06;" title="Licencia Actualizada"></i>
                                                                             
                                                                                   
                                                                                    <?php } else { ?>
                                                                                        <div class="checkbox checkbox-primary">
                                                                                        <label>
                                                                                        <input class="inp_ck" type="checkbox" name="p_nadador_<?php echo $contador;?>" id="p_nadador_<?php echo $contador;?>" value="<?php echo $Elem['id'];?>"<?php if ($pagoLic[0]['pagado']==0 and !empty($pagoLic[0]['id'])) { ?> <?php } ?> style="border: 1px solid #ff0000 !important;"> <span class="label-text">&nbsp</span>
                                                                                    </label>
                                                                                    </div> 
                                                                                    <?php } ?>
                                                                                      
                                                                            </td> 

                                                        <td><?php if (!empty($Elem['imagen'])) { ?>
                                                                <img src="<?php $baseUrl ?>uploads/p_nadador_<?php echo $Elem['id']; ?>_<?php echo $Elem['imagen']; ?>.jpg" style="max-width: 70px;" alt="User Wall">
                                                            <?php } else { ?>
                                                                <img src="assets/demo/users/fotoperfil.jpg" style="max-width: 70px;" alt="User Wall">
                                                            <?php } ?></td>
                                                        <td><?php echo getPuntosRut($Elem['rut']); ?></td>
                                                        <td><?php echo $Elem['apellido'] . " " . $Elem['apellido2']; ?></td>
                                                        <td><?php echo $Elem['nombre']; ?></td>
                                                        <td><?php echo $Elem['fecnac']; ?><br><?php
                                                                                                //echo $Convocados['ano'], $comp->row[0]['federacion'];
                                                                                                if ($disciplina == 1 or $disciplina == 5) {
                                                                                                    $cates = Categoria::getCateNadadorGen($Elem['id']);
                                                                                                    //print_r($cates);
                                                                                                    if (isset($cates)) {
                                                                                                        foreach ($cates as $LaCate) {
                                                                                                            echo "<strong>" . $LaCate['fede_nombre'] . "</strong> " . $LaCate['categoria'] . "<br>";
                                                                                                        }
                                                                                                    }
                                                                                                }

                                                                                                ?></td>

                                                        <!--
                                                        <td><?php
                                                            if ($Elem['nadador'] == 1) {
                                                                echo "Nadador<br>";
                                                            }
                                                            if ($Elem['entrenador'] == 1) {
                                                                echo "Entrenador<br>";
                                                            }
                                                            if ($Elem['tesorero'] == 1) {
                                                                echo "Tesorero<br>";
                                                            }
                                                            if ($Elem['admin'] == 1) {
                                                                echo "Nadador<br>";
                                                            }
                                                            if ($Elem['sysadmin'] == 1) {
                                                                echo "Sysadmin<br>";
                                                            }
                                                            if ($Elem['apoderado'] == 1) {
                                                                echo "Apoderado<br>";
                                                            }
                                                            ?></td>-->
                                                       
                                                    </tr>
                                                <?php  $contador ++;
                                            } ?>

                                            </tbody>
                                        </table>

                                        <input type="hidden" name="conta_nad" value="<?php echo ($contador-1)?>">

                                        <button type="submit" class="btn btn-primary btn-rounded ripple" style="color:#fff"><i class="fas fa-user-plus"></i> <span>&nbsp;Agregar Atletas seleccionados</span></button>
                                                    


                                        </form>


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
                                                        } elseif ($users->pag < 5) {
                                                        ?>
                                                            <li class="page-item<?php if ($contpag == $users->pag) { ?> active<?php } ?> <?php if ($contpag > 7) echo 'oculto'; ?>">
                                                                <a class="page-link" href="<?php echo BASE_PATH_CONTROL; ?>nadadores.php?pagi=<?php echo $contpag; ?>&<?php echo $listvar ?>"><?php echo $contpag; ?></a>
                                                            </li>
                                                        <?php
                                                            $contpag = $contpag + 1;
                                                        } elseif ($users->pag > $users->total_pages - 5) {
                                                        ?>
                                                            <li class="page-item<?php if ($contpag == $users->pag) { ?> active<?php } ?> <?php if ($contpag < $users->total_pages - 7) echo 'oculto'; ?>">
                                                                <a class="page-link" href="<?php echo BASE_PATH_CONTROL; ?>nadadores.php?pagi=<?php echo $contpag; ?>&<?php echo $listvar ?>"><?php echo $contpag; ?></a>
                                                            </li>
                                                        <?php $contpag = $contpag + 1;
                                                        } else {
                                                        ?>
                                                            <li class="page-item<?php if ($contpag == $users->pag) { ?> active<?php } ?> <?php if ($contpag < $pagemin || $contpag > $pagemax) echo 'oculto'; ?>">
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
                                        El club no tiene atletas de <?php echo $Ndisciplina; ?> registrados
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
                        <h5 class="modal-title" id="myLargeModalLabel2">Subir excel de Atletas de <?php echo $Ndisciplina; ?></h5>
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
        <!-- /.modal -->
        <div class="modal modal-primary fade bs-modal-lg-primary1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel2" aria-hidden="true" style="display: none">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header text-inverse">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title" id="myLargeModalLabel2">Subir ZIP Roaster TEAM MANAGER de Atletas de <?php echo $Ndisciplina; ?></h5>
                    </div>
                    <div class="modal-body">
                        <div class="formulario">
                            <!-- /.box-header -->
                            <!-- form start -->
                            <div id="dropzone1" class="dropzone"></div>
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
    <?php include_once('cierre.php'); ?>
</body>

</html>