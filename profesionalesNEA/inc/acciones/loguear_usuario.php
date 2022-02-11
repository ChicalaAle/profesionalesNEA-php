<?php

$email      = $_POST['email'];
$password   = $_POST['password'];

try {
  include '../funciones/bd.php';
  $stmt = $conn->prepare("SELECT id_usuario, nombre_usuario, email_usuario, password, tipo_usuario FROM usuarios WHERE email_usuario = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($id, $usuario, $email_user, $pass, $tipoUsuario);
  $stmt->fetch();
    if($email_user){
      if(password_verify($password, $pass)){
        session_start();
        $_SESSION['nombre'] = $usuario;
        $_SESSION['email'] = $email_user;
        $_SESSION['id_userlog'] = $id;
        $_SESSION['tipo_usuario'] = $tipoUsuario;
        $_SESSION['login'] = true;
        $respuesta = array(
          'respuesta' => 'iniciando_sesion',
          'nombre' => $usuario
        );
      } else {
        $respuesta = array(
          'respuesta' => 'password_incorrecto'
        );
      }
    } else {
      $respuesta = array(
        'respuesta' => 'email_no_existe'
      );
    }

  $stmt->close();
  $conn->close();

} catch (\Exception $e) {
}

echo json_encode($respuesta);
