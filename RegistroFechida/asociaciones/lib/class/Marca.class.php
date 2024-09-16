<?php
class Marca
{
	public $id;
	public $titulo;
	public $imagen;
	public $tabla;

	public $estado;
	public $row;

	public $pag = 1;
	public $limit = 10;
	public $orden = "";
	public $tiporden = "";
	public $total_pages;
	
	public $img_ppl;
	
	public $cnt_img_ppl;
	
	private $interfaz;


    public function __construct($interfaz=0)
    {
       $this->interfaz = $interfaz;
       $this->tabla = "com_resultados";
       $this->tabla_temp = "com_resultados_temp";
	
    }
	
    private function getOrden() {
		
				$db = Db::getInstance();
				$sql = "SELECT * FROM ".$this->tabla." WHERE orden > :id ORDER BY orden DESC LIMIT 1";
                                $bind = array(
                                ':id' => 0
                                );
		        
				$cont = $db->run($sql, $bind);
				//echo "contador:".$cont;
				if ($cont == 0) {
					$orden = 1;
				} else {
					$db1 = Db::getInstance();
					$row_p = $db1->fetchAll($sql, $bind);
				   foreach($row_p as $row_p1) {
						$orden = $row_p1['orden'] + 1;
					}
				}
		
		return sprintf($orden);
	}
		
	public function agregar ($nadador,$competencia,$prueba,$prueba_id,$fecha,$tiempo,$piscina,$lugar=0,$final=0,$totnadpru=0,$id_origen=0, $exh=0, $puntos=0)  {
            
            if (empty($nadador)) {
		   header("Location: nadadores.php");
	     
            } else if (empty($tiempo)) {
		   header("Location: nadadores_marca.php?id=".$nadador);
            } else {
               
            //$orden = $this->getOrden();
			$tiempo0 = Funciones::convertiraMS($tiempo);
			$db = Db::getInstance();
			$data = array(
                            'nadador' => $nadador,
                            'competencia' => $competencia,
                            'prueba' => $prueba,
                            'prueba_id'=> $prueba_id,
                            'fecha' => $fecha,
                            'tiempo' => $tiempo0,
                            'piscina' => $piscina,
                            'lugar' => $lugar,
                            'totnadpru' => $totnadpru,
                            'final' => $final,
                            'id_origen' => $id_origen,
                            'exh' => $exh,
                            'puntos' => $puntos
                        );
                        $db->insert($this->tabla, $data);
			$this->id = $db->lastInsertId();
		
		//header("Location: nadadores.php?add=ok");
		
	   }
		
    }
    
    public function agregarTemp ($nadador,$competencia,$prueba,$prueba_id,$fecha,$tiempo,$piscina,$lugar=0,$final=0,$totnadpru=0,$id_origen=0)  {
            
            if (empty($nadador)) {
		   //header("Location: nadadores.php");
                return "err1";
	     
            } else if (empty($tiempo)) {
		   //header("Location: nadadores_marca.php?id=".$nadador);
                return "err2";
            } else {
               
            //$orden = $this->getOrden();
                
                $db0 = null;
		$db0 = Db::getInstance();
		     
			$sql0 = "SELECT * FROM ".$this->tabla_temp." WHERE nadador = :nadador AND competencia = :competencia AND prueba = :prueba AND prueba_id = :prueba_id LIMIT 1";
    			$bind0 = array(
                            'nadador' => $nadador,
                            'competencia' => $competencia,
                            'prueba' => $prueba,
                            'prueba_id'=> $prueba_id
    				);

				
		        
				$cont = $db0->run($sql0, $bind0);
                                $tiempo0 = Funciones::convertiraMS($tiempo);
                                //echo "cont";
                                $data = array(
                                        'nadador' => $nadador,
                                        'competencia' => $competencia,
                                        'prueba' => $prueba,
                                        'prueba_id'=> $prueba_id,
                                        'fecha' => $fecha,
                                        'tiempo' => $tiempo0,
                                        'piscina' => $piscina,
                                        'lugar' => $lugar,
                                        'totnadpru' => $totnadpru,
                                        'final' => $final,
                                        'id_origen' => $id_origen
                                    );
                                
				if ($cont == 0) {
                                    $tiempo0 = Funciones::convertiraMS($tiempo);
                                    $db = null;
                                    $db = Db::getInstance();
                                    
                                    $db->insert($this->tabla_temp, $data);
                                    //$this->id = $db->lastInsertId();
                                } else {
                                   /* $db5 = null;
					$db5 = Db::getInstance();
					$row_a5 = $db5->fetchAll($sql, $bind);
					$id_resp = $row_a5[0]['id'];*/

					$db6 = null;
					$db6 = Db::getInstance();
						
    					//$db->insert('com_alumnos_diapos', $data);
    					$db6->update($this->tabla_temp, $data, 'nadador = :nadador AND competencia = :competencia AND prueba = :prueba AND prueba_id = :prueba_id', array(':nadador' => $nadador, ':competencia' => $competencia, ':prueba' => $prueba, ':prueba_id' => $prueba_id));

                                }
			
		
		//header("Location: nadadores.php?add=ok");
                        return "ok";
		
	   }
		
    }
    
    
    static function getOneTemp ($nadador,$competencia,$prueba,$prueba_id)  {
            
           
               
            //$orden = $this->getOrden();
                
                $db0 = null;
		$db0 = Db::getInstance();
		     
			$sql0 = "SELECT * FROM com_resultados_temp WHERE nadador = :nadador AND competencia = :competencia AND prueba = :prueba AND prueba_id = :prueba_id LIMIT 1";
    			$bind0 = array(
                            'nadador' => $nadador,
                            'competencia' => $competencia,
                            'prueba' => $prueba,
                            'prueba_id'=> $prueba_id
    				);

				
		        
				$cont = $db0->run($sql0, $bind0);
                                
                                //echo "cont";
                               
                                
				if ($cont == 0) {
                                   
                                } else {
                                    $db5 = null;
					$db5 = Db::getInstance();
					$row_a5 = $db5->fetchAll($sql0, $bind0);
					return $row_a5[0];

					
                                }
			
		
		//header("Location: nadadores.php?add=ok");
                        //return "ok";
		
	   
		
    }
	
	
	
