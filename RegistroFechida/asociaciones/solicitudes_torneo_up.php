<?php
require_once 'lib/autoloader.class.php';
require_once 'lib/init.class.php';
require_once 'lib/auth.php';

$especialidades = Disciplina::getAllEspecialidades();
$idUser = $authj->rowff['id'];

require_once 'vistas/solicitudes_torneo_up.php';   
