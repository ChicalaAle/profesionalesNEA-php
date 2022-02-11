<?php

/* ======================================
        OBTENER PÁGINA ACTUAL
========================================= */
function obtenerPaginaActual(){
  $pagina = $_SERVER['PHP_SELF'];
  $nuevapag = explode("/", $pagina);
  $pag = explode(".php", $nuevapag[2]);
  return $pag[0];
}
/* ====================================== */

/* ======================================
        OBTENER TODOS LOS DATOS DE USUARIO LOGUEADO
========================================= */
function obtenerDatosUsuario($id){
  include 'inc/funciones/bd.php';
  $sql = "SELECT * FROM usuarios WHERE id_usuario = $id";
  return $conn->query($sql);
}
/* ====================================== */

/* ======================================
        OBTENER TODOS LOS DATOS DE PROFESIONALES
========================================= */
function obtenerProfesionales(){
  include 'inc/funciones/bd.php';
  $sql = "SELECT * FROM usuarios WHERE tipo_usuario = '1'";
  return $conn->query($sql);
}
/* ====================================== */

/* ======================================
        OBTENER TODOS LOS DATOS DE PROFESIONALES DESTACADOS
========================================= */
function obtenerProfesionalesDestacados(){
  include 'inc/funciones/bd.php';
  $sql = "SELECT * FROM usuarios WHERE tipo_usuario = '1' AND verificado = '1'";
  return $conn->query($sql);
}
/* ====================================== */
