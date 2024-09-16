<?php
/*error_reporting(E_ALL);
ini_set('display_errors', '1');*/

require_once 'lib/autoloader.class.php';
require_once 'lib/init.class.php';
//require_once 'lib/auth_off.php';

	 // require_once 'lib/auth.php';
//include("cursoPDO.php");

function datoApi($valor) {
	return $valor;
}


# Our new data

# Create a connection

if ($action == 'cemail') {



}
else if ($action == 'cpass') {



}
else if ($action == 'forgot') {

    $db = Db::getInstance();
				$sql = "SELECT * FROM com_asociaciones WHERE email = :email LIMIT 1";
    			$bind = array(
        		':email' => $email
    			);

				$cont = $db->run($sql, $bind);

	if ($cont > 0) {

            $db1 = Db::getInstance();
			$rowff1 = $db1->fetchAll($sql, $bind);
			$contador = 0;
			foreach($rowff1 as $rowff) {
                $idm = $rowff['id'] ;
			   $ape1 = $rowff['ape1'] ;
			   $nombre = $rowff['presidente'] ;
               $email = $rowff['email'] ;
                        }

                         $clave = uniqid();

                        $db3 = Null;
                        $db3 = Db::getInstance();
			$data3 = array(
        	'clave' => $clave,
        	'usuario' => $idm,
			'servicio' => $id_servicio,
        	'fecha' => date('Y-m-d H:i:s')

		);
    	$db3->insert('com_passrecover', $data3);
		$elid = $db3->lastInsertId();

                $nota = "<table width=\"580\" style=\"background-color: #ffffff; margin: 0px auto;\" cellpadding=\"0\" cellspacing=\"0\" border=\"1\" bordercolor=\"#19ABB9\">
        <tr>
         <td valign=\"top\" align=\"center\"><img src=\"".$app_url."img/logofechida.png\" alt=\"Pulpro\"  height=\"100\" /></td>
        </tr>
        <tr>
         <td valign=\"top\" align=\"left\">
             <table width=\"580\" style=\"margin: 0px auto; border-collapse: collapse;\" cellpadding=\"0\" cellspacing=\"0\">
             <tr>
               <td width=\"15\" valign=\"top\" align=\"left\">&nbsp;</td>
               <td width=\"560\" align=\"left\" valign=\"top\"><font size=\"2\" color=\"#000000\" face=\"Arial, sans-serif\"><br /><br />
              Apreciado/a  ".$nombre." ".$ape1."<br><br>

				Hemos recibido tu solicitud de recuperar tu contrase&ntilde;a en nuestros servicios.<br>
				Para obtener una nueva contrase&ntilde;a debes hacer clic sobre el siguiente enlace.<br>
				<a href=\"".$app_url."recover_pass.php?id=".$idm."&unique=".$clave."\">Modificar clave</a>
				<br><br> </font>
                </td>
               <td width=\"15\" valign=\"top\" align=\"left\">&nbsp;</td>
             </tr>

             <tr>
               <td width=\"15\" valign=\"top\" align=\"left\">&nbsp;</td>
               <td width=\"560\" align=\"left\" valign=\"top\"><font size=\"2\" color=\"#000000\" face=\"Arial, sans-serif\"><br /><br />

Si no puedes acceder a trav&eacute;s del enlace de arriba, copia la siguiente direcci&oacute;n:<br><br>
<a href=\"".$app_url."recover_pass.php?id=".$idm."&unique=".$clave."\">".$app_url."recover_pass.php?id=".$idm."&unique=".$clave."</a><br><br>

Muchas gracias por tu confianza en Pulpro System.<br><br>

Cordialmente,<br><br>
Pulpro
<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
                </font>




                </td>
               <td width=\"15\" valign=\"top\" align=\"left\">&nbsp;</td>
             </tr>

             </table>
         </td>
        </tr>

        </table>";
require_once('includes/class.phpmailer.php');
                require_once('includes/class.smtp.php');

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
$mail->FromName = "Pulpro System";



    $mail->addAddress($email,$email);
    //$mail->AddBCC('gianna@tba.es', 'test');
    //$mail->AddBCC('info@pulpro.com', 'contacto');
    $mail->addReplyTo('filipputti@pulpro.com', 'Pulpro');

    $mail->isHTML(true);
    $mail->SMTPAuth = true;


$mail->Username = $maillogin;
$mail->Password = $mailpass;
$mail->CharSet = 'UTF-8';
                                // Set email format to HTML

    $mail->Subject = 'Recuperacion de clave de acceso - Pulpro';
    $mail->Body    = $nota;

    if(!$mail->send()) {
        /*$app->flash("error", "We're having trouble with our mail servers at the moment.  Please try again later, or contact us directly by phone.");
        error_log('Mailer Error: ' . $mail->errorMessage());
        $app->halt(202);
		die();*/
    } else {
        header("Location: forgot.php?act=OK");
    }



        } else {
            header("Location: forgot.php?err=1");
        }


}

	// MODIFICAR LO DATOS DE USUARIO
	else if ($action == 'modificar') {
	// aqui empieza el registro en el servicio

	//$dev_OK = 'registroOK.php';
	$dev_OK = 'misdatos.php?status=OK&tipo=modif';
	$dev_KO = 'misdatos.php?status=KO';


    
    if ($mailing != 'N') {
		$mailing = "S";
		}
   //print_r($fields);



                    $db = Null;

	$db = Db::getInstance();
			$data = array(
        	'ape1' => $usu_ape1,
			'ape2' => $usu_ape2,
			'codusuario' => $usu_codusuario,
			'nombre' => $usu_nombre,
			'dni' => $usu_dni,
			'perfil' => $usu_codperfil,
			'especialidad' => $usu_codespecialidad,
				'numcolegiado' => $usu_numcolegiado,
				'pais' => $usu_codpais,
				'provincia' => $usu_codprovestado,
				'poblacion' => $usu_codpoblacion,
				'ciudad' => $usu_ciudad,
				'direccion' => $usu_direccion,
				'cp' => $usu_cp,
				'telefono' => $usu_telefono,
				'fax' => $usu_fax,
				'empresa' => $usu_empresa,
                                'fecmod' => $fechoy,
				'mailing' => $mailing
		);
                       // print_r($data);
		 $db->update('com_alumnos', $data, 'id = :id', array(':id' => $id));
	/*$sqlup = "UPDATE com_alumnos SET ape1 = '". noFiltro($usu_ape1) ."', ape2 = '". noFiltro($usu_ape2) ."', email = '". noFiltro($usu_email) ."', nombre = '". noFiltro($usu_nombre) ."', dni = '". noFiltro($usu_dni) ."', perfil = '".noFiltro($usu_codperfil)."', especialidad = '".noFiltro($usu_codespecialidad)."', numcolegiado = '".noFiltro($usu_numcolegiado)."', pais = '".noFiltro($usu_codpais)."', provincia = '".noFiltro($usu_codprovestado)."', poblacion = '".noFiltro($usu_codpoblacion)."', ciudad = '".noFiltro($usu_ciudad)."', direccion = '".noFiltro($usu_direccion)."', cp = '".noFiltro($usu_cp)."', telefono = '".noFiltro($usu_telefono)."', fax = '".noFiltro($usu_fax)."', empresa = '".noFiltro($usu_empresa)."',  servicio= '1' WHERE codusuario = '".noFiltro($usu_codusuario)."'";
		//echo $sqlup;
				  $resultup = mysql_query ($sqlup,$link) or die ("hay un error en la consulta1 ".mysql_error());*/

	header("Location: ".$dev_OK);

	// aqui termina el registro en el servicio
	}
	// TERMINA MODIFICAR LOS DATOS DE USUARIO
