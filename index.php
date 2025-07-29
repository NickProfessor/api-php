<?php

use function Routes\Controllers\listarUsuarios;
use function Routes\Controllers\pegarUsuario;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$partes = explode('/', $uri);

// Verifica se existe o id na URL
if (isset($partes[2]) && is_numeric($partes[2])) {
    $id = (int) $partes[2];
} else {
    $id = null;
}

if ($partes[1] == 'usuarios' && $_SERVER['REQUEST_METHOD'] === 'GET' && $id !== null) {
    require_once __DIR__ . '/controllers/UsuarioController.php';
    pegarUsuario($id);
} elseif ($partes[1] == 'usuarios' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    require_once __DIR__ . '/controllers/UsuarioController.php';
    listarUsuarios();
} else {
    http_response_code(404);
    echo json_encode(['erro' => 'Rota não encontrada']);
}
