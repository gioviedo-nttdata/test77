<?php
class Pase
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


    public function __construct($interfaz=0)
    {
       $this->interfaz = $interfaz;
       $this->tabla = "com_pases";
	
    }
	




    public function agregar ($idUser, $club_origen,$club_destino, $comentarioClubDestino)
    {
      if (empty($club_destino) or empty($idUser) or empty($club_origen)) {
           header("Location: pases.php?err=1");
       } else {
               
            //$orden = $this->getOrden();
            
            $db = Db::getInstance();
            $data = array(
                            'user' => $idUser,
                            'club_origen' => $club_origen,
                            'club_destino' => $club_destino,
                            'comentario_club_destino' => $comentarioClubDestino,
                            'estatus' => '5', //Falta Documentacion
                            'fecha_creado' => date('Y-m-d h:i:s')
                           
                        );
                        $db->insert($this->tabla, $data);
                        $this->id = $db->lastInsertId();
                       
        
        
        
       }
        
    }
    


    public function getAll ($paginado=1,   $tipoLimit='',$club='0')
    {
              
                $db = Db::getInstance();
             
                $sql = "SELECT ".$this->tabla.".id, 
                            ".$this->tabla.".user,
                            c1.club as club_origen,
                            c2.club as club_destino,
                            ".$this->tabla.".estatus as estatusid,
                            com_estatus.estatus as estatus,
                            com_users.rut,
                            com_users.nombre,
                            CONCAT(com_users.apellido,' ',com_users.apellido2) as apellido,
                            com_users.imagen
                            FROM ".$this->tabla." 
                            inner join com_users on ".$this->tabla.".user=com_users.id
                            inner join com_clubes as c1 on ".$this->tabla.".club_origen=c1.id
                            inner join com_clubes as c2 on ".$this->tabla.".club_destino=c2.id
                            inner join com_estatus on 
                            com_estatus.id=".$this->tabla.".estatus

                            ";
                                
                                    $sql .= "WHERE 
                                        ".$this->tabla.".estatus not in ('3','5') 
                                        and ".$this->tabla.".id > :id";
                                    $bind = array(
                                        ':id' => '0'
                                    );
                               
                                if (!empty($club)) {
                                    $sql .= " AND ".$this->tabla.".club_destino = :club_destino";
                                    $bind[":club_destino"] = $club;
                                }
                                
                               
                                
                                
                            
                
                                if (empty($this->orden)) {
                                            $orden = $this->tabla.".user";
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
                                
                                
                                $total_results = $db->run($sql, $bind);
                                $this->total_results = $total_results;
                                if ($paginado == 1) {
                                        
                                        
                    $total_pages = ceil($total_results/$this->limit);
                    $this->total_pages = $total_pages;


                    $starting_limit = ($this->pag-1)*$this->limit;
                    
                                    

                                    $sql .= " ORDER BY ".$orden.$tiporden." LIMIT ".$starting_limit.",". $this->limit; 
                                } else {
                                   $sql .= " ORDER BY ".$orden.$tiporden;  
                                }
                
                


                
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
                $sql = "SELECT ".$this->tabla.".id, 
                    ".$this->tabla.".user,
                    c1.club as club_origen,
                    c2.club as club_destino,
                    ".$this->tabla.".estatus as estatusid,
                    com_estatus.estatus as estatus,
                    com_users.rut,
                    com_users.nombre,
                    CONCAT(com_users.apellido,' ',com_users.apellido2) as apellido,
                    com_users.imagen,
                     (select count(*) from com_pases_documentos where  pase=:pase) as totaldoc,
                      (select min(id)from com_pases_documentos where  pase=:pase) as minid,
                      (select count(*) from com_pases_documentos where  pase=:pase and estatus='2') as totaldocRechazados,
                      ".$this->tabla.".comentario_club_destino,
                      ".$this->tabla.".comentario_club_federacion,
                      ".$this->tabla.".comentario_club_origen
                    FROM ".$this->tabla." 
                    inner join com_users on ".$this->tabla.".user=com_users.id
                    inner join com_clubes as c1 on ".$this->tabla.".club_origen=c1.id
                    inner join com_clubes as c2 on ".$this->tabla.".club_destino=c2.id 
                    inner join com_estatus on 
                            com_estatus.id=".$this->tabla.".estatus
                    WHERE ".$this->tabla.".estatus!='3'  
                    and  ".$this->tabla.".id = :id 
                    LIMIT 1";
                $bind = array(
                ':id' => $id,
                ':pase' => $id
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



    public function eliminar($id) {
      
         $db = Db::getInstance(); 
         $data = array('estatus' => '3');
         $db->update($this->tabla, $data, 'id = :id', array(':id' => $id));
     }


   
   

    public function getRequisitos($modulo='pases') {
            
            $db2 = Null;
            $db2 = Db::getInstance();
            $sql2 = "Select com_requisitos.id,com_requisitos.requisito 
                from com_requisitos 
                inner join com_requisitos_modulos on 
                com_requisitos_modulos.requisito=com_requisitos.id
                inner join com_modulos on 
                com_requisitos_modulos.modulo=com_modulos.id
                WHERE com_requisitos.id > :id";
            $bind2 = array(
                 ':id' => '0'
            );

             if (!empty($modulo)) {
                $sql2 .= " AND com_modulos.modulo= :modulo";
                $bind2[":modulo"] = $modulo;
            }

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

  public function getDocumento($id) {
            
            $db2 = Null;
            $db2 = Db::getInstance();
            $sql2 = "SELECT com_pases_documentos.id,
            com_pases_documentos.pase,
            com_pases_documentos.requisito,
            com_pases_documentos.valor,
            com_pases_documentos.nombre,
            com_pases_documentos.ext,
            com_pases_documentos.comentario,
            com_pases_documentos.estatus as estatusid,
                      com_requisitos.requisito as nrequisito,
                      com_estatus.estatus as estatus
                     FROM com_pases_documentos 
                    inner join com_requisitos on 
                    com_pases_documentos.requisito=com_requisitos.id
                     inner join com_estatus on 
                            com_estatus.id=com_pases_documentos.estatus
                      WHERE com_pases_documentos.estatus!='3'
                      and pase = :pase ORDER BY id";
            $bind2 = array(
                ':pase' => $id
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
            $sql2 = "SELECT com_pases_documentos.id,
            com_pases_documentos.pase,
            com_pases_documentos.requisito,
            com_pases_documentos.valor,
            com_pases_documentos.nombre,
            com_pases_documentos.ext,
            com_pases_documentos.comentario,
            com_pases_documentos.estatus as estatusid,
                      com_requisitos.requisito as nrequisito,
                      com_estatus.estatus as estatus
                     FROM com_pases_documentos 
                    inner join com_requisitos on 
                    com_pases_documentos.requisito=com_requisitos.id
                     inner join com_estatus on 
                            com_estatus.id=com_pases_documentos.estatus
                      WHERE com_pases_documentos.estatus!='3'
             and com_pases_documentos.id = :id LIMIT 1";
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

        public function cambiarEstatus($id) {
      
         $db = Db::getInstance(); 
         $data = array('estatus' => '4');
         $db->update($this->tabla, $data, 'id = :id', array(':id' => $id));
     }

        public function guardarDoc($id, $valor, $nombre, $ext,$requisito,$modulo='pases') {
            $db = Db::getInstance();
            $data = array(
                            'pase' => $id,
                            'valor' => $valor,
                            'nombre' => $nombre,
                            'ext' => $ext,
                            'requisito' => $requisito,
                             'estatus' => '4', //Iniciado
                            'fecha' => date('Y-m-d h:i:s')
                        );
                        
                        
                $db->insert('com_pases_documentos', $data);  

        }

       

         public function totalRequisitos($modulo='pases') {
            
            $db2 = Null;
            $db2 = Db::getInstance();
            $sql2 = "Select count(*) total 
            from com_requisitos 
            inner join com_requisitos_modulos on 
            com_requisitos_modulos.requisito=com_requisitos.id
            inner join com_modulos on com_requisitos_modulos.modulo=com_modulos.id
            where com_modulos.modulo = :modulo LIMIT 1";
            $bind2 = array(
                ':modulo' => $modulo
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

                    return $row_p1[0]['total'];
            }
            
        }

        public function totalDocumentosFaltantes($id,$modulo='pases') {
            
            $db2 = Null;
            $db2 = Db::getInstance();
            $sql2 = "Select count(*) total 
            from com_requisitos 
            inner join com_requisitos_modulos on 
            com_requisitos_modulos.requisito=com_requisitos.id
            inner join com_modulos on com_requisitos_modulos.modulo=com_modulos.id
            where com_modulos.modulo =:modulo and
            com_requisitos.id not in  (select requisito from com_pases_documentos where com_pases_documentos.estatus!='3' and  pase=:pase)";
            $bind2 = array(
                ':pase' => $id,
                ':modulo' => $modulo
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

                    return $row_p1[0]['total'];
            }
            
        }


         public function totalDocumentosAgregados($id,$modulo='pases') {
            
            $db2 = Null;
            $db2 = Db::getInstance();
            $sql2 = "Select count(*) total 
            from com_requisitos 
            inner join com_requisitos_modulos on 
            com_requisitos_modulos.requisito=com_requisitos.id
            inner join com_modulos on com_requisitos_modulos.modulo=com_modulos.id
            where com_modulos.modulo =:modulo and
            com_requisitos.id  in  (select requisito from com_pases_documentos where com_pases_documentos.estatus!='3' and  pase=:pase)";
            $bind2 = array(
                ':pase' => $id,
                ':modulo' => $modulo
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

                    return $row_p1[0]['total'];
            }
            
        }


     

          public function eliminarDocumentos($id,$user) {
      
         $db = Db::getInstance(); 
         $data = array('estatus' => '3',
                      'user_mod' => $user,
                      'fecha_mod' => date('Y-m-d h:i:s')
                    );
         $db->update('com_pases_documentos', $data, 'id = :id', array(':id' => $id));
        }



    public function getEstatusFederacion() {
            
            $db2 = Null;
            $db2 = Db::getInstance();
            $sql2 = "Select com_estatus.id,com_estatus.estatus 
                from com_estatus 
                WHERE com_estatus.id not in ('3','5')";
            $bind2 = array(
                 ':id' => '0'
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


   public function editarDocumentos($id,$user,$estatus,$comentario) {
      
         $db = Db::getInstance(); 
         $data = array(
                       'user_mod' => $user,
                       'estatus' => $estatus,
                       'comentario' => $comentario,
                       'fecha_mod' => date('Y-m-d h:i:s')
                    );
         $db->update('com_pases_documentos', $data, 'id = :id', array(':id' => $id));
        }

        public function editarPases($id,$estatus,$comentarioF) {
      
         $db = Db::getInstance(); 
         $data = array('estatus' => $estatus,
                       'comentario_club_federacion' => $comentarioF);
         $db->update($this->tabla, $data, 'id = :id', array(':id' => $id));
     }
  ///----------------------------------VIEJO---------------

  
     



	
	
	
	
		
}