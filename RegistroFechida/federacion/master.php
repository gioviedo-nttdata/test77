<?php  /* error_reporting(E_ALL);
ini_set('display_errors', '1');*/

require_once 'lib/autoloader.class.php';
require_once 'lib/init.class.php';
$_page = 'jueces';
$_menu = 'jueces';

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

$esp = New Especialidad();
$esp->getAll();


$regionesA = new Region();
$regiones = $regionesA->getAll();


$opciones = array();
$users = new Master();
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
if (!empty($email)) {
	$opciones["email"] = $email;
}
if (!empty($genero)) {
	$opciones["genero"] = $genero;
}

if (!empty($region)) {
	$opciones["region"] = $region;
}
if (!empty($ano)) {
	$opciones["ano"] = $ano;
}

//echo "club".$authj->rowff['id'];
$users->getAll(1, 'todos', $disciplina, '', 0, $opciones, $club);

$Ndisciplina = Disciplina::getDisciplina($disciplina);
/*
if (!empty($excelV)) {
	$excelErrores = $users->getExcelErrores($excelV);
}
if (!empty($valor and $origen == 'zip')) {
	$zipErrores = $users->getZipErrores($valor, 0, 'nadador', $disciplina, '', 0, $opciones, $authj->rowff['id']);
}
*/

require_once 'vistas/master.php';
