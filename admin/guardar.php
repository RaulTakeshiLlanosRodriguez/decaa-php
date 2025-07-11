<?php
session_start();
if (!isset($_SESSION['admin'])) exit('Acceso denegado');
require '../config/db.php';

$titulo = $_POST['titulo'];
$docente = $_POST['docente'];
$anio = $_POST['anio'];
$carrera = $_POST['carrera'];
$enlace = $_POST['enlace'];
$activo = true;

$stmt = $pdo->prepare("INSERT INTO publicaciones (titulo, docente, anio, carrera, enlace,activo) VALUES (?, ?, ?, ?, ?,?)");
$stmt->execute([$titulo, $docente, $anio, $carrera, $enlace,$activo]);
$_SESSION['mensaje'] = "Publicación guardada exitosamente.";
$_SESSION['tipo_mensaje'] = "success";

header('Location: index.php');
