<?php
require_once 'config.php';
require_once 'functions.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id > 0) {
    $stmt = $mysqli->prepare("DELETE FROM mahasiswa WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
}
redirect('index.php');