	public function modificar ()
    {
	   if (empty($this->id)) {
		   header("Location: usuarios.php");
	   }
		else if (empty($this->email)) {
		   header("Location: usuarios_mod.php?id=".$this->id);
	   } else {
		
			$db = Db::getInstance();
			$data = array(
        	'nombre' => $this->nombre,
        	'email' => $this->email,
        	'sucursal' => $this->sucursal,
        	'nivel' => $this->nivel
		);
    	//$db->insert('com_proyectos', $data);
		   
		   $db->update($this->tabla, $data, 'id = :id', array(':id' => $this->id));
		   
		header("Location: usuarios.php");
	   }
		
    }

    public function actTableCompe ($id)
    {
	   
		
			$db = Db::getInstance();
			$data = array(
                        'usado' => '1'
                        );
    	//$db->insert('com_proyectos', $data);
		   
		   $db->update('sys_Competidor', $data, 'CompetidorId = :id', array(':id' => $id));
		   
		//header("Location: usuarios.php");
	   
		
    }
    
    public function actTableCompeZip ($id)
    {
	   
		
			$db = Db::getInstance();
			$data = array(
                        'usado' => '1'
                        );
    	//$db->insert('com_proyectos', $data);
		   
		   $db->update('Resultado', $data, 'ResultadoId = :id', array(':id' => $id));
		   
		//header("Location: usuarios.php");
	   
		
    }
	

	
	public function getAll ($nadador)
	{
		      
				$db = Db::getInstance();
		     
				$sql = "SELECT ".$this->tabla.".*, com_pruebas.id AS prueba, com_pruebas.nombre AS nombre_pru, com_competencias.nombre FROM ".$this->tabla
                                        ." LEFT JOIN com_pruebas ON ".$this->tabla.".prueba = com_pruebas.id "
                                        ." LEFT JOIN com_competencias ON ".$this->tabla.".competencia = com_competencias.id "
                                        . "WHERE ".$this->tabla.".nadador=:id ORDER BY com_pruebas.orden, ".$this->tabla.".fecha DESC, ".$this->tabla.".final";
    				$bind = array(
        			':id' => $nadador
    				);
					
				
				
		        
				$cont = $db->run($sql, $bind);
				if ($cont == 0) {
					$row_p = "";
				} else {
					
					$db1 = Db::getInstance();
					$row_p = $db1->fetchAll($sql, $bind);
					 $conty = 0;
				   foreach($row_p as $row_p1) {
					  $conty++;				
					}
					$this->row = $row_p;
				}
	}
        
        static function getMarcaPruNad($prueba, $nadador, $criterio, $piscina, $tipo_piscina, $tiempo_limite = 0, $invalida = 0) {
            
            if ($tiempo_limite > 0) {
                $fecha = date('Y-m-d');
                $nuevafecha = strtotime ( '-'.$tiempo_limite.' month' , strtotime ( $fecha ) ) ;
                $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
                
            }
            if ($tipo_piscina == 1) {
                
            
            $db = Db::getInstance();
		     
				$sql = "SELECT com_resultados.*, com_pruebas.id AS prueba, com_pruebas.nombre AS nombre_pru, com_competencias.nombre FROM com_resultados"
                                        ." LEFT JOIN com_pruebas ON com_resultados.prueba = com_pruebas.id "
                                        ." LEFT JOIN com_competencias ON com_resultados.competencia = com_competencias.id "
                                        . "WHERE com_resultados.nadador=:id AND com_resultados.prueba = :prueba AND com_resultados.piscina = :piscina";
                                
                                $bind = array(
                                    ':id' => $nadador,
                                    ':prueba' => $prueba,
                                    ':piscina' => $piscina
    				);
                                if ($invalida == 1) {
                                    $sql .= " AND com_competencias.invalida < :invalida";
                                    $bind[':invalida'] = $invalida;
                                }
                                
                                if ($criterio == 'mejor') {
                                    if ($tiempo_limite > 0) {
                                     $sql .= " AND com_resultados.fecha >= :fecha";  
                                      $bind[':fecha'] = $nuevafecha;
                                    }
                                    $sql .= " ORDER BY com_resultados.tiempo LIMIT 10";
                                } else {
                                    $sql .= " ORDER BY com_resultados.fecha DESC LIMIT 10";
                                }
                                
                                
				
				
		        
				$cont = $db->run($sql, $bind);
                                }
                                
                                if ($cont == 0) {
                                        $db = Null; 
					$db = Db::getInstance();
		     
                                        $sql = "SELECT com_resultados.*, com_pruebas.id AS prueba, com_pruebas.nombre AS nombre_pru, com_competencias.nombre FROM com_resultados"
                                                ." LEFT JOIN com_pruebas ON com_resultados.prueba = com_pruebas.id "
                                                ." LEFT JOIN com_competencias ON com_resultados.competencia = com_competencias.id "
                                                . "WHERE com_resultados.nadador=:id AND com_resultados.prueba = :prueba";
                                        
                                        unset($bind);

                                        $bind = array(
                                            ':id' => $nadador,
                                            ':prueba' => $prueba
                                        );
                                        
                                       if ($criterio == 'mejor') {
                                            if ($tiempo_limite > 0) {
                                             $sql .= " AND com_resultados.fecha >= :fecha";  
                                              $bind[':fecha'] = $nuevafecha;
                                            }
                                            $sql .= " ORDER BY com_resultados.tiempo LIMIT 10";
                                        } else {
                                            $sql .= " ORDER BY com_resultados.fecha DESC LIMIT 10";
                                        }
                                        
                                        




                                        $cont = $db->run($sql, $bind);

				}
                                
                                
				if ($cont == 0) {
					return "";
				} else {
					
					$db1 = Db::getInstance();
					$row_p = $db1->fetchAll($sql, $bind);
					 $conty = 0;
				   foreach($row_p as $row_p1) {
					  $conty++;				
					}
					return $row_p;
				}
            
        }
        
        static function getMarcaPruNadCom($prueba, $nadador, $criterio, $competencia) {
            
            
            $db = Db::getInstance();
		     
				$sql = "SELECT com_resultados_temp.*, com_pruebas.id AS prueba, com_pruebas.nombre AS nombre_pru, com_competencias.nombre FROM com_resultados_temp"
                                        ." LEFT JOIN com_pruebas ON com_resultados_temp.prueba = com_pruebas.id "
                                        ." LEFT JOIN com_competencias ON com_resultados_temp.competencia = com_competencias.id "
                                        . "WHERE com_resultados_temp.nadador=:id AND com_resultados_temp.prueba = :prueba AND com_resultados_temp.competencia = :competencia AND com_resultados_temp.tiempo > 0";
                                
                                $bind = array(
                                    ':id' => $nadador,
                                    ':prueba' => $prueba,
                                    ':competencia' => $competencia
    				);
                                
                                    $sql .= " ORDER BY com_resultados_temp.tiempo LIMIT 5";
                               
                                
				
				
		        
				$cont = $db->run($sql, $bind);
                                
                                if ($cont == 0) {
                                        $db = Null; 
					$db = Db::getInstance();
		     
                                        
                                        
                                       
                                        return "";

                                        

				}
                                
                                
				 else {
					
					$db1 = Db::getInstance();
					$row_p = $db1->fetchAll($sql, $bind);
					 $conty = 0;
				   foreach($row_p as $row_p1) {
					  $conty++;				
					}
					return $row_p;
				}
            
        }
	
	
	public function getOne ($id)
	{
				$db = Db::getInstance();
				$sql = "SELECT * FROM ".$this->tabla." WHERE id = :id LIMIT 1";
    			$bind = array(
        		':id' => $id
    			);
		        
				$cont = $db->run($sql, $bind);
				if ($cont == 0) {
					$row_p = "";
					//echo "NO encontró";
				} else {
					//echo "encontró";
					
					$db1 = Db::getInstance();
					$row_p = $db1->fetchAll($sql, $bind);
				  
					$this->row = $row_p;
				}
	}



	
        static function getMejorTiempo($prueba, $nadador, $competencia = 0, $piscina = 0, $quitar = 0, $fecha = 0, $invalidas=0,$tipofecha=0) {
            
            $db = Db::getInstance();
		     
				$sql = "SELECT com_resultados.*, com_pruebas.id AS prueba, com_pruebas.nombre AS nombre_pru, com_competencias.nombre FROM com_resultados"
                                        ." LEFT JOIN com_pruebas ON com_resultados.prueba = com_pruebas.id "
                                        ." LEFT JOIN com_competencias ON com_resultados.competencia = com_competencias.id "
                                        . "WHERE com_resultados.nadador=:id AND com_resultados.prueba = :prueba";
                                if ($invalidas == 1) {
                                    $sql .= " AND com_competencias.invalida=0";
                                }
                                        
                                $bind = array(
                                    ':id' => $nadador,
                                    ':prueba' => $prueba
    				);
                                /*echo "quitar".$quitar."<br>";
                                echo "tipofecha".$tipofecha."<br>";*/
                                if ($quitar == 0) {
                                    
                                    $sql .= "  AND com_resultados.competencia = :competencia";
                                    $bind[':competencia'] =  $competencia;
                                } else if ($fecha != 0) {
                                              
                                     if ($tipofecha=='1' ) {
                                        $sql .= " AND com_resultados.fecha < :fecha AND com_resultados.competencia <> :competencia";
                                        $bind[':competencia'] =  $competencia;  
                                    } else {
                                        $sql .= " AND com_resultados.fecha >= :fecha";
                                    }
                                    
                                    $bind[':fecha'] =  $fecha;
                                } else {
                                   
                                    $fecha_actual = date("Y-m-d");//resto 1 día
                                    $fecha_tope = date("Y-m-d",strtotime($fecha_actual."- 6 months"));
                                    $sql .= " AND com_resultados.competencia <> :competencia AND com_resultados.fecha >= :fecha";
                                    $bind[':fecha'] =  $fecha_tope;
                                    $bind[':competencia'] =  $competencia;
                                    
                                }
                                
                                if ($piscina != 0) {
                                    $sql .= "  AND com_resultados.piscina = :piscina";
                                    $bind['piscina'] =  $piscina;
                                }
                                
                                                                      
                                        
                                    $sql .= " ORDER BY com_resultados.tiempo LIMIT 1";
                                
                                
					
				/*echo $sql."<br>";
                                print_r($bind);
                                echo "<br><br>";*/
				
		        
				$cont = $db->run($sql, $bind);
                                
                                if ($cont == 0) {
                                       // echo "no encontro nada";

				} else {
					
					$db1 = Db::getInstance();
					$row_p = $db1->fetchAll($sql, $bind);
					 $conty = 0;
				   foreach($row_p as $row_p1) {
					  $conty++;				
					}
                                       // print_r($row_p);
					return $row_p;
				}
            
            
            
        }
        static function getGanadorPrueba($id_origen) {
            
            $db = Db::getInstance();
		     
				$sql = "SELECT sys_Competidor.EventoId FROM sys_Competidor "
                                        . "WHERE sys_Competidor.CompetidorId=:id_origen";
                             
                                    $sql .= " LIMIT 1";
                                
                                
                                $bind = array(
                                    ':id_origen' => $id_origen
    				);
					
				
				
		        
				$cont = $db->run($sql, $bind);
                                
                                if ($cont == 0) {
                                        

				} else {
					
					$db1 = Db::getInstance();
					$row_p = $db1->fetchAll($sql, $bind);
					 
                                        $sql3 = "SELECT sys_Competidor.TiempoFinal FROM sys_Competidor "
                                        . "WHERE sys_Competidor.EventoId=:id_evento AND Posicion = 1";
                             
                                        $sql3 .= " LIMIT 1";


                                        $bind3 = array(
                                            ':id_evento' => $row_p[0]['EventoId']
                                        );




                                        $cont3 = $db->run($sql3, $bind3);

                                        if ($cont3 == 0) {


                                        } else {

                                                $db13 = Db::getInstance();
                                                $row_p3 = $db13->fetchAll($sql3, $bind3);
                                           

                                                return $row_p3[0]['TiempoFinal'];
                                        }
					//return $row_p;
				}
            
            
        }
        
