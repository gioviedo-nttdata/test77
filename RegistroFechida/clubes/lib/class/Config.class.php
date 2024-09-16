<?php
/**
 * Clase para Configurar el cliente
 * @Filename: Config.class.php
 * @version: 2.0
 * @Author: flow.cl
 * @Email: csepulveda@tuxpan.com
 * @Date: 28-04-2017 11:32
 * @Last Modified by: Carlos Sepulveda
 * @Last Modified time: 28-04-2017 11:32
 */
 



// 

 $COMMERCE_CONFIG = array(
 	"APIKEY" => "22FBD7B2-4E4B-4E26-BB86-865F719FL03C", // Registre aquí su apiKey
 	"SECRETKEY" => "fccfcf3f9a2b6521ed6f73d7f377030276dfa34d", // Registre aquí su secretKey
 	"APIURL" => "https://www.flow.cl/api", // Producción EndPoint o Sandbox EndPoint
 	"BASEURL" => "https://registro.fechida.org/clubes" //Registre aquí la URL base en su página donde instalará el cliente
 );
/*
 $COMMERCE_CONFIG = array(
	"APIKEY" => "6E890CFB-B904-44E5-A5B6-77777E7L3CCE", // Registre aquí su apiKey
	"SECRETKEY" => "212d5f2f8804fd1cdfa8edcb52486962276e7f9a", // Registre aquí su secretKey
	"APIURL" => "https://sandbox.flow.cl/api", // Producción EndPoint o Sandbox EndPoint
	"BASEURL" => "https://eventosfechida.pulpro.com" //Registre aquí la URL base en su página donde instalará el cliente
);*/

 
 class Config {
 	
	static function get($name) {
		global $COMMERCE_CONFIG;
		//print_r( $COMMERCE_CONFIG);
		if(!isset($COMMERCE_CONFIG[$name])) {
			throw new Exception("The configuration element thas not exist ".$name, 1);
		}
		return $COMMERCE_CONFIG[$name];
	}
 }
