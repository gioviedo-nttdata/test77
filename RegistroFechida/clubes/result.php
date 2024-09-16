<?php
/*
error_reporting(E_ALL);
ini_set('display_errors', '1');*/
/**
 * Pagina del comercio para redireccion del pagador
 * A esta página Flow redirecciona al pagador pasando vía POST
 * el token de la transacción. En esta página el comercio puede
 * mostrar su propio comprobante de pago
 */
require_once 'lib/autoloader.class.php';
require_once 'lib/init.class.php';
//require_once 'lib/auth.php';

require(__DIR__ . "/lib/class/FlowApi.class.php");

function arrayToHTMLAttributes($aData_ = array())
{

	// Define un array temporal
	$aAttributes = array();

	// Recorre el array de entrada
	foreach ($aData_ as $sKey => $mValue_) {

		$aAttributes[] = $sKey . '="' . $mValue_ . '"';
	}

	// Une todos los elementos del aray temporal
	return ' ' . implode(' ', $aAttributes);
}



try {
	//Recibe el token enviado por Flow
	if (!isset($_POST["token"])) {
		throw new Exception("No se recibio el token", 1);
	}
	$token = filter_input(INPUT_POST, 'token');
	$params = array(
		"token" => $token
	);
	//Indica el servicio a utilizar
	$serviceName = "payment/getStatus";
	$flowApi = new FlowApi();
	$response = $flowApi->send($serviceName, $params, "GET");


	$db4 = Db::getInstance();
	$db5 = Db::getInstance();

	//print_r($response);

	$respuesta = arrayToHTMLAttributes($response);
	$data4 = array(
		'pago' => $response['status'],
		'floworder' => $response['flowOrder'],
		'respuesta' => $respuesta

	);

	$elUser = $response['optional']['idpago'];

	$elUser1 = $response['optional']['usuario'];


	$db0 = Db::getInstance();
	$sql0 = "SELECT com_licencias.*, com_users.nombre, com_users.apellido, com_users.apellido2, com_users.rut FROM com_licencias INNER JOIN com_users ON com_users.id = com_licencias.user WHERE com_licencias.idpago = :id";
		$bind0 = array(
		':id' => $elUser
		);
		
		$cont0 = $db0->run($sql0, $bind0);
		if ($cont0 == 0) {
			$row_p = "";
			//echo "NO encontró";
		} else {
			//echo "encontró";
			
			$db10 = Db::getInstance();
			$row_p0 = $db10->fetchAll($sql0, $bind0);
		  
		
		}

		$cantA = $cont0;


	$db4->update('com_licencias_pago', $data4, 'id = :id', array(':id' => $elUser));
	
	
		$data5 = array(
		'pagado' => '1'
		);
	
	if ($response['status'] == 2) {

		$db4->update('com_licencias', $data5, 'idpago = :idpago', array(':idpago' => $elUser));
	}



	$sql = "SELECT * FROM com_clubes WHERE id = :id";
	$bind = array(
		':id' => $elUser1
	);


	/*echo $sql;
				print_r($bind);*/

	$cont = $db->run($sql, $bind);
	//echo "Contador:".$cont;

	if ($cont > 0) {
		//echo "entra aqui";
		$db1 = Db::getInstance();
		$rowff1 = $db1->fetchAll($sql, $bind);
	}




	// envia el email 
	if ($response['status'] == 2) {

		require('includes/class.phpmailer.php');
		require('includes/class.smtp.php');

		$nota = "<table width=\"580\" style=\"background-color: #ffffff; margin: 0px auto;\" cellpadding=\"0\" cellspacing=\"0\" border=\"1\" bordercolor=\"#19ABB9\">
        <tr>
         <td valign=\"top\" align=\"center\"><img src=\"" . $app_url . "img/logofechida.png\" alt=\"Pulpro System\" height=\"100\" /></td>
        </tr>
        <tr>
         <td valign=\"top\" align=\"left\">
             <table width=\"580\" style=\"margin: 0px auto; border-collapse: collapse;\" cellpadding=\"0\" cellspacing=\"0\">
             <tr>
               <td width=\"15\" valign=\"top\" align=\"left\">&nbsp;</td>
               <td width=\"560\" align=\"left\" valign=\"top\"><font size=\"2\" color=\"#000000\" face=\"Arial, sans-serif\"><br /><br />
              Apreciado/a  " . $rowff1[0]['presidente'] . " - Club" . $rowff1[0]['club'] . "<br><br>
				Hemos recibido la inscripción de su Licencia 2021 para ".$cantA." atletas.<br><br>";

				foreach ($row_p0 as $Elem) { 

					 $nota .= $Elem['nombre']." ".$Elem['apellido']." (".$Elem['rut'].")<br>";

				}

				$nota .="<br>
				Su pago está confirmado, codigo de transacción: " . $response['flowOrder'] . "<br><br> </font>
                </td>
               <td width=\"15\" valign=\"top\" align=\"left\">&nbsp;</td>
             </tr>
			 
			 
             
             <tr>
               <td width=\"15\" valign=\"top\" align=\"left\">&nbsp;</td>
               <td width=\"560\" align=\"left\" valign=\"top\"><font size=\"2\" color=\"#000000\" face=\"Arial, sans-serif\"><br /><br />

				Muchas gracias por su participacion.<br><br>

Cordialmente,<br><br>
FECHIDA
<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
                </font>


				

                </td>
               <td width=\"15\" valign=\"top\" align=\"left\">&nbsp;</td>
             </tr>

             </table>
         </td>
        </tr>

        </table>";

		$mail = new PHPMailer();

		$mail->IsSMTP();

		$mail->SMTPDebug = 0;
		// 0 = no output, 1 = errors and messages, 2 = messages only.


		/* Sustituye (ServidorDeCorreoSMTP)  por el host de tu servidor de correo SMTP*/
		$mail->Host = $mailhost;
		if (!empty($mailsecure)) {
			$mail->SMTPSecure = $mailsecure;
		}
		if (!empty($mailport)) {
			$mail->Port = $mailport;
		}




		$mail->From = $mailemail;


		$mail->FromName = "FECHIDA Licencia";

		$mail->Subject = "Licencia FECHIDA 2020-2021";

		$mail->AltBody = "Licencia FECHIDA 2020-2021";
		$mail->IsHTML(true);

		$mail->MsgHTML($nota);

		/* Sustituye  (CuentaDestino )  por la cuenta a la que deseas enviar por ejem. admin@domitienda.com  */
		//echo $usu_email."<br>".$mailemail."<br>".$maillogin."<br>".$mailpass."<br>".$mailhost;

		$mail->addReplyTo('info@pulpro.com', 'Info Pulpro');

		$mail->AddAddress($rowff1[0]['email'], $rowff1[0]['email']);
		$mail->AddBCC('filipputti@pulpro.com', 'test');

		$mail->SMTPAuth = true;


		$mail->Username = $maillogin;
		$mail->Password = $mailpass;

		if (!$mail->Send()) {
			//echo "no se envio";
			//header("Location: gracias.php?err=1");
		} else {
			//echo "si se envio";
			// header("Location: gracias.php");
		}
		//header("Location: gracias.php?act=transferencia");


	}


	// termina de enviar el email


	//print_r($response);
	header("Location: renovar_pago.php?act=flow&estado=" . $response['status'] . "&id=".$elUser);
} catch (Exception $e) {
	echo "Error: " . $e->getCode() . " - " . $e->getMessage();
}
