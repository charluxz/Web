<?php
// db_pg.php - Conexión a PostgreSQL usando PDO.
// Intenta leer la variable de entorno DATABASE_URL (formato URL de Postgres).
// En su defecto, usa DB_HOST, DB_PORT, DB_NAME, DB_USER, DB_PASS.
$env:DATABASE_URL = 'postgresql://neondb_owner:npg_SThO2IUPAr1y@ep-quiet-king-agx9lqbc-pooler.c-2.eu-central-1.aws.neon.tech/neondb?sslmode=require&channel_binding=require'
function parse_database_url($url) {
    $parts = parse_url($url);
    if ($parts === false) return null;
    $result = [];
    $result['host'] = $parts['host'] ?? '127.0.0.1';
    $result['port'] = $parts['port'] ?? 5432;
    $result['user'] = isset($parts['user']) ? rawurldecode($parts['user']) : null;
    $result['pass'] = isset($parts['pass']) ? rawurldecode($parts['pass']) : null;
    $result['path'] = $parts['path'] ?? null; // contains /dbname
    if ($result['path'] && strlen($result['path']) > 1) {
        $result['dbname'] = ltrim($result['path'], '/');
    }
    // Parse query string for options (sslmode, etc.)
    if (!empty($parts['query'])) {
        parse_str($parts['query'], $q);
        $result['query'] = $q;
    }
    return $result;
}

$database_url = getenv('DATABASE_URL');
if ($database_url) {
    $cfg = parse_database_url($database_url);
    $DB_HOST = $cfg['host'] ?? '127.0.0.1';
    $DB_PORT = $cfg['port'] ?? 5432;
    $DB_NAME = $cfg['dbname'] ?? 'postgres';
    $DB_USER = $cfg['user'] ?? 'postgres';
    $DB_PASS = $cfg['pass'] ?? '';
    $sslmode = $cfg['query']['sslmode'] ?? 'require';
} else {
    $DB_HOST = getenv('DB_HOST') ?: '127.0.0.1';
    $DB_PORT = getenv('DB_PORT') ?: 5432;
    $DB_NAME = getenv('DB_NAME') ?: 'postgres';
    $DB_USER = getenv('DB_USER') ?: 'postgres';
    $DB_PASS = getenv('DB_PASS') ?: '';
    $sslmode = getenv('DB_SSLMODE') ?: 'require';
}

$dsn = sprintf('pgsql:host=%s;port=%s;dbname=%s;sslmode=%s', $DB_HOST, $DB_PORT, $DB_NAME, $sslmode);

try {
    $pdo = new PDO($dsn, $DB_USER, $DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    error_log('DB connect error: ' . $e->getMessage());
    echo 'Error de conexión a la base de datos.';
    exit;
}

// Asegurarse de que exista la tabla subscribers (útil para desarrollo).
function ensure_subscribers_table_pg($pdo) {
    $sql = "CREATE TABLE IF NOT EXISTS subscribers (
        id SERIAL PRIMARY KEY,
        email VARCHAR(255) NOT NULL UNIQUE,
        created_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
    );";
    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        error_log('Could not ensure subscribers table (pg): ' . $e->getMessage());
    }
}

ensure_subscribers_table_pg($pdo);

?>
