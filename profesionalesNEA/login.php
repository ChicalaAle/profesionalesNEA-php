<?php include 'inc/templates/header.php'; ?>

<section class="login">
  <div class="volver-btn">
    <a href="index.php"><i class="far fa-arrow-alt-circle-left"></i> <span>Volver</span></a>
  </div>
  <div class="contenedor_login">
    <h1>Iniciar sesión</h1>
    <div class="cont clearfix">
      <div class="izq">
        <h1>Profesionales NEA</h1>
        <br>
        <p>Encuentra profesionales dónde y<br>cuando necesites.</p>
        <div>
          <p>¿No tienes una cuenta?</p>
          <br>
          <p><a href="registrarse.php">REGÍSTRATE</a> para comenzar a explorar </p>
        </div>
      </div>
      <div class="der">
        <form id="login" action="#" method="post">
          <div class="campo">
            <label for="">
              Email
              <br>
              <br>
              <input id="email" type="email" placeholder="ejemplo@gmail.com">
            </label>
          </div>
          <div class="campo">
            <label for="">
              Contraseña
              <br>
              <br>
              <input id="password" type="password" placeholder="********">
            </label>
          </div>
          <div class="campo btnLog">
            <center>
              <input type="submit" value="INICIAR SESIÓN">
            </center>
            <br><br>
            <div class="mostrar-cel">
              <p>¿No tienes una cuenta?</p>
              <br>
              <p><a href="registrarse.php">REGISTRATE</a> para comenzar a explorar </p>
            </div>
          </div>

        </form>
      </div>
    </div>

  </div>
</section>






<?php include 'inc/templates/footer.php'; ?>
