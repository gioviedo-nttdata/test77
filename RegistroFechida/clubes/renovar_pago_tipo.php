<?php
/*
error_reporting(E_ALL);
ini_set('display_errors', '1');*/


require_once 'lib/autoloader.class.php';
require_once 'lib/init.class.php';
require_once 'lib/auth.php';
$page = "registro";
$scripts = "none";


//include('head.php');


$Period = New Licencia();
        $periodoLic = $Period->getPeriodoActual();

        $pagoActivo = $Period->getPagoActivo($idpago, $authj->rowff['id']);
        $atletasPago = $Period->getPagoAtletas($idpago);

        $cantA = count($atletasPago);

        $monto = $cantA * $periodoLic[0]['precio'];

        $Period->actualizarMonto($id,$monto);




        $Period->updatePago($authj->rowff['id'], $idpago, $pago);


// se envia el email

if ($pago == 1) {

    	require('includes/class.phpmailer.php');
        require('includes/class.smtp.php');

$nota = "<table width=\"580\" style=\"background-color: #ffffff; margin: 0px auto;\" cellpadding=\"0\" cellspacing=\"0\" border=\"1\" bordercolor=\"#19ABB9\">
        <tr>
         <td valign=\"top\" align=\"center\"><img src=\"".$app_url."img/logofechida.png\" alt=\"FECHIDA\" width=\"250\"  /></td>
        </tr>
        <tr>
         <td valign=\"top\" align=\"left\">
             <table width=\"580\" style=\"margin: 0px auto; border-collapse: collapse;\" cellpadding=\"0\" cellspacing=\"0\">
             <tr>
               <td width=\"15\" valign=\"top\" align=\"left\">&nbsp;</td>
             
               <td width=\"560\" align=\"left\" valign=\"top\"><font size=\"2\" color=\"#000000\" face=\"Arial, sans-serif\"><br><br>
			    Apreciado/a  ".$authj->rowff['presidente']." - Club: ".$authj->rowff['club']."<br /><br />
				  Está pre-inscrita tu Licencia FECHIDA 2021 para ".$cantA." atletas.<br><br>";

          foreach ($atletasPago as $Elem) { 
  
            $nota .= $Elem['nombre']." ".$Elem['apellido']." (".$Elem['rut'].")<br>";
  
         
          }
  
          $nota .="<br>Para finalizar tu inscripción debes transferir ".$monto." a la siguiente cuenta:<br>
				Banco Crédito e Inversiones<br>
                                                                    Federación Chilena de Deportes Acuáticos.<br>
                                                                    Cuenta Corriente<br>
                                                                    No. de cuenta: 13303279<br>
                                                                    RUT: 70.047.600-6<br></font><br><br>
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


$mail->FromName = "FECHIDA";

$mail->Subject = "LICENCIA FECHIDA 2021";

$mail->AltBody = "LICENCIA FECHIDA 2021";
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

        // se termina de enviar el email
        


header("Location: renovar_pago.php?id=".$idpago);

}  else if ($pago == 2) {
    header("Location: enlinea.php?idpago=".$idpago);
}



?>

