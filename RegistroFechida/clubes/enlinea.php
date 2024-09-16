<?php
/*
error_reporting(E_ALL);
ini_set('display_errors', '1');*/
/**
 * Ejemplo de creación de una orden de cobro, iniciando una transacción de pago
 * Utiliza el método payment/create
 */


 
require_once 'lib/autoloader.class.php';
require_once 'lib/init.class.php';
require_once 'lib/auth.php';


			
		
$Period = New Licencia();
$periodoLic = $Period->getPeriodoActual();

$pagoActivo = $Period->getPagoActivo($idpago, $authj->rowff['id']);
$atletasPago = $Period->getPagoAtletas($idpago);
	

			require(__DIR__ . "/lib/class/FlowApi.class.php");

			//Para datos opcionales campo "optional" prepara un arreglo JSON
			$optional = array(
				"nombre" => $authj->rowff['club'],
				"usuario" => $authj->rowff['id'],
				"idpago" => $idpago,
				"Licencia" => $periodoLic[0]['periodo']
			);
			$optional = json_encode($optional);

			//Prepara el arreglo de datos
			$params = array(
				"commerceOrder" => $pagoActivo['id']."-".uniqid(),
				"subject" => "Licencia FECHIDA ".$periodoLic[0]['periodo'],
				"currency" => "CLP",
				"amount" => $pagoActivo['monto'],
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