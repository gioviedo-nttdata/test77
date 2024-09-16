<?php
/*
error_reporting(E_ALL);
ini_set('display_errors', '1');*/

include('lib/class/phpqrcode/qrlib.php');

require 'vendor/autoload.php';
require_once 'lib/autoloader.class.php';
require_once 'lib/init.class.php';
//require_once 'lib/auth.php';

use Dompdf\Dompdf;

use Dompdf\Options;




$htmlContent = "<html><body><h1>Hello, HTML to Image using Imagick!</h1></body></html>";
$outputPath = "output.png";

// Crear un objeto Imagick
$image = new \Imagick();

// Configurar el formato y la densidad
$image->setFormat('png');
$image->setResolution(300, 300);

// Convertir el HTML a una imagen
$image->readImageBlob($htmlContent);
$image->setImageFormat('png');

// Guardar la imagen en el archivo de salida
$image->writeImage($outputPath);
$image->clear();

echo "HTML converted to image using Imagick successfully!";
