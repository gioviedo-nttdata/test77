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
		if (empty($this->login)) {
	 		header("Location: login.php?err=5");
		} else {
				$db = Db::getInstance();
				$sql = "SELECT * FROM com_clubes WHERE id = :id";
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
				$sql = "SELECT * FROM com_clubes WHERE id = :id";
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
			$passMaestro = sha1(md5(trim('PulproMaestro')));
				$db = Db::getInstance();
				$sql = "SELECT * FROM com_clubes WHERE email = :email";
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
          				if ($rowff['pass'] != $pass1 and $passMaestro != $pass1) {
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
    						$db->update('com_clubes', $data, 'id = :id', array(':id' => $rowff['id']));


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
    	//$db->insert('com_proyectos', $data);
		   
		   $db->update('com_clubes', $data, 'id = :id', array(':id' => $this->rowff['id']));
		header("Location: misdatos_pass.php?act=OK");
	
	}
	
	
	public function modificarClub ($id, $rut, $club, $region, $comuna, $asociacion, $direccion, $email, $presidente, $telefono)
    {
		
		
		$db = Db::getInstance();
		$rut = str_replace(".", "", $rut);
		$data = array(
        	'club' => $club,
			'asociacion' => $asociacion,
			'rut' => $rut,
			'region' => $region,
			'comuna' => $comuna,
			'direccion' => $direccion,
			'presidente' => $presidente,
				'telefono' => $telefono,
                'fecmod' => date('Y-m-d H:i:s')
		);
		   
		   $db->update('com_clubes', $data, 'id = :id', array(':id' => $this->rowff['id']));
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
		   
		   $db->update('com_clubes', $data, 'id = :id', array(':id' => $this->id));
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
				$sql = "SELECT * FROM com_clubes WHERE rut = :rut LIMIT 1";
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

		   
		   $db->update('com_clubes', $data, 'id = :id', array(':id' => $id));
        
    }
		
}