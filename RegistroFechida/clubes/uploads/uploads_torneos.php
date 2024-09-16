<?php

require_once '../lib/autoloader.class.php';
require_once '../lib/init.class.php';
require_once '../lib/auth.php';

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' && !empty($_REQUEST['id_user'])){

    $torneo = new Torneo($_REQUEST);
    $torneo->insert();

    foreach($_FILES as $file){
        $fileName = $file["name"];
		$filetype = $file["type"];
		$fileSize = $file["size"];
		$fileParts  = pathinfo($fileName);
        $nombre = $fileParts['filename'];
        $ext = $fileParts['extension'];
        $valor = uniqid();
		$targetFile1 = "ST".$torneo->id."_".$valor.".".$ext;
		if($fileName && move_uploaded_file($file["tmp_name"], $targetFile1)){
			$torneo->insertDocumento($valor, $nombre, $ext);
		}
    }

    echo json_encode(array("error"=>0));
}