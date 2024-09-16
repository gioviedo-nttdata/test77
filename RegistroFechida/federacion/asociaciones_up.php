<?php   /* error_reporting(E_ALL);

ini_set('display_errors', '1');*/



	require_once 'lib/autoloader.class.php';

	require_once 'lib/init.class.php';

	$_page = 'nadadores_up';

	$_menu = 'nadadores';



	require_once 'lib/auth.php';





	$docu = New Asociacion();



	$documentos = $docu->getDocumento($id);

    $directorio = $docu->getDirectorio($id, 1);

    

	//$docu->getOne($id);





	require_once 'vistas/asociaciones_up.php';   

 





?>