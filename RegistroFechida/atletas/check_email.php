<?php  //ini_set('display_errors', '1');
require_once 'lib/autoloader.class.php';
	  require_once 'lib/init.class.php';

	 // require_once 'lib/auth.php';

?>
<?php      
//$rut = str_replace(".", "", $rut);
				 $db_pais = Db::getInstance();
				$sql_pais = "SELECT * FROM com_master WHERE email = :email LIMIT 1";
    			$bind_pais = array(
        		':email' => $email
    			);
				$cant_paises = $db_pais->run($sql_pais, $bind_pais);
				  if ($cant_paises > 0) {
					  echo "false";
				  } else {
					  echo "true";
				  }
				  
?>