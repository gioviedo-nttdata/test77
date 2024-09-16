<?php

class Funciones
{

    public function __construct()
    {
       // echo "<p>Class X</p>";
		//$this->db = new EasyPDO('mysql:dbname='.DB_NAME.';host='.DB_HOST.';charset=UTF8', DB_USER, DB_PASSWORD);
    }
	static function convertiraMS($tiempo)
    {
        $porcion1 = explode(":", $tiempo);
        $minutos = $porcion1[0];
        $porcion2 = explode(".", $porcion1[1]);
        $segundos = $porcion2[0];
        $milisegundos = ($porcion2[1]*10);
        
        $tiempoMS = ($minutos*60*1000)+($segundos*1000)+$milisegundos;
        return $tiempoMS;
        
    }
    
    static function convertiraSEG($tiempo)
    {
        
        $segundos=$tiempo/1000;
	//verificamos residuo para ver si llevará decimales
	$Ms=(($tiempo%1000)/10);
        //$segundos = $segundos - $Ms;
        
	$segundos1=floor($segundos);
        //$segundos1
        
        if ($segundos1 >= 60) {
            $minutos1=$segundos1/60;
            //verificamos residuo para ver si llevará decimales
            $Seg=$segundos1%60;
            $minutos=floor($minutos1);
            
        } else {
            $Seg = $segundos1;
            $minutos="00";            
        }
        
        
        $tiempoSG = str_pad($minutos, 2, "0", STR_PAD_LEFT).":".str_pad($Seg, 2, "0", STR_PAD_LEFT).".".str_pad($Ms, 2, "0", STR_PAD_LEFT);
        
        
        return $tiempoSG;
       // return $segundos." ".$Ms
        
    }
    
    static function convertiraSEGRed($tiempo, $tipo)
    {
        
        $segundos=$tiempo/1000;
	//verificamos residuo para ver si llevará decimales
	$Ms=(($tiempo%1000)/10);
        //$segundos = $segundos - $Ms;
        
	$segundos1=floor($segundos);
        //$segundos1
        
        if ($segundos1 >= 60) {
            $minutos1=$segundos1/60;
            //verificamos residuo para ver si llevará decimales
            $Seg=$segundos1%60;
            $minutos=floor($minutos1);
            
        } else {
            $Seg = $segundos1;
            $minutos="00";            
        }
        
        if ($tipo == 'max') {
            if ($Ms > 0 ) {
                $Ms = 0;
                if ($Seg == 59) {
                    $Seg = 0;
                    $minutos = $minutos+1;
                } else {
                    $Seg = $Seg + 1;
                 }
                $Seg = $Seg+1;
            }
        }
        
        if ($tipo == 'min') {
            if ($Ms > 0 ) {
                $Ms = 0;
                if ($Seg == 0) {
                    $Seg = 59;
                    $minutos = $minutos-1;
                } else {
                    $Seg = $Seg - 1;
                 }
                $Seg = $Seg-1;
            }
        }
        
        
        
        $tiempoSG = str_pad($minutos, 2, "0", STR_PAD_LEFT).":".str_pad($Seg, 2, "0", STR_PAD_LEFT).".".str_pad($Ms, 2, "0", STR_PAD_LEFT);
        
        
        return $tiempoSG;
       // return $segundos." ".$Ms
        
    }
    
    
    static function diasSemana($dia)
    {
        switch ($dia) {
    case 0:
        return "Domingo";
        break;
    case 1:
        echo "Lunes";
        break;
    case 2:
        echo "Martes";
        break;
    case 3:
        echo "Miércoles";
        break;
    case 4:
        echo "Jueves";
        break;
    case 5:
        echo "Viernes";
        break;
    case 6:
        echo "Sábado";
        break;
    }
        
    }
    static function fechaMostrar($fecha, $hora = 0)
    {
       $fecha1 = strtotime ($fecha) ;
       if ($hora == 1) {
           return date('d-m-Y h:i:s', $fecha1);
       } else {
           return date('d-m-Y', $fecha1);
       }
       
    }

    static function extractText($text, $between, $removeSpaces=false){
        $text = preg_replace('/\s+/', ' ', $text); //Se eliminan tabulaciones y espacios de más.
        if($removeSpaces) $text = str_replace(' ', '', $text);
        $pattern = '/' . preg_quote($between[0], '/') . '(.*?)' . preg_quote($between[1], '/') . '/s';
        preg_match($pattern, $text, $coincidence);
        $extractText = $coincidence[1] ?? null;
        return trim($extractText);
    }

    static function numMonthByname($name){
        $months = [
            "enero" => "01",
            "febrero" => "02",
            "marzo" => "03",
            "abril" => "04",
            "mayo" => "05",
            "junio" => "06",
            "julio" => "07",
            "agosto" => "08",
            "septiembre" => "09",
            "octubre" => "10",
            "noviembre" => "11",
            "diciembre" => "12"
        ];
    
        $name = str_replace(array("á","é","í","ó","ú","Á","É","Í","Ó","Ú"), array("a","e","i","o","u","a","e","i","o","u"), $name);
        $name = strtolower(trim($name));
        return $months[$name] ?? "";
    }

    static function cleanStr($str, $removeSpaces=false){
        $no_permitidas = array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
        $permitidas = array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
        $str = str_replace($no_permitidas, $permitidas, $str);
        $str = preg_replace('/\s+/', ' ', $str);
        $str = strtolower($str);
        if($removeSpaces) $str = str_replace(' ', '', $str);
        return $str;
    }
}