<?php 
$var_num = count($_GET);
$var_tags = array_keys($_GET);// obtiene los nombres de las varibles
$var_valores = array_values($_GET);// obtiene los valores de las varibles

// crea las variables y les asigna el valor
for($i=0;$i<$var_num;$i++){
//$$var_tags[$i]=$ifilter->process($var_valores[$i]);
$$var_tags[$i]=$var_valores[$i];
$logs_vars .= $var_tags[$i]."=".$ifilter->process($var_valores[$i])."&";
$logs_varsi .= $var_tags[$i]."=".$ifilter->process($var_valores[$i])."&";
//echo $var_tags[$i]."=". $var_valores[$i]."<br>";
}



$var_num2 = count($_POST);
$var_tags2 = array_keys($_POST); // obtiene los nombres de las varibles
$var_valores2 = array_values($_POST);// obtiene los valores de las varibles

// crea las variables y les asigna el valor
for($i=0;$i<$var_num2;$i++){ 
// $$var_tags2[$i]=$ifilter->process($var_valores2[$i]); 
$$var_tags2[$i]=$var_valores2[$i]; 
$logs_vars .= $var_tags2[$i]."=".$ifilter->process($var_valores2[$i])."&";
$logs_varsi .= $var_tags2[$i]."=".$ifilter->process($var_valores2[$i])."&";
//echo $var_tags2[$i]."=". $var_valores2[$i]."<br>";
}


//extract($_POST);
//extract($_GET);

?>
