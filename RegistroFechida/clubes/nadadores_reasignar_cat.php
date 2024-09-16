<?php    error_reporting(E_ALL);
ini_set('display_errors', '1');

        require_once 'lib/autoloader.class.php';
	require_once 'lib/init.class.php';
        $_page = 'nadadores';
        $_menu = 'nadadores';

	require_once 'lib/auth.php';
        
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
          
	  //$users->getAll(1,'nadador',$disciplina,'',0, $opciones,$authj->rowff['id']);	
	  $users->getAll(0, 'nadador',$disciplina,'',0, $opciones,0);
        //$users->getAll(0,'nadador');
        $contador = 1;
        foreach ($users->row as $Elem) {
            echo $contador ." - ".$Elem['id']."<br>";
		    $users->asignarCategoria($Elem['id']);
		   $contador++;   
        }
        
       // $users->asignarCategoria(109); 


	//require_once 'vistas/nadadores.php';   
 


?>