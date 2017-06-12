
<?php

  $servername = 'localhost';
  $db_user = 'root';
  $db_password = '';
  $db_name = 'gym';
  $db_table_name = 'registros';

  $conectar = mysqli_connect($servername, $db_user, $db_password, $db_name);

  if(!$conectar){
    echo "No se puede conectar con el servidor de la base de datos";
  }else{
    //mysqli_select_db(connection,dbname);
    $base = mysqli_select_db($conectar,$db_name);
    if(!$base){
      echo "No se encuentra la base de datos ".$db_name;
    }
  }
  //recuperar las variables


  $nombre = utf8_decode($_POST['Nombre']);
  $apellido = utf8_decode($_POST['apellido']);
  $telefono = utf8_decode($_POST['Telefono']);
  $celular = utf8_decode($_POST['Celular']);
  $email = utf8_decode($_POST['Email']);
  $password = utf8_decode($_POST['Password']);
  $repassword = utf8_decode($_POST['Repassword']);
  $usuario = utf8_decode($_POST['Usuario']);

  //sentacia sql
  $sqli = "INSERT INTO $db_table_name VALUES('$nombre',
                                            '$apellido',
                                            '$telefono',
                                            '$celular',
                                            '$email',
                                            '$password',
                                            '$usuario')";

//ejecutamos la sentencia sql
//mysqli_query(connection,query,resultmode);
if ($password===$repassword){
  $ejecutar = mysqli_query($conectar,$sqli);
  //verificar la ejecución
  if (!$ejecutar){
    echo "Hubo algún error";
  }else{
    echo "Datos guardados correctamente<br><a href='registrado.html'>Volver</a>";
  }
}else{
  echo '<html>
      <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Registro</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">

      </head>
      <body>
      <div class="container">
      <form class="form-signin" action="conexion.php" method="post">
      <p align="center" title="Las Contraseñas no coinciden">Las contraseñas no coinciden, por favor verifica en intenta nuevamente</p><br />
      <a class="btn btn-sm btn-primary btn-block" href="registro.html" value="Regresar" title="Regresar al registro">Regresar</a>
      </form>
      </div>
      </body>
  </html>';
}
 ?>
