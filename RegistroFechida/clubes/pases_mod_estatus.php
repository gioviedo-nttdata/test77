<?php   /* error_reporting(E_ALL);
ini_set('display_errors', '1');*/

require_once 'lib/autoloader.class.php';
require_once 'lib/init.class.php';
$_page = 'pases_up';
$_menu = 'pases';
$_modulo = 'pases';


require_once 'lib/auth.php';

$pases = New Pase();
$documentos = $pases->getDocumento($pase);
$pases->getOne($pase);
$totalRequisitos = $pases->totalRequisitos();

$totalDocumentosFaltantes = $pases->totalDocumentosFaltantes($pase);
$totalDocumentosAgregados = $pases->totalDocumentosAgregados($pase);

$pases->cambiarEstatus($pase,$estatus);


$requisitos = $pases->getRequisitos();

header("Location: pases.php");

 


?>