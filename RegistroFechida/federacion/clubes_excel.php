<?php  /* error_reporting(E_ALL);
ini_set('display_errors', '1');*/

require_once 'Spreadsheet/Excel/Writer.php';
require_once 'lib/autoloader.class.php';
require_once 'lib/init.class.php';
$_page = 'nadadores';
$_menu = 'nadadores';

require_once 'lib/auth.php';


$periodo = Licencia::getOneActivo();

$workbook = new Spreadsheet_Excel_Writer();

$format_column = & $workbook->addformat(array('Bold'=>1));
$format_column->setBorder(2);


$format_column1 = & $workbook->addformat();
$format_column1->setBorder(1);

// sending HTTP headers
$workbook->send('clubes.xls');
$workbook->setVersion(8);

//$worksheet->setInputEncoding('UTF8');

// Creating a worksheet
$worksheet =& $workbook->addWorksheet(utf8_decode('Usuarios'));



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
$users = New Club();

$asoc = New Asociacion();
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

/*
if (!empty($excelV)) {
	$excelErrores = $users->getExcelErrores($excelV);
}
if (!empty($valor and $origen == 'zip')) {
	$zipErrores = $users->getZipErrores($valor, 0, 'nadador', $disciplina, '', 0, $opciones, $authj->rowff['id']);
}
*/

//require_once 'vistas/licencias.php';

        $worksheet->write(0, 0, 'Rut',$format_column);
        $worksheet->write(0, 1, 'Club',$format_column);
        $worksheet->write(0, 2, 'Telefono',$format_column);
        $worksheet->write(0, 3, 'Email',$format_column);
        $worksheet->write(0, 4, 'Vencimiento',$format_column);
        $worksheet->write(0, 5, 'Asociacion',$format_column);
		$worksheet->write(0, 6, 'Region',$format_column);

        $fila = 1;

foreach ($users->row as $Elem) { 
    $fecvenc = "";

    if (empty($Elem['prox_eleccion'])) {
        $fecvenc = "No verificable";

    } else {        
        
        $fecvenc = Funciones::fechaMostrar($Elem['prox_eleccion'],  0);
        
    }
    $asociacion = array();
    unset($asociación);
    $asociacion = $asoc->getOne($Elem['asociacion']);
			
            $worksheet->write($fila, 0, utf8_decode(getPuntosRut($Elem['rut'])),$format_column1);
            $worksheet->write($fila, 1, utf8_decode($Elem['club']),$format_column1);
            $worksheet->write($fila, 2, utf8_decode($Elem['telefono']),$format_column1);
            $worksheet->write($fila, 3, utf8_decode($Elem['email']),$format_column1);
            $worksheet->write($fila, 4, utf8_decode($fecvenc),$format_column1);
            $worksheet->write($fila, 5, utf8_decode(Region::getRegion($Elem['regionN'])),$format_column1);
			$worksheet->write($fila, 5, utf8_decode($asociacion[0]['asociacion']),$format_column1);;

            $fila++;


}

$workbook->close();
