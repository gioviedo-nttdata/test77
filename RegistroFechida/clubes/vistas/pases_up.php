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
                                    <div class="col-md-12 widget-holder">
                                        <h5 class="box-title">Recuerde que de Adjuntar (<?php echo $totalRequisitos;?>) Documentos para Iniciar el Pase de: <b><?php echo $pases->row[0]['nombre'] . " " . $pases->row[0]['apellido']  ?></b></h5>
                                        <?php if ($pases->row[0]['estatusid']>'2') { ?>
                                        <div class="formulario">
                                            <!-- /.box-header -->
                                            <!-- form start -->
                                    
                                           <form action="/" enctype="multipart/form-data" method="POST">
                                              <select class="form-control" id="requisitos" name="requisitos" required>
                                             <?php foreach($requisitos as $row_req) { ?>
                                              <option value="<?php echo $row_req['id'];?>"><?php echo $row_req['requisito'];?></option>
                                            <?php } ?>
                                            </select>
                                            <div id="dropzone" class="dropzone"></div>
                                            </form>
                                        </div>
                                        <?php } ?>
                                    </div>

                                    <div class="col-md-12 widget-holder">
                                        <div id="statusMsg"></div>
                                        <div class="widget-bg">
                                            <div class="widget-body" id="docu_id">
                                               <h5 class="box-title">Documentos   Faltanes (<?php echo $totalDocumentosFaltantes;?>) </h5>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Documento</th>
                                                            <th>Archivo</th>
                                                            <th>Estatus</th>
                                                            <th>Comentario</th>
                                                            <th>Acción</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($documentos as $Elem) { ?>
                                                            <tr>
                                                                <td><?php echo $Elem['nrequisito'];?></td>
                                                               
                                                                <td><a href="documento_pase_down.php?id=<?php echo $Elem['id'] ?>"><?php echo $Elem['nombre'] . "." . $Elem['extension']; ?></a></td>
                                                                <td>

                                                            <?php if($Elem['estatusid']=='1'){?>
                                                                 <div  class="col-md-12 msg-aprobado"><?php echo $Elem['estatus']; ?></div>
                                                            <?php }else if($Elem['estatusid']=='2'){  ?>

                                                               <div  class="col-md-12 msg-rechazado"><?php echo $Elem['estatus']; ?></div>
                                                             <?php }else{ ?>
                                                                <div  class="col-md-12 msg-iniciado"><b><?php echo $Elem['estatus']; ?></b></div>
                                                               
                                                             <?php } ?>
                                                                   </td>
                                                                
                                                                <td><?php echo $Elem['comentario'];?></td>
                                                                <td>
                                                                 <?php if($pases->row[0]['estatusid']=='5' && $Elem['estatusid']=='4' || $pases->row[0]['estatusid']=='6' && $Elem['estatusid']=='2'){?>
                                                                    <a href="<?php echo BASE_PATH_CONTROL; ?>documentos_pase_elim.php?id=<?php echo $Elem['id']; ?>" class="btn btn-primary" title="Eliminar" alt="Eliminar" onClick="return confirm('Seguro de eliminar este documento?');"><i class="fa fa-fw fa-trash"></i> Eliminar</a>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>

                                                    </tbody>
                                                </table>
 <?php //echo $pases->row[0]['totaldocRechazados'];?>
<?php if($totalDocumentosFaltantes=='0' &&  $pases->row[0]['estatusid']=='5'  ){?>

<div class="col-md-12 msg-valido">
 Ya has subido los documentos necesarios, puedes enviar la solicitud a la Federación
</div>
 <form action="pases_mod_estatus.php" method="post" id="formPME">
<div class="col-md-12  text-right">
     <input class="form-control" id="estatus" name="estatus" type="hidden" value="4">
     <input class="form-control" id="pase" name="pase" type="hidden" value="<?php echo $pases->row[0]['id'];?>">
    <div class="form-actions btn-list">
        <button class="btn btn-primary" type="submit">Enviar Solicitud</button>
    </div>
</div>
</form>
                                                    
<?php }else if($totalDocumentosFaltantes >'0' && $pases->row[0]['estatusid']=='5' ||
$totalDocumentosFaltantes >'0' && $pases->row[0]['estatusid']=='6'){?>
<div   class="col-md-12 msg-error">
<div id="statusMsg3" >
    Debes subir todos los documentos para enviar a la Federacion 
</div>
<?php }else if(($totalDocumentosFaltantes=='0' &&  $pases->row[0]['estatusid']=='4') ||
($totalDocumentosFaltantes=='0' &&  $pases->row[0]['estatusid']=='7') ){?>
<div  class="col-md-12 msg-valido">
<div id="statusMsg3"  >
    Todos los documentos fueron enviados a la Federacion 
</div>
<?php }else if($totalDocumentosFaltantes=='0' &&  $pases->row[0]['estatusid']=='6' &&$pases->row[0]['totaldocRechazados']=='0' ){?>
<div  class="col-md-12 msg-valido">
Ya has subido los documentos necesarios, puedes enviar la solicitud nuevamente a la Federación
</div>
 <form action="pases_mod_estatus.php" method="post" id="formPME">
<div class="col-md-12  text-right">
     <input class="form-control" id="estatus" name="estatus" type="hidden" value="7">
     <input class="form-control" id="pase" name="pase" type="hidden" value="<?php echo $pases->row[0]['id'];?>">
    <div class="form-actions btn-list">
        <button class="btn btn-primary" type="submit">Enviar Solicitud</button>
    </div>
</div>
<?php }else if($totalDocumentosFaltantes=='0' && $pases->row[0]['estatusid']=='6' &&
$pases->row[0]['totaldocRechazados']>'0'){?>
<div   class="col-md-12 msg-error">
<div id="statusMsg3" >
    Debes Revisar la Documentación
</div>
</form>
 <?php } ?>
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
                        <h5 class="modal-title" id="myLargeModalLabel2">Documentos para Iniciar el Pase</h5>
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