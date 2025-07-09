<?php include('includes/header.php'); ?>
  <section class="contenedor-filtros">
    <h2>Investigaciones Docentes</h2>
    <div class="filtros">
      <select id="tipo-filtro">
        <option value="">Filtrar por...</option>
        <option value="docente">Docente</option>
        <option value="titulo">Título</option>
        <option value="anio">Año</option>
        <option value="carrera">Carrera</option>
      </select>

      <input type="text" id="filtro-texto" placeholder="Escribe tu búsqueda..." style="display: none;">
      <select id="filtro-anio" style="display: none;">
        <option value="">Todos los años</option>
      </select>
      <select id="filtro-carrera" style="display: none;">
        <option value="">Todas las carreras</option>
      </select>
    </div>
  </section>

  <section id="listado-publicaciones" class="listado-publicaciones"></section>

  <div class="paginacion">
    <button id="prev-page">Anterior</button>
    <span id="pagina-actual">1</span>
    <button id="next-page">Siguiente</button>
  </div>
<?php include('includes/footer.php'); ?>



  