<?php require_once 'lib/autoloader.class.php';
	require_once 'lib/init.class.php';

	$authj = new Authorizacion();
	$authj1 = $authj->logIn($email, $password);     
 


?>