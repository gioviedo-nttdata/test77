<?php   /* error_reporting(E_ALL);
ini_set('display_errors', '1');*/

require_once 'lib/autoloader.class.php';
	  require_once 'lib/init.class.php';
          $_page = 'usuarios';

	  require_once 'lib/auth.php';
          
  


        $Period = New Licencia();
        $periodoLic = $Period->getPeriodoActual();

        $idPago = $Period->generarPago($authj->rowff['id']);
    
        
        for ($i = 1; $i <= $conta_nad; $i++) {
            $nadador = "p_nadador_".$i;
            $cat_nadador = "cate_".$i;
            $pagoLic = array();
            unset($pagoLic);
            $pagoLic = Licencia::getUserLicencia(${$nadador}, $periodoLic[0]['periodo']);

            //echo ${$hora_var}."<br>";
            //${$hora_var} = str_replace(" AM", ":00 AM", ${$hora_var});
            //${$hora_var} = str_replace(" PM", ":00 PM", ${$hora_var});
            if (!empty(${$nadador}) and $pagoLic[0]['pagado']!=1) {
               // $comp->agregarConvocado($comp->row[0]['id'],${$nadador}, ${$cat_nadador});
               $Period->agregarNadPago($periodoLic[0]['periodo'], ${$nadador}, $idPago); 
            }
              	 	
        }

	  //require_once 'vistas/pruebas.php'; 
         header("Location: renovar_pago.php?id=".$idPago);
 


?>