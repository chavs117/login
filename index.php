<?php 
    session_start();

    if(isset($_SESSION['usuario'])){
        header("location: bienvenida.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
    <style>
        #scroll{
            border: none;
            height: 250px;
            overflow-y: scroll;
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <main>
        <div class="container__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Tienes sesión?</h3>
                    <p>Inicia sesión</p>
                    <button id="btn__iniciar-sesion">Iniciar sesión</button>
                </div>
                <div class="caja__trasera-registro">
                    <h3>¿Estás registrado?</h3>
                    <p>Regístrate</p>
                    <button id="btn__registrarse">Registrarse</button>
                </div>
            </div>
            <!-- Formulario de login y registro -->
            <div class="container__login-registro">
                <!-- Login -->
                <form action="php/login_usuario_be.php" method="POST" class="formulario__login">
                    <h2>Iniciar sesión</h2>
                    <input type="text" placeholder="Correo electrónico" name="corr">
                    <input type="password" placeholder="Contraseña" name="pass">
                    <button>Entrar</button>
                </form>
                <!-- Registro -->
                <form action="php/registro_usuario_be.php" method="POST" class="formulario__registro">
                    <h2>Registrarse</h2>
                        <input type="text" required placeholder="Nombre" name="nombr">
                        <input type="text" required placeholder="Correo electrónico" name="corr">
                        <input type="password" required placeholder="Contraseña" name="pass">
                    <button>Registrarse</button>
                </form>
            </div>
        </div>
    </main>
    <script src="assets/js/script.js"></script>
</body>
</html>
