<?php  //ini_set('display_errors', '1');
require_once 'lib/autoloader.class.php';
	  require_once 'lib/init.class.php';

	 // require_once 'lib/auth.php';
include("cursoPDO.php");
?>
<?php      
				 $db_pais = Db::getInstance();
				$sql_pais = "SELECT * FROM comunas WHERE region = :region ORDER BY comuna";
    			$bind_pais = array(
        		':region' => $region
    			);
				$cant_paises = $db_pais->run($sql_pais, $bind_pais);
				  $row_pais1 = $db_pais->fetchAll($sql_pais, $bind_pais);
				  
?>
             <select class="form-control" name="comuna" value="" id="comuna" autocomplete="off" <?php if ($cant_paises == 0) { ?> disabled<?php } ?>>
              <option value="">Seleccionar Comuna*</option>
			  <?php 
		       
				  foreach($row_pais1 as $row_pais) {
				  ?>
              <option value="<?php echo $row_pais['id'];?>"><?php echo $row_pais['comuna'];?></option>
          <?php } ?>
		  </select>
                        <label>Comuna</label>