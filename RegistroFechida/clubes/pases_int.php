<?php   /* error_reporting(E_ALL);
ini_set('display_errors', '1');*/

require_once 'lib/autoloader.class.php';
require_once 'lib/init.class.php';
$_page = 'pases_up';
$_menu = 'pases';

require_once 'lib/auth.php';
	
	
$pases = New Pase();

$documentos = $pases->getDocumento($id);
$pases->getOne($id);
$totalRequisitos = $pases->totalRequisitos();
$totalDocumentosFaltantes = $pases->totalDocumentosFaltantes($id);
$totalDocumentosAgregados = $pases->totalDocumentosAgregados($id);
/*
if($totalDocumentosFaltantes=='0'){
	$pases->cambiarEstatus($id);
}*/


require_once 'vistas/pases_int.php';   



?>