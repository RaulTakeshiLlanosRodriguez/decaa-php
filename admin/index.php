<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

require '../config/db.php';

$porPagina = 10;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$inicio = ($pagina - 1) * $porPagina;

$total = $pdo->query("SELECT COUNT(*) FROM publicaciones where activo = 1")->fetchColumn();
$paginasTotales = ceil($total / $porPagina);

$stmt = $pdo->prepare("SELECT * FROM publicaciones where activo = 1 ORDER BY anio DESC LIMIT :inicio, :cantidad");
$stmt->bindValue(':inicio', $inicio, PDO::PARAM_INT);
$stmt->bindValue(':cantidad', $porPagina, PDO::PARAM_INT);
$stmt->execute();
$publicaciones = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>DECAA Administrativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="shortcut icon" href="../assets/logo-favicon-uns.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark navegacion">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">DECAA</a>
            <div class="d-flex">
                <a href="logout.php" class="btn btn-outline-light">Cerrar sesión</a>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Investigaciones Docentes</h3>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregar">Agregar</button>
        </div>
        <table class="table table-bordered table-hover bg-white tabla-investigaciones">
            <thead class="table-light">
                <tr>
                    <th>TITULO</th>
                    <th>DOCENTE</th>
                    <th>AÑO</th>
                    <th>CARRERA</th>
                    <th>REPOSITORIO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($publicaciones as $pub): ?>
                    <tr>
                        <td><?= htmlspecialchars($pub['titulo']) ?></td>
                        <td><?= htmlspecialchars($pub['docente']) ?></td>
                        <td><?= $pub['anio'] ?></td>
                        <td><?= htmlspecialchars($pub['carrera']) ?></td>
                        <td><a href="<?= $pub['enlace'] ?>" target="_blank">Ver</a></td>
                        <td>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditar<?= $pub['id'] ?>"><i class="fas fa-pencil"></i></button>
                            <button
                                class="btn btn-sm btn-danger btn-eliminar"
                                data-id="<?= $pub['id'] ?>">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <div class="modal fade" id="modalEditar<?= $pub['id'] ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Editar Publicación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="editar.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $pub['id'] ?>">
                                    <div class="modal-body">
                                        <input name="titulo" class="form-control mb-3" value="<?= htmlspecialchars($pub['titulo']) ?>" required>
                                        <input name="docente" class="form-control mb-3" value="<?= htmlspecialchars($pub['docente']) ?>" required>
                                        <input name="anio" type="number" class="form-control mb-3" value="<?= $pub['anio'] ?>" required>
                                        <input name="carrera" class="form-control mb-3" value="<?= htmlspecialchars($pub['carrera']) ?>" required>
                                        <input name="enlace" class="form-control mb-3" value="<?= htmlspecialchars($pub['enlace']) ?>" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Paginación -->
        <nav>
            <ul class="pagination">
                <?php for ($i = 1; $i <= $paginasTotales; $i++): ?>
                    <li class="page-item <?= $i === $pagina ? 'active' : '' ?>">
                        <a class="page-link" href="?pagina=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalAgregar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Publicación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="guardar.php" method="POST">
                    <div class="modal-body">
                        <input name="titulo" class="form-control mb-3" placeholder="Título">
                        <input name="docente" class="form-control mb-3" placeholder="Docente">
                        <input name="anio" type="number" class="form-control mb-3" placeholder="Año">
                        <input name="carrera" class="form-control mb-3" placeholder="Carrera">
                        <input name="enlace" class="form-control mb-3" placeholder="URL del repositorio">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION['mensaje'])): ?>
        <script>
            Swal.fire({
                icon: '<?= $_SESSION['tipo_mensaje'] ?>',
                title: '<?= $_SESSION['mensaje'] ?>',
                showConfirmButton: false,
                timer: 1800
            });
        </script>
    <?php
        unset($_SESSION['mensaje']);
        unset($_SESSION['tipo_mensaje']);
    endif;
    ?>
    x
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
document.querySelectorAll('.btn-eliminar').forEach(btn => {
  btn.addEventListener('click', function () {
    const id = this.dataset.id;
    Swal.fire({
      title: '¿Estás seguro?',
      text: "La publicación será dada de baja.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#6c757d',
      confirmButtonText: 'Sí, dar de baja',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = `baja.php?id=${id}`;
      }
    });
  });
});
</script>

</body>

</html>