<?php  /* error_reporting(E_ALL);
ini_set('display_errors', '1');*/

    require_once 'Spreadsheet/Excel/Writer.php';
    require_once 'lib/autoloader.class.php';
	require_once 'lib/init.class.php';
        $_page = 'clubes';
        $_menu = 'clubes';

	require_once 'lib/auth.php';


$workbook = new Spreadsheet_Excel_Writer();

// sending HTTP headers
$workbook->send('clubes.xls');
$workbook->setVersion(8);

//$worksheet->setInputEncoding('UTF8');

// Creating a worksheet
$worksheet =& $workbook->addWorksheet(utf8_decode('Usuarios'));


// The actual data

	

        
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


        $disc = New Disciplina();
        $disc->getAll();
        
        $opciones = array();
        $users = New Club();
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
          
          if (!empty($region)) {
              $opciones["region"] = $region;              
          }
          if (!empty($asociacion)) {
              $opciones["asociacion"] = $asociacion;              
          }

          if (!empty($club)) {
            $opciones["club"] = $club;              
        }
          
        $users->getAll(0, $opciones);

        $worksheet->write(0, 0, 'Club');
        $worksheet->write(0, 1, 'Region');
        $worksheet->write(0, 2, 'Comuna');
        $worksheet->write(0, 3, 'RUT');
        $worksheet->write(0, 4, 'Telefono');
        $worksheet->write(0, 5, 'Email');
        $worksheet->write(0, 6, 'Presidente');
        $col = 7;
         foreach ($disc->row as $Dis) {               
              $worksheet->write(0, $col, utf8_decode($Dis['especialidad']));
              $col++;
          } 
          


          $fila = 1;
          foreach ($users->row as $Elem) { 
            $worksheet->write($fila, 0, utf8_decode($Elem['club']));
            $worksheet->write($fila, 1, utf8_decode($Elem['regionN']));
            $worksheet->write($fila, 2, utf8_decode($Elem['comunaN']));
            $worksheet->write($fila, 3, getPuntosRut($Elem['rut']));
            $worksheet->write($fila, 4, $Elem['telefono']);
            $worksheet->write($fila, 5, $Elem['email']);
            $worksheet->write($fila, 6, utf8_decode($Elem['presidente']));
            
            


            $col = 7;
            foreach ($disc->row as $Dis) {               
                $worksheet->write($fila, $col, Usuario::contarAtletasClubDisc($Elem['id'],'nadador',$Dis['id']));
                $col++;
            }

            $fila++;
          }
          
          //	require_once 'vistas/clubes_down.php';   
 
          $workbook->close();

?>