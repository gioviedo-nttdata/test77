<?php require_once 'lib/autoloader.class.php';
require_once 'lib/init.class.php';
require_once 'lib/auth.php';

if(!empty($_GET['paymentID']) && !empty($_GET['payerID']) && !empty($_GET['token']) && !empty($_GET['pid']) ){
	$paymentID = $_GET['paymentID'];
        $payerID = $_GET['payerID'];
        $token = $_GET['token'];
        $pid = $_GET['pid'];
		
		$datos = "paymentID = ".$_GET['paymentID']." payerID = ".$_GET['payerID']." token = ".$_GET['token']." pid = ".$_GET['pid'];
	
	$db4 = Db::getInstance();
	

                            $data4 = array(
                            'pago' => 2,
                            'floworder' => $paymentID,
							'respuesta' => $datos

                            );
							
							
                            
                            $db4->update('com_certificaciones_registro', $data4, 'usuario = :usuario', array(':usuario' => $authj->rowff['id']));
							
							require('includes/class.phpmailer.php');
							require('includes/class.smtp.php');

							$nota = "<table width=\"580\" style=\"background-color: #ffffff; margin: 0px auto;\" cellpadding=\"0\" cellspacing=\"0\" border=\"1\" bordercolor=\"#19ABB9\">
									<tr>
									 <td valign=\"top\" align=\"center\"><img src=\"".$app_url."img/logocen11.png\" alt=\"Pulpro System\" width=\"411\" height=\"100\" /></td>
									</tr>
									<tr>
									 <td valign=\"top\" align=\"left\">
										 <table width=\"580\" style=\"margin: 0px auto; border-collapse: collapse;\" cellpadding=\"0\" cellspacing=\"0\">
										 <tr>
										   <td width=\"15\" valign=\"top\" align=\"left\">&nbsp;</td>
										 
										   <td width=\"560\" align=\"left\" valign=\"top\"><font size=\"2\" color=\"#000000\" face=\"Arial, sans-serif\"><br><br>
											Apreciado/a  ".$authj->rowff['nombre']." ".$authj->rowff['ape1']."<br /><br />
											Estás inscrito para participar en la Certificación del Ciclo de Charlas FECHIDA 2020<br>
											Tu pago está confirmado.<br></font><br><br>
											 </font>
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


											<table width=\"580\" style=\"margin: 0px auto; border-collapse: collapse;\" cellpadding=\"0\" cellspacing=\"0\">
										 <tr>
										 <td width=\"290\">&nbsp;</td>
										 <td width=\"290\" align=\"right\"><img src=\"".$app_url."img/logopulpro.png\" alt=\"Pulpro\" height=\"50\" /></td>
										 
										 </tr>
										 </table>

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


			$mail->FromName = "FECHIDA - PULPRO";

			$mail->Subject = "Inscripción Certificacion FECHIDA 2020";

			$mail->AltBody = "Inscripción Certificacion FECHIDA 2020";
			$mail->IsHTML(true);

			$mail->MsgHTML($nota);

			/* Sustituye  (CuentaDestino )  por la cuenta a la que deseas enviar por ejem. admin@domitienda.com  */


		$mail->AddAddress($authj->rowff['email'],$authj->rowff['email']);
        //$mail->AddBCC('gianna@tba.es', 'test');

		$mail->SMTPAuth = true;


		$mail->Username = $maillogin;
		$mail->Password = $mailpass;
		$mail->CharSet = 'UTF-8';

		if(!$mail->Send()) {

		   //header("Location: gracias.php?err=1");
		} else {
		  // header("Location: gracias.php");
		}

							
							
							
							
         header('Location:certificado.php?id='.$id);  
         
    } else {
        header('Location:index.php');
    }