<?php   /*error_reporting(E_ALL);
ini_set('display_errors', '1');*/

  require_once 'lib/autoloader.class.php';
	require_once 'lib/init.class.php';
        $_page = 'entrenadores';
        $_menu = 'entrenadores';

	require_once 'lib/auth.php';
	
	$esp = New Especialidad();
  $esp->getAll();
        
        $listvarall = "";
        $listvar = "";
        $listvaro = "";
        foreach ($_GET as $key => $value) {
		  	if ($key == 'cliente') {
		  		$haycli = 1;
		  	} 
  			//if ($key != 'filtro' && $key != 'adfil') {
	  			$listvarall .=  $key."=".$value."&";
  			//}

  			if ($key != 'pagi') {
	  			$listvar .=  $key."=".$value."&";
  			}
  			if ($key != 'orden' && $key != 'tiporden' && $key != 'pagi') {
  				$listvaro .=  $key."=".$value."&";
  			}
		}
        
                $opciones = array();
        $users = New Usuario();
        //$users->usuario = $authj->rowff;
        if (!empty($orden)) {
	  	$users->orden = $orden;
	  }
	 
	  if (!empty($tiporden)) {
	  	$users->tiporden = $tiporden;
	  }

	  if (!empty($pagi)) {
	  	 $users->pag = $pagi;
	  }
          
          if (!empty($nombre)) {
              $opciones["nombre"] = $nombre;              
          }
          if (!empty($genero)) {
              $opciones["genero"] = $genero;              
          }
          if (!empty($ano)) {
              $opciones["ano"] = $ano;              
          }
        $users->getAll(1,'entrenador','0','',0, $opciones,$authj->rowff['id']);
		
		


	require_once 'vistas/entrenadores.php';   
 


?>