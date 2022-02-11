<?php

$nombreUsuario      = htmlspecialchars($_POST['nombreUsuario']);
$emailUsuario       = htmlspecialchars($_POST['emailUsuario']);
$id_usuario         = $_POST['uniqID'];
//Nombre de imagen
$nombre_imagen       = $_FILES['imagenUsuario']['name'];
//Tipo de imagen
$tipo_imagen         = $_FILES['imagenUsuario']['type'];
//Tamaño de imagen
$tamagno_imagen      = $_FILES['imagenUsuario']['size']; //EN BYTES
//Tipo de error
$error               = $_FILES['imagenUsuario']['error'];
// IMAGEN ACTUAL SI NO SE LA CAMBIA
$imagen_actual = $_POST['imagenActual'];

if ($nombre_imagen == '') {
  $nombre_imagen = $imagen_actual;
}
if ($error == '4') {
  try {
    include 'inc/funciones/bd.php';
    $sql = "UPDATE `usuarios` SET `nombre_usuario` = '$nombreUsuario', `email_usuario` = '$emailUsuario' WHERE `uniq_id` = '$id_usuario' ";
    $resultado = $conn->query($sql);
    if($resultado){
      header('Location: index.php');
    }
  } catch (\Exception $e) {

  }
}

if ($tipo_imagen == 'image/jpeg' || $tipo_imagen == 'image/jpg' || $tipo_imagen == 'image/png') {
  if($tamagno_imagen < 1000000000){
    $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . "/profesionalesNEA/img/";
    if(move_uploaded_file($_FILES['imagenUsuario']['tmp_name'], $carpeta_destino.$nombre_imagen)){
      try {
        include 'inc/funciones/bd.php';
        $sql = "UPDATE `usuarios` SET `nombre_usuario` = '$nombreUsuario', `email_usuario` = '$emailUsuario', `imagen_usuario` = '$nombre_imagen' WHERE `uniq_id` = '$id_usuario' ";
        $resultado = $conn->query($sql);
        if($resultado){
          header('Location: index.php');
        }
      } catch (\Exception $e) {

      }
    }
  } else {

  }
} else {
  echo "No se pudo cargar la imagen";
}
