<?php  /* error_reporting(E_ALL);
ini_set('display_errors', '1');*/

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
$users->getOneLicencias($id);

$Ndisciplina = Disciplina::getDisciplina($disciplina);
/*
if (!empty($excelV)) {
	$excelErrores = $users->getExcelErrores($excelV);
}
if (!empty($valor and $origen == 'zip')) {
	$zipErrores = $users->getZipErrores($valor, 0, 'nadador', $disciplina, '', 0, $opciones, $authj->rowff['id']);
}
*/

require_once 'vistas/licencias_pago_atletas.php';
