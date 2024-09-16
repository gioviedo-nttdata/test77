<?php  /*  error_reporting(E_ALL);
ini_set('display_errors', '1');*/

require_once 'lib/autoloader.class.php';
	  require_once 'lib/init.class.php';
          $_page = 'usuarios';

	  require_once 'lib/auth.php';
          
          
      
        $comp = New Usuario();
        $comp->eliminar($id, $authj->rowff['id']);
       
         header("Location: ".$_SERVER['HTTP_REFERER']);
 


?>