<?php
header('Content-Type: application/json');
require '../config/db.php';

$stmt = $pdo->query("SELECT * FROM publicaciones where activo = 1 ORDER BY anio DESC");
echo json_encode($stmt->fetchAll());