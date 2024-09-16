<?php    require_once 'lib/autoloader.class.php';
	  require_once 'lib/init.class.php';
          $_page = 'pases';

	  require_once 'lib/auth.php';
          /*
          $roles = array(
                           'nadador' => '0',
                           'entrenador' => '1',
                           'sysadmin' => '0',
                           'tesorero' => '0',
                           'apoderado' => '0',
                           'admin' => '0'
    			);
          $datosN = array(
              'genero' => $genero,
              'fecnac' => $fecnac,
              'grupo' => $grupo,
              'colegio' => $colegio,
              'direccion' => $direccion,
              'telefono' => $telefono,
              'notas' => $notas,
              'externo' => '0',
			        'disciplina' => $disciplina,
              'cargo' => $cargo,
              'tipo' => '1'
          );*/
		  
		 // print_r($datosN);
        $pases = New Pase();
        $pases->agregar($idUser, $idClubOrigen,$authj->rowff['id'],$comentarioClubDestino);
       
        header("Location: pases.php");
 


?>