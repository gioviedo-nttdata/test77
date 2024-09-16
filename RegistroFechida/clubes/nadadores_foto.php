<?php    /*error_reporting(E_ALL);
ini_set('display_errors', '1');*/

        require_once 'lib/autoloader.class.php';
	require_once 'lib/init.class.php';
        

	require_once 'lib/auth.php';
        
        $nad1 = New Usuario();
          $nad1->getOne($id);
        
          if (!empty($nad1->row[0]['imagen'])) { ?>
          <img src="<?php $baseUrl?>uploads/p_nadador_<?php echo $nad1->row[0]['id'];?>_<?php echo $nad1->row[0]['imagen'];?>.jpg" alt="User Wall">
          <?php } else { ?>
          <img src="assets/demo/users/fotoperfil.jpg" alt="User Wall">
<?php
              
          }
 


        ?>