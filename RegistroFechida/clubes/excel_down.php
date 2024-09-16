<?php require_once 'lib/autoloader.class.php';
      require_once 'lib/init.class.php';

      require_once 'lib/auth.php';

      
       //echo "empresa activa: ".$authj->rowff['act_empresa_id'];

    

function download($url,$nombre){

            $file= $url;

            $filename= basename($file);
            $type = '';
             
            if (is_file($file)) {
                $size = filesize($file);
                if (function_exists('mime_content_type')) {
                    $type = mime_content_type($file);
                } else if (function_exists('finfo_file')) {
                    $info = finfo_open(FILEINFO_MIME);
                    $type = finfo_file($info, $file);
                    finfo_close($info);
                }
                if ($type == '') {
                    $type = "application/force-download";
                }
                // Set Headers
                header("Content-Type: $type");
                header("Content-Disposition: attachment; filename=$nombre");
                header("Content-Transfer-Encoding: binary");
                header("Content-Length: " . $size);
                // Download File
                ob_end_clean();
                flush();
                readfile($file);
            } else {
                echo $file.' no es un archivo.';
            }
        
}  


	// echo "descarga";
	 
	  
	$f = "registro_nadadores.xlsx";

	$nombre = "registro_nadadores.xlsx";
	
 
       download($f,$nombre);
	
	 

?>