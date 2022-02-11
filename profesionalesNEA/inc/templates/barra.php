<?php
$pag = obtenerPaginaActual();
 ?>
<header>
  <nav class="clearfix contenedor">
    <div class="logo">
      <p><a href="index.php">PROFESIONALES NEA
         <small>(Beta)</small>
        </a></p>
      <!-- <h1><a href="#">PROFESIONALES NEA</a></h1> -->
    </div>
    <div class="botonera">
      <ul>
        <li>
          <form class="buscador" action="index.html" method="post">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Buscar...">
          </form>
       </li>
        <li><a href="index.php">INICIO</a></li>
        <?php if(isset($_SESSION['id_userlog'])){ ?>
          <li><a title="Cerrar Sesión" href="index.php?cerrar_sesion=true"><i class="fas fa-sign-out-alt"></i></a></li>
        <?php } else { ?>
            <li><a href="#">CONTACTO</a></li>
        <?php } ?>
      </ul>
    </div>


    <?php include_once('inc/templates/menu_responsive.php'); ?>
  </nav>
</header>
