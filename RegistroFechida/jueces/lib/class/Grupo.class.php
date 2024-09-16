<?php
class Grupo
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
       $this->tabla = "com_grupos";
	
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
		
	public function agregar ($grupo,$entrenador)
    {
	   if (empty($grupo) or empty($entrenador)) {
		   header("Location: grupos.php?err=1");
	   } else {
               
            //$orden = $this->getOrden();
			
			$db = Db::getInstance();
			$data = array(
                            'grupo' => $grupo,
                            'entrenador' => $entrenador
                        );
            $db->insert($this->tabla, $data);
			$this->id = $db->lastInsertId();
		
		header("Location: grupos.php?add=ok");
		
	   }
		
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


	

	
	public function getAll ()
	{
		      
				$db = Db::getInstance();
		     
					$sql = "SELECT ".$this->tabla.".*, com_users.nombre, com_users.apellido FROM ".$this->tabla." LEFT JOIN com_users ON ".$this->tabla.".entrenador = com_users.id WHERE ".$this->tabla.".id>:id ORDER BY grupo";
    				$bind = array(
        			':id' => '0'
    				);
					
				
				/*$total_results = $db->run($sql, $bind);
					$total_pages = ceil($total_results/$this->limit);
					$this->total_pages = $total_pages;


					$starting_limit = ($this->pag-1)*$this->limit;
    				
    				if (empty($this->orden)) {
    					$orden = $this->tabla.".nombre";
    				} else {
    					$orden = $this->orden;
    				}
    				

    				if ($this->tiporden == 'desc') {
    					$tiporden = " desc";
    				} else {
    					$tiporden = "";
    				}

    				$sql .= " ORDER BY ".$orden.$tiporden." LIMIT ".$starting_limit.",". $this->limit; 

                                */
		        
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
        
        static function getOnebyName ($grupo)
	{
				$db = Db::getInstance();
				$sql = "SELECT * FROM com_grupos WHERE grupo = :grupo LIMIT 1";
                                $bind = array(
                                    ':grupo' => $grupo
                                );
		        
				$cont = $db->run($sql, $bind);
				if ($cont == 0) {
					$row_p = "";
					//echo "NO encontró";
				} else {
					//echo "encontró";
					
					$db1 = Db::getInstance();
					$row_p = $db1->fetchAll($sql, $bind);
				  
					return $row_p;
				}
	}
        
        public function getHorarios ()
	{
				$db = Db::getInstance();
				$sql = "SELECT * FROM com_horarios WHERE grupo = :id ORDER BY dia, desde";
                                $bind = array(
                                    ':id' => $this->row[0]['id']
                                );
		        
				$cont = $db->run($sql, $bind);
				if ($cont == 0) {
					$row_p = "";
					//echo "NO encontró";
				} else {
					//echo "encontró";
					
					$db1 = Db::getInstance();
					$row_p = $db1->fetchAll($sql, $bind);
				  
					$this->horario = $row_p;
				}
	}
        
        public function agregarHorario ($grupo,$dia,$desde,$hasta,$actividad)
    {
	   if (empty($grupo) or empty($dia)) {
		   header("Location: grupos_horario.php?err=1&id=".$grupo);
	   } else {
               
            //$orden = $this->getOrden();
			
			$db = Db::getInstance();
			$data = array(
                            'dia' => $dia,
                            'desde' => $desde,
                            'hasta' => $hasta,
                            'actividad' => $actividad,
                            'grupo' => $grupo
                            
                        );
            $db->insert('com_horarios', $data);
			//$this->id = $db->lastInsertId();
		
		//header("Location: grupos.php?add=ok");
		
	   }
           
           
		
    }
    
    public function getHorariosUser($id)	{
				$db = Db::getInstance();
				$sql = "SELECT * FROM com_horarios INNER JOIN com_users ON com_horarios.grupo = com_users.grupo"
                                        . " WHERE com_users.id = :id ORDER BY .com_horarios.dia, com_horarios.desde";
                                $bind = array(
                                    ':id' => $id
                                );
                                
                               /* echo $sql;
                                print_r($bind);*/
		        
				$cont = $db->run($sql, $bind);
				if ($cont == 0) {
					$row_p = "";
					//echo "NO encontró";
				} else {
					//echo "encontró";
					
					$db1 = Db::getInstance();
					$row_p = $db1->fetchAll($sql, $bind);
				  
					$this->horario = $row_p;
				}
	}



	
	
	
	
		
}