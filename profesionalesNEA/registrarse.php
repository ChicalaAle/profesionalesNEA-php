<?php include 'inc/templates/header.php'; ?>

<section class="login">
  <div class="volver-btn">
    <a href="index.php"><i class="far fa-arrow-alt-circle-left"></i> <span>Volver</span></a>
  </div>
  <div class="contenedor_login">
    <h1>Registrarse</h1>
    <div class="cont clearfix">
      <div class="izq">
        <h1>Profesionales NEA</h1>
        <br>
        <p>Encuentra profesionales dónde y<br>cuando necesites.</p>
        <div>
          <p>¿Ya tienes una cuenta?</p>
          <br>
          <p><a href="login.php">INICIA SESIÓN</a> para comenzar a explorar </p>
        </div>
      </div>
      <div class="der">
        <form id="registrar" class="registrar" action="#" method="post">
          <div class="campo">
            <label for="">
              Nombre y apellido
              <br>
              <br>
              <input type="text" id="nombre" placeholder="Nombre y apellido">
            </label>
          </div>
          <div class="campo">
            <label for="">
              Email
              <br>
              <br>
              <input type="email" id="email" placeholder="ejemplo@gmail.com">
            </label>
          </div>
          <div class="campo">
            <label for="">
              Contraseña
              <br>
              <br>
              <input type="password" id="password" placeholder="********">
            </label>
          </div>
          <div class="campo btnLog">
            <center>
              <input type="submit" value="REGISTRARME">
            </center>

            <div class="mostrar-cel">
              <br>
                <center>
                  <p>- o -</p>
                </center>
              <br>
              <center>
                <p><a href="login.php">INICIA SESIÓN</a></p>
              </center>
            </div>

          </div>

        </form>
      </div>
    </div>

  </div>
</section>






<?php include 'inc/templates/footer.php'; ?>
