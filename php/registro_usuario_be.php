<?php 

include 'conexion_be.php';

$nombre = $_POST['nombr'];
$apellidoP = $_POST['aplld_patrn'];
$apellidoM = $_POST['aplld_matrn'];
$correo = $_POST['corr'];
$calle1 = $_POST['call1'];
$calle2 = $_POST['call2'];
$numeroE = $_POST['num_ext'];
$numeroI = $_POST['num_int'];
$codigoP = $_POST['cod_pstl'];
$estado = $_POST['estd'];
$ciudad = $_POST['cidd'];
$colonia = $_POST['coln'];
$pais = $_POST['pais'];
$cuenta = $_POST['cuenta'];
$celular = $_POST['celular'];
$pass = $_POST['pass'];

//Encriptado de contraseña
$pass = hash('sha512', $pass);

$query = "INSERT INTO usuarios (nombr, aplld_patrn, aplld_matrn, corr, call1, call2, num_ext, num_int, cod_pstl, 
                                estd, cidd, coln, pais, cuenta, celular, pass) 
        VALUES ('$nombre', '$apellidoP', '$apellidoM', '$correo', '$calle1', '$calle2', '$numeroE', '$numeroI', 
                '$codigoP', '$estado', '$ciudad', '$colonia', '$pais', '$cuenta', '$celular', '$pass')";
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

if(mysqli_num_rows($verificar_correo) > 0){
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