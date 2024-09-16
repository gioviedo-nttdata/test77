<?php

class Asociacion
{
	public $id;
	public $categoria_esp;
	public $categoria_eng;
	public $proyecto;

	public $pag = 1;
	public $limit = 50;
	public $orden = "";
	public $tiporden = "";
	public $total_pages;


	public function __construct()
	{
		// echo "<p>Class X</p>";
		$this->tabla = "com_asociaciones";
	}

	private function getOrden($tabla = 'com_asociaciones')
	{

		$db = Db::getInstance();
		$sql = "SELECT * FROM " . $tabla . " WHERE orden > :id ORDER BY orden DESC LIMIT 1";
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
			foreach ($row_p as $row_p1) {
				$orden = $row_p1['orden'] + 1;
			}
		}

		return sprintf($orden);
	}

	public function agregar()
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

	public function modificar()
	{
		if (empty($this->id)) {
			header("Location: categorias.php");
		} else if (empty($this->categoria_esp)) {
			header("Location: categorias_mod.php?id=" . $this->id);
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


	public function getAll($paginado = 1, $opciones = array())
	{

		$db = Db::getInstance();

		$sql = "SELECT " . $this->tabla . ".*, regiones.region AS regionN FROM " . $this->tabla . " "
			. "LEFT JOIN regiones ON " . $this->tabla . ".region = regiones.id ";

		$sql .= "WHERE " . $this->tabla . ".id > :id";
		$bind = array(
			':id' => '0'
		);
		if (!empty($opciones['region'])) {
			$sql .= " AND " . $this->tabla . ".region = :region";
			$bind[":region"] = $opciones['region'];
		}



		/*$sql .= " AND ".$this->tabla.".externo = :externo AND ".$this->tabla.".estado=0";
                                $bind[":externo"] = $externo;*/

		if (!empty($opciones['asociacion'])) {
			$nombre = $opciones['asociacion'];

			$nombres = explode(" ", $nombre);
			$concatenador = "AND ";
			$conti = 1;

			foreach ($nombres as $word) {
				//if ($conti >1){
				$sql .= " " . $concatenador;
				//    } 
				$sql .= " (asociacion LIKE :asociacion_" . $conti . ")";
				$bind[":asociacion_" . $conti] = "%$word%";
				$conti++;
			}
		}




		if (empty($this->orden)) {
			$orden = "regiones.id, " . $this->tabla . ".asociacion";
		} else {
			$orden = $this->orden;
		}


		if ($this->tiporden == 'desc') {
			$tiporden = " desc";
		} else {
			$tiporden = "";
		}

		/*   echo $sql;
                                print_r($bind);
                                echo "<br><br>";*/



		if ($paginado == 1) {
			$total_results = $db->run($sql, $bind);
			$this->total_results = $total_results;
			$total_pages = ceil($total_results / $this->limit);
			$this->total_pages = $total_pages;


			$starting_limit = ($this->pag - 1) * $this->limit;



			$sql .= " ORDER BY " . $orden . $tiporden . " LIMIT " . $starting_limit . "," . $this->limit;
		} else {
			$sql .= " ORDER BY " . $orden . $tiporden;
		}





		$cont = $db->run($sql, $bind);
		if ($cont == 0) {
			$row_p = "";
		} else {

			$db1 = Db::getInstance();
			$row_p = $db1->fetchAll($sql, $bind);
			$conty = 0;
			foreach ($row_p as $row_p1) {
				$conty++;
			}
			$this->row = $row_p;
		}
	}


	public function getOne($id)
	{
		$db = Db::getInstance();
		$sql = "SELECT * FROM com_asociaciones WHERE id = :id LIMIT 1";
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

	static function contarAsocRegion($region)
	{
		$db = Db::getInstance();
		$sql = "SELECT * FROM com_asociaciones WHERE region = :id";
		$bind = array(
			':id' => $region
		);

		$sql .= " ORDER BY id";
		//echo $sql;
		$cont = $db->run($sql, $bind);

		return $cont;
	}

	static function getLabor($id)
	{

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

	static function getCargos($user)
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

	public function getDocumento($id) {
            
        $db2 = Null;
                                    $db2 = Db::getInstance();
                                    $sql2 = "SELECT * FROM com_asociaciones_documentos WHERE asociacion = :user ORDER BY id";
                                    $bind2 = array(
                                        ':user' => $id
                                    );

                                    $cont = $db2->run($sql2, $bind2);
                                    if ($cont == 0) {
                                            return "";
                                            //echo "NO encontró";
                                    } else {
                                            //echo "encontró";
                                            $db1 = Null;
                                            $db1 = Db::getInstance();
                                            $row_p1 = $db1->fetchAll($sql2, $bind2);

                                            return $row_p1;
                                    }
        
    }

  

	static function getCantDocumento($id) {
            
        $db2 = Null;
                                    $db2 = Db::getInstance();
                                    $sql2 = "SELECT * FROM com_asociaciones_documentos WHERE asociacion = :user ORDER BY id";
                                    $bind2 = array(
                                        ':user' => $id
                                    );

                                    $cont = $db2->run($sql2, $bind2);
                                   
                                            return $cont;
                                    
        
    }

	public function getDirectorio ($id,$tipo) {

		$db2 = Null;
		$db2 = Db::getInstance();
		$sql2 = "SELECT * FROM com_oodd_directorio WHERE ooddId = :user AND tipo = :tipo ORDER BY id";
		$bind2 = array(
			':user' => $id,
			':tipo' => $tipo
		);

		$cont = $db2->run($sql2, $bind2);
		if ($cont == 0) {
				return "";
				//echo "NO encontró";
		} else {
				//echo "encontró";
				$db1 = Null;
				$db1 = Db::getInstance();
				$row_p1 = $db1->fetchAll($sql2, $bind2);

				return $row_p1;
		}

	}


	public function actualizarFechaElecc($id, $fecha)
	{
		if (empty($id) || empty($fecha)) {
			//header("Location: categorias.php");
		
		} else {

			$db = Db::getInstance();
			$data = array(
				'prox_eleccion' => $fecha
			);
			//$db->insert('com_proyectos', $data);

			$db->update('com_asociaciones', $data, 'id = :id', array(':id' => $id));

			
		}
	}

	public function borrarDirectorio($id,$tipo){

		$db = Db::getInstance();
		$db->delete('com_oodd_directorio', "ooddId=:id AND tipo=:tipo" , array(':id' => $id, ':tipo' => $tipo)); 

	}

	public function insertarDirectorio ($id, $tipo, $cargo, $nombre) {

		$db = Db::getInstance();
			$data = array(
				'tipo' => $tipo,
				'ooddId' => $id,
				'cargo' => $cargo,
				'persona' => $nombre
			);
			$db->insert('com_oodd_directorio', $data);

	}
}
