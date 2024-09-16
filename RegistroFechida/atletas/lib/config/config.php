<?php

$DEV_domain = 'dev.fechida.org';
$MASTER_domain = 'registro.fechida.org';


if ($DEV_domain === filter_var($_SERVER['SERVER_NAME'], FILTER_UNSAFE_RAW)) {

    define('DB_NAME', 'fechida_registro');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');

    define('BASE_PATH','http://localhost/RegistroFechida/atletas/');
    define('BASE_PATH_CONTROL','http://localhost/RegistroFechida/atletas/');
    $app_url = "http://localhost/RegistroFechida/atletas/";


}
 else {

    define('DB_NAME', 'fechida_registro');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');

    define('BASE_PATH','http://localhost/RegistroFechida/atletas/');
    define('BASE_PATH_CONTROL','http://localhost/RegistroFechida/atletas/');
    $app_url = "http://localhost/RegistroFechida/atletas/";


}


define('BASE_PATH_REL','/');
define('CONTROLADOR', TRUE);
define('PAGE_TITLE', 'Registro FECHIDA');

$mailhost = "smtp-pulse.com";
$maillogin = "filipputti@pulpro.com";
$mailpass = "mkKfm45Ynr";
$mailemail = "info@pulpro.com";
$mailport = 587;
$mailsecure = "tls";

$id_servicio = 1;
