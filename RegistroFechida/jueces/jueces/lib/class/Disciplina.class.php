<?php
class Disciplina
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
       $this->tabla = "com_especialidades";
	
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
		
	public function agregar ($categoria,$federacion,$desde,$hasta)
    {
	   if (empty($categoria) or empty($federacion)) {
		   header("Location: categorias.php?err=1");
	   } else {
               
            //$orden = $this->getOrden();
			
			$db = Db::getInstance();
			$data = array(
                            'categoria' => $categoria,
                            'federacion' => $federacion,
                            'desde' => $desde,
                            'hasta' => $hasta
                        );
                        $db->insert($this->tabla, $data);
			$this->id = $db->lastInsertId();
                        $this->asignarNadadores($this->id,$desde,$hasta,$federacion);
		
		
		
	   }
		
    }
	
	
	
	public function modificar ($id,$categoria,$federacion,$desde,$hasta)
    {
	   if (empty($id)) {
		   header("Location: categorias.php");
	   }
		 if (empty($categoria) or empty($federacion)) {
		   header("Location: categorias_mod.php?id=".$id);
	   } else {
		
			$db = Db::getInstance();
			$data = array(
        	'categoria' => $categoria,
                            'federacion' => $federacion,
                            'desde' => $desde,
                            'hasta' => $hasta
		);
    	//$db->insert('com_proyectos', $data);
		   
		   $db->update($this->tabla, $data, 'id = :id', array(':id' => $id));
		   
		header("Location: categorias.php");
	   }
		
    }


	

	
	public function getAll ($federacion = 0)
	{
		      
				$db = Db::getInstance();
		     
					$sql = "SELECT ".$this->tabla.".*, com_federaciones.federacion AS fede_nombre FROM ".$this->tabla." LEFT JOIN com_federaciones ON ".$this->tabla.".federacion = com_federaciones.id WHERE ";
                                        
                                        if ($federacion== 0) {
                                            $sql .= $this->tabla.".id>:id ";
                                            $bind = array(
                                                ':id' => '0'
                                            );
                                        } else {
                                            $sql .= $this->tabla.".federacion=:federacion ";
                                            $bind = array(
                                                ':federacion' => $federacion
                                            );
                                        }
                                        
                                        $sql .= " ORDER BY com_federaciones.federacion, ".$this->tabla.".desde, ".$this->tabla.".hasta";
    				
					
				
		        
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
        
        public function getAllComp ($federacion, $competencia)
	{		      
				$db = Db::getInstance();		     
					$sql = "SELECT ".$this->tabla.".*, com_federaciones.federacion AS fede_nombre, com_competencias_categorias.id AS ca_comp_id FROM ".$this->tabla." "
                                                . "LEFT JOIN com_federaciones ON ".$this->tabla.".federacion = com_federaciones.id "
                                                . "LEFT JOIN com_competencias_categorias ON ".$this->tabla.".id = com_competencias_categorias.categoria "
                                                . "WHERE com_competencias_categorias.competencia = :competencia AND ";                                        
                                        if ($federacion== 0) {
                                            $sql .= $this->tabla.".id>:id ";
                                            $bind = array(
                                                ':id' => '0',
                                                ':competencia' => $competencia
                                            );
                                        } else {
                                            $sql .= $this->tabla.".federacion=:federacion ";
                                            $bind = array(
                                                ':federacion' => $federacion,
                                                ':competencia' => $competencia
                                            );
                                        }
                                        
                                        $sql .= " ORDER BY com_federaciones.federacion, ".$this->tabla.".desde, ".$this->tabla.".hasta";
    				
					
				
		        
				$cont = $db->run($sql, $bind);
				if ($cont == 0) {
					$row_p = "";
				} else {
					
					$db1 = Db::getInstance();
					$row_p = $db1->fetchAll($sql, $bind);
					
					$this->row = $row_p;
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
	
	static function getDisciplina ($id)
	{
			$db = Db::getInstance();
			$sql = "SELECT * FROM com_especialidades WHERE id = :id LIMIT 1";
    			$bind = array(
        		':id' => $id
    			);
				
				/*echo $sql;
				print_r($bind);*/
		        
				$cont = $db->run($sql, $bind);
				if ($cont == 0) {
					return "";
					//echo "NO encontró";
				} else {
					//echo "encontró";
					
					$db1 = Db::getInstance();
					$row_p = $db1->fetchAll($sql, $bind);
				  
					return $row_p[0]['especialidad'];
				}
	}
	
	
	static function getDisciplinas ($user)
	{
			$db = Db::getInstance();
			$sql = "SELECT com_especialidades.* FROM com_especialidades INNER JOIN com_users_disciplina ON com_especialidades.id = com_users_disciplina.disciplina WHERE com_users_disciplina.user = :user";
    			$bind = array(
        		':user' => $user
    			);
				
				/*echo $sql;
				print_r($bind);*/
		        
				$cont = $db->run($sql, $bind);
				if ($cont == 0) {
					return "";
					//echo "NO encontró";
				} else {
					//echo "encontró";
					
					$db1 = Db::getInstance();
					$row_p = $db1->fetchAll($sql, $bind);
				  
					return $row_p;
				}
	}
        
        
	
	
		
}