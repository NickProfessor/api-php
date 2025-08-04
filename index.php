<?php

use function Routes\Controllers\atualizarUsuario;
use function Routes\Controllers\criarUsuario;
use function Routes\Controllers\deletarUsuario;
use function Routes\Controllers\listarUsuarios;
use function Routes\Controllers\pegarUsuario;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$partes = explode('/', $uri);

// Verifica se existe o id na URL
$id = isset($partes[2]) && is_numeric($partes[2]) ? (int) $partes[2] : null;

require_once __DIR__ . '/controllers/UsuarioController.php';

if ($partes[1] === 'usuarios' && $_SERVER['REQUEST_METHOD'] === 'GET' && $id !== null) {
    pegarUsuario($id);
} elseif ($partes[1] === 'usuarios' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    listarUsuarios();
} elseif ($partes[1] === 'usuarios' && isset($partes[2]) && $partes[2] === 'criar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = json_decode(file_get_contents("php://input"), true);

    if (isset($dados['nome'], $dados['email'])) {
        criarUsuario($dados['nome'], $dados['email']);
    } else {
        http_response_code(400);
        echo json_encode(['erro' => 'Nome e email são obrigatórios']);
    }
} elseif ($partes[1] === 'usuarios' && isset($partes[3]) && $partes[3] === 'atualizar' && $_SERVER['REQUEST_METHOD'] === 'PUT') {
    $dados = json_decode(file_get_contents('php://input'), true);
    if ((isset($id) && $id != '') && isset($dados['nome']) || isset($dados['email'])) {
        atualizarUsuario($id, $dados['nome'], $dados['email']);
    } else {
        http_response_code(400);
        echo json_encode(['erro' => 'Dados insuficientes']);

    }
} elseif ($partes[1] === 'usuarios' && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    if ((isset($id) && $id != '')) {
        deletarUsuario($id);
    } else {
        http_response_code(400);
        echo json_encode(['erro' => 'Dados insuficientes']);

    }
} else {
    http_response_code(404);
    echo json_encode(['erro' => 'Rota não encontrada']);
}
