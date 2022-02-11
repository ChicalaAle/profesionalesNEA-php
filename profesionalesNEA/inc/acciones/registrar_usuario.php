<?php

// DEFINIR VARIABLES DE DATOS ENTRANTES
$nombre     = htmlspecialchars($_POST['nombre']);
$email      = htmlspecialchars($_POST['email']);
$password   = htmlspecialchars($_POST['password']);
$imagenDefault = "degrade.jpg";
$tipoUsuario   = 0;
$verificado    = 0;
$fechaRegistro = strftime("%d/%m/%Y a las %T hs");

//HASHEO DE PASSWORD

$opt = array(
  'cost' => 12
);

$hashPassword = password_hash($password, PASSWORD_BCRYPT, $opt);

try {
  include '../funciones/bd.php';

  $stmt = $conn->prepare("SELECT email_usuario FROM usuarios WHERE email_usuario = ?");
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $stmt->bind_result($emailOcupado);
  $stmt->fetch();
    if($emailOcupado != null){
      // El email ingresado ya existe
      $respuesta = array(
        'respuesta' => 'repetido'
       );
    } else {
      try {
        $token   = bin2hex(openssl_random_pseudo_bytes(30));
        $stmt = $conn->prepare("INSERT INTO usuarios (uniq_id, fecha_registro, nombre_usuario, email_usuario, password, imagen_usuario, tipo_usuario, verificado) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssii", $token, $fechaRegistro, $nombre, $email, $hashPassword, $imagenDefault, $tipoUsuario, $verificado);
        $stmt->execute();
          if($stmt->affected_rows > 0){
            $respuesta = array(
              'respuesta' => 'registrado',
              'nombre'    => $nombre
            );
          } else {
            $respuesta = array(
              'respuesta' => 'error'
            );
          }
        $stmt->close();
        $conn->close();
        } catch (\Exception $e) {
        $respuesta = array(
          'respuesta' => 'error'
        );
        }
      }
    } catch (\Exception $e) {
    $respuesta = array(
      'respuesta' => 'error'
    );
    }

//-------------------


// -----------------
echo json_encode($respuesta);
