<?php 

		/*error_reporting(E_ALL);
		ini_set('display_errors', '1');*/
		
		require_once 'lib/autoloader.class.php';
	  require_once 'lib/init.class.php';

          $_page = 'usuarios';

	  require_once 'lib/auth.php';
          
        
        //$user = New Authorizacion();+
		//echo 'echo'.$club;
        $authj->modificarClub($authj->rowff['id'], $rut, $club, $region, $direccion, $email, $presidente, $telefono);
        
        
        

	  //require_once 'vistas/pruebas.php'; 
          header("Location: misdatos.php?reg1=OK");
 


?>