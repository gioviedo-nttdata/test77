<?php /* error_reporting(E_ALL);
ini_set('display_errors', '1');*/


		require_once 'lib/class/PHPExcel.class.php';
        require_once 'lib/autoloader.class.php';
	require_once 'lib/init.class.php';
        $_page = 'nadadores';
        $_menu = 'nadadores';

	require_once 'lib/auth.php';
        
        $listvarall = "";
        $listvar = "";
        $listvaro = "";
      
        
                $opciones = array();
        $users = New Usuario();
       
		
		$Ndisciplina = Disciplina::getDisciplina($disciplina);


	if (!empty($valor)) {
            if (file_exists('uploads/excel/xls_'.$valor.'.xlsx')) {    
                $archivo = 'uploads/excel/xls_'.$valor.'.xlsx';
                $inputFileType = PHPExcel_IOFactory::identify($archivo);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($archivo);
                $sheet = $objPHPExcel->getSheet(0); 
                $highestRow = $sheet->getHighestRow(); 
                $highestColumn = $sheet->getHighestColumn();
                $carga_archivo = 1;                
            } else if (file_exists('uploads/excel/xls_'.$valor.'.xls')) {
                $archivo = 'uploads/excel/xls_'.$valor.'.xls';
                $inputFileType = PHPExcel_IOFactory::identify($archivo);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($archivo);
                $sheet = $objPHPExcel->getSheet(0); 
                $highestRow = $sheet->getHighestRow(); 
                $highestColumn = $sheet->getHighestColumn();
                $carga_archivo = 1;                
            } else {
				//echo "no consiguio el rchivo";
			} 
			
            
            
            
        }else {
				//echo "no consiguio el valor";
			}
		
		if ($carga_archivo==0) { 
		} else {
			
			//echo "entra aqui".$highestRow;
			//desde aqui el excel
			$contador = 0;
			$Fhoy = date('d/m/Y');
                                                    $contadorp = 0;
                                                    $saltar = 0;
                                                    for ($row = 2; $row <= $highestRow; $row++){ 
                                                       
                                                        
                                                        $contador ++;
                                                        //$contadorP = $contador + 1;
                                                        $row1 = $row + 1;
                                                        
                                                        $cell = $sheet->getCell("C".$row);
                                                        
														$num = $sheet->getCell("A".$row)->getValue();
                                                        $ape1 = $sheet->getCell("B".$row)->getValue();
                                                        $ape2 = $sheet->getCell("C".$row)->getValue();
                                                        $nombre = $sheet->getCell("D".$row)->getValue();
                                                        $rut = $sheet->getCell("E".$row)->getValue();
														
														
														
														$fecha = $sheet->getCell("F".$row)->getValue();
														$fecha = date('d/m/Y',PHPExcel_Shared_Date::ExcelToPHP($fecha));
														
														//$mifecha = date("d-m-Y", PHPExcel_Shared_Date::ExcelToPHP($sheet->getCell("E".$row)->getValue() ) );


														$sexo = mb_strtolower($sheet->getCell("G".$row)->getValue(), 'UTF-8');
														$email = $sheet->getCell("H".$row)->getValue();
														
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

														$elrow = $users->getOneByRutExt($rut);
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
														
														
														//echo $fecha." - ".$Fhoy." <br>";

														if (empty($fecha) or validar_fecha_espanol($fecha)===false or "$Fhoy" == "$fecha") {
															$erroresM[$row] .= "La fecha de nacimiento no es valida -";
															$errores[$row] .= "5-";
															$err .= "5-";
															$hayerr = 1;
														}
														
														//echo $hayerr."-".$err."<br>";
														
														if ($hayerr == 0) {

														
															if ($sexo == 'f') {
																$genero = 1;																
															} else {
																$genero = 2;	
															}
															
															$fecha = str_replace ("/", "-", $fecha);
															$valores = explode('-', $fecha);
															$fecnac = $valores[2]."-".$valores[1]."-".$valores[0];
														
														
															
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
															$users->agregar($authj->rowff['id'],$rut, $nombre, $ape1, $ape2, $email, $roles, $datosN);
															
														} else {

															
															
															$users->guardarExcelError($authj->rowff['id'], $valor, $row, $errores[$row], $erroresM[$row]);
														}
														
														
                                                       
                                                       
                                                                    
                                                                    
                                                    //$saltar = 0;
                                                         
                                                    }
                                                    
                                                    $cant_pru = $contador;
			
			// hasta aqui el excel
		}

header("Location: nadadores.php?disciplina=".$disciplina."&excelV=".$valor);
?>