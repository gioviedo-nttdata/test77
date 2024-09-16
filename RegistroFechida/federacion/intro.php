<?php  /* error_reporting(E_ALL);
ini_set('display_errors', '1');*/

 require_once 'lib/autoloader.class.php';
	  require_once 'lib/init.class.php';
          $_page = 'intro';

	  require_once 'lib/auth.php';
    echo '<pre>';
		var_dump($authj);
    echo '</pre>';
        /*  $comp = New Competencia();
          $comp->getCalendario();
          
          if ($authj->rowff['apoderado'] == 1) {
            $users = New Usuario();
            $users->usuario = $authj->rowff;
            $users->getAll(1,'nadador', 'apoderado'); 
            
            $comp->getConvocadosApo($authj->rowff['id']);
          }*/
		  
		
		$jueces = new Juez();
		if ($authj->rowff['nivel']<=2) {
			$disciplina = $authj->rowff['disciplina'];
			
		}

//echo "club".$authj->rowff['id'];
$jueces->getAll(1, 'todos', $disciplina, '', 0, $opciones, $club);
$totjueces = count($jueces->row) ;


        
	  require_once 'vistas/intro.php';   
 


?>