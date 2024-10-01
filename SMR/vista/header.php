<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida a mi web</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<header class="bg-primary text-white py-2 d-flex justify-content-between align-items-center">
    <h1 class="title m-0">Champions One</h1>
    <form method="post" action="../loginP/logout.php" class="mb-0">
        <input type="submit" value="Cerrar Sesión" class="btn btn-light">
    </form>
</header>

<main class="container my-4">
    <h1 class="text-center">Bienvenido al Menu Principal</h1>
    <div class="d-flex justify-content-center mt-4">
        <a href="../loginP/inicio.php" class="btn btn-primary mx-2">Resumen</a>
        <a href="../competicion/index.php" class="btn btn-primary mx-2">Crear Competición</a>
        <a href="../tabla/calendario.php" class="btn btn-primary mx-2">Calendario</a>
        <a href="../tabla/index.php" class="btn btn-primary mx-2">Clasificación</a>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
