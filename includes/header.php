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
    <link rel="shortcut icon" href="<?= $BASE_URL ?>/assets/logo-favicon-uns.png" type="image/png">
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
          <a href="<?= $BASE_URL ?>/index.php">INICIO</a>
        </li>
        <li class="has-submenu">
          <a href="#">NOSOTROS</a>
          <ul class="submenu">
            <li><a href="<?= $BASE_URL ?>/decaa.php">Acerca del DECAA</a></li>
            <li><a href="<?= $BASE_URL ?>/oseil.php">Oficina de Seguimiento al Egresado y de Inserción Laboral</a></li>
            <li><a href="<?= $BASE_URL ?>/ogc.php">Oficina de Gestión de Calidad</a></li>
            <li><a href="<?= $BASE_URL ?>/oaac.php">Oficina de Autoevaluación y Acreditación de la Calidad</a></li>
            <li><a href="<?= $BASE_URL ?>/olic.php">Oficina de Licenciamiento</a></li>
          </ul>
        </li>
        <li class="has-submenu">
          <a href="#">INVESTIGACIONES</a>
          <ul class="submenu">
            <li><a href="<?= $BASE_URL ?>/publicaciones.php">Publicaciones</a></li>
          </ul>
        </li>
        <li class="has-submenu">
          <a href="#">MEJORA CONTINUA</a>
          <ul class="submenu">
            <li><a href="<?= $BASE_URL ?>/comites-de-calidad.php">Cómites de calidad</a></li>
            <li><a href="<?= $BASE_URL ?>/acreditacion.php">Acreditación</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>
  <div class="franja-inferior"></div>
  <section class="slider-solo-imagenes">
    <div class="slider-track">
      <img src="https://conferences.bham.ac.uk/wp-content/uploads/2022/02/uob-conferences-jun19-365.jpg" alt="foto 1">
      <img src="https://paproviders.org/wp-content/uploads/2015/09/Committee-Meeting-Round-Table.jpg" alt="foto 2">
      <img
        src="https://www.syu.ac.kr/eng/wp-content/uploads/sites/81/2023/08/1.-Sahmyook-Universitys-International-Academic-Conference-%E2%80%982023-ICISAA-completed-1-scaled.jpg"
        alt="foto 3">

    </div>
  </section>
