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
}
