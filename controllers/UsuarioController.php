<?php

namespace Routes\Controllers;

require_once __DIR__ . '/../models/Usuario.php';

use Models\Usuario;
function listarUsuarios()
{
    $usuarios = Usuario::todos();
    echo json_encode($usuarios);
}

function pegarUsuario($id)
{
    $usuario = Usuario::especifico($id);
    echo json_encode($usuario);
}