<?php    require_once 'lib/autoloader.class.php';
	  require_once 'lib/init.class.php';
          $_page = 'usuarios';

	  require_once 'lib/auth.php';
          
          /*$nad = New Usuario();
          $nad->getOne();*/
          $users = new Master();
          //$datosN = array();
          $users->aprobar($id,'2');

          header("Location: ".$_SERVER['HTTP_REFERER']);
 


?>