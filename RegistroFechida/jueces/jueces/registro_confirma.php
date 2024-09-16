<?php  

require_once 'lib/autoloader.class.php';
require_once 'lib/init.class.php';
	


$fecha = date('Y-m-d H:i:s');


		$authj = new Authorizacion();
		//echo $id." - ".$unique;
	$authj1 = $authj->verificarCuenta ($id,$unique);     
		   
	
		
		


		

?>