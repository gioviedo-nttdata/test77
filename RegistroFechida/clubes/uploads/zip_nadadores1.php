<?php
	  require_once '../lib/autoloader.class.php';
	  require_once '../lib/init.class.php';
            require_once '../lib/auth.php';




		/*$chequeo = "empezamos";
		is_array($file) ? $chequeo = 'Array' : $chequeo = 'No es un array';*/
		
		
	
		 
                //$valor = uniqid();
                $valor = "5f2229b74ce45";
		
		$targetFile1 = "zip/zip_".$valor.".ZIP";
       
					//echo $valor;
					$comp = New Usuario();
                    

                    if (!file_exists($valor)) {
                        mkdir($valor, 0755, true);
                    }

                    
                    $zip = new ZipArchive;
                    if ($zip->open($targetFile1) === TRUE) {
                        $zip->extractTo('zip/'.$valor);
                        $zip->close();
                        //echo 'ok';
                    } else {
                        //echo 'failed';
                    }

                    $dir = opendir('zip/'.$valor."/");
                    // Leo todos los ficheros de la carpeta
                    while ($elemento = readdir($dir)){
                        // Tratamos los elementos . y .. que tienen todas las carpetas
                        if( $elemento != "." && $elemento != ".."){
                            // Si es una carpeta
                            if( is_dir($path.$elemento) ){
                                // Muestro la carpeta
                                //echo "<p><strong>CARPETA: ". $elemento ."</strong></p>";
                            // Si es un fichero
                            } else {
                                // Muestro el fichero
                                //echo "<br />". $elemento;

                                $ext = pathinfo('zip/'.$valor.'/'.$elemento, PATHINFO_EXTENSION);
                                if (strtolower ($ext) == 'hy3') {
                                    $comp->guardarZip($authj->rowff['id'], $valor, $ext);

                                    // aqui empezamos a leer el archivo

                                    if (!file_exists('zip/'.$valor.'/'.$elemento)) {
                                       echo 'No existe el archivo: zip/'.$valor.'/'.$elemento;
                                    }

                                    echo "llego aqui";

                                    $file = fopen('zip/'.$valor.'/'.$elemento, "r");
                                    $row = 0;
                                    while(!feof($file)) {
                                        $line = fgets($file);
                                        if (substr($line, 0, 2) == "D1") {
                                            $row++;
                                            /*$competidor = new Competidor();
                                            $competidor->MeetManagerId = trim(substr($line, 3, 5));
                                            $competidor->Nombres = utf8_encode(trim(substr($line, 8, 20)));
                                            $competidor->Apellidos = utf8_encode(trim(substr($line, 28, 40)));
                                            $competidor->FechaNacimiento = empty(trim(substr($line, 88, 8))) ? null : DateTime::createFromFormat("mdY", substr($line, 88, 8))->format("Y-m-d");
                                            $competidor->Edad = trim(substr($line, 97, 5));
                                            $competidor->EventoId = $evento->EventoId;
                                            $competidor->ClubId = $club->ClubId;*/

                                            

                                            // revisamos y guardamos los datos
                                                       // $num = $sheet->getCell("A".$row)->getValue();
                                                        $apellidos = explode(" ", utf8_encode(trim(substr($line, 28, 40))));
                                                        $ape1 = $apellidos[0];
                                                        $ape2 = $apellidos[1];
                                                        $nombre = utf8_encode(trim(substr($line, 8, 20)));
                                                        $rut = trim(substr($line, 69, 12));
														
														
														
														$fecha = empty(trim(substr($line, 88, 8))) ? null : DateTime::createFromFormat("mdY", substr($line, 88, 8))->format("Y-m-d");
														//$fecha = date('d/m/Y',PHPExcel_Shared_Date::ExcelToPHP($fecha));
														
														//$mifecha = date("d-m-Y", PHPExcel_Shared_Date::ExcelToPHP($sheet->getCell("E".$row)->getValue() ) );


														$sexo = strtolower(trim(substr($line, 2, 1)));
														$email = "";
														
                                                        //echo $nombre." ".$ape1." ".$ape2." ".$rut." <b>".$fecha."</b><br>";
														$hayerr = 0;
														
														if (empty($nombre)) {

															$errores[$row] = "1-";
															$erroresM[$row] .= "El nombre no puede estar vacio - ";
															$err .= "1-";
															$hayerr = 1;
														}														
														if (empty($ape1)) {
															$errores[$row] .= "2-";
															$erroresM[$row] .= "El apellido paterno no puede estar vacio - ";
															$err .= "2-";
															$hayerr = 1;															
														}
														if (empty($rut) or valida_rut($rut)===false) {
															$errores[$row] .= "3-";
															$erroresM[$row] .= "El rut no es valido -";
															$err .= "3-";
															$hayerr = 1;
														}

														$elrow = $comp->getOneByRutExt($rut);
														//echo "el row".$elrow;
														if (!empty($elrow)) {
															$errores[$row] .= "6-";
															if ($elrow[0]['club'] == $authj->rowff['id']) {
																$erroresM[$row] .= "El rut ya está inscrito en la base de datos por su club - ";
															} else {
																$erroresM[$row] .= "El rut ya está inscrito en la base de datos por OTRO club -";
															}
															
															$err .= "6-";
															$hayerr = 1;

														}	
														
														if (empty($sexo) or ($sexo != 'f' && $sexo != 'm')) {
															$errores[$row] .= "4-";
															$erroresM[$row] .= "El sexo no es valido - ";
															$err .= "4-";
															$hayerr = 1;
														}
														
														
														echo $fecha." - ".$Fhoy." <br>";

														if (empty($fecha)) {
															$erroresM[$row] .= "La fecha de nacimiento no es valida -";
															$errores[$row] .= "5-";
															$err .= "5-";
															$hayerr = 1;
														}
														
														echo $hayerr."-".$erroresM[$row]."<br>";
														
														if ($hayerr == 0) {

														
															if ($sexo == 'f') {
																$genero = 1;																
															} else {
																$genero = 2;	
															}
															
															$fecha = str_replace ("/", "-", $fecha);
															//$valores = explode('-', $fecha);
															$fecnac = $fecha;
														
														
															
															$roles = array(
																			   'nadador' => '1',
																			   'entrenador' => '0',
																			   'sysadmin' => '0',
																			   'tesorero' => '0',
																			   'apoderado' => '0',
																			   'admin' => '0'
																	);
															  $datosN = array(
																  'genero' => $genero,
																  'fecnac' => $fecnac,
																  'grupo' => $grupo,
																  'colegio' => $colegio,
																  'direccion' => $direccion,
																  'telefono' => $telefono,
																  'notas' => $notas,
																  'externo' => '0',
																  'disciplina' => $disciplina
															  );
                                                              $comp->agregar($authj->rowff['id'],$rut, $nombre, $ape1, $ape2, $email, $roles, $datosN);
															
														} else {

															$roles = array(
                                                                'nadador' => '1',
                                                                'entrenador' => '0',
                                                                'sysadmin' => '0',
                                                                'tesorero' => '0',
                                                                'apoderado' => '0',
                                                                'admin' => '0'
                                                     );
                                               $datosN = array(
                                                   'genero' => $genero,
                                                   'fecnac' => $fecnac,
                                                   'grupo' => $grupo,
                                                   'colegio' => $colegio,
                                                   'direccion' => $direccion,
                                                   'telefono' => $telefono,
                                                   'notas' => $notas,
                                                   'externo' => '0',
                                                   'disciplina' => $disciplina,
                                                   'valor' => $valor,
                                                   'error' => $erroresM[$row]
                                               );
                                               $comp->agregarTemp($authj->rowff['id'],$rut, $nombre, $ape1, $ape2, $email, $roles, $datosN);
                                             
															
															//$users->guardarExcelError($authj->rowff['id'], $valor, $row, $errores[$row], $erroresM[$row]);
														}
														


                                            // revisamos y guardamos los datos
                                           
                                        }

                                    }


                                    // aqui terminamos de leer el archivo

                                }

                            }
                        }
                    }


					
                    $response = array (
                        'status' => 'ok',
                        'info'   => 'Todo salio bien'
                    );
                    echo json_encode($response);
              
		
		
 
			
	
 ?>