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

                <!-- /.container-fluid -->
                <!-- =================================== -->
                <!-- Different data widgets ============ -->
                <!-- =================================== -->
                <div class="container-fluid">
                    <div class="widget-list row">
                        <div class="widget-bg">
                            <div class="widget-body">
                                <div class="row">
                                    
                                    <div class="col-md-6 widget-holder">
                                        <div id="statusMsg"></div>
                                        <div class="widget-bg">
                                            <div class="widget-body" id="docu_id">
                                                <h5 class="box-title">Documentos  de identificacion agregados</h5>

                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Documento</th>
                                                            <th>Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($documentos as $Elem) { ?>
                                                            <tr>
                                                                <td><a href="jueces_down.php?id=<?php echo $Elem['id'] ?>"><?php echo $Elem['nombre'] . "." . $Elem['extension']; ?></a></td>
                                                                <td>

                                                                    </td>
                                                            </tr>
                                                        <?php } ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.widget-body -->
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                 
                                    <div class="col-md-6 widget-holder">
                                        <div id="statusMsg"></div>
                                        <div class="widget-bg">
                                            <div class="widget-body" id="docu_id2">
                                                <h5 class="box-title">Certificados de capacitaciones como juez/arbitro agregados</h5>

                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Documento</th>
                                                            <th>Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($documentos1 as $Elem) { ?>
                                                            <tr>
                                                                <td><a href="jueces_down.php?id=<?php echo $Elem['id'] ?>"><?php echo $Elem['nombre'] . "." . $Elem['extension']; ?></a></td>
                                                                <td>

                                                                    <a href="<?php echo BASE_PATH_CONTROL; ?>documentos_elim.php?id=<?php echo $Elem['id']; ?>" class="btn mini" title="Eliminar" alt="Eliminar" onClick="return confirm('Seguro de eliminar este documento?');"><i class="fa fa-fw fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.widget-body -->
                                        </div>
                                    </div>
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