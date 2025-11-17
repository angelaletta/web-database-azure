<?php
$db_host = getenv('DB_HOST') ?: 'mysql-angel.mysql.database.azure.com';
$db_user = getenv('DB_USER') ?: 'angelalettaa@mysql-angel';
$db_pass = getenv('DB_PASS') ?: 'Cressencia17';
$db_name = getenv('DB_NAME') ?: 'db_mahasiswa';
$db_port = 3306;

$mysqli = mysqli_init();
mysqli_ssl_set($mysqli, NULL, NULL, NULL, NULL, NULL);

$connected = mysqli_real_connect(
    $mysqli,
    $db_host,
    $db_user,
    $db_pass,
    $db_name,
    $db_port,
    NULL,
    MYSQLI_CLIENT_SSL
);

if (!$connected) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>