        static function getGanadorPruebaZip($id_origen) {
            
            $db = Db::getInstance();
		     
				$sql = "SELECT Competencia.CompetenciaId FROM Competencia "
                                         ." LEFT JOIN Resultado ON Resultado.CompetenciaId = Competencia.CompetenciaId "
                                        . "WHERE Resultado.ResultadoId=:id_origen";
                             
                                    $sql .= " LIMIT 1";
                                
                                
                                $bind = array(
                                    ':id_origen' => $id_origen
    				);
					
				
				/*echo $sql;
                                print_r($bind);*/
		        
				$cont = $db->run($sql, $bind);
                                
                                if ($cont == 0) {
                                        

				} else {
					
					$db1 = Db::getInstance();
					$row_p = $db1->fetchAll($sql, $bind);
					 
                                        $sql3 = "SELECT Resultado.TiempoFinal FROM Resultado "
                                        . "WHERE Resultado.CompetenciaId=:id_evento AND Resultado.Posicion = 1";
                             
                                        $sql3 .= " LIMIT 1";


                                        $bind3 = array(
                                            ':id_evento' => $row_p[0]['CompetenciaId']
                                        );




                                        $cont3 = $db->run($sql3, $bind3);

                                        if ($cont3 == 0) {


                                        } else {

                                                $db13 = Db::getInstance();
                                                $row_p3 = $db13->fetchAll($sql3, $bind3);
                                           

                                                return $row_p3[0]['TiempoFinal'];
                                        }
					//return $row_p;
				}
            
            
        }
        
        static function getTotNadPru($prueba, $nadador, $competencia) {
            
            $db = Db::getInstance();
		     
				$sql = "SELECT com_resultados.totnadpru FROM com_resultados"
                                        ." LEFT JOIN com_pruebas ON com_resultados.prueba = com_pruebas.id "
                                        ." LEFT JOIN com_competencias ON com_resultados.competencia = com_competencias.id "
                                        . "WHERE com_resultados.nadador=:id AND com_resultados.prueba = :prueba AND com_resultados.competencia = :competencia";
                             
                                    $sql .= " ORDER BY com_resultados.totnadpru DESC LIMIT 1";
                                
                                
                                $bind = array(
                                    ':id' => $nadador,
                                    ':prueba' => $prueba,
                                    ':competencia' => $competencia
    				);
					
				
				
		        
				$cont = $db->run($sql, $bind);
                                
                                if ($cont == 0) {
                                        

				} else {
					
					$db1 = Db::getInstance();
					$row_p = $db1->fetchAll($sql, $bind);
					 $conty = 0;
				   foreach($row_p as $row_p1) {
					  $conty++;				
					}
					return $row_p;
				}
            
            
            
        }
        
        static function getPosicion($prueba, $nadador, $competencia) {
            
            $db = Db::getInstance();
		     
				$sql = "SELECT com_resultados.*, com_pruebas.id AS prueba, com_pruebas.nombre AS nombre_pru, com_competencias.nombre FROM com_resultados"
                                        ." LEFT JOIN com_pruebas ON com_resultados.prueba = com_pruebas.id "
                                        ." LEFT JOIN com_competencias ON com_resultados.competencia = com_competencias.id "
                                        . "WHERE com_resultados.nadador=:id AND com_resultados.prueba = :prueba AND com_resultados.competencia = :competencia";
                             
                                    $sql .= " ORDER BY com_resultados.final DESC LIMIT 1";
                                
                                
                                $bind = array(
                                    ':id' => $nadador,
                                    ':prueba' => $prueba,
                                    ':competencia' => $competencia
    				);
					
				
				
		        
				$cont = $db->run($sql, $bind);
                                
                                if ($cont == 0) {
                                        

				} else {
					
					$db1 = Db::getInstance();
					$row_p = $db1->fetchAll($sql, $bind);
					 $conty = 0;
				   foreach($row_p as $row_p1) {
					  $conty++;				
					}
					return $row_p;
				}
            
            
            
        }
        
        
	
	
		
}