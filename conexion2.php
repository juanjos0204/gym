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

//echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos gym es genial." . PHP_EOL;
//echo "Información del host: " . mysqli_get_host_info($enlace) . PHP_EOL;

  //$sqli = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`nombre` , `apellido` , `tel` , `celular` , `email` , `password` , `usuario`) VALUES ("' . $nombre . '", "' . $apellido . '", "' . $telefono . '", "' . $celular . '", "' . $email . '", "' . $password . '", "' . $usuario . '")';
  //$sqli = "INSERT INTO registros (nombre, apellidos, tel, celular, email, password, usuario) VALUES ('juan', 'm', '2', '3', 'correo', '123', 'juanjos')";
  $sqli = "INSERT INTO registros (nombre, apellido, tel, celular, email, password, usuario)
  VALUES ($nombre, $apellido, $telefono, $celular, $email, $password, $usuario)";

  $sqli = "INSERT INTO registros (nombre, apellido, tel, celular, email, password, usuario)
  VALUES ('juan', 'muñoz', '2126027', '3176377335', 'juanjos0204@gmail.com', '123', 'juanjos')";

  if (!$sqli) {
   die('Error: ' . mysql_error());
}else{
    header('Location: registrado.html');
}

mysqli_close($enlace);

 ?>
