<?php include_once('funciones.php'); ?>
<?php $act = obtenerPaginaActual(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profesionales NEA</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/jPages.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <!-- <link rel="stylesheet" href="css/jquery.paginate.css"> -->
    <!-- <style media="screen">
      body{
        background: #5A5A5A!important;
      }
      header{
        background: #3B3B3B!important;
      }
    </style> -->
  </head>
  <body class="<?php echo $act; ?>">
