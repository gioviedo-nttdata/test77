<?php
class EntrenadorDocumento
{
    public $id;
    public $entrenador_id;
    public $nombre;
    public $valor;
    public $ext;
    public $tipo;
    public $fecha;
    public $tabla = "com_entrenadores_documentos";
    
    public function __construct($documento = null){
        $this->id = $documento['id'] ?? null;
        $this->entrenador_id = $documento['entrenador_id'] ?? null;
        $this->nombre = $documento['nombre'] ?? null;
        $this->valor = $documento['valor'] ?? null;
        $this->ext = $documento['ext'] ?? null;
        $this->tipo = $documento['tipo'] ?? null;
        $this->fecha = $documento['fecha'] ?? null;
    }                  
        
    public static function getAllByTipo($entrenador_id, $tipo) {
        $db2 = Null;
        $db2 = Db::getInstance();
        $sql2 = "SELECT * FROM com_entrenadores_documentos WHERE entrenador = :entrenador AND tipo = :tipo ORDER BY id";
        $bind2 = array(
            ':entrenador' => $entrenador_id,
            ':tipo' => $tipo
        );

        $cont = $db2->run($sql2, $bind2);
        if ($cont == 0) {
            return "";
        } else {
            $db1 = Null;
            $db1 = Db::getInstance();
            $row_p1 = $db1->fetchAll($sql2, $bind2);
            return $row_p1;
        }
    }

    public static function getOne($id) {
        $db2 = Null;
        $db2 = Db::getInstance();
        $sql2 = "SELECT * FROM com_entrenadores_documentos WHERE id = :id LIMIT 1";
        $bind2 = array(
            ':id' => $id
        );

        $cont = $db2->run($sql2, $bind2);
        if ($cont == 0) {
            return "";
        } else {
            $db1 = Null;
            $db1 = Db::getInstance();
            $row_p1 = $db1->fetchAll($sql2, $bind2);
            return new EntrenadorDocumento($row_p1);
        } 
    }
        
    public function insert() {
        $db = Db::getInstance();
        $data = array(
                        'entrenador' => $this->id,
                        'valor' => $this->valor,
                        'nombre' => $this->nombre,
                        'ext' => $this->ext,
                        'fecha' => date('Y-m-d h:i:s'),
                        'tipo' => $this->tipo
                    ); 
        $db->insert($this->tabla, $data);  
    }
    
    public function delete(){
        $db = Db::getInstance();
        $db->delete($this->tabla, "id=:id" , array(':id' => $this->id));
    }        
		
}