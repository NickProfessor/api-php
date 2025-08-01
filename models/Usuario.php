<?php
namespace Models;

require_once __DIR__ . '/../config/database.php';

class Usuario
{
    public static function todos()
    {
        global $conn;
        $stmt = $conn->query("SELECT * FROM usuarios");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function especifico($id)
    {
        global $conn;
        $smtm = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
        $smtm->execute([$id]);
        return $smtm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function cria($nome, $email)
    {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email) VALUES (?, ?)");
        $result = $stmt->execute([$nome, $email]);

        if ($result) {
            http_response_code(201);
            return ['mensagem' => 'Usuário criado com sucesso'];
        } else {
            http_response_code(500);
            return ['mensagem' => 'Erro ao criar o usuário'];
        }
    }

    public static function atualiza($id, $nome, $email)
    {
        global $conn;
        $stmt = $conn->prepare("UPDATE usuarios SET nome = ?, email =?  WHERE id = ?");
        $result = $stmt->execute([$nome, $email, $id]);

        if ($result) {
            http_response_code(200);
            return ['mensagem' => 'Usuário atualizado com sucesso'];
        } else {
            http_response_code(500);
            return ['mensagem' => 'Erro ao atualizar dados do usuário'];
        }
    }
}
