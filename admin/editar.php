<?php
session_start();
if (!isset($_SESSION['admin'])) exit('Acceso denegado');
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $docente = $_POST['docente'];
    $anio = $_POST['anio'];
    $carrera = $_POST['carrera'];
    $enlace = $_POST['enlace'];

    $stmt = $pdo->prepare("UPDATE publicaciones SET titulo = ?, docente = ?, anio = ?, carrera = ?, enlace = ? WHERE id = ?");
    $stmt->execute([$titulo, $docente, $anio, $carrera, $enlace, $id]);
    $_SESSION['mensaje'] = "Publicación actualizada exitosamente.";
    $_SESSION['tipo_mensaje'] = "success";
}

header('Location: index.php');
exit;
