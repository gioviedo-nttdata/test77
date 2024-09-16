<?php
	  require_once '../lib/autoloader.class.php';
	  require_once '../lib/init.class.php';
      require_once '../lib/auth.php';





if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{
	if(isset($_GET["delete"]) && $_GET["delete"] == true)
	{
		
	}
	else
	{
		/*$chequeo = "empezamos";
		is_array($file) ? $chequeo = 'Array' : $chequeo = 'No es un array';*/
		
		$comp = New Documento();
		$file = $_FILES["file"]["name"];
		$filetype = $_FILES["file"]["type"];
		$filesize = $_FILES["file"]["size"];
		$fileParts  = pathinfo($_FILES['file']['name']);
                $nombre = $fileParts['filename'];
                $ext = $fileParts['extension'];
		 
        $valor = uniqid();
		
		$targetFile1 = $authj->rowff['id']."_".$valor.".".$fileParts['extension'];

		$pdfParser = new PdfParserController($_FILES["file"]["tmp_name"]);
		$club = new Club();
		$idclub = $authj->rowff['id'];

		if($pdfParser->text){
			$certificadoVigencia1 = $pdfParser->extractText(["ÚLTIMA ELECCIÓN DIRECTIVA :","DURACIÓN DIRECTIVA"]);
			$certificadoVigencia1 = DateTime::createFromFormat('d-m-Y', $certificadoVigencia1);

			$certificadoVigencia2 = $pdfParser->extractText(["seencuentravigentehastael","."],true);
			$certificadoVigencia2 = DateTime::createFromFormat('d-m-Y', $certificadoVigencia2);

			if($certificadoVigencia1){
				$duracion = $pdfParser->extractText(["DURACIÓN DIRECTIVA :","AÑOS"]);
				$certificadoVigencia1->modify("+$duracion Years");
				$fecha = $certificadoVigencia1->format('Y-m-d');
				$club->actualizarFechaElecc($idclub, $fecha, true);

				$strDirectorio = $pdfParser->extractText(["CARGO NOMBRE R.U.N.",'La información de este certificado, respecto del']);
				$cargos = array("PRESIDENTE", "VICEPRESIDENTE", "SECRETARIO", "TESORERO", "1er DIRECTOR", "2do DIRECTOR", "3er DIRECTOR", "DIRECTOR");
				$patronDirectorio = "/(" . implode("|", $cargos) . ")(.*?)\s*((?:\d{1,3}\.)*\d{1,3}-[\dk])/";
				preg_match_all($patronDirectorio, $strDirectorio, $directorios, PREG_SET_ORDER);
				foreach ($directorios as $directorio){
					$cargo = trim($directorio[1]);
					$nombre = trim($directorio[2]);
					$run = trim($directorio[3]);
					$club->saveDirectorio($idclub,$cargo,$nombre,$run,$fecha);
				}

			}elseif($certificadoVigencia2){
				$fecha = $certificadoVigencia2->format('Y-m-d');
				$club->actualizarFechaElecc($idclub, $fecha, true);
			}
		}
		
		/*$file = fopen("archivo.txt", "w");
    fwrite($file, $chequeo." lo h movido".$targetFile1." . el nombre del archivo".$_FILES["file"]["tmp_name"]." . peso".$filesize." . extension".$fileParts['extension']);
    fclose($file);*/

		if($file && move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile1))
		{
			
			
			$comp->guardarDoc($authj->rowff['id'], $valor, $nombre, $ext);
			
			
			echo json_encode(array("res" => false, "mensaje" => "mensaje"));
			
		}
	}
} ?>