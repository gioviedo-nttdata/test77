<?php  /*  error_reporting(E_ALL);
ini_set('display_errors', '1');*/

require_once 'lib/autoloader.class.php';
	  require_once 'lib/init.class.php';
          $_page = 'usuarios';

	  require_once 'lib/auth.php';
          
          

      $docu = New Documento();
      
      
        $docu->elimDocu( $authj->rowff['id'], $id);
       
         header("Location: ".$_SERVER['HTTP_REFERER']);
 


?>