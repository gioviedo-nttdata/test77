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
require_once 'lib/auth_off.php';


				$db = Db::getInstance();
				$sql = "SELECT * FROM com_certificaciones_registro WHERE certificacion = :id AND usuario = :usuario LIMIT 1";
    			$bind = array(
					':id' => $id,
					':usuario' => $authj->rowff['id']
				);
				
				

				$cont = $db->run($sql, $bind);

	if ($cont > 0) {
		
			$db1 = Db::getInstance();
			$rowff1 = $db1->fetchAll($sql, $bind);
		
	

			require(__DIR__ . "/lib/class/FlowApi.class.php");

			//Para datos opcionales campo "optional" prepara un arreglo JSON
			$optional = array(
				"nombre" => $authj->rowff['nombre']." ".$authj->rowff['ape1'],
				"usuario" => $authj->rowff['id'],
				"certificado" => 2
			);
			$optional = json_encode($optional);

			//Prepara el arreglo de datos
			$params = array(
				"commerceOrder" => $rowff1[0]['id']."-".uniqid(),
				"subject" => "Certificacion FECHIDA 2020",
				"currency" => "CLP",
				"amount" => 15000,
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



			
} else {
	header("location: certificado.php?id=".$id);
}


?>