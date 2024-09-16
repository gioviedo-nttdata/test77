<?php

class Torneo
{
	public $id;
	public $nombre;
	public $lugar;
	public $ciudad;
	public $organizador;
	public $persona_a_cargo;
	public $telefono;
	public $email;
	public $notas;
	public $id_juez;
	public $id_disciplina;
	public $id_user;
	public $tipo_user;
	public $estado = 0;
	public $fecha_desde;
	public $fecha_hasta;
	public $fecha_alta;
	public $tabla = "com_torneos_solicitudes";
	const PREFIX_DOC = 'ST';
	const FOLDERS_DOC = ['','asociacion','clubes'];

	public function __construct(array $data) {
        $this->assignAttributes($data);
    }
	
	public static function getAll($id_user=null, $tipo_user=null, $estado=null){
		$db2 = Null;
        $db2 = Db::getInstance();
        $sql2 = "SELECT 
					com_torneos_solicitudes.*,
					CASE 
						WHEN com_torneos_solicitudes.tipo_user = 2 THEN CONCAT('Club: ', com_clubes.club)
						WHEN com_torneos_solicitudes.tipo_user = 1 THEN CONCAT('Asociación: ', com_asociaciones.asociacion)
					END AS tipo,
					CONCAT(com_jueces.nombre, ' ', com_jueces.apellido) AS juez,
					com_especialidades.especialidad AS disciplina,
					CONCAT(com_torneos_solicitudes.lugar, ' <br> Ciudad: ', com_torneos_solicitudes.ciudad) AS lugar_ciudad,
					CONCAT(com_torneos_solicitudes.id, '|', com_torneos_solicitudes.estado) AS estado_torneo,
					CONCAT(persona_a_cargo, ' <br> E-mail: ', com_torneos_solicitudes.email,' <br> Tel: ', com_torneos_solicitudes.telefono) AS info_persona_a_cargo,
					GROUP_CONCAT(CONCAT('<a class=down_doc data-type=torneo|',com_torneos_documentos.id, '|', com_torneos_solicitudes.tipo_user, '>', com_torneos_documentos.nombre, '.', com_torneos_documentos.ext,'</a>') SEPARATOR '<br>') AS documentos
				FROM 
					com_torneos_solicitudes
				LEFT JOIN 
					com_jueces ON com_torneos_solicitudes.id_juez = com_jueces.id
				LEFT JOIN 
					com_clubes ON com_torneos_solicitudes.id_user = com_clubes.id
				LEFT JOIN 
					com_asociaciones ON com_torneos_solicitudes.id_user = com_asociaciones.id
				LEFT JOIN
					com_especialidades ON com_torneos_solicitudes.id_disciplina = com_especialidades.id
				LEFT JOIN
    				com_torneos_documentos ON com_torneos_documentos.torneo = com_torneos_solicitudes.id
				WHERE 
					com_torneos_solicitudes.tipo_user IN (1, 2) 
				";
		$bind = [];

		if($id_user && $tipo_user){
			$sql2.=' AND com_torneos_solicitudes.id_user=:id_user AND com_torneos_solicitudes.tipo_user=:tipo_user';
			$bind = array(
				':id_user' => $id_user,
				':tipo_user' => $tipo_user
			);
		}

		if($estado!==null){
			$sql2.=' AND com_torneos_solicitudes.estado=:estado ';
			$bind = array_merge(array(
				':estado' => $estado
			),$bind);
		}

		$sql2.=" GROUP BY com_torneos_solicitudes.id;";

        $cont = $db2->run($sql2, $bind);
        if ($cont == 0) {
            return [];
        } else {
            $db1 = Null;
            $db1 = Db::getInstance();
            $row_p1 = $db1->fetchAll($sql2, $bind);
            return $row_p1;
        }
	}

	public static function getOne($id){
		$db2 = Null;
        $db2 = Db::getInstance();
        $sql2 = "SELECT * FROM com_torneos_solicitudes WHERE id=:id";
		$bind = array(
			':id' => $id
		);

        $cont = $db2->run($sql2, $bind);
        if ($cont == 0) {
            return null;
        } else {
            $db1 = Null;
            $db1 = Db::getInstance();
            $row_p1 = $db1->fetchAll($sql2, $bind);
            return new Torneo($row_p1[0]);
        }
	}

	public static function setEstado($estado, $id){
		$db = Db::getInstance();
		$db->update("com_torneos_solicitudes", array('estado' => $estado), 'id=:id', array(':id' => $id)); 
	}

	public function delete(){
		$db = Db::getInstance();
		$db->delete($this->tabla, 'id=:id', array(':id' => $this->id)); 
	}

	public function insert() {
		$db = Db::getInstance();
		$data = array(
			'nombre' => $this->nombre,
			'lugar' => $this->lugar,
			'ciudad' => $this->ciudad,
			'organizador' => $this->organizador,
			'persona_a_cargo' => $this->persona_a_cargo,
			'telefono' => $this->telefono,
			'email' => $this->email,
			'notas' => $this->notas,
			'id_disciplina' => $this->id_disciplina,
			'id_juez' => $this->id_juez,
			'id_user' => $this->id_user,
			'tipo_user' => $this->tipo_user,
			'fecha_desde' => $this->fecha_desde,
			'fecha_hasta' => $this->fecha_hasta
		);
		
		$db->insert($this->tabla, $data);
		$this->id = $db->lastInsertId();
	}

	public function update() {
		$db = Db::getInstance();
		$data = array(
			'nombre' => $this->nombre,
			'lugar' => $this->lugar,
			'ciudad' => $this->ciudad,
			'organizador' => $this->organizador,
			'persona_a_cargo' => $this->persona_a_cargo,
			'telefono' => $this->telefono,
			'email' => $this->email,
			'notas' => $this->notas,
			'id_juez' => $this->id_juez,
			'fecha_desde' => $this->fecha_desde,
			'fecha_hasta' => $this->fecha_hasta
		);
		
		$db->update($this->tabla, $data, 'id=:id', array(':id'=>$this->id));
	}

	public function getDocumentos(){
		$db2 = Null;
        $db2 = Db::getInstance();
        $sql2 = "SELECT * FROM com_torneos_documentos WHERE torneo=:torneo";
		$bind = array(
			':torneo' => $this->id
		);

        $cont = $db2->run($sql2, $bind);
        if ($cont == 0) {
            return [];
        } else {
            $db1 = Null;
            $db1 = Db::getInstance();
            $row_p1 = $db1->fetchAll($sql2, $bind);
            return $row_p1;
        }
	}

	public static function getDocumento($id){
		$db2 = Null;
        $db2 = Db::getInstance();
        $sql2 = "SELECT *,
		CONCAT('ST', torneo, '_', valor, '.', ext) AS full_name,
		CONCAT(nombre, '.', ext) AS full_name_original
		  FROM com_torneos_documentos WHERE id=:id";
		$bind = array(
			':id' => $id
		);

        $cont = $db2->run($sql2, $bind);
        if ($cont == 0) {
            return [];
        } else {
            $db1 = Null;
            $db1 = Db::getInstance();
            $row_p1 = $db1->fetchAll($sql2, $bind);
            return $row_p1[0];
        }
	}

	public function insertDocumento($valor,$nombre,$ext) {
		$db = Db::getInstance();
		$data = array(
						'torneo' => $this->id,
						'valor' => $valor,
						'nombre' => $nombre,
						'ext' => $ext
					);
		$db->insert('com_torneos_documentos', $data);		
	}

	public function assignAttributes(array $data) {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                if($value) $this->$key = $value;
            }
        }
    }
		
}