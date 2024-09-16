<?php
class Documento
{
	public $id;
	public $titulo;
	public $imagen;
	public $tabla;

	public $estado;
	public $row;

	public $pag = 1;
	public $limit = 25;
	public $orden = "";
	public $tiporden = "";
	public $total_pages;
	
	public $img_ppl;
	
	public $cnt_img_ppl;
	
	private $interfaz;


    public function __construct($interfaz=0)
    {
       $this->interfaz = $interfaz;
       $this->tabla = "com_competencias";
	
    }
	

		
	public function agregar ($datosN = array())
    {

	   if (empty($datosN['nombre'])) {
		   header("Location: competencias_add.php?err=1");
	   } else {
               if (empty($datosN['max_pruebas'])) {
                   $datosN['max_pruebas'] = 0;
               }
               if (empty($datosN['max_jornadas'])) {
                   $datosN['max_jornadas'] = 0;
               }
               
			$db = Db::getInstance();
			$data = array(
                            'nombre' => $datosN['nombre'],
                            'abre' => $datosN['abre'],
                            'lugar' => $datosN['lugar'],
                            'piscina' => $datosN['piscina'],
                            'federacion' => $datosN['federacion'],
                            'desde' => $datosN['desde'],
                            'hasta' => $datosN['hasta'],
                            'local' => $datosN['local'],
                            'bus' => $datosN['bus'],
                            'alojamiento' => $datosN['alojamiento'],
                            'notas' => $datosN['notas'],
                            'max_pruebas' => $datosN['max_pruebas'],
                            'max_jornadas' => $datosN['max_jornadas']
                        );
                        
                        
                $db->insert($this->tabla, $data);
		$this->id = $db->lastInsertId();
                
                
	   }
		
    }
    

        
        public function getAll($id) {
            
            $db2 = Null;
                                        $db2 = Db::getInstance();
                                        $sql2 = "SELECT * FROM com_clubes_documentos WHERE club = :club ORDER BY id";
                                        $bind2 = array(
                                            ':club' => $id
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
        public function getDocumentoOne($id) {
            
            $db2 = Null;
                                        $db2 = Db::getInstance();
                                        $sql2 = "SELECT * FROM com_clubes_documentos WHERE id = :id LIMIT 1";
                                        $bind2 = array(
                                            ':id' => $id
                                        );

                                        $cont = $db2->run($sql2, $bind2);
                                        if ($cont == 0) {
                                                $row_p = "";
                                                //echo "NO encontró";
                                        } else {
                                                //echo "encontró";
                                                $db1 = Null;
                                                $db1 = Db::getInstance();
                                                $row_p1 = $db1->fetchAll($sql2, $bind2);

                                                //$this->row[0]['doc'] = $row_p1;
                                                return $row_p1;
                                        }
            
        }
        
        public function guardarDoc($id, $valor, $nombre, $ext) {
            $db = Db::getInstance();
			$data = array(
                            'club' => $id,
                            'valor' => $valor,
                            'nombre' => $nombre,
                            'ext' => $ext,
							'fecha' => date('Y-m-d h:i:s')
                        );
                        
                        
                $db->insert('com_clubes_documentos', $data);
		//$this->id = $db->lastInsertId();
            
        }
        
        
        
        public function elimDocu($id){
            $db = Db::getInstance();
            $db->delete('com_clubes_documentos', "competencia=:id" , array(':id' => $id));
    
        }
        
		
}