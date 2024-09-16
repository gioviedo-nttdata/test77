						<h5 class="box-title">Documentos agregados</h5>
                                    
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Documento</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  foreach ($documentos as $Elem) { ?>
                                            <tr>
                                                <td><a href="documento_down.php?id=<?php echo $Elem['id']?>"><?php echo $Elem['nombre'].".".$Elem['extension'];?></a></td>
                                                <td>
                                                    
                                                    <a href="<?php echo BASE_PATH_CONTROL; ?>documentos_elim.php?id=<?php echo $Elem['id']; ?>" class="btn mini" title="Eliminar" alt="Eliminar" onClick="return confirm('Seguro de eliminar este documento?');"><i class="fa fa-fw fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                           
                                        </tbody>
                                    </table>