<?php    require_once 'lib/autoloader.class.php';
	  require_once 'lib/init.class.php';
          $_page = 'usuarios';

	    require_once 'lib/auth.php';
          
        $users = new Usuario();

        $users->licenciaAprobarPago($id);

        header("Location: licencias_pagos.php");
 


?>