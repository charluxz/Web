<?php
// subscribe_pg.php - recibir POST con 'email' y guardarlo en la tabla `subscribers` usando PDO (Postgres)
require_once __DIR__ . '/db_pg.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Método no permitido');
}

$email = isset($_POST['email']) ? trim($_POST['email']) : '';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: index.html?e=invalid');
    exit;
}

try {
    $stmt = $pdo->prepare('INSERT INTO subscribers (email) VALUES (:email)');
    $stmt->execute(['email' => $email]);
    header('Location: index.html?m=ok');
    exit;
} catch (PDOException $e) {
    // 23505 es error de violación de unicidad en Postgres
    if ($e->getCode() === '23505') {
        header('Location: index.html?e=exists');
        exit;
    }
    error_log('Insert failed (pg): ' . $e->getMessage());
    header('Location: index.html?e=error');
    exit;
}

?>
