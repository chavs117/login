<?php 

include 'conexion_be.php';

$nombre = $_POST['nombr'];
$correo = $_POST['corr'];
$pass = $_POST['pass'];

//Encriptado de contraseña
$pass = hash('sha512', $pass);

$query = "INSERT INTO usuarios (nombr, corr, pass) 
        VALUES ('$nombre', '$correo', '$pass')";
// Verificar que el correo no se repita en la base de datos
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'");

if(mysqli_num_rows($verificar_correo) > 0){
    echo'
        <script>
            alert("Este correo ya está registrado, intenta con otro");
            windows.location = "../index.php";
        </script>
    ';
    exit();
}

// Verificar que el nombre no se repita en la base de datos
$verificar_nombr = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombr='$nombre'");

if(mysqli_num_rows($verificar_nombr) > 0){
    echo'
        <script>
            alert("Ese nombre ya está registrado, intenta con otro");
            windows.location = "../index.php";
        </script>
    ';
    exit();
}

$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
    echo '
        <script>
            window.location = "../index.php";
        </script>
    ';
}else{
    echo '
        <script>
            alert("Intentelo nuevamente, usuario no registrado");
            window.location = "../index.php";
        </script>
    ';
}

mysqli_close($conexion);

?>
