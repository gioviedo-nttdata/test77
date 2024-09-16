<?php   /*error_reporting(E_ALL);
ini_set('display_errors', '1');*/

  require_once 'lib/autoloader.class.php'; //HACE include 
	require_once 'lib/init.class.php';
        $_page = 'pases';
        $_menu = 'pases';

	require_once 'lib/auth.php';
	
        
       $opciones = array();
        $pases = New Pase();
       
        if (!empty($orden)) {
	  	$pases->orden = $orden;
	  }
	 
	  if (!empty($tiporden)) {
	  	$pases->tiporden = $tiporden;
	  }

	  if (!empty($pagi)) {
	  	 $pases->pag = $pagi;
	  }
          
          if (!empty($nombre)) {
              $opciones["nombre"] = $nombre;              
          }
          
        $pases->getAll(1,'',$authj->rowff['id']);
		
		


	require_once 'vistas/pases.php';   
 


?>
