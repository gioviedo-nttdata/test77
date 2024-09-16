<?php  //ini_set('display_errors', '1');
require_once 'lib/autoloader.class.php';
require_once 'lib/init.class.php';
//require_once 'lib/auth.php';

?>
<?php      
$db_req = Db::getInstance();
$sql_req = "Select com_requisitos.requisito from com_requisitos 
inner join com_requisitos_modulos on com_requisitos_modulos.requisito=com_requisitos.id
inner join com_modulos on com_requisitos_modulos.modulo=com_modulos.id
where com_modulos.modulo= :modulo ";
$bind_req = array(
':modulo' => $modulo
);
$cant_req = $db_req->run($sql_req, $bind_req);
$row_req1 = $db_req->fetchAll($sql_req, $bind_req);

if ($cant_req > 0) {
?>
<ul>
		<?php 
		foreach($row_req1 as $row_req) {
		?>
			<li><?php echo $row_req['requisito'];?></li>
		<?php } ?>
</ul>  
<?php }else{
	echo '<label class="error col-md-6" >No hay Requisitos asociados a este modulo</label>';
} ?>                     