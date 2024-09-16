<?php


include_once("inputfilter.php");

$baseURL = "/";
$baseURLcontrol = "/control_admin/";

$ptitulo = "Curso CEN";

$mailhost = "in-v3.mailjet.com";

$maillogin = "b4b57a359b219b911f827ce0694bd149";

$mailpass = "570c7f87a8de34c0b0e2a0db16361918";

$mailemail = "comunicacion@mailingapp.es";

$mailport = 587;

$mailsecure = "tls";


function Conectarse(){

 $db_host="localhost";


 $db_nombre="pulpro_mentalite";

 $db_user="pulpro_mentalite";

 $db_pass=",J6GRBwBxI-n";

 $link=mysql_connect($db_host, $db_user, $db_pass) or die ("Error conectando a la base de datos.");

 mysql_select_db($db_nombre ,$link) or die ("Error conectando a la base de datos.");

 return $link;

}

$link = Conectarse();
mysql_query ("SET NAMES 'utf8'");

   $hashLenght = 9;
    // Array con los elementos que se emplean para crear un HASH ALEATORIO
    $tokensArray = array("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
    // Función para generar una cadena pseudo-aleatoria con semilla de tiempo
    function createhash($tokens,$length){
       $hashcode = "";
        for($c = 0; $c < $length; $c++){
           srand((double)microtime() * 100000000000);
           $pass = $tokens[rand(0,count($tokens) - 1)];
           $hashcode = $hashcode.$pass;
        }
       return $hashcode;
    }

function urls_amigables($url) {

// Tranformamos todo a minusculas

$url = mb_strtolower($url, 'UTF-8');

//Rememplazamos caracteres especiales latinos

$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ', 'à', 'è', 'ì', 'ò', 'ù', 'ï', 'ü', 'Ñ');

$repl = array('a', 'e', 'i', 'o', 'u', 'n', 'a', 'e', 'i', 'o', 'u', 'i', 'u', 'n');

$url = str_replace ($find, $repl, $url);

// Añaadimos los guiones

$find = array(' ', '&', '\r\n', '\n', '+');
$url = str_replace ($find, '-', $url);

// Eliminamos y Reemplazamos demás caracteres especiales

$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');

$repl = array('', '-', '');

$url = preg_replace ($find, $repl, $url);

return $url;

}

function acentos_html($texto) {

$find = array('&aacute;', '&eacute;', '&iacute;', '&oacute;', '&uacute;', '&ntilde;', '&agrave;', '&egrave;', '&igrave;', '&ograve;', '&ugrave;', '&iuml;', '&uuml;', '&Aacute;', '&Eacute;', '&Iacute;', '&Oacute;', '&Uacute;', '&Ntilde;', '&Agrave;', '&Egrave;', '&Igrave;', '&Ograve;', '&Ugrave;', '&Iuml;', '&Uuml;', '&ccedil;', '&Ccedil;', '&iquest;', '&nbsp;', '&bull;', '&lt;', '&gt;');

$repl = array('á', 'é', 'í', 'ó', 'ú', 'ñ', 'à', 'è', 'ì', 'ò', 'ù', 'ï', 'ü', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ', 'À', 'È', 'Ì', 'Ò', 'Ù', 'Ï', 'Ü', 'ç', 'Ç', '¿', ' ', '-', '<', '>');

$url = str_replace ($find, $repl, $texto);

// Añaadimos los guiones



return $url;

}



if (!empty($_GET['idiom'])) {
	$idi = $_GET['idiom'];
	setcookie("idiom", $idi);
	}
else {
	if (!empty($_COOKIE['idiom'])) {
	    $idi = $_COOKIE['idiom'];
	}
	else {
		$idi = 'esp';
		}

	}
//echo "El idioma: ".$idi;

/* $resulttra = mysql_query("SELECT * FROM com_traducciones",$link) or die("el error es en linea 25 porque: ".mysql_error());
 while ($rowtra = mysql_fetch_array($resulttra)) {
 $nombvar = $rowtra['variable'];
 $$nombvar = $rowtra[$idi];

 }

*/
function fmenu($tipo,$url) {
    if ($tipo == 'grupo') {
		 return "galeria";
		 }
	else if ($tipo == 'galtexto') {
		return "noticias";
		}
	else if ($tipo == 'n') {
		return "noticia_det";
		}
	else if ($tipo == 'galvid') {
		return "videos";
		}
	else if ($tipo == 'texto') {
		 return "contenido";
		}
	else if ($tipo == 'enlace') {
		 return $url;
		}
	else if ($tipo == 'empresa') {
		 return 'empresas';
		}
	else if ($tipo == 'descarga') {
		 return 'descargas';
		}
}


function tamano_archivo($peso , $decimales = 2 ) {
$clase = array(" Bytes", " KB", " MB", " GB", " TB");
return round($peso/pow(1024,($i = floor(log($peso, 1024)))),$decimales ).$clase[$i];
}

function mostrarExtension ($tipo) {
	 if ($tipo == 'jpg' or $tipo == 'png' or $tipo == 'gif') {
		 return "jpg.png";
		 }
	else if ($tipo == 'xls' or $tipo == 'xlsx') {
		return "xls.png";
		}
	else if ($tipo == 'doc' or $tipo == 'docx') {
		return "doc.png";
		}
	else if ($tipo == 'pdf') {
		return "pdf_icon.png";
		}
	else if ($tipo == 'zip' or $tipo == 'rar' ) {
		return "zip.png";
		}
	else if ($tipo == 'ppt' or $tipo == 'pptx' ) {
		return "ppt.png";
		}
	else {
		return "logo_descarga.png";
		}

	}


function verIdioma ($tipo) {
	 if ($tipo == 'cat') {
		 return "Catal&agrave;";
		 }
	else if ($tipo == 'esp') {
		return "Castellano";
		}

	}

function remplazophp($contenido) {
   $string = str_replace("**-**","&",$contenido);
   return $string;

}


function ftitulos($str) {
//$str = "esta es mi cadena que puede tener una longitud variable";
$slices = explode(' ',$str);
$primera = $slices[0].'<br>';
//$ultima = '<etiqueta2>'.$slices[count($slices)-1].'</etiqueta2>';
$slices[0] = $primera;
//$slices[count($slices)-1] = $ultima;
return implode(' ',$slices);
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

function getRealIP()
{

   if( $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
   {
      $client_ip =
         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
            $_SERVER['REMOTE_ADDR']
            :
            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
               $_ENV['REMOTE_ADDR']
               :
               "unknown" );

      // los proxys van añadiendo al final de esta cabecera
      // las direcciones ip que van "ocultando". Para localizar la ip real
      // del usuario se comienza a mirar por el principio hasta encontrar
      // una dirección ip que no sea del rango privado. En caso de no
      // encontrarse ninguna se toma como valor el REMOTE_ADDR

      $entries = preg_split('/[, ]/', $_SERVER['HTTP_X_FORWARDED_FOR']);

      reset($entries);
      while (list(, $entry) = each($entries))
      {
         $entry = trim($entry);
         if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
         {
            // http://www.faqs.org/rfcs/rfc1918.html
            $private_ip = array(
                  '/^0\./',
                  '/^127\.0\.0\.1/',
                  '/^192\.168\..*/',
                  '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
                  '/^10\..*/');

            $found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);

            if ($client_ip != $found_ip)
            {
               $client_ip = $found_ip;
               break;
            }
         }
      }
   }
   else
   {
      $client_ip =
         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
            $_SERVER['REMOTE_ADDR']
            :
            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
               $_ENV['REMOTE_ADDR']
               :
               "unknown" );
   }

   return $client_ip;

}

function cortar_string ($string, $largo) {
   $marca = "<!--corte-->";

   if (strlen($string) > $largo) {

       $string = wordwrap($string, $largo, $marca);
       $string = explode($marca, $string);
       $string = $string[0];
	   return $string." ...";
   } else {
   return $string;
   }

}

function fMayuscula($cadena) {

 return mb_strtoupper($cadena, 'UTF-8');
}


function getLocation($ip) {


$ip_address=$ip;

/*Get user ip address details with geoplugin.net*/
$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip_address;
$addrDetailsArr = unserialize(file_get_contents($geopluginURL));

/*Get City name by return array*/
$city = $addrDetailsArr['geoplugin_city'];

/*Get Country name by return array*/
$country = $addrDetailsArr['geoplugin_countryName'];

/*Comment out these line to see all the posible details*/
/*echo '<pre>';
print_r($addrDetailsArr);
die();*/

if(!$city){
   $city='Not Define';
}if(!$country){
   $country='Not Define';
}

$locat['ip'] = $ip_address;
$locat['city'] = $city;
$locat['country'] = $country;

return $locat;
}

function detect()
{
	$browser=array("IE","OPERA","MOZILLA","NETSCAPE","FIREFOX","SAFARI","CHROME");
	$os=array("WIN","MAC","LINUX");

	# definimos unos valores por defecto para el navegador y el sistema operativo
	$info['browser'] = "OTHER";
	$info['os'] = "OTHER";

	# buscamos el navegador con su sistema operativo
	foreach($browser as $parent)
	{
		$s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);
		$f = $s + strlen($parent);
		$version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);
		$version = preg_replace('/[^0-9,.]/','',$version);
		if ($s)
		{
			$info['browser'] = $parent;
			$info['version'] = $version;
		}
	}

	# obtenemos el sistema operativo
	foreach($os as $val)
	{
		if (strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),$val)!==false)
			$info['os'] = $val;
	}

	# devolvemos el array de valores
	return $info;
}


function obtenerNavegadorWeb()
{
$agente = $_SERVER['HTTP_USER_AGENT'];
$version= "";

//Obtenemos la Plataforma
if (preg_match('/linux/i', $agente)) {
$platforma = 'android';
}
elseif (preg_match('/linux/i', $agente)) {
$platforma = 'linux';
}
elseif (preg_match('/macintosh|mac os x/i', $agente)) {
$platforma = 'mac';
}
elseif (preg_match('/windows|win32/i', $agente)) {
$platforma = 'windows';
}

//Obtener el UserAgente
if(preg_match('/MSIE/i',$agente) && !preg_match('/Opera/i',$agente))
{
$navegador = 'IE';
$navegador_corto = "MSIE";
}
elseif(preg_match('/Trident/i',$agente))
{
$navegador = 'IE';
$navegador_corto = "MSIE";
}

elseif(preg_match('/Firefox/i',$agente))
{
$navegador = 'Mozilla Firefox';
$navegador_corto = "Firefox";
}
elseif(preg_match('/Chrome/i',$agente))
{
$navegador = 'Google Chrome';
$navegador_corto = "Chrome";
}
elseif(preg_match('/Safari/i',$agente))
{
$navegador = 'Apple Safari';
$navegador_corto = "Safari";
}
elseif(preg_match('/Opera/i',$agente))
{
$navegador = 'Opera';
$navegador_corto = "Opera";
}
elseif(preg_match('/Netscape/i',$agente))
{
$navegador = 'Netscape';
$navegador_corto = "Netscape";
}

// Obtenemos la Version
$known = array('Version', $navegador_corto, 'other');
$pattern = '#(?' . join('|', $known) .
')[/ ]+(?[0-9.|a-zA-Z.]*)#';
if (!preg_match_all($pattern, $agente, $matches)) {
//No se obtiene la version simplemente continua
}

$i = count($matches['browser']);
if ($i != 1) {
if (strripos($agente,"Version") < strripos($agente,$navegador_corto)){ $version= $matches['version'][0]; } else { $version= $matches['version'][1]; } } else { $version= $matches['version'][0]; } /*Verificamos si tenemos Version*/ if ($version==null || $version=="") {$version="?";} /*Resultado final del Navegador Web que Utilizamos*/

    return array(
'agente' => $agente,
'nombre'      => $navegador,
'version'   => $version,
'platforma'  => $platforma
);

}
 function datoApi($dato) {
	 return($dato);
 }

if (empty($_COOKIE['cooka1'])) {
	if (empty($_COOKIE['cooka0'])) {
	$aviso = "Ok";
    setcookie("cooka0", $aviso);
  } else {
	$aviso = "Ok";
    setcookie("cooka1", $aviso);
	}
  } else {
    $aviso = "";
  }

$fechoy = date('Y-m-d H:i:s');
$diahoy = date('Y-m-d');
$con_ppal = "5";
$zon_ppal = "5";


?>
