<?php  ini_set('display_errors', '1');
/*
$url=fopen("https://www.proyectosdeportivos.cl/SPP/secORG/DetalleOrganizaciones.aspx?rut_entidad=65015349", "r");
if ($url) {
    $texto ="";
    while (!feof($url)){
        $texto .=fgets($url,512);
    }
//echo $texto;

$lineas = explode("\n", $texto); //Separamos por líneas el texto leído
	for ($y=0; $y &lt; count($lineas); $y++){//Procesamos cada línea
		//Realizar aquí algún trabajo
	}*/
   
//if ( preg_match('|<td align="right" class="texto2">UF : </td>\s+<td class="texto2"><b>(.*?)</b></td>|is' , $data , $cap ) )
$data = file_get_contents("https://www.proyectosdeportivos.cl/SPP/secORG/DetalleOrganizaciones.aspx?rut_entidad=65015349");

//echo $data;

    if ( preg_match('|<td align="left" style="width:50px;">(.*?) </td>|is' , $data , $cap ) )
        {
            echo "UF ".$cap[1];
        }

        echo "<br><br><br>Aqui el print";

        print_r($cap);
//}

?>