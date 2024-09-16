<?php
include_once('inputfilter.php');
$logs_vars = "";
$logs_varsi = "";

$var_num = count($_GET);
$var_tags = array_keys($_GET);// obtiene los nombres de las varibles
$var_valores = array_values($_GET);// obtiene los valores de las varibles

// crea las variables y les asigna el valor
for($i=0;$i<$var_num;$i++){
	${$var_tags[$i]}=$ifilter->process($var_valores[$i]);
if ($var_tags[$i] == 'password' or $var_tags[$i] == 'pass_act' or $var_tags[$i] == 'pass_new' or $var_tags[$i] == 'pass_new1') {
$logs_vars .= $var_tags[$i]."=xxxxxxx&";
$logs_varsi .= $var_tags[$i]."=".$ifilter->process($var_valores[$i])."&";
} else {
$logs_vars .= $var_tags[$i]."=".$ifilter->process($var_valores[$i])."&";
$logs_varsi .= $var_tags[$i]."=".$ifilter->process($var_valores[$i])."&";
}
}

/***VARIABLES POR POST ***/

$var_num2 = count($_POST);
$var_tags2 = array_keys($_POST); // obtiene los nombres de las varibles
$var_valores2 = array_values($_POST);// obtiene los valores de las varibles

// crea las variables y les asigna el valor
for($i=0;$i<$var_num2;$i++){ 
	${$var_tags2[$i]}=$ifilter->process($var_valores2[$i]);
if ($var_tags2[$i] == 'password' or $var_tags2[$i] == 'pass_act' or $var_tags2[$i] == 'pass_new' or $var_tags2[$i] == 'pass_new1') { 
$logs_vars .= $var_tags2[$i]."=xxxxxxx&";
$logs_varsi .= $var_tags2[$i]."=".$ifilter->process($var_valores2[$i])."&";
} else {
$logs_vars .= $var_tags2[$i]."=".$ifilter->process($var_valores2[$i])."&";
$logs_varsi .= $var_tags2[$i]."=".$ifilter->process($var_valores2[$i])."&";
}
}

function getPuntosRut( $rut ){
	$rutTmp = explode( "-", $rut );
	return number_format( $rutTmp[0], 0, "", ".") . '-' . $rutTmp[1];
}
function eliminar_acentos($url) {

// Tranformamos todo a minusculas

$url = mb_strtolower($url, 'UTF-8');

//Rememplazamos caracteres especiales latinos

$find = array('á', 'é', 'í', 'ó', 'ú', 'à', 'è', 'ì', 'ò', 'ù', 'ï', 'ü');

$repl = array('a', 'e', 'i', 'o', 'u', 'a', 'e', 'i', 'o', 'u', 'i', 'u');

$url = str_replace ($find, $repl, $url);

return $url;
}

function urls_amigables($url) {

// Tranformamos todo a minusculas

$url = mb_strtolower($url, 'UTF-8');

$url = eliminar_acentos($url);

//Rememplazamos caracteres especiales latinos
/*
$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ', 'à', 'è', 'ì', 'ò', 'ù', 'ï', 'ü', 'Ñ');

$repl = array('a', 'e', 'i', 'o', 'u', 'n', 'a', 'e', 'i', 'o', 'u', 'i', 'u', 'n');

$url = str_replace ($find, $repl, $url);
 * */


// Añaadimos los guiones

$find = array(' ', '&', '\r\n', '\n', '+'); 
$url = str_replace ($find, '-', $url);

// Eliminamos y Reemplazamos demás caracteres especiales

$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');

$repl = array('', '-', '');

$url = preg_replace ($find, $repl, $url);

return $url;

}


/**
 * Comprueba si el rut ingresado es valido
 *
 * @param $rut string
 * @return true o false
 */

function valida_rut($rut)
{
    $rut = preg_replace('/[^k0-9]/i', '', $rut);
    $dv  = substr($rut, -1);
    $numero = substr($rut, 0, strlen($rut)-1);
    $i = 2;
    $suma = 0;
    foreach(array_reverse(str_split($numero)) as $v)
    {
        if($i==8)
            $i = 2;

        $suma += $v * $i;
        ++$i;
    }

    $dvr = 11 - ($suma % 11);
    
    if($dvr == 11)
        $dvr = 0;
    if($dvr == 10)
        $dvr = 'K';

    if($dvr == strtoupper($dv))
        return true;
    else
        return false;
}

function validar_fecha_espanol($fecha){
	$fecha = str_replace ("/", "-", $fecha);
	$valores = explode('-', $fecha);
	if(count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])){
		return true;
    }
	return false;
}

function mostrarMes($mes)
    {
       switch($mes)
        {         
         case 1:
            $mes='Enero';
            break;     
         case 2:
            $mes='Febrero';
            break;     
         case 3:
            $mes='Marzo';
            break;
         case 4:
            $mes='Abril';
            break;
         case 5:
            $mes='Mayo';
            break;
         case 6:
            $mes='Junio';
            break;
         case 7:
            $mes='Julio';
            break;
         case 8:
            $mes='Agosto';
            break;
         case 9:
            $mes='Septiembre';
            break;
         case 10:
            $mes='Octubre';
            break;
         case 11:
            $mes='Noviembre';
            break;
         case 12:
            $mes='Diciembre';
            break;
        }
     
     return $mes;
    } 
//echo "Aqui vienen las variables:  ".$logs_vars;
$fechoy = date('Y-m-d H:i:s');
$dayhoy  = date('Y-m-d')
?>
