<?php
  include_once __DIR__ . '/../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DECAA</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?= $BASE_URL ?>/assets/logo-uns.png" type="image/png">
    <script type="module" src="<?= $BASE_URL ?>/js/main-simple.js"></script>
</head>
<body>
    <header class="header">
    <div class="logo-area">
      <img src="<?= $BASE_URL ?>/assets/logo-uns.png" alt="Logo UNS">
      <div class="office-name">
        DIRECCIÓN DE EVALUACIÓN DE LA CALIDAD ACADÉMICA Y ACREDITACIÓN
      </div>
    </div>
    <button class="menu-toggle" id="menu-toggle"><i class="fas fa-bars"></i></button>
    <nav class="main-nav" id="main-nav">
      <ul class="nav-menu">
        <li class="has-submenu">
          <a href="<?= $BASE_URL ?>/index.php">Inicio</a>
        </li>
        <li class="has-submenu">
          <a href="#">Calidad</a>
          <ul class="submenu">
            <li><a href="<?= $BASE_URL ?>/decaa.php">DECAA</a></li>
          </ul>
        </li>
        <li class="has-submenu">
          <a href="#">Investigaciones</a>
          <ul class="submenu">
            <li><a href="<?= $BASE_URL ?>/publicaciones.php">Publicaciones</a></li>
          </ul>
        </li>
        <li class="has-submenu">
          <a href="#">Mejora Continua</a>
          <ul class="submenu">
            <li><a href="<?= $BASE_URL ?>/comites-de-calidad.php">Cómites de calidad</a></li>
            <li><a href="<?= $BASE_URL ?>/acreditacion.php">Acreditación</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>
  <div class="franja-inferior"></div>
