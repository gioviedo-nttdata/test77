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
                                                <td><a href="jueces_down.php?id=<?php echo $Elem['id']?>"><?php echo $Elem['nombre'].".".$Elem['extension'];?></a></td>
                                                <td>
                                                    
                                                    
                                                </td>
                                            </tr>
                                        <?php } ?>
                                           
                                        </tbody>
                                    </table>