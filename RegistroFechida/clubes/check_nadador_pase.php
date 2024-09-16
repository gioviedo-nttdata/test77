<?php  //ini_set('display_errors', '1');
require_once 'lib/autoloader.class.php';
require_once 'lib/init.class.php';
require_once 'lib/auth.php';

?>
<?php      
$rut = str_replace(".", "", $rut);
$db = Db::getInstance();
$sql_nad = "SELECT com_users.id as id_user,
				com_users.rut,
                com_users.nombre,
                com_users.apellido as apellido1,
                com_users.apellido2 as apellido2,
                com_users.imagen,
                com_users.club as id_club,
                 com_clubes.club as nombre_club
	             FROM com_users 
				 inner join com_clubes on com_clubes.id=com_users.club
	             WHERE com_users.rut = :rut LIMIT 1";
$bind_nad = array(
':rut' => $rut
);
$cant_nad = $db->run($sql_nad, $bind_nad);

$db1 = Db::getInstance();
$row_nad = $db1->fetchAll($sql_nad, $bind_nad);

$idUser=$row_nad[0]['id_user'];
$nombre=$row_nad[0]['nombre'];
$apellido1=$row_nad[0]['apellido1'];
$apellido2=$row_nad[0]['apellido2'];
$imagen=$row_nad[0]['imagen'];
$idClubOrigen=$row_nad[0]['id_club'];
$nombreClubOrigen=$row_nad[0]['nombre_club'];
$idclubDestino=$authj->rowff['id'];
if ($cant_nad > 0) {

	$db2 = Db::getInstance();
	$sql_nad_pase = "SELECT * FROM com_pases 
					 WHERE com_pases.user = :user and estatus in ('4','5','6')
					 LIMIT 1
					 ";
	$bind_nad_pase = array(
	':user' => $idUser
	);
	$cant_nad_pase = $db2->run($sql_nad_pase, $bind_nad_pase);
	if ($cant_nad_pase > 0) {

 		echo "-1"; //YA TIENE UN PASE INICIADO
 	}else if ($idClubOrigen == $idclubDestino) {

 		echo "-2"; //EL NADADOR PERTENECE A TU CLUB
 	}else{
 		//EXISTE EL NADADOR
 		echo "1_".$idUser."_".$nombre."_".$apellido1."_".$apellido2."_".$idClubOrigen."_".$nombreClubOrigen."_".$clubDestino;
 	}
} else {
  echo "0"; //NO EXISTE EL NADADOR
}
				  
?>