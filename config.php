<?php
$db_host = getenv('DB_HOST') ?: 'mysql-angel.mysql.database.azure.com';
$db_user = getenv('DB_USER') ?: 'angelalettaa@mysql-angel';
$db_pass = getenv('DB_PASS') ?: 'Cressencia17';
$db_name = getenv('DB_NAME') ?: 'db_mahasiswa';
$db_port = 3306;

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

