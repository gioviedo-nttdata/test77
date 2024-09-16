<?php   /* error_reporting(E_ALL);
ini_set('display_errors', '1');*/

        require_once 'lib/autoloader.class.php';
	require_once 'lib/init.class.php';
        $_page = 'documentos';
        $_menu = 'documentos';

	require_once 'lib/auth.php';
	
	
        $docu = New JuezDocumento();
      
        $documentos = $docu->getAll($id, '1');

        $documentos1 = $docu->getAll($id, '2');
		
		


	require_once 'vistas/jueces_up.php';   
 


?>