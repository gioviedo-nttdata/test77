<?php ini_set('gd.jpeg_ignore_warning', 1);
	  require_once '../lib/autoloader.class.php';
	  require_once '../lib/init.class.php';
      require_once '../lib/auth.php';

      

function image_fix_orientation($filename) {
    $exif = exif_read_data($filename);
    if (!empty($exif['Orientation'])) {
        $image = imagecreatefromjpeg($filename);
        switch ($exif['Orientation']) {
            case 3:
                $image = imagerotate($image, 180, 0);
                break;

            case 6:
                $image = imagerotate($image, -90, 0);
                break;

            case 8:
                $image = imagerotate($image, 90, 0);
                break;
        }

        imagejpeg($image, $filename, 90);
    }
}


if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{
	if(isset($_GET["delete"]) && $_GET["delete"] == true)
	{
		
	}
	else
	{
		/*$chequeo = "empezamos";
		is_array($file) ? $chequeo = 'Array' : $chequeo = 'No es un array';*/
		
		
		$file = $_FILES["file"]["name"];
		$filetype = $_FILES["file"]["type"];
		$filesize = $_FILES["file"]["size"];
		$fileParts  = pathinfo($_FILES['file']['name']);
                $nombre = $fileParts['filename'];
                $ext = $fileParts['extension'];
		 
        $valor = uniqid();
		
		$targetFile1 = $usuario."_".$id.".".$fileParts['extension'];
		
		/*$file = fopen("archivo.txt", "w");
    fwrite($file, $chequeo." lo h movido".$targetFile1." . el nombre del archivo".$_FILES["file"]["tmp_name"]." . peso".$filesize." . extension".$fileParts['extension']);
    fclose($file);*/
               // echo $authj->rowff['id'];

		if($file && move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile1))
		{
			
			
			//$comp->guardarDoc($id, $valor, $nombre, $ext);
                    
                        
                        
                       image_fix_orientation($targetFile1);
				 
				 $img=getimagesize($targetFile1);
                                 
                                  $thumb = new easyphpthumbnail;
  
   
   
  
    
    
  	
   $thumb -> Thumbsaveas = 'jpg';
   

   $thumb -> Createthumb($targetFile1,'file');  

  
   $authj->updatePagoTrans($authj->rowff['id'], '1');
  
			
	/*header('Content-type: application/json');
        echo json_encode(['target_file' => 'V_'.$valor]);*/
  //return $valor;
			
		}
	}
} 
echo "ok";?>