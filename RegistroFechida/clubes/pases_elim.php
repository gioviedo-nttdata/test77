<?php  /*  error_reporting(E_ALL);
ini_set('display_errors', '1');*/

require_once 'lib/autoloader.class.php';
	  require_once 'lib/init.class.php';
          $_page = 'pases';

	  require_once 'lib/auth.php';
         
          $pases = New Pase();
          $pases->eliminar($id);
       
         header("Location: ".$_SERVER['HTTP_REFERER']);
 


?>