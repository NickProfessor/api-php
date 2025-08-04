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
    if (!empty($usuario)) {
        echo json_encode($usuario);
    } else {
        http_response_code(404);
        echo json_encode(['mensagem' => 'Nenhum usuário encontrado']);
    }
}

function criarUsuario($nome, $email)
{
    $resposta = Usuario::cria($nome, $email);
    echo json_encode($resposta);
}

function atualizarUsuario($id, $nome, $email)
{
    $resposta = Usuario::atualiza($id, $nome, $email);
    echo json_encode($resposta);
}

function deletarUsuario($id)
{
    $resposta = Usuario::deleta($id);
    echo json_encode($resposta);
}