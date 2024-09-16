<?php  /* error_reporting(E_ALL);
ini_set('display_errors', '1');*/

require_once 'Spreadsheet/Excel/Writer.php';
require_once 'lib/autoloader.class.php';
require_once 'lib/init.class.php';
$_page = 'nadadores';
$_menu = 'nadadores';

require_once 'lib/auth.php';

$workbook = new Spreadsheet_Excel_Writer();

$format_column = & $workbook->addformat(array('Bold'=>1));
$format_column->setBorder(2);


$format_column1 = & $workbook->addformat();
$format_column1->setBorder(1);

// sending HTTP headers
$workbook->send('licencia.xls');
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
	$listvarall .=  $key . "=" . $value . "&";
	//}

	if ($key != 'pagi') {
		$listvar .=  $key . "=" . $value . "&";
	}
	if ($key != 'orden' && $key != 'tiporden' && $key != 'pagi') {
		$listvaro .=  $key . "=" . $value . "&";
	}
}

$opciones = array();
$users = new Usuario();

$esp = New Especialidad();
$esp->getAll();

$regionesA = new Region();
$regiones = $regionesA->getAll();

$clubesA = new Club();
$clubesA->getAll(0, "");
$clubes =  $clubesA->row;

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
$elclub = "";

if (!empty($club)) {
	$club = $club;
	$classClub = New Club();
	$elclub = $classClub->getOne($club);
}
if (!empty($nombre)) {
	$opciones["nombre"] = $nombre;
}
if (!empty($genero)) {
	$opciones["genero"] = $genero;
}
if (!empty($disciplina)) {
	$opciones["disciplina"] = $disciplina;
}
if (!empty($region)) {
	$opciones["region"] = $region;
}

if (!empty($ano)) {
	$opciones["ano"] = $ano;
}

$periodo = '2021';

//echo "club".$authj->rowff['id'];
$users->getAllLicencias(0, 'nadador', $disciplina, '', 0, $opciones, $club, $periodo);

$Ndisciplina = Disciplina::getDisciplina($disciplina);
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
        $worksheet->write(0, 1, 'Apellido P',$format_column);
        $worksheet->write(0, 2, 'Apellido M',$format_column);
        $worksheet->write(0, 3, 'Nombre',$format_column);
        $worksheet->write(0, 4, 'Club',$format_column);
        $worksheet->write(0, 5, 'Disciplina',$format_column);
        $worksheet->write(0, 6, 'Region',$format_column);
        $worksheet->write(0, 7, 'Fecha de Nac',$format_column);
        $worksheet->write(0, 8, 'Fecha pago',$format_column);

        $fila = 1;

foreach ($users->row as $Elem) {

            $worksheet->write($fila, 0, utf8_decode(getPuntosRut($Elem['rut'])),$format_column1);
            $worksheet->write($fila, 1, utf8_decode($Elem['apellido']),$format_column1);
            $worksheet->write($fila, 2, utf8_decode($Elem['apellido2']),$format_column1);
            $worksheet->write($fila, 3, utf8_decode($Elem['nombre']),$format_column1);
            $worksheet->write($fila, 4, utf8_decode($Elem['clubN']),$format_column1);
            $worksheet->write($fila, 5, utf8_decode(Disciplina::getDisciplina($Elem['disciplina'])),$format_column1);
            $worksheet->write($fila, 6, utf8_decode(Region::getRegion($Elem['regionN'])),$format_column1);
            $worksheet->write($fila, 7, $Elem['fecnac'],$format_column1);
            $worksheet->write($fila, 8, $Elem['fecin'],$format_column1);

            $fila++;


}

$workbook->close();