else if ($action == 'registro') {

/*$response   = isset($_POST["g-recaptcha-response"]) ? $_POST['g-recaptcha-response'] : null;
$privatekey = "6LfesOQUAAAAAPs54uLBrPIHUYbbagl0b0yGgqDN";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, array(
    'secret' => $privatekey,
    'response' => $response,
    'remoteip' => $_SERVER['REMOTE_ADDR']
));

$resp = json_decode(curl_exec($ch));
curl_close($ch);
*/
//if ($resp->success) {

	// primero revisamos que el email NO exista

		$rut = str_replace(".", "", $rut);
	$db = Db::getInstance();
				$sql = "SELECT * FROM com_asociaciones WHERE email = :email LIMIT 1";
    			$bind = array(
        		':email' => $email
    			);

				$cont = $db->run($sql, $bind);

				$db1 = Db::getInstance();
				$sql1 = "SELECT * FROM com_asociaciones WHERE rut = :rut LIMIT 1";
    			$bind1 = array(
        		':rut' => $rut
    			);

				$cont1 = $db1->run($sql1, $bind1);



	if ($cont == 0) {
		if ($cont1 == 0) {
	// SI NO EXISTE REGISTRAMOS

          $dev_OK = 'login.php?act=rOK';
		$dev_KO = 'registro.php?err=1';
	  // empieza el registro de usuario
	
	$pass1 = sha1(md5(trim($pass)));

      if (empty($region)) {
		  $region=0;
	  }

	  if (empty($comuna)) {
                $comuna = 0;
	  }

	  if (empty($asociacion)) {
                $asociacion = 0;
	  }



        $clave00 = uniqid();
		
		  $db = Db::getInstance();
			$data = array(
        	
			'asociacion' => $club,
			'rut' => $rut,
			'presidente'=> $presidente,
			'telefono' => $telefono,
			'region' => $region,
			'email' => $email,
			'direccion' => $direccion,
			'pass' => $pass1,
			'clave' => $clave00,
				'fecin' => $fechoy,
				'activado' => '0',
                'fecmod' => date('Y-m-d H:i:s')
		);
    	$db->insert('com_asociaciones', $data);
    	$ide = $db->lastInsertId();
		
	

    	// se envia el email

    	require('includes/class.phpmailer.php');
        require('includes/class.smtp.php');

$nota = "<table width=\"580\" style=\"background-color: #ffffff; margin: 0px auto;\" cellpadding=\"0\" cellspacing=\"0\" border=\"1\" bordercolor=\"#19ABB9\">
        <tr>
         <td valign=\"top\" align=\"center\"><img src=\"".$app_url."img/logofechida.png\" alt=\"Pulpro System\" width=\"250\" height=\"122\" /></td>
        </tr>
        <tr>
         <td valign=\"top\" align=\"left\">
             <table width=\"580\" style=\"margin: 0px auto; border-collapse: collapse;\" cellpadding=\"0\" cellspacing=\"0\">
             <tr>
               <td width=\"15\" valign=\"top\" align=\"left\">&nbsp;</td>
               <td width=\"560\" align=\"left\" valign=\"top\"><font size=\"2\" color=\"#000000\" face=\"Arial, sans-serif\"><br /><br />
              Apreciado/a  ".$club."<br><br>
				Hemos recibido su solicitud de registro en el Sistema de Registro de Asociaciones de FECHIDA.<br>
				Para confirmar su registro definitivo debe hacer clic sobre el siguiente enlace.<br>
				Acceder&aacute; a una p&aacute;gina de confirmaci&oacute;n en la web de Pulpro System.
					.<br><br> </font>
                </td>
               <td width=\"15\" valign=\"top\" align=\"left\">&nbsp;</td>
             </tr>
			 
			 <tr>
               <td width=\"15\" valign=\"top\" align=\"left\">&nbsp;</td>
               <td width=\"560\" align=\"center\" valign=\"top\"><font size=\"2\" color=\"#000000\" face=\"Arial, sans-serif\"><br /><br />
<a href=\"".$app_url."registro_confirma.php?id=".$ide."&unique=".$clave00."\"><img src=\"".$app_url."img/confirmacion/boton.png\" alt=\"Pulpro System\" width=\"281\" height=\"54\" /></a><br><br>
                </font>
                </td>
               <td width=\"15\" valign=\"top\" align=\"left\">&nbsp;</td>
             </tr>
             
             <tr>
               <td width=\"15\" valign=\"top\" align=\"left\">&nbsp;</td>
               <td width=\"560\" align=\"left\" valign=\"top\"><font size=\"2\" color=\"#000000\" face=\"Arial, sans-serif\"><br /><br />

Si no puede acceder a trav&eacute;s del enlace de arriba, copie la siguiente direcci&oacute;n:<br><br>
<a href=\"".$app_url."registro_confirma.php?id=".$ide."&unique=".$clave00."\">".$app_url."registro_confirma.php?id=".$ide."&unique=".$clave00."</a><br><br>";



$nota .= "Muchas gracias por su participacion.<br><br>

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


$mail->FromName = "Registro de Asociaciones FECHIDA";

$mail->Subject = "Confirmacion de Registro de Asociaciones FECHIDA";

$mail->AltBody = "Confirmacion de Registro de Asociaciones FECHIDA";
$mail->IsHTML(true);

$mail->MsgHTML($nota);

/* Sustituye  (CuentaDestino )  por la cuenta a la que deseas enviar por ejem. admin@domitienda.com  */


		$mail->AddAddress($email,$email);
        $mail->AddBCC('filipputti@pulpro.com', 'test');

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



	     header("Location: ".$dev_OK);

	     } else {
		// el rut ya existe en la base de datos en la plantilla login debe mostrar error de email existente
		header("Location: registro.php?err=5");

	}

	} else {
		// el email ya existe en la base de datos en la plantilla login debe mostrar error de email existente
		header("Location: registro.php?err=6");

	}
/*	
} else {
    header("Location: registro.php?err=7");
}*/

// termina el registro de usuario
}


?>
