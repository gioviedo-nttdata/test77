<?php 

		/*error_reporting(E_ALL);
		ini_set('display_errors', '1');*/
		
		require_once 'lib/autoloader.class.php';
	  require_once 'lib/init.class.php';

          $_page = 'usuarios';

	  require_once 'lib/auth.php';
          
        
        //$user = New Authorizacion();+
		//echo 'echo'.$club;
        $authj->modificarDatos($authj->rowff['id'], $nombre, $apellido, $apellido2, $rut, $genero, $fecnac, $disciplina, $region, $direccion, $email, $telefono, $nivel);
        
        
        

	  //require_once 'vistas/pruebas.php'; 
          header("Location: misdatos.php?reg1=OK");
 


?>