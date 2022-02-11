<?php
session_start();
if(isset($_GET['cerrar_sesion'])){
  $_SESSION = array();
}

 ?>

<?php include_once('inc/templates/header.php'); ?>

<?php include_once('inc/templates/barra.php'); ?>



    <section class="body">


    <aside class="aside ">
      <div class="leyenda wow fadeInLeft">
        <p>Encuentra a un profesional</p>
      </div>

      <div class="clases wow fadeInLeft">
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
<?php include 'inc/templates/conexion.php'; ?>
      <div class="localidad">
        <p class="wow fadeInRight"><i class="fas fa-map-marker-alt"></i> Resistencia, Chaco</p>
      </div>
    </aside>
    <div class="cuerpo ">
      <div class="menu-login clearfix">
        <div class="contenedor2">
          <div class="destacados">
            <p>Profesionales destacados</p>
          </div>
          <div class="menu-log">
            <?php if(isset($_SESSION['id_userlog'])){ ?>
                <a class="ir-perfil" href="perfil.php">Hola, <?php
                $s = explode(" ", $_SESSION['nombre']);
                echo $s[0];
                 ?>
                <div class="img-perfil">
                  <?php $datos = obtenerDatosUsuario($_SESSION['id_userlog']);
                  foreach ($datos as $dato) {
                     ?>
                    <img src="img/<?php echo $dato['imagen_usuario']; ?>" alt="">

                <?php  }  ?>

                </div>
                </a>
            <?php } else { ?>
               <a class="in-sesion" href="registrarse.php">Regístrate</a> <span style="color:#7E7E7E; font-size: 16px; margin: 0 10px; cursor:default;">o</span>
                <a class="in-sesion" href="login.php">Iniciar Sesión</a>
            <?php } ?>
          </div>
        </div>
      </div>
      <section id="paginar" class="profesionales contenedor2">
        <?php for ($i=0; $i < 700; $i++) { ?>
        <div class="profesional">
          <div class="check">
            <img src="img/star.png" alt="">
            <p>Destacado!
              <span></span>
            </p>
          </div>
          <div class="fav">

          </div>
          <a href="#">
          <div class="img">
            <?php if($i % 2 == 0){ ?>
                <img src="img/asd.jpg" alt="">
            <?php  } else { ?>
              <img src="img/persona_feliz.png" alt="">
            <?php } ?>
          </div>
          <div class="info-profesional">
            <p class="profesion">(Profesor de Educación Física)</p>
            <h2>Melisa Carballo</h2>
            <p class="descripcion">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

            <p class="telefono-profesional"><a target="_blank" href="https://www.youtube.com/"> <i class="fas fa-mobile-alt"></i>   <span>3624-627173</span></a></p>
            <p class="btn-wsp"><a target="_blank" href="https://api.whatsapp.com/send?phone=5493624627173"><i class="fab fa-whatsapp"></i> Contactar</a> </p>

          </div>
          </a>
        </div>
      <?php } ?>

        <div class="holder"></div>
      </section>

    </div>
  </section>

  <!-- Scripts -->
  <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="js/app.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/jPages.min.js"></script>
	<!-- <script src="js/jquery.paginate.js"></script> -->
  <script>
  new WOW().init();
  $(function(){

  $("div.holder").jPages({
    containerID : "paginar",
    perPage: 16,
    previous: "Anterior",
    next: "Siguiente",
    keyBrowse: true
  });

});
  // $('#paginar').paginate({
  //   perPage: 9,
  //   autoScroll:             true,
  //   paginatePosition:       ['bottom']
  // });
  document.addEventListener('DOMContentLoaded', function(){
    var btnPaginar = document.querySelectorAll(".holder a");
    for (var i = 0; i < btnPaginar.length; i++) {
      btnPaginar[i].setAttribute("href", "asd");
      console.log(btnPaginar[i]);
    }
  });

  </script>
  </body>
</html>
