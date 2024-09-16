<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function convertiraMS($tiempo)
    {
        $porcion1 = explode(":", $tiempo);
        $minutos = $porcion1[0];
        $porcion2 = explode(".", $porcion1[1]);
        $segundos = $porcion2[0];
        $milisegundos = ($porcion2[1]*10);
        
        $tiempoMS = ($minutos*60*1000)+($segundos*1000)+$milisegundos;
        return $tiempoMS;
        
    }


define("DB_HOST"        , "localhost");
define("DB_USER"        , "pulpro_db");
define("DB_PASSWORD"    , "J}@&@CdEGqh;");
define("DB_NAME"        , "pulpro_federados");
/*
define("DB_HOST"        , "localhost");
define("DB_USER"        , "tbgpanel_octopus");
define("DB_PASSWORD"    , "M0W(G#,QSgbh");
define("DB_NAME"        , "tbgpanel_octopus");*/


	
   $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    
   
    if (!$connection) {
       
        $success = false;
    }
    else {
       
        mysqli_query($connection, "SET NAMES 'utf8'");
		
        $sql_eve = "SELECT * FROM comunas ORDER BY id";
        $result_eve = mysqli_query($connection, $sql_eve);

        if (mysqli_num_rows($result_eve) > 0) {
			
                        // output data of each row
            while($row_eve = mysqli_fetch_assoc($result_eve)) {
				
				
				$sql_eve4 = "SELECT * FROM provincias WHERE id =".$row_eve['provincia_id']." LIMIT 1";
				echo $sql_eve4."<br>";
				$result_eve4 = mysqli_query($connection, $sql_eve4);

				if (mysqli_num_rows($result_eve4) > 0) {
					
								// output data of each row
					$row_eve4 = mysqli_fetch_assoc($result_eve4);
					
					$region_id = $row_eve4['region_id'];
						
						
					
				} else {
					$region_id =0;
				}
	
						
							/*$sql2 = "UPDATE com_clubes_users SET usado = '0' WHERE CompetenciaId >= 419";
							echo $sql2."<br><br>";
							$result2 = mysqli_query($connection, $sql2);*/
                $id = $row_eve['id'];
                 $sql1 = "UPDATE comunas SET region = '".$region_id."' WHERE id = ".$id;
                        echo $sql1."<br>";
                           $result1 = mysqli_query($connection, $sql1);
									
	
            }
        }
					
					
		
						
				
					
					
        
        
    }
    
    echo $success ? "TRUE" : "FALSE";
	
	?>
