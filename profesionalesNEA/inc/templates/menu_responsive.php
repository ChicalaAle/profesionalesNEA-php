<div class="menu-responsive">
  <div class="icon-menu">
    <i class="fas fa-bars"></i>
  </div>
  <ul>
    <li>
      <form class="buscador" action="index.html" method="post">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="Buscar...">
      </form>
   </li>
  </ul>

  <div class="menu-cel">
    <div class="contenedor">
      <div class="cerrar">
        <i class="fas fa-times"></i>
      </div>
      <div class="x">
        <a href="index.php"><i class="fas fa-home"></i> INICIO</a>
        <?php
        if(isset($_SESSION['id_userlog'])){ ?>
          <?php if($pag === 'perfil' || $pag === 'index'){ ?>
            <a href="index.php?cerrar_sesion=true">CERRAR SESION</a>
        <?php } ?>

        <?php } else { ?>
          <a href="#"><i class="fas fa-home"></i> CONTACTO</a>
        <?php } ?>
      </div>
      <div class="leyenda">
        <p>Encuentra a un profesional</p>
      </div>

      <div class="clases">
        <ul>
          <li><a href="index.php?filtro=medico">Médicos (<span>3774</span>)</a></li>
          <li><a href="index.php?filtro=abogado">Abogados (<span>1057</span>)</a> </li>
          <li><a href="index.php?filtro=ingeniero">Ingenieros (<span>8749</span>)</a> </li>
          <li><a href="index.php?filtro=psicologo">Psicólogos (<span>5719</span>)</a> </li>
          <li><a href="index.php?filtro=medico">Pediatras (<span>571</span>)</a> </li>
          <li><a href="index.php?filtro=medico">Ginecólogos (<span>2031</span>)</a> </li>
          <li><a href="index.php?filtro=medico">Electricistas (<span>105</span>)</a> </li>
          <li><a href="index.php?filtro=medico">Bomberos (<span>301</span>)</a> </li>
          <li><a href="index.php?filtro=medico">Veterinarios (<span>2030</span>)</a> </li>
          <li><a href="index.php?filtro=medico">Kinesiólogos (<span>4227</span>)</a> </li>
          <li><a href="index.php?filtro=medico">Odontólogos (<span>987</span>)</a> </li>
          <li><a href="index.php?filtro=medico">Albañil (<span>200</span>)</a> </li>
        </ul>
      </div>
      <div class="usuario">
        <!-- Mostrar únicamente si es un usuario no logueado -->
        <!-- <div class="no_logueado">
          <a href="#">Iniciar Sesión</a>
        </div> -->
        <!-- Mostrar cuando el usuario está logueado -->
        <?php if(isset($_SESSION['id_userlog'])){ ?>
          <div class="usuario_logueado">
            <div class="bienvenida">
              <p><a style="color:white; text-transform: capitalize;" href="perfil.php"> Hola, <?php
              $s = explode(" ", $_SESSION['nombre']);
              echo $s[0];
               ?></a></p>
            </div>
            <div class="perfil">
              <?php $datos = obtenerDatosUsuario($_SESSION['id_userlog']);
              foreach ($datos as $dato) { ?>
                <a href="perfil.php"><img src="img/<?php echo $dato['imagen_usuario']; ?>" alt=""></a>
              <?php } ?>

            </div>
          </div>
        <?php } else { ?>
          <!-- Mostrar únicamente si es un usuario no logueado -->
          <div class="no_logueado">
            <a href="login.php">Iniciar Sesión</a>
          </div>
          <!-- Mostrar cuando el usuario está logueado -->
        <?php } ?>


      </div>
      </div>
    </div>

</div>
