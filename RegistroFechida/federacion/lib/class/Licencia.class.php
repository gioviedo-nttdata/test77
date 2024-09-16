<?php

class Licencia
{
	public $id;
	public $categoria_esp;
	public $categoria_eng;
	public $proyecto;
	public $orden;


    public function __construct()
    {
       // echo "<p>Class X</p>";
	    $this->tabla = "com_periodos";
	
    }
	
	
		
	public function agregar ()
    {
	   if (empty($this->categoria_esp)) {
		   
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
				$sql = "SELECT * FROM ".$this->tabla." WHERE id > :id";
    			$bind = array(
        		':id' => '0'
    			);
				
				$sql .= " ORDER BY id";
		       //echo $sql;
				$cont = $db->run($sql, $bind);
				if ($cont == 0) {
					$this->row = "";
					
				} else {
					
					$db1 = Db::getInstance();
					$row_p = $db1->fetchAll($sql, $bind);
					 $conty = 0;
				  	 return $row_p;
				}
	}
	
	
	static function getOne ($id)
	{
				$db = Db::getInstance();
				$sql = "SELECT * FROM com_periodos WHERE id = :id LIMIT 1";
    			$bind = array(
        		':id' => $id
    			);
		        
				$cont = $db->run($sql, $bind);
				if ($cont == 0) {
					$row_p = "";
				} else {
					
					$db1 = Db::getInstance();
					$row_p = $db1->fetchAll($sql, $bind);
                    return $row_p;
				  
				}
	}

    static function getOneActivo ()
	{
				$db = Db::getInstance();
				$sql = "SELECT * FROM com_periodos WHERE vigente = :id LIMIT 1";
    			$bind = array(
        		':id' => 1
    			);
		        
				$cont = $db->run($sql, $bind);
				if ($cont == 0) {
					$row_p = "";
				} else {
					
					$db1 = Db::getInstance();
					$row_p = $db1->fetchAll($sql, $bind);
                    return $row_p[0];
				  
				}
	}

	
      
		
		
}