<?php
session_start();
if (!isset($_SESSION['admin'])) exit('Acceso denegado');

require '../config/db.php';

$id = $_GET['id'] ?? null;

$stmt = $pdo->prepare("UPDATE publicaciones SET activo = 0 WHERE id = ?");
$stmt->execute([$id]);

header('Location: index.php');
exit;
