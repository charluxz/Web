<?php
// subscribe.php - recibir POST con 'email' y guardarlo en la tabla `subscribers`
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Método no permitido');
}

$email = isset($_POST['email']) ? trim($_POST['email']) : '';
// Validar formato
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: index.html?e=invalid');
    exit;
}

// Preparar inserción
$stmt = $mysqli->prepare('INSERT INTO subscribers (email) VALUES (?)');
if (! $stmt) {
    error_log('Prepare failed: ' . $mysqli->error);
    header('Location: index.html?e=error');
    exit;
}

$stmt->bind_param('s', $email);
$ok = $stmt->execute();
if ($ok) {
    $stmt->close();
    $mysqli->close();
    header('Location: index.html?m=ok');
    exit;
}

// Si falla por clave duplicada -> ya existe
if ($mysqli->errno === 1062) {
    $stmt->close();
    $mysqli->close();
    header('Location: index.html?e=exists');
    exit;
}

error_log('Insert failed: ' . $mysqli->error);
$stmt->close();
$mysqli->close();
header('Location: index.html?e=error');
exit;

?>
