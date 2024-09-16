<?php
/*
error_reporting(E_ALL);
ini_set('display_errors', '1');*/
/**
 * Ejemplo de creación de una orden de cobro, iniciando una transacción de pago
 * Utiliza el método payment/create
 */

if (empty($id)) {
	$id=2;

}
 
require_once 'lib/autoloader.class.php';
require_once 'lib/init.class.php';
require_once 'lib/auth.php';


			
		
			
	

			require(__DIR__ . "/lib/class/FlowApi.class.php");

			//Para datos opcionales campo "optional" prepara un arreglo JSON
			$optional = array(
				"nombre" => $authj->rowff['nombre']." ".$authj->rowff['ape1'],
				"usuario" => $authj->rowff['id'],
				"Licencia" => 2020
			);
			$optional = json_encode($optional);

			//Prepara el arreglo de datos
			$params = array(
				"commerceOrder" => $authj->rowff['id']."-".uniqid(),
				"subject" => "Licencia Master FECHIDA 2020",
				"currency" => "CLP",
				"amount" => 500,
				"email" => $authj->rowff['email'],
				"paymentMethod" => 9,
				"urlConfirmation" => Config::get("BASEURL") . "/confirm.php?id=".$id,
				"urlReturn" => Config::get("BASEURL") ."/result.php?id=".$id,
				"optional" => $optional
			);
			//Define el metodo a usar
			//print_r($params);
			$serviceName = "payment/create";

			try {
				// Instancia la clase FlowApi
				$flowApi = new FlowApi;
				// Ejecuta el servicio
				$response = $flowApi->send($serviceName, $params,"POST");
				//Prepara url para redireccionar el browser del pagador
				$redirect = $response["url"] . "?token=" . $response["token"];
				header("location:$redirect");
			} catch (Exception $e) {
				echo $e->getCode() . " - " . $e->getMessage();
			}



			



?>