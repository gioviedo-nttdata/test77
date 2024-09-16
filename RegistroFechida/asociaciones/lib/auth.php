<?php

 		$authj = new Authorizacion();
               // echo "cookie: ".$_COOKIE["admin_idm"];
                $authj->login = $_COOKIE["admin_idm"];
                $authj->clave = $_COOKIE["clave"];
		$authj->auth();
		
		//print_r($authj->rowff);