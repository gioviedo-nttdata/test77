<?php  /*error_reporting(E_ALL);
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
$users = new Asociacion();
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

$users->getAll(0, $opciones);


foreach ($users->row as $Elem) {

    $rut = explode("-", $Elem['rut']);

    echo $Elem['asociacion']." - ". $rut."<br>";


    $url = file_get_contents('https://www.proyectosdeportivos.cl/SPP/secORG/DetalleOrganizaciones.aspx?rut_entidad=' . $rut[0]);


    //creamos nuevo DOMDocument y cargamos la url
    $dom = new DOMDocument();
    @$dom->loadHTML($url);

    //obtenemos todos los div de la url
    $divs = $dom->getElementsByTagName('input');

    //recorremos los divs
    foreach ($divs as $div) {
        //si encentramos la clase mc-title nos quedamos con el titulo
        if ($div->getAttribute('id') === 'ctl00_ContentPrincipal_txtproxeleccion') {
            $title = $div->getAttribute('value');
        }
        /*
    //si encentramos la clase mr-rating nos quedamos con la puntuacion
    if( $div->getAttribute( 'class' ) === 'mr-rating' ){
        $rating = $div->nodeValue;
        break;
    }
    */
    }

    $tds = $dom->getElementsByTagName('td');



    $directorio = array();
    unset($directorio);
    $contador = 0;

    //recorremos los divs
    foreach ($tds as $div) {
        //si encentramos la clase mc-title nos quedamos con el titulo

        $directorio[$contador] = $div->nodeValue . "<br>";
        $contador++;
        /*
    if( $div->getAttribute( 'id' ) === 'ctl00_ContentPrincipal_txtproxeleccion' ){
        $title = $div->getAttribute( 'value' );
    }
   
    //si encentramos la clase mr-rating nos quedamos con la puntuacion
    if( $div->getAttribute( 'class' ) === 'mr-rating' ){
        $rating = $div->nodeValue;
        break;
    }
    */
    }

    //pintamos el resultado
    echo 'Fecha prox Elección: '. $title;
    if (!empty($title)) {

        $fecha = explode("-", $title);
        $nuevaFecha = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];
        $users->actualizarFechaElecc($Elem['id'], $nuevaFecha);
    }

    if (!empty($directorio)) {
        $users->borrarDirectorio($Elem['id'], 1);

        foreach ($directorio as $clave => $valor) {

            if (($clave % 2) == 0) {
                //Es un número par
                echo "-".$clave."-".$valor."- es -".$directorio[$clave+1]."-<br>";
                $users->insertarDirectorio($Elem['id'], 1, strip_tags($valor), strip_tags($directorio[$clave + 1]));
            } else {
                //Es un número impar
                //echo 'Es un número impar';
            }

            //echo $clave." - ".$valor."<br>";
        }
    }
}	


	//require_once 'vistas/asociaciones.php';   
