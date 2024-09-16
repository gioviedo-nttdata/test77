<?php   /*error_reporting(E_ALL);
ini_set('display_errors', '1');*/

        require_once 'lib/autoloader.class.php';
	require_once 'lib/init.class.php';
        $_page = 'nadadores_foto';
        $_menu = 'nadadores_foto';

	require_once 'lib/auth.php';
        
        $nad = New Usuario();
          $nad->getOne($id);
        
       
        
        $roles = "";
        if ($nad->row[0]['nadador']==1) {
           $roles = "Nadador"; 
        }
        if ($nad->row[0]['admin']==1) {
            if (!empty($roles)) {
                $roles .= " - ";
            }
           $roles .= "Admin"; 
        }
        if ($nad->row[0]['apoderado']==1) {
            if (!empty($roles)) {
                $roles .= " - ";
            }
           $roles .= "Apoderado"; 
        }
        if ($nad->row[0]['entrenador']==1) {
            if (!empty($roles)) {
                $roles .= " - ";
            }
           $roles .= "Entrenador"; 
        }
        if ($nad->row[0]['tesorero']==1) {
            if (!empty($roles)) {
                $roles .= " - ";
            }
           $roles .= "Tesorero"; 
        }
        
        if ($nad->row[0]['sysadmin']==1) {
            if (!empty($roles)) {
                $roles .= " - ";
            }
           $roles .= "Sysadmin"; 
        }
        
       


	require_once 'vistas/nadadores_mod.php';   
 


?>