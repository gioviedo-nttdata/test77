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
                                        <div ><h5 class="box-title"> Documentos para Iniciar el Pase de: <b><?php echo $pases->row[0]['nombre'] . " " . $pases->row[0]['apellido'] ?></b></h5>
                                        </div>
                                        <form action="pases_mod.php" method="post" id="formPR">
                                            <div class="row">
                                           
                                            <div class="widget-body" id="docu_id">
                                               <h5 class="box-title">Documentos Agregados</h5>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Documento</th>
                                                            <th>Archivo</th>
                                                            <th>Estatus</th>
                                                            <th>Acción</th>
                                                            <th>Comentario</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $i='1';
                                                        foreach ($documentos as $Elem) { ?>
                                                            <tr>
                                                                <td>
                                                                <input id="documento<?php echo $Elem['id'] ?>" name="documento<?php echo $Elem['id'] ?>" value="<?php echo $Elem['id'] ?>" type="hidden">
                                                                    <?php echo $Elem['nrequisito'];?>
                                                                </td>
                                                               
                                                                <td><a href="documento_pase_down.php?id=<?php echo $Elem['id'] ?>"><?php echo $Elem['nombre'] . "." . $Elem['extension']; ?></a></td>
                                                                <td >
                                                                <p id='p_estatusdoc<?php echo $Elem['id'] ?>' 
                                                                    <?php if($Elem['estatusid']=='1'){?>
                                                                            class="msg-aprobado"
                                                                     <?php }else if($Elem['estatusid']=='2'){  ?>
                                                                            class="msg-rechazado"
                                                                    <?php }else{ ?>
                                                                            class="msg-iniciado"
                                                                    <?php } ?>>
                                                                    <?php echo $Elem['estatus']; ?>
                                                                </p>

                                                                </td>
                                                                <td>
                                                                 <div>

                                                            <label>
                                                             <input type="radio" name="estatusdoc<?php echo $Elem['id'] ?>" value="1" onclick="estatusDocumento(this,'<?php echo $Elem['id'] ?>','<?php echo $Elem['estatus'] ?>')"
                                                            <?php if ($Elem['estatusid']  == '1') { ?> checked<?php } ?>>
                                                              
                                                            <span id="lestatusaprobado<?php echo $Elem['id'] ?>"<?php if($Elem['estatusid']=='1'){?>
                                                                            class="label-aprobabo"
                                                                    <?php }else{ ?>
                                                                            class="label-no-evaluado"
                                                                    <?php } ?> >
                                                                <i class="fa fa-check"></i> Abrobar</span>
                                                            </label>

                                                            &nbsp;&nbsp;&nbsp;

                                                            <label>
                                                              <input type="radio" name="estatusdoc<?php echo $Elem['id'] ?>" value="2" 

                                                              onclick="estatusDocumento(this,'<?php echo $Elem['id'] ?>','<?php echo $Elem['estatus'] ?>');"
                                                              <?php if ($Elem['estatusid']  == '2') { ?> checked<?php } ?>>
                                                              
                                                              <span id='lestatusrechazado<?php echo $Elem['id'] ?>'   <?php if($Elem['estatusid']=='2'){  ?>
                                                                            class="label-rechazado"
                                                                    <?php }else{ ?>
                                                                            class="label-no-evaluado"
                                                                    <?php } ?>>
                                                                <i class="fa fa-times"></i> Rechazar</span>
                                                            </label>

                                                            </div>
           
                                               
                                                                    
                                                                </td>
                                                                <td><input class="form-control" id="comentariodoc<?php echo $Elem['id'] ?>" name="comentariodoc<?php echo $Elem['id'] ?>" placeholder="Comentario" type="text" 
                                                                value="<?php echo $Elem['comentario'] ?>"></td>
                                                            </tr>
                                                        <?php 
                                                            $i++;
                                                        } ?>

                                                    </tbody>
                                                </table>

                                            </div>
                                            <!-- /.widget-body -->
                                            <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-form-label" for="l0">Estatus *</label>
                                                        <div class="col-md-8">
                                                     <input id="pase" name="pase" value="<?php echo $pases->row[0]['id'] ?>" type="hidden">
                                                      <input id="totaldoc" name="totaldoc" value="<?php echo $pases->row[0]['totaldoc'] ?>" type="hidden">
                                                       <input id="minid" name="minid" value="<?php echo $pases->row[0]['minid'] ?>" type="hidden">


                                                             <select class="form-control" id="estatus" name="estatus" required>
                                                             <?php 
                                                            foreach($estatus as $row) { ?>
                                                              <option value="<?php echo $row['id'];?>" <?php if ($row['id'] == $pases->row[0]['estatusid']) { ?> selected<?php } ?>><?php echo $row['estatus'];?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                         <label class="col-md-4 col-form-label" for="l0">Comentario</label>
                                                       <div class="col-md-8">
                                                        <input class="form-control" id="comentarioFederacion" name="comentarioFederacion" placeholder="Comentario" type="text" value="<?php echo $pases->row[0]['comentario_club_federacion'] ?>">
                                                         </div>
                                                    </div>
                                                </div>
                                           
                                            </div> <!-- /row -->
                                            <div  align="right" class="form-actions btn-list">
                                                    <button class="btn btn-primary" type="submit">Guardar</button>
                                            </div>
                                    
                                          </form>

                                        
                                       
                                       
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
                            <!-- form start 
                            <div id="dropzone" class="dropzone"></div>-->
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