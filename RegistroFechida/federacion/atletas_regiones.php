<?php   /*error_reporting(E_ALL);
ini_set('display_errors', '1');*/

require_once 'lib/autoloader.class.php';
require_once 'lib/init.class.php';
$_page = 'asociaciones';
$_menu = 'asociaciones';

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
$users = new Region();
//$users->usuario = $authj->rowff;

$esp = New Especialidad();
$esp->getAll();


$regiones = $users->getAll();




require_once 'vistas/atletas_regiones.php';
