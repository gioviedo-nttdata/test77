<?php
class Usuario
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
    public $usuario;

    public $img_ppl;

    public $cnt_img_ppl;

    private $interfaz;


    public function __construct($interfaz = 0)
    {
        $this->interfaz = $interfaz;
        $this->tabla = "com_users";
    }



    public function agregar($club, $rut, $nombre, $apellido, $apellido2, $email, $roles, $datosN = array())
    {
        $rut = str_replace(".", "", $rut);
        $rut_pass = explode("-", $rut);
        $pass = sha1(md5(trim($rut_pass[0])));
        if (empty($nombre) or empty($rut)) {
            header("Location: usuarios.php?err=1");
        } else {
            $elrow = $this->getOneByRutExt($rut);
            //echo "el row".$elrow;
            if (empty($elrow)) {

                //echo "entra aqui";
                $telf = str_replace("-", "", $datosN['telefono']);
                $telf = str_replace(" ", "", $telf);
                //$pass = uniqid();
                $db = Db::getInstance();
                $data = array(
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'apellido2' => $apellido2,
                    'email' => $email,
                    'rut' => $rut,
                    'pass' => $pass,
                    'genero' => $datosN['genero'],
                    'fecnac' => $datosN['fecnac'],
                    'direccion' => $datosN['direccion'],
                    'telefono' => $telf,
                    'nivel' => '4',
                    'nadador' => $roles['nadador'],
                    'entrenador' => $roles['entrenador'],
                    'sysadmin' => $roles['sysadmin'],
                    'tesorero' => $roles['tesorero'],
                    'apoderado' => $roles['apoderado'],
                    'fecin' => date('Y-m-d H:i:s'),
                    'notas' => $datosN['notas'],
                    'externo' => $datosN['externo'],

                    'club' => $club
                );
                if ($roles['nadador'] == '1') {

                    $data['disciplina'] = $datosN['disciplina'];
                }

                $db->insert($this->tabla, $data);
                $this->id = $db->lastInsertId();

                if ($roles['entrenador'] == '1') {

                    foreach ($datosN['disciplina'] as $disci) {
                        $this->asignarDisciplina($this->id, $disci);
                    }

                    foreach ($datosN['cargo'] as $carg) {
                        $this->asignarCargo($this->id, $carg);
                    }
                }


                if ($roles['nadador'] == '1') {
                    $this->asignarCategoria($this->id);
                }
            } else {
                //header("Location: usuarios.php?err=2");
                return "err2";
            }
            //header("Location: usuarios_up.php?id=".$this->id);
            // header("Location: usuarios.php");
        }
    }


    public function asignarDisciplina($user, $disciplina)
    {

        $db = Null;
        $db = Db::getInstance();
        $data = array(
            'user' => $user,
            'disciplina' => $disciplina
        );


        $db->insert('com_users_disciplina', $data);
    }

    public function asignarCargo($user, $cargo)
    {

        $db = Null;
        $db = Db::getInstance();
        $data = array(
            'user' => $user,
            'cargo' => $cargo
        );


        $db->insert('com_users_cargo', $data);
    }


    public function modificar($id, $rut, $nombre, $apellido, $email, $roles, $datosN = array())
    {
        if (empty($id)) {
            header("Location: usuarios.php");
        } else {
            $rut = str_replace(".", "", $rut);
            $telf = str_replace("-", "", $datosN['telefono']);
            $telf = str_replace(" ", "", $telf);

            $db = Db::getInstance();
            if ($datosN['origen'] == 'misdatos') {
                $data = array(
                    'email' => $email,
                    'direccion' => $datosN['direccion'],
                    'telefono' => $telf
                );
            } else {
                if (empty($nombre) or empty($apellido) or empty($rut)) {
                    header("Location: usuarios_mod.php?id=" . $id);
                    die();
                } else {

                    $data = array(
                        'nombre' => $nombre,
                        'apellido' => $apellido,
                        'email' => $email,
                        'rut' => $rut,
                        'genero' => $datosN['genero'],
                        'fecnac' => $datosN['fecnac'],
                        'direccion' => $datosN['direccion'],
                        'telefono' => $telf,
                        'entrenador' => $roles['entrenador'],
                        'sysadmin' => $roles['sysadmin'],
                        'tesorero' => $roles['tesorero'],
                        'apoderado' => $roles['apoderado'],
                        'notas' => $datosN['notas']
                    );
                    if ($roles['nadador'] == '1') {
                        $data['licencia'] = $datosN['licencia'];
                        $data['grupo'] = $datosN['grupo'];
                    }
                }
            }

            if ($roles['nadador'] == '1') {

                $data['colegio'] = $datosN['colegio'];
            }

            //print_r($data);
            //$db->insert('com_proyectos', $data);

            $db->update($this->tabla, $data, 'id = :id', array(':id' => $id));

            if ($roles['nadador'] == '1') {
                $this->asignarCategoria($id);
            }


            //header("Location: usuarios.php");
        }
    }


    public function modificarPass()
    {
        if (empty($this->id)) {
            header("Location: usuarios.php");
        } else if (empty($this->pass)) {
            header("Location: usuarios_mod.php?id=" . $this->id);
        } else {

            $db = Db::getInstance();
            $data = array(
                'pass' => $this->pass
            );
            //$db->insert('com_proyectos', $data);

            $db->update($this->tabla, $data, 'id = :id', array(':id' => $this->id));

            header("Location: usuarios.php");
        }
    }

    public function cambiarEstado($id, $st)
    {
        if (empty($id)) {
            header("Location: nadadores.php");
        } else {

            $db = Db::getInstance();
            $data = array(
                'estado' => $st
            );
            //$db->insert('com_proyectos', $data);

            $db->update($this->tabla, $data, 'id = :id', array(':id' => $id));

            //header("Location: usuarios.php");
        }
    }

    public function actualizarFoto($valor, $id)
    {

        $db = Db::getInstance();
        $data = array(
            'imagen' => $valor
        );


        $db->update($this->tabla, $data, 'id = :id', array(':id' => $id));
    }

    public function agregarApoderado($id, $rut)
    {
        $elrow = $this->getOneByRutExt($rut, 'nadador');
        if (!empty($elrow)) {

            $db = Null;
            $db = Db::getInstance();
            $sql = "SELECT * FROM com_apoderados WHERE apoderado = :apoderado AND nadador = :nadador LIMIT 1";
            $bind = array(
                ':apoderado' => $id,
                ':nadador' => $elrow[0]['id']
            );
            /*echo $sql."<br>";
                        print_r($bind);*/

            $cont = $db->run($sql, $bind);

            //echo "contador de apoderados /nadador:".$cont;
            if ($cont == 0) {
                $db1 = Null;
                $db1 = Db::getInstance();
                $data1 = array(
                    'apoderado' => $id,
                    'nadador' => $elrow[0]['id'],
                );


                $db1->insert('com_apoderados', $data1);
            } else {
                //echo "encontró, no hace nada";


            }
        }
    }
    public function deleteApoderado($id, $nadador)
    {
        // echo "<br>apoderado: ".$id." nadador:".$nadador;
        $db = Db::getInstance();
        $db->delete('com_apoderados', "apoderado=:id AND nadador=:nadador", array(':id' => $id, ':nadador' => $nadador));
    }

    public function getAll($paginado = 1, $tipo = 'todos', $disciplina, $tipoLimit = '', $externo = 0, $opciones = array(), $club = '0')
    {

        $db = Db::getInstance();

        $sql = "SELECT DISTINCT com_users.id, " . $this->tabla . ".*, com_especialidades.especialidad, com_clubes.club AS clubN,  com_clubes.region AS regionN FROM " . $this->tabla . " "
            . "LEFT JOIN com_especialidades ON com_users.disciplina = com_especialidades.id "
            . "LEFT JOIN com_clubes ON com_users.club = com_clubes.id ";

            if ($tipo == 'entrenador') {
                $sql .= "LEFT JOIN com_users_disciplina ON com_users.id = com_users_disciplina.user ";
            }

        $sql .= "WHERE " . $this->tabla . ".id > :id";
        $bind = array(
            ':id' => '0'
        );
        if (!empty($disciplina) && $tipo == 'entrenador') {
            $sql .= " AND com_users_disciplina.disciplina = :disciplina";
            $bind[":disciplina"] = $disciplina;
        }
        else if (!empty($disciplina)) {
            $sql .= " AND " . $this->tabla . ".disciplina = :disciplina";
            $bind[":disciplina"] = $disciplina;
        }
        if (!empty($opciones['region'])) {
            $sql .= " AND com_clubes.region = :region";
            $bind[":region"] = $opciones['region'];
        }

        if (!empty($club)) {
            $sql .= " AND " . $this->tabla . ".club = :club";
            $bind[":club"] = $club;
        }


        $sql .= " AND " . $this->tabla . ".externo = :externo AND " . $this->tabla . ".estado=0";
        $bind[":externo"] = $externo;

        if (!empty($opciones['nombre'])) {
            $nombre = $opciones['nombre'];
            $nombre = str_replace(", ", ",", $nombre);
            $nombre = str_replace(",", " ", $nombre);
            $nombres = explode(" ", $nombre);
            $concatenador = "AND ";
            $conti = 1;

            foreach ($nombres as $word) {
                //if ($conti >1){
                $sql .= " " . $concatenador;
                //    } 
                $sql .= " (nombre LIKE :nombre_" . $conti . " OR apellido LIKE :nombre_" . $conti . ")";
                $bind[":nombre_" . $conti] = "%$word%";
                $conti++;
            }
        }

        if (!empty($opciones['genero'])) {
            $sql .= " AND " . $this->tabla . ".genero = :genero";
            $bind[":genero"] = $opciones['genero'];
        }

        if (!empty($opciones['ano'])) {
            $sql .= " AND YEAR(" . $this->tabla . ".fecnac) = :ano";
            $bind[":ano"] = $opciones['ano'];
        }


        if ($tipo != 'todos' and !empty($tipo)) {
            $tipos = explode("-", $tipo);
            $countipo = count($tipos);
            $contador = 1;
            $sql .= " AND (";
            foreach ($tipos as $tipUser) {
                $sql .= $this->tabla . "." . $tipUser . " = :" . $tipUser;
                if ($contador < $countipo) {
                    $sql .= " or ";
                }
                $bind[":" . $tipUser] = '1';
                $contador++;
            }
            $sql .= ")";
        }

        if (empty($this->orden)) {
            $orden = $this->tabla . ".apellido, " . $this->tabla . ".nombre";
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
    

    public function getLicenciasPagos($paginado = 1, $estado=0, $tipo=0, $periodo=0) {


        $db = Db::getInstance();
        $bind = array();
       

        $sql = "SELECT com_licencias_pago.*, com_clubes.id AS clubid, com_clubes.club AS clubN FROM com_licencias_pago LEFT JOIN com_clubes ON com_licencias_pago.club = com_clubes.id  WHERE com_licencias_pago.id > :id";
        $bind[":id"] = '0';

        if ($estado == 0) {
            $sql .= " AND com_licencias_pago.pago = 0 AND com_licencias_pago.tipopago = 1 AND com_licencias_pago.comprobante = 1";
        } else  { 
            $sql .= " AND com_licencias_pago.pago > 0 "; 
        }

        if ($periodo > 0) {
            $sql .= " AND com_licencias_pago.periodo = :periodo "; 
            $bind[":periodo"] = $periodo;
        }

        //if (!empty($periodo)) {}


        if (empty($this->orden)) {
            $orden = "com_licencias_pago.fecin";
        } else {
            $orden = $this->orden;
        }


        if ($this->tiporden == 'desc') {
            $tiporden = " desc";
        } else {
            $tiporden = "";
        }

        if ($paginado == 1) {
            $total_results = $db->run($sql,$bind);
            $this->total_results = $total_results;
            $total_pages = ceil($total_results / $this->limit);
            $this->total_pages = $total_pages;


            $starting_limit = ($this->pag - 1) * $this->limit;



            $sql .= " ORDER BY " . $orden . $tiporden . " LIMIT " . $starting_limit . "," . $this->limit;
        } else {
            $sql .= " ORDER BY " . $orden . $tiporden;
        }

        /*

        echo $sql;
        print_r($bind);

        */


        $cont = $db->run($sql,$bind);
        if ($cont == 0) {
            $row_p = "";
        } else {

            $db1 = Db::getInstance();
            $row_p = $db1->fetchAll($sql,$bind);
            $conty = 0;
            foreach ($row_p as $row_p1) {
                $conty++;
            }
            $this->row = $row_p;
        }

        



    }
    // las licencias
    public function getAllLicencias($paginado = 1, $tipo = 'todos', $disciplina, $tipoLimit = '', $externo = 0, $opciones = array(), $club = '0', $periodo)
    {

        $db = Db::getInstance();

        $sql = "SELECT DISTINCT com_users.id, " . $this->tabla . ".*, com_especialidades.especialidad, com_clubes.club AS clubN,  com_clubes.region AS regionN FROM " . $this->tabla . " "
            . "LEFT JOIN com_especialidades ON com_users.disciplina = com_especialidades.id "
            . "LEFT JOIN com_clubes ON com_users.club = com_clubes.id "
            . "INNER JOIN com_licencias ON com_users.id = com_licencias.user ";

            if ($tipo == 'entrenador') {
                $sql .= "LEFT JOIN com_users_disciplina ON com_users.id = com_users_disciplina.user ";
            }

        $sql .= "WHERE " . $this->tabla . ".id > :id AND com_licencias.periodo = :periodo AND com_licencias.pagado = 1";
        $bind = array(
            ':id' => '0',
            ':periodo' => $periodo
        );
        if (!empty($disciplina) && $tipo == 'entrenador') {
            $sql .= " AND com_users_disciplina.disciplina = :disciplina";
            $bind[":disciplina"] = $disciplina;
        }
        else if (!empty($disciplina)) {
            $sql .= " AND " . $this->tabla . ".disciplina = :disciplina";
            $bind[":disciplina"] = $disciplina;
        }
        if (!empty($opciones['region'])) {
            $sql .= " AND com_clubes.region = :region";
            $bind[":region"] = $opciones['region'];
        }

        if (!empty($club)) {
            $sql .= " AND " . $this->tabla . ".club = :club";
            $bind[":club"] = $club;
        }


        $sql .= " AND " . $this->tabla . ".externo = :externo AND " . $this->tabla . ".estado=0";
        $bind[":externo"] = $externo;

        if (!empty($opciones['nombre'])) {
            $nombre = $opciones['nombre'];
            $nombre = str_replace(", ", ",", $nombre);
            $nombre = str_replace(",", " ", $nombre);
            $nombres = explode(" ", $nombre);
            $concatenador = "AND ";
            $conti = 1;

            foreach ($nombres as $word) {
                //if ($conti >1){
                $sql .= " " . $concatenador;
                //    } 
                $sql .= " (nombre LIKE :nombre_" . $conti . " OR apellido LIKE :nombre_" . $conti . ")";
                $bind[":nombre_" . $conti] = "%$word%";
                $conti++;
            }
        }

        if (!empty($opciones['genero'])) {
            $sql .= " AND " . $this->tabla . ".genero = :genero";
            $bind[":genero"] = $opciones['genero'];
        }

        if (!empty($opciones['ano'])) {
            $sql .= " AND YEAR(" . $this->tabla . ".fecnac) = :ano";
            $bind[":ano"] = $opciones['ano'];
        }


        if ($tipo != 'todos' and !empty($tipo)) {
            $tipos = explode("-", $tipo);
            $countipo = count($tipos);
            $contador = 1;
            $sql .= " AND (";
            foreach ($tipos as $tipUser) {
                $sql .= $this->tabla . "." . $tipUser . " = :" . $tipUser;
                if ($contador < $countipo) {
                    $sql .= " or ";
                }
                $bind[":" . $tipUser] = '1';
                $contador++;
            }
            $sql .= ")";
        }

        if (empty($this->orden)) {
            $orden = $this->tabla . ".apellido, " . $this->tabla . ".nombre";
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

    public function getOneLicencias($id)
    {

        $db = Db::getInstance();

        $sql = "SELECT DISTINCT com_users.id, " . $this->tabla . ".*, com_especialidades.especialidad, com_clubes.club AS clubN,  com_clubes.region AS regionN FROM " . $this->tabla . " "
            . "LEFT JOIN com_especialidades ON com_users.disciplina = com_especialidades.id "
            . "LEFT JOIN com_clubes ON com_users.club = com_clubes.id "
            . "INNER JOIN com_licencias ON com_users.id = com_licencias.user ";

          

        $sql .= "WHERE com_licencias.idpago =:id";
        $bind = array(
            ':id' => $id
        );

       


        if (empty($this->orden)) {
            $orden = $this->tabla . ".apellido, " . $this->tabla . ".nombre";
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



            //$sql .= " LIMIT 1";
       





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


    public function licenciaAprobarPago($id)
    {
        if (empty($id)) {
            header("Location: licencias_pagos.php");
        
        } else {

            $db = Db::getInstance();
            $data = array(
                'pago' => 1
            );
            //$db->insert('com_proyectos', $data);

            $db->update('com_licencias_pago', $data, 'id = :id', array(':id' => $id));


            $db0 = Db::getInstance();
            $data0 = array(
                'pagado' => 1
            );
            //$db->insert('com_proyectos', $data);

            $db0->update('com_licencias', $data0, 'idpago = :id', array(':id' => $id));

            header("Location: licencias_pagos.php");
        }
    }
	
	
	static function getLicenciaByUser($user, $periodo) {
		
		$sql = "SELECT * FROM com_licencias WHERE com_licencias.user = :user AND com_licencias.periodo = :periodo AND pagado = 1 LIMIT 1";
        $bind = array(
            ':user' => $user,
			':periodo' => $periodo
        );       



        $db = Db::getInstance();

        $cont = $db->run($sql, $bind);

        return $cont;
		
	}


    // fin licencias

    static function anoNadador($tipo)
    {
        if ($tipo == 'max') {
            $tipoOrden = " DESC";
        } else {
            $tipoOrden = "";
        }
        $db = Db::getInstance();
        $sql = "SELECT YEAR(com_users.fecnac) AS ano FROM com_users WHERE nadador = 1 ORDER BY fecnac" . $tipoOrden . " LIMIT 1";

        $cont = $db->run($sql);
        if ($cont == 0) {
            return "";
        } else {

            $db1 = Db::getInstance();
            $row_p = $db1->fetchAll($sql);
            $conty = 0;

            return $row_p[0]['ano'];
        }
    }

    static function getAtletas($club, $disciplina)
    {

        $sql = "SELECT com_users.*, com_especialidades.especialidad FROM com_users "
            . "LEFT JOIN com_especialidades ON com_users.nadador = com_especialidades.id ";

        $sql .= "WHERE com_users.nadador = 1 AND com_users.id > :id";
        $bind = array(
            ':id' => '0'
        );
        if (!empty($disciplina)) {
            $sql .= " AND com_users.disciplina = :disciplina";
            $bind[":disciplina"] = $disciplina;
        }
        if (!empty($club)) {
            $sql .= " AND com_users.club = :club";
            $bind[":club"] = $club;
        }


        $sql .= " AND com_users.estado=0";


        $db = Db::getInstance();

        $cont = $db->run($sql, $bind);

        return $cont;
    }

    public function getCoachAll()
    {

        $db = Db::getInstance();

        $sql = "SELECT * FROM " . $this->tabla . " WHERE entrenador = :id ORDER BY apellido, nombre";
        $bind = array(
            ':id' => '1'
        );






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
        $sql = "SELECT * FROM " . $this->tabla . " WHERE id = :id LIMIT 1";
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

    public function getGenero($id)
    {
        $db = Db::getInstance();
        $sql = "SELECT genero FROM " . $this->tabla . " WHERE id = :id LIMIT 1";
        $bind = array(
            ':id' => $id
        );

        $cont = $db->run($sql, $bind);
        if ($cont == 0) {
            return "";
            //echo "NO encontró";
        } else {
            //echo "encontró";

            $db1 = Db::getInstance();
            $row_p = $db1->fetchAll($sql, $bind);

            return $row_p[0]['genero'];
        }
    }

    public function getOneByRut($rut, $tipo = "")
    {
        $rut = str_replace(".", "", $rut);
        $db = Db::getInstance();
        $sql = "SELECT * FROM " . $this->tabla . " WHERE rut = :rut";
        $bind = array(
            ':rut' => $rut
        );
        if (!empty($tipo)) {
            $sql .= " AND " . $tipo . " = 1";
        }

        $sql .= " LIMIT 1";

        $cont = $db->run($sql, $bind);
        if ($cont == 0) {
            $row_p = "";
            $this->row = "";
            $this->check = 0;
        } else {

            $db1 = Db::getInstance();
            $row_p = $db1->fetchAll($sql, $bind);
            $this->check = 1;
            $this->row = $row_p;
        }
    }

    public function getOneByRutExt($rut, $tipo = "")
    {
        $rut = str_replace(".", "", $rut);

        if ($rut == '1111111-1') {
            return "";
        } else {
            $db = Db::getInstance();
            $sql = "SELECT * FROM " . $this->tabla . " WHERE rut = :rut";
            $bind = array(
                ':rut' => $rut
            );
            if (!empty($tipo)) {
                $sql .= " AND " . $tipo . " = 1";
            }

            $sql .= " LIMIT 1";

            $cont = $db->run($sql, $bind);
            if ($cont == 0) {
                $row_p = "";
                return "";
            } else {

                $db1 = Db::getInstance();
                $row_p = $db1->fetchAll($sql, $bind);
                //$this->check = 1;
                return $row_p;
            }
        }
    }

    static function getOneByName($nombre, $concatenador, $externo = 0)
    {
        $nombre = str_replace(", ", ",", $nombre);
        $nombre = str_replace(",", " ", $nombre);
        $nombres = explode(" ", $nombre);

        $db = Db::getInstance();
        $sql = "SELECT * FROM com_users WHERE (nadador = :nadador AND externo = :externo) AND";

        $bind = array(
            ':nadador' => 1,
            ':externo' => $externo
        );
        $conti = 1;
        foreach ($nombres as $word) {
            if ($conti > 1) {
                $sql .= " " . $concatenador;
            }
            $sql .= " (nombre LIKE :nombre_" . $conti . " OR apellido LIKE :nombre_" . $conti . ")";
            $bind[":nombre_" . $conti] = "%$word%";
            $conti++;
        }


        /*echo $sql;
                        print_r($bind);*/
        $cont = $db->run($sql, $bind);
        if ($cont == 0) {
            $row_p = "";
            return "";
        } else {

            $db1 = Db::getInstance();
            $row_p = $db1->fetchAll($sql, $bind);
            return $row_p;
        }
    }

    static function getAllNad($externo = 0)
    {


        $db = Db::getInstance();
        $sql = "SELECT * FROM com_users WHERE nadador = :nadador AND externo=:externo ORDER BY apellido";
        $bind = array(
            ':nadador' => 1,
            ':externo' => $externo
        );


        /*echo "<br><br>";
                        
		        echo $sql;
                        print_r($bind);*/
        $cont = $db->run($sql, $bind);
        if ($cont == 0) {
            $row_p = "";
            return "";
        } else {

            $db1 = Db::getInstance();
            $row_p = $db1->fetchAll($sql, $bind);
            return $row_p;
        }
    }

    public function checkemail($rut)
    {
        $rut = str_replace(".", "", $rut);
        $db = Db::getInstance();
        $sql = "SELECT * FROM " . $this->tabla . " WHERE rut = :rut LIMIT 1";
        $bind = array(
            ':rut' => $rut
        );

        $cont = $db->run($sql, $bind);
        if ($cont == 0) {
            return "true";
        } else {
            return "false";
        }
    }

    public function asignarCategoria($user)
    {
        $sqlm = "SELECT EXTRACT(YEAR FROM fecnac) AS anonac FROM " . $this->tabla . " WHERE id = :id LIMIT 1";
        $bindm = array(
            ':id' => $user
        );

        /* echo $sqlm;
                        print_r($bindm);*/

        $db2 = Null;
        $db2 = Db::getInstance();

        $cont = $db2->run($sqlm, $bindm);

        if ($cont == 0) {

            return "";
        } else {
            $db1 = Null;
            $db1 = Db::getInstance();
            $rowff1 = $db1->fetchAll($sqlm, $bindm);
            $anonac = $rowff1[0]['anonac'];
            $edad = date('Y') - $anonac;
            // echo $user." - ".$edad."<br>";

            $categ = new Categoria();
            $categ->asignarCategoria($user, $edad);
        }
    }

    public function getRepresentados($id)
    {

        $db = Db::getInstance();

        $sql = "SELECT " . $this->tabla . ".*, com_grupos.grupo FROM " . $this->tabla . " "
            . "LEFT JOIN com_grupos ON com_users.grupo = com_grupos.id ";
        $sql .= "INNER JOIN com_apoderados ON " . $this->tabla . ".id = com_apoderados.nadador ";
        $sql .= "WHERE com_apoderados.apoderado = :apoderado AND " . $this->tabla . ".estado = 0";
        $bind = array(
            ':apoderado' => $id
        );




        if (empty($this->orden)) {
            $orden = $this->tabla . ".apellido, " . $this->tabla . ".nombre";
        } else {
            $orden = $this->orden;
        }


        if ($this->tiporden == 'desc') {
            $tiporden = " desc";
        } else {
            $tiporden = "";
        }

        $sql .= " ORDER BY " . $orden . $tiporden;


        /*echo $sql;
                                print_r($bind);*/



        $cont = $db->run($sql, $bind);
        if ($cont == 0) {
            // echo "No encontro";
            $row_p = "";
            // $this->representados = "";
        } else {
            //echo "SI encontro";
            $db1 = Db::getInstance();
            $row_p = $db1->fetchAll($sql, $bind);
            $conty = 0;

            $this->representados = $row_p;
        }
    }

    public function puedeEditar($apoderado, $id)
    {
        $db = Db::getInstance();
        $sql = "SELECT * FROM com_apoderados WHERE apoderado = :apoderado AND nadador = :nadador LIMIT 1";
        $bind = array(
            ':apoderado' => $apoderado,
            ':nadador' => $id
        );

        $cont = $db->run($sql, $bind);
        if ($cont == 0) {
            return 0;
        } else {
            return 1;
        }
    }


    public function getPruebasRes()
    {
        $db = Db::getInstance();

        $sql = "SELECT com_pruebas.* FROM com_pruebas LEFT JOIN com_resultados ON com_pruebas.id = com_resultados.prueba";

        $primer = 0;
        foreach ($this->row as $id) {


            if ($primer == 0) {
                $sql .= "  WHERE ";
            } else {
                $sql .= "  OR ";
            }
            $sql .= "com_resultados.nadador = :nadador" . $primer;

            $bind[':nadador' . $primer] = $id['id'];
            $primer++;
        }

        $sql .= " GROUP BY com_pruebas.id ORDER BY com_pruebas.orden";


        /*echo $sql;
                                print_r($bind);*/



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
            $this->row[0]['pruebasR'] = $row_p;
        }
    }


    public function getCompetenciasRes()
    {
        $db = Db::getInstance();

        $sql = "SELECT com_competencias.* FROM com_competencias LEFT JOIN com_resultados ON com_competencias.id = com_resultados.competencia";

        $primer = 0;
        foreach ($this->row as $id) {


            if ($primer == 0) {
                $sql .= "  WHERE ";
            } else {
                $sql .= "  OR ";
            }
            $sql .= "com_resultados.nadador = :nadador" . $primer;

            $bind[':nadador' . $primer] = $id['id'];
            $primer++;
        }

        $sql .= " GROUP BY com_resultados.competencia, com_resultados.fecha ORDER BY com_resultados.fecha";


        /*echo $sql;
                                print_r($bind);*/



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
            $this->row[0]['competenciasR'] = $row_p;
        }
    }

    static function contarAtletasClub($club,$tipo)
	{

        if ($tipo == 'nadador') {
            $tipoA = "nadador";           
        } else {
            $tipoA = "entrenador";           
        }
		$db = Db::getInstance();
		$sql = "SELECT * FROM com_users WHERE ".$tipoA." = 1 AND club = :id";
		$bind = array(
			':id' => $club
		);

		$sql .= " ORDER BY id";
		//echo $sql;
		$cont = $db->run($sql, $bind);

		return $cont;
    }

    static function contarAsoctle($region,$disciplina,$genero,$tipo) {

        if ($tipo == 'nadador') {
            $tipoA = "nadador";           
        } else {
            $tipoA = "entrenador";           
        }
		$db = Db::getInstance();
		$sql = "SELECT com_users.*, com_clubes.club as clubN FROM com_users LEFT JOIN com_clubes ON com_users.club = com_clubes.id";
		$bind = array(
			':tipoU' => 1
        );

        $sql .= " WHERE com_users.".$tipoA." = :tipoU";
		$bind = array(
			':tipoU' => 1
        );
        
        if (!empty($region)) {
            $sql .= " AND com_clubes.region = :region";
            $bind[":region"] = $region;
        }

        if (!empty($disciplina)) {
            $sql .= " AND com_users.disciplina = :disciplina";
            $bind[":disciplina"] = $disciplina;
        }

        if (!empty($genero)) {
            $sql .= " AND com_users.genero = :genero";
            $bind[":genero"] = $genero;
        }
        

		$sql .= " ORDER BY id";
        /*echo $sql;
        print_r($bind);*/
		$cont = $db->run($sql, $bind);

		return $cont;
    }

    public function getDocumento($id) {
            
        $db2 = Null;
                                    $db2 = Db::getInstance();
                                    $sql2 = "SELECT * FROM com_users_documentos WHERE user = :user ORDER BY id";
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
                                    $sql2 = "SELECT * FROM com_users_documentos WHERE user = :user ORDER BY id";
                                    $bind2 = array(
                                        ':user' => $id
                                    );

                                    $cont = $db2->run($sql2, $bind2);
                                   
                                            return $cont;
                                    
        
    }

    
    
}
