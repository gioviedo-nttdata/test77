<?php   /* error_reporting(E_ALL);
ini_set('display_errors', '1');*/

        require_once 'lib/autoloader.class.php';
	require_once 'lib/init.class.php';
        $_page = 'documentos';
        $_menu = 'documentos';

	require_once 'lib/auth.php';
	
	
        $docu = New Documento();
      
        $documentos = $docu->getAll($authj->rowff['id']);
		
		


	require_once 'vistas/documentos_int.php';   
 


?>