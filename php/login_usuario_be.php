<?php
    session_start();

    include 'conexion_be.php';

    $correo = $_POST['corr'];
    $pass = $_POST['pass'];
    $pass = hash('sha512', $pass);

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE corr='$correo' 
                                                AND pass='$pass'");
    
    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['usuario'] = $correo;
        header("location: ../bienvenida.php");
        exit();
    }else{
        echo '
            <script>
                alert("Usuario no encontrado");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }
?>