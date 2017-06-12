<?php
$servername = "localhost";
$username = "root";
$db_password = "";
$db_name = "gym";
$db_table_name= "registros";
$usuario = utf8_decode($_POST['Usuario']);
$nombre = utf8_decode($_POST['Nombre']);
$apellido = utf8_decode($_POST['apellido']);
$telefono = utf8_decode($_POST['Telefono']);
$celular = utf8_decode($_POST['Celular']);
$email = utf8_decode($_POST['Email']);
$password = utf8_decode($_POST['Password']);

$enlace =new mysqli($servername, $username, $db_password, $db_name);
if (!$enlace) {
    die ("Error caida de MySQL, no corre servidor");
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

if(isset($_REQUEST['enviar']))//saber si btn Registrarse fue presionado
{
  $rec = $enlace->query("SELECT * FROM registros");
  $verificar_usuario = 0;//verifico si existe en la BD
  while ($resultado = mysqli_fetch_object($rec)) {
    if ($resultado->Usuario == $_POST['Usuario']) {//verifica si ya existe el usuario
      $verificar_usuario = 1;
    }
    if ($verificar_usuario == 0){
      if ($_POST['Password'] == $_POST['Repassword']) {
        $usuario = $_POST['Usuario'];
        $nombre = $_POST['Nombre'];
        $apellido = $_POST['apellido'];
        $telefono =$_POST['Telefono'];
        $celular = $_POST['Celular'];
        $email = $_POST['Email'];
        $password = $_POST['Password'];
        $sqli->query("INSERT INTO mytable (nombre, apellido, tel, celular, email, password, usuario) VALUES ($nombre, $apellido, $telefono, $celular, $email, $password, $usuario)");
        mysqli_query($sqli);

        echo "Usted se ha registrado correctamente.";
        header('Location: https://www.google.com');
      }
      else {
        echo "Las contraseñas no coinciden";
      }
    }
    else {
      echo "El usuario '$usuario' ya ha sido registrado anteriormente";
    }
  }
}
//$db->query("INSERT INTO mytable (nombre, apellido, tel, celular, email, password, usuario) VALUES ($nombre, $apellido, $telefono, $celular, $email, $password, $usuario)");
mysqli_close($enlace);
 ?>
