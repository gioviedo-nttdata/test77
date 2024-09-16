<?php
class Licencia
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
       $this->tabla = "com_licencia";
	
    }
	
    public function getPeriodoActual() {

        $db = Db::getInstance();
			$sql = "SELECT * FROM com_periodos WHERE vigente = :vigente LIMIT 1";
    			$bind = array(
        		':vigente' => '1'
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


    static function getUserLicencia($user, $periodo) {

        $db = Db::getInstance();
			$sql = "SELECT * FROM com_licencias WHERE user = :user AND  periodo = :periodo ORDER BY pagado DESC LIMIT 1";
    			$bind = array(
                ':user' => $user,
                ':periodo' => $periodo
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

    public function generarPago($club) {

        $clave = uniqid();

        $db = Db::getInstance();
			$data = array(
                            'club' => $club,
                            'clave' => $clave,
                            'fecin' => date('Y-m-d H:i:s')
                        );
                        $db->insert('com_licencias_pago', $data);
                        return $db->lastInsertId();
            

    }


    public function agregarNadPago($periodo, $nadador,$idpago) {

        //$clave = uniqid();

        $db = Db::getInstance();
			$data = array(
                            'user' => $nadador,
                            'periodo' => $periodo,
                            'fecin' => date('Y-m-d H:i:s'),
                            'idpago' => $idpago
                        );
                        $db->insert('com_licencias', $data);
                        $db->lastInsertId();
            

    }

    public function getPagoActivo($id, $club) {

        $db = Db::getInstance();
			$sql = "SELECT * FROM com_licencias_pago WHERE id = :id AND club = :club LIMIT 1";
    			$bind = array(
                ':id' => $id,
                ':club' => $club
    			);
		        
				$cont = $db->run($sql, $bind);
				if ($cont == 0) {
					$row_p = "";
					//echo "NO encontró";
				} else {
					//echo "encontró";
					
					$db1 = Db::getInstance();
					$row_p = $db1->fetchAll($sql, $bind);
				  
					return $row_p[0];
				}
    }

    public function updatePagoTrans($club, $idpago) {

        $data = array(
            'comprobante' => '1'
        );
        
        $db = Db::getInstance();
        $db->update('com_licencias_pago', $data, 'id = :id', array(':id' => $idpago));


    }

    public function getPagoAtletas($id) {

        $db = Db::getInstance();
			$sql = "SELECT com_licencias.*, com_users.nombre, com_users.apellido, com_users.apellido2, com_users.rut FROM com_licencias INNER JOIN com_users ON com_users.id = com_licencias.user WHERE com_licencias.idpago = :id";
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
				  
					return $row_p;
				}


    }


    public function actualizarMonto($idpago, $monto) {

        $data = array(
            'monto' => $monto
        );
        
        $db = Db::getInstance();
        $db->update('com_licencias_pago', $data, 'id = :id', array(':id' => $idpago));


    }


    public function updatePago($club, $idpago, $pago) {

		$unique = uniqid();

		$data = array(
			'tipopago' => $pago
	);
	
	$db = Db::getInstance();
	$db->update('com_licencias_pago', $data, 'id = :id and club = :club', array(':id' => $idpago,':club' => $club));

	}
	
	
	
	
		
}