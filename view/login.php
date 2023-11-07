<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="public/css/signin.css" rel="stylesheet">
</head>
<body class="text-center">
    <main class="form-signin w-100 m-auto">
        <form class="formulario" method="post">
            <h1 class="h3 mb-3 fw-normal">Acceder al sistema</h1>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" required>
            <label for="pass">Contraseña</label>
            <input type="password" id="pass" name="pass" required>
            <input class="login-btn" type="submit" value="Iniciar Sesión">

            <div class="mt-4">
                <div class="d-flex justify-content-center links">
                    ¿Aún no tiene cuenta? - <a href="?op=crear" class="ml-2"> Regístrese aquí </a>
                </div>
                <div class="d-flex justify-content-center links">
                    <a href="#">¿Olvidó su contraseña?</a>
                </div>
            </div>

            <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
        </form>
        <?php
        session_start();

        if (isset($_SESSION["id"])) {
            header("Location: view/panel.php");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $pass = $_POST["pass"];

            require_once('model/usuario.php'); // Incluye la nueva clase

            $auth = new usuario();

            if ($auth->Login($email, $pass)) {
                $_SESSION["email"] = $email;
                header("Location: view/panel.php");
                exit();
            } else {
                echo "Usuario o contraseña incorrectos. Inténtalo de nuevo.";
            }
        }
        ?>
    </main>
</body>
</html>
