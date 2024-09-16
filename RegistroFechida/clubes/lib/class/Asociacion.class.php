<?php

class Asociacion
{
	public $id;
	public $categoria_esp;
	public $categoria_eng;
	public $proyecto;
	public $orden;
	public $tipoDirectorio=1;
	public $tabla;


    public function __construct()
    {
       // echo "<p>Class X</p>";
	    $this->tabla = "com_asociaciones";
	
    }
	
	private function getOrden($tabla='com_asociaciones')
    {
		
				$db = Db::getInstance();
				$sql = "SELECT * FROM ".$tabla." WHERE orden > :id ORDER BY orden DESC LIMIT 1";
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
		
	public function agregar ()
    {
	   if (empty($this->categoria_esp)) {
		   header("Location: categorias_add.php");
	   } else {
			$this->orden = $this->getOrden();
			$db = Db::getInstance();
			$data = array(
        	'categoria_esp' => $this->categoria_esp,
        	'categoria_eng' => $this->categoria_eng,
			'orden' => $this->orden		
		);
    	$db->insert('com_categorias', $data);
		   
		header("Location: categorias.php");
	   }
		
    }
	
	public function modificar ()
    {
	   if (empty($this->id)) {
		   header("Location: categorias.php");
	   }
		else if (empty($this->categoria_esp)) {
		   header("Location: categorias_mod.php?id=".$this->id);
	   } else {
			
			$db = Db::getInstance();
			$data = array(
        	'categoria_esp' => $this->categoria_esp,
        	'categoria_eng' => $this->categoria_eng	
		);
    	//$db->insert('com_proyectos', $data);
		   
		   $db->update('com_categorias', $data, 'id = :id', array(':id' => $this->id));
		   
		header("Location: categorias.php");
	   }
		
    }
	
	
	public function getAll ()
	{
				$db = Db::getInstance();
				$sql = "SELECT id, asociacion FROM ".$this->tabla." WHERE id > :id";
    			$bind = array(
        		':id' => '0'
    			);
				
				$sql .= " ORDER BY id";
		       //echo $sql;
				$cont = $db->run($sql, $bind);
				if ($cont == 0) {
					return "";
					
				} else {
					
					$db1 = Db::getInstance();
					$row_p = $db1->fetchAll($sql, $bind);
					 $conty = 0;
				   return $row_p;
				}
	}
	
	
	public function getOne ($id)
	{
				$db = Db::getInstance();
				$sql = "SELECT * FROM com_categorias WHERE id = :id LIMIT 1";
    			$bind = array(
        		':id' => $id
    			);
		        
				$cont = $db->run($sql, $bind);
				if ($cont == 0) {
					$row_p = "";
				} else {
					
					$db1 = Db::getInstance();
					$row_p = $db1->fetchAll($sql, $bind);
				   foreach($row_p as $row_p1) {
					     $this->id = $row_p1['id'] ;
						$this->categoria_esp = $row_p1['categoria_esp'] ;
						$this->categoria_eng = $row_p1['categoria_eng'] ;
						$this->orden=$row_p1['orden'] ;
					   
					    
					
						
					}
				}
	}
	
	static function getLabor($id) {
		
		$db = Db::getInstance();
				$sql = "SELECT * FROM com_cargo WHERE id = :id LIMIT 1";
    			$bind = array(
        		':id' => $id
    			);
		        
				$cont = $db->run($sql, $bind);
				if ($cont == 0) {
					$row_p = "";
				} else {
					
					$db1 = Db::getInstance();
					$row_p = $db1->fetchAll($sql, $bind);
				    return $row_p[0]['cargo'];
				}
		
	}
	
	static function getCargos ($user)
	{
			$db = Db::getInstance();
			$sql = "SELECT com_cargos.* FROM com_cargos INNER JOIN com_users_cargo ON com_cargos.id = com_users_cargo.cargo WHERE com_users_cargo.user = :user";
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

	public function actualizarFechaElecc($id, $fecha, $fechaPdf=False)
	{
		if (empty($id) || empty($fecha)) {
			//header("Location: categorias.php");
		
		} else {

			$campo = $fechaPdf ? 'prox_eleccion_pdf' : 'prox_eleccion';
			$db = Db::getInstance();
			$data = array(
				$campo => $fecha
			);
			//$db->insert('com_proyectos', $data);

			$db->update($this->tabla, $data, 'id = :id', array(':id' => $id));

			
		}
	}

	public function borrarDirectorio($id){

		$db = Db::getInstance();
		$db->delete('com_oodd_directorio', "ooddId=:id AND tipo=:tipo" , array(':id' => $id, ':tipo' => $this->tipoDirectorio)); 

	}

	public function insertarDirectorio ($id, $cargo, $nombre) {

		$db = Db::getInstance();
			$data = array(
				'tipo' => $this->tipoDirectorio,
				'ooddId' => $id,
				'cargo' => $cargo,
				'persona' => $nombre
			);
			$db->insert('com_oodd_directorio', $data);

	}
      
		
		
}