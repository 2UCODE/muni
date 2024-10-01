<?php
session_start();

// Verificar si ya hay una sesión iniciada, redirigir al usuario si es así
if (isset($_SESSION['usuario'])) {
    header("Location: inicio.php");
    exit();
}

// Incluir el archivo de conexión a la base de datos
require_once('../Conexion/conexion.php');

// Si se envió el formulario
if (isset($_POST['btningresar'])) {
    // Obtener el número de documento y la contraseña del formulario
    $numeroDocumento = $_POST['dni'];
    $password = md5($_POST['password']); // Cifrar la contraseña con md5

    // Consulta SQL para verificar si el usuario existe en la base de datos
    $sql = "SELECT * FROM Usuario WHERE numeroDocumento = ? AND Contrasena = ?";

    // Preparar la consulta
    $stmt = $conexion->prepare($sql);

    // Vincular los parámetros
    $stmt->bind_param("ss", $numeroDocumento, $password);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado de la consulta
    $result = $stmt->get_result();

    // Verificar si se encontró un usuario con las credenciales proporcionadas
    if ($result->num_rows == 1) {
        // Usuario autenticado, iniciar sesión y redirigir a la página de inicio
        $_SESSION['usuario'] = $numeroDocumento;
        header("Location: inicio.php");
        exit();
    } else {
        // Credenciales incorrectas, mostrar mensaje de error
        $error_message = "Número de documento o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Inicio de sesión</title>
    <style>
        /* Estilos personalizados para mejorar la apariencia */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-content {
            width: 100%;
            max-width: 400px;
            background-color: #f7f7f7;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .input-div.one {
            position: relative;
            margin-bottom: 25px;
        }
        .input-div i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 10px;
            color: #333;
        }
        .input-div .input {
            padding-left: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-content">
            <form method="post" action="">
                <h2 class="title text-center">Inicio de Sesión</h2>
                <?php if (isset($error_message)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                <?php } ?>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-id-card"></i>
                    </div>
                    <div class="div">
                        <h5>Documento de Identidad</h5>
                        <input id="dni" type="number" class="input form-control" name="dni" required>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Contraseña</h5>
                        <input type="password" id="input" class="input form-control" name="password" required>
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <input name="btningresar" class="btn btn-primary" type="submit" value="Iniciar Sesión">
                </div>
                <!-- Botón para redirigir a registrar.php -->
                <div class="d-grid gap-2 mt-3">
                    <a href="registrar.php" class="btn btn-secondary">Registrarse</a>
                </div>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
