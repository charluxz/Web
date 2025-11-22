<?php
// db.php - conexión a la base de datos usando MySQLi
// Recomendación: no guardar credenciales en el repositorio. Usar variables de entorno.

$DB_HOST = getenv('DB_HOST') ?: '127.0.0.1';
$DB_USER = getenv('DB_USER') ?: 'root';
$DB_PASS = getenv('DB_PASS') ?: '';
$DB_NAME = getenv('DB_NAME') ?: 'web';

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($mysqli->connect_errno) {
    // En un entorno real, registrar el error y mostrar un mensaje genérico
    http_response_code(500);
    error_log('DB connect error: ' . $mysqli->connect_error);
    echo 'Error de conexión a la base de datos.';
    exit;
}
$mysqli->set_charset('utf8mb4');

// helper: asegurarse de que exista la tabla subscribers (puedes ejecutar SQL separado en producción)
function ensure_subscribers_table($mysqli) {
    $sql = "CREATE TABLE IF NOT EXISTS subscribers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) NOT NULL UNIQUE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    if (! $mysqli->query($sql)) {
        error_log('Could not ensure subscribers table: ' . $mysqli->error);
    }
}

ensure_subscribers_table($mysqli);

?>
