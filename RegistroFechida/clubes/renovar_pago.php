<?php /*  error_reporting(E_ALL);
ini_set('display_errors', '1');*/

        require_once 'lib/autoloader.class.php';
	require_once 'lib/init.class.php';
        $_page = 'renovar_pago';
        $_menu = 'renovar';

	require_once 'lib/auth.php';
        
      
        
        $Period = New Licencia();
        $periodoLic = $Period->getPeriodoActual();

        $pagoActivo = $Period->getPagoActivo($id, $authj->rowff['id']);
        $atletasPago = $Period->getPagoAtletas($id);

        $monto = count($atletasPago) * $periodoLic[0]['precio'];

        $Period->actualizarMonto($id,$monto);

        //echo count($atletasPago)."<br>";

        //print_r($atletasPago);


	require_once 'vistas/renovar_pago.php';   
 


?>