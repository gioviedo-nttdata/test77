<?php

require_once '../lib/autoloader.class.php';
require_once '../lib/init.class.php';
require_once '../lib/auth.php';


$function = $_REQUEST['endpoint'] ?? "";
if(function_exists($function)){
    $function($authj);
}

function get_torneos($authj){
    $user = $authj->rowff['club'];
    $tipoUser = 2;
    $solicitudes = Torneo::getAll($user, $tipoUser, 0);
    $result = array(
        'data' => $solicitudes
    );
    header('Content-Type: application/json');
    echo json_encode($result, JSON_PRETTY_PRINT);
}

function set_estado_solicitud(){
    $id = $_REQUEST['id'] ?? "";
    $estado = $_REQUEST['estado'] ?? "";
    $estados = [1,2];
    if($id && in_array($estado,$estados)){
        Torneo::setEstado($estado,$id);
        echo json_encode(array('error'=>0));
        return;
    }
    echo json_encode(array('error'=>1));
}

function download_doc(){
    $folders = ['','asociaciones','clubes'];
    $data = explode('|',  $_REQUEST['type']);
    $class = $data[0];
    $id = $data[1];
    $folder = $folders[$data[2]];
    if(class_exists($class)){
        $doc = $class::getDocumento($id);
        if(count($doc)){
            $nameDoc = $doc['full_name'];
            $nameOriginalDoc = $doc['full_name_original'];
            $file= "../../$folder/uploads/".$nameDoc;
            $type = '';
            if (is_file($file)) {
                $size = filesize($file);
                if (function_exists('mime_content_type')) {
                    $type = mime_content_type($file);
                } else if (function_exists('finfo_file')) {
                    $info = finfo_open(FILEINFO_MIME);
                    $type = finfo_file($info, $file);
                    finfo_close($info);
                }
                if ($type == '') {
                    $type = "application/force-download";
                }
                // Set Headers
                header("Content-Type: $type");
                header("Content-Disposition: attachment; filename=$nameOriginalDoc");
                header("Content-Transfer-Encoding: binary");
                header("Content-Length: " . $size);
                // Download File
                ob_end_clean();
                flush();
                readfile($file);
            } else {
                echo $file.' no es un archivo.';
            }
        }
    }
} 