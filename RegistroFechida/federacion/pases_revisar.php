<?php   /* error_reporting(E_ALL);
ini_set('display_errors', '1');*/

require_once 'lib/autoloader.class.php';
require_once 'lib/init.class.php';
$_page = 'pases_revisar';
$_menu = 'pases';
$_modulo = 'pases';


require_once 'lib/auth.php';

$pases = New Pase();
$documentos = $pases->getDocumento($id);
$pases->getOne($id);
$totalRequisitos = $pases->totalRequisitos();

$totalDocumentosFaltantes = $pases->totalDocumentosFaltantes($id);
$totalDocumentosAgregados = $pases->totalDocumentosAgregados($id);



$estatus = $pases->getEstatusFederacion();


require_once 'vistas/pases_revisar.php';   
 


?>