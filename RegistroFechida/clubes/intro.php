<?php  /* error_reporting(E_ALL);
ini_set('display_errors', '1');*/

 require_once 'lib/autoloader.class.php';
	  require_once 'lib/init.class.php';
          $_page = 'intro';

	  require_once 'lib/auth.php';
          
        /*  $comp = New Competencia();
          $comp->getCalendario();
          
          if ($authj->rowff['apoderado'] == 1) {
            $users = New Usuario();
            $users->usuario = $authj->rowff;
            $users->getAll(1,'nadador', 'apoderado'); 
            
            $comp->getConvocadosApo($authj->rowff['id']);
          }*/
		  
		  $esp = New Especialidad();
		$esp->getAll();
    echo '<pre>';
		var_dump($authj);
    echo '</pre>';

        
	  require_once 'vistas/intro.php';   
 


?>