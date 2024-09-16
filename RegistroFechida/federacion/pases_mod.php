<?php   /*error_reporting(E_ALL);
ini_set('display_errors', '1');*/

    require_once 'lib/autoloader.class.php';
	require_once 'lib/init.class.php';
        $_page = 'pases_revisar';
        $_menu = 'pases';

	require_once 'lib/auth.php';
      
$pases = New Pase();
$documentos = $pases->getDocumento($id);

 $recorrer=$minid+$totaldoc;
 for ($i = $minid; $i <= $recorrer; $i++) {
    

    $documento = ${"documento".$i};
    $estatusdoc = ${"estatusdoc".$i};
    $comentariodoc = ${"comentariodoc".$i};
   
    $pases->editarDocumentos($documento,$authj->rowff['id'],$estatusdoc,$comentariodoc); 
}
       
 $pases->editarPases($pase, $estatus,$comentarioFederacion); 

 header("Location: pases.php");

	
 


?>