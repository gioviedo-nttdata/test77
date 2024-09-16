<?php
$url = file_get_contents('https://www.proyectosdeportivos.cl/SPP/secORG/DetalleOrganizaciones.aspx?rut_entidad=65015349');
 
 
//creamos nuevo DOMDocument y cargamos la url
$dom = new DOMDocument();
@$dom->loadHTML($url);
 
//obtenemos todos los div de la url
$divs = $dom->getElementsByTagName( 'input' );
 
//recorremos los divs
foreach( $divs as $div ){
    //si encentramos la clase mc-title nos quedamos con el titulo
    if( $div->getAttribute( 'id' ) === 'ctl00_ContentPrincipal_txtproxeleccion' ){
        $title = $div->getAttribute( 'value' );
    }
    /*
    //si encentramos la clase mr-rating nos quedamos con la puntuacion
    if( $div->getAttribute( 'class' ) === 'mr-rating' ){
        $rating = $div->nodeValue;
        break;
    }
    */
  }

  $tds = $dom->getElementsByTagName( 'td' );

  $directorio = array();
 
//recorremos los divs
foreach( $tds as $div ){
    //si encentramos la clase mc-title nos quedamos con el titulo

    $directorio[] = $div->nodeValue."<br>";
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

  foreach( $directorio as $clave => $valor ){

    if (($clave % 2) == 0) {
        //Es un número par
        echo "-".$valor."- es -".$directorio[$valor+1]."-<br>";
    } else {
        //Es un número impar
        //echo 'Es un número impar';
    }

    //echo $clave." - ".$valor."<br>";
  }

  
 ?>