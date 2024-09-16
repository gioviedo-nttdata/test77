<?php    require_once 'lib/autoloader.class.php';
	  require_once 'lib/init.class.php';
          $_page = 'usuarios';

	  require_once 'lib/auth.php';
          
          $roles = array(
                           'nadador' => '1',
                           'entrenador' => '0',
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
			  'disciplina' => $disciplina
          );
		  
		 // echo "club ".$authj->rowff['id'];
        $user = New Usuario();
        $user->agregar($authj->rowff['id'],$rut, $nombre, $ape1, $ape2, $email, $roles, $datosN);
        /*
        for ($i = 1; $i <= $cant_pro; $i++) {
            $rut_var = "rut_nadador_".$i;
            $user->agregarApoderado($user->id, $rut_var);	   	 	
        }*/

      //require_once 'vistas/pruebas.php'; 
      if (!empty($idT)) {
        //header("Location: nadadores_zip.php?disciplina=".$disciplina."&valor=".$valor."&origen=zip");
        $user->eliminarTemp($authj->rowff['id'],$idT);
 
      }

      if (!empty($valor)) {
        header("Location: nadadores_zip.php?disciplina=".$disciplina."&valor=".$valor."&origen=zip");
 
      } else {
        header("Location: nadadores.php?disciplina=".$disciplina);
 
      }
          


?>