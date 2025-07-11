<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['usuario'] == 'admin' && $_POST['clave'] == '1234') {
        $_SESSION['admin'] = true;
        header('Location: index.php');
        exit;
    }
    $error = "Credenciales incorrectas";
}
?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>DECAA Administrativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="shortcut icon" href="../assets/logo-favicon-uns.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card p-4 shadow col-md-6 mx-auto">
            <h4 class="text-center mb-4">Iniciar sesión</h4>
            <form method="post">
                <input name="usuario" class="form-control mb-3" placeholder="Usuario">
                <input name="clave" type="password" class="form-control mb-3" placeholder="Clave">
                <button class="btn w-100 btn-login">Ingresar</button>
                <?php if (isset($error)) echo "<div class='alert alert-danger mt-3'>$error</div>"; ?>
            </form>
        </div>
    </div>
</body>

</html>