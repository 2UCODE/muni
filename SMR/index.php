<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMR</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<header style="display: flex; justify-content: space-between; align-items: center;">
    <h1 class="title" style="font-family: Arial, sans-serif; font-size: 50px; color: white; text-transform: uppercase; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); margin: 0;">SMR</h1>
    <div class="login-btn">
        <a href="./loginP/login.php">
            <button style="margin-right: 10px;">Iniciar Sesión</button>
        </a>
    </div>
</header>


<main style="background-image: url('./img/fondo.webp'); background-size: cover; background-position: center; color: white;">
    <section id="carouselSection" class="carousel slide" data-ride="carousel">
        <!-- Indicadores -->
        <ul class="carousel-indicators">
            <li data-target="#carouselSection" data-slide-to="0" class="active"></li>
            <li data-target="#carouselSection" data-slide-to="1"></li>
            <li data-target="#carouselSection" data-slide-to="2"></li>
        </ul>
        <!-- Imágenes del carrusel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/imagen1.jpeg" class="d-block w-100" alt="Imagen 1">
            </div>
            <div class="carousel-item">
                <img src="img/F1.jpg" class="d-block w-100" alt="Imagen 2">
            </div>
            <div class="carousel-item">
                <img src="img/F2.jpEg" class="d-block w-100" alt="Imagen 3">
            </div>
        </div>
        <!-- Controles del carrusel -->
        <a class="carousel-control-prev" href="#carouselSection" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselSection" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </section>
</main>

<footer>
    <p>""</p>
</footer>

<!-- Agregar la librería de jQuery y Bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
