						<h5 class="box-title">Documentos   Faltanes (<?php echo $totalDocumentosFaltantes;?>) </h5>
                                    
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
                                        <?php  foreach ($documentos as $Elem) { ?>
                                            <tr>
                                                <td><?php echo $Elem['nrequisito'];?></td>
                                                <td><a href="documento_pase_down.php?id=<?php echo $Elem['id']?>"><?php echo $Elem['nombre'].".".$Elem['extension'];?></a></td>
                                                <td> 
                                                <?php if($Elem['estatusid']=='1'){?>
                                                     <div  class="col-md-12 msg-aprobado"><?php echo $Elem['estatus']; ?></div>
                                                <?php }else if($Elem['estatusid']=='2'){  ?>

                                                   <div  class="col-md-12 msg-rechazado"><?php echo $Elem['estatus']; ?></div>
                                                 <?php }else{ ?>
                                                    <div  class="col-md-12 msg-iniciado"><b><?php echo $Elem['estatus']; ?></b></div>
                                                   
                                                 <?php } ?></td>
                                                
                                                <td>
                                                     <a href="<?php echo BASE_PATH_CONTROL; ?>documentos_pase_elim.php?id=<?php echo $Elem['id']; ?>" class="btn btn-primary btn-rounded ripple" title="Eliminar" alt="Eliminar" onClick="return confirm('Seguro de eliminar este documento?');"><i class="fa fa-fw fa-trash"></i>Eliminar</a>
                                                </td>
                                                <td><?php echo $Elem['comentario'];?></td>
                                            </tr>
                                        <?php } ?>
                                           
                                        </tbody>
                                    </table>
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
<?php }else if($totalDocumentosFaltantes=='0' &&  $pases->row[0]['estatusid']=='6' ){?>
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
</form>
 <?php } ?>