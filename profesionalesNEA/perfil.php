<?php include 'inc/funciones/sesiones.php'; ?>
<?php include 'inc/templates/funciones.php'; ?>
<?php include 'inc/templates/header.php'; ?>
<?php include 'inc/templates/barra.php'; ?>

<?php
$datosUsuario = obtenerDatosUsuario($_SESSION['id_userlog']);


 ?>

<?php include 'inc/templates/conexion.php'; ?>

<section class="perfil">
  <div class="contenedor">
    <?php foreach ($datosUsuario as $dato) { ?>
      <!--
      * Un usuario de tipo 0: Usuario Normal
      * Un usuario de tipo 1: Usuario profesional
      * Un usuario de tipo 2: Usuario Administrador
     -->
       <?php if($dato['tipo_usuario'] != 2){ ?>
    <div class="alerta alerta-azul">
      <span class="cerrar">X</span>
      <b>IMPORTANTE:</b> Recuerda que al cambiar tu email, será con ese el cuál tendrás que iniciar sesión la próxima vez.
    </div>
    <h1>Mi perfil</h1>
    <div class="datos-perfil">
      <form class="actualizar-perfil clearfix" action="actualizar-perfil.php" method="post" enctype="multipart/form-data">
        <div class="datos">
          <div class="campo">
            <label for="">Nombre
              <br>
              <input type="text" name="nombreUsuario" value="<?php echo $dato['nombre_usuario']; ?>">
            </label>
          </div>
          <!-- <div class="campo">
            <label for="">Apellido
              <br>
              <input type="text" name="" value="Chicala">
            </label>
          </div> -->
          <div class="campo">
            <label for="">Email
              <br>
              <input type="email" name="emailUsuario" value="<?php echo $dato['email_usuario']; ?>">
            </label>
          </div>
          <?php if(isset($dato['tipo_usuario'])){
            if($dato['tipo_usuario'] == 1){ ?>
              <div class="campo">
                <label for="">Profesión
                  <br>
                  <p class="cartel-profesion">Lic. Sistemas de información</p>
                </label>
              </div>
          <?php  }
          } ?>
          <div class="campo">
            <label for="">Fecha de registro
              <br>
              <p class="fecha-registro"><?php echo $dato['fecha_registro']; ?></p>
            </label>
          </div>
          <!-- <div class="campo">
            <label for="">Fecha de nacimiento
              <br>
              <input type="date" name="emailUsuario" value="<?php echo $dato['email_usuario']; ?>">
            </label>
          </div> -->
          <div class="campo centrar-cel">
            <input type="submit" value="Guardar">
          </div>
        </div>
        <div class="imagen">
          <div class="contenedor-img">
            <?php if($dato['tipo_usuario'] == 1 && $dato['verificado'] == 1): ?>
            <div class="check">
              <img src="img/star2.png" alt="">
              <p>Destacado!
                <span></span>
              </p>
            </div>
          <?php endif; ?>
            <img id="img-user" src="img/<?php echo $dato['imagen_usuario']; ?>" alt="Imagen no encontrada">
          </div>
          <center>
          <label for="cambiarimg"><span>Cambiar imagen</span>
            <input id="cambiarimg" name="imagenUsuario" type="file" onclick="snackBar()" accept="image/*" onchange="mostrar()" style="visibility: hidden;">
          </label>
        </center>
        </div>
        <input type="hidden" name="imagenActual" value="<?php echo $dato['imagen_usuario']; ?>">
        <input type="hidden" name="uniqID" value="<?php echo $dato['uniq_id']; ?>">

      </form>
    </div><!--.datos-perfil-->
  <?php } else { ?>

    <!-- ********************************HTML PARA ADMINISTRADORES************************************ -->

    <small>Admin: <?php echo $dato['nombre_usuario']; ?> </small>
    <h1>Crear Usuario</h1>
    <div class="crearNuevoUsuario">
      <form class="crearUsuarios clearfix" action="inc/acciones/crearUsuarioAdmin.php" method="post">
        <div class="campo">
          <label for="">
            Nombre y apellido <br>
            <input style="font-family: 'Arial', sans-serif;" placeholder="Alejandro Chicala" type="text" name="nombre">
          </label>
        </div>
        <div class="campo">
          <label for="">
            Correo Electrónico <br>
            <input style="font-family: 'Arial', sans-serif;" placeholder="Example@gmail.com" type="email" name="email">
          </label>
        </div>
        <div class="campo">
          <label for="">
            Tipo de usuario <br>
            <select class="" name="tipo_usuario">
              <optgroup label="Administración">
                <option value="2">Administrador</option>
              </optgroup>
              <optgroup label="Normales">
                <option selected value="1">Profesional</option>
                <option value="0">Usuario Normal</option>
              </optgroup>
            </select>
          </label>
        </div>
        <center>
          <input type="submit" name="" value="Crear">
        </center
      </form>
    </div>


    <!-- LISTA DE PROFESIONALES -->
    <div class="tabla-profesionales">
      <h1>Lista de profesionales</h1>
      <table id="tabla-profesionales">
        <thead>
          <th>Nombre</th>
          <th>Email</th>
          <th>Acciones</th>
        </thead>
        <tbody>
          <?php $profesionales = obtenerProfesionales();
          foreach ($profesionales as $profesional) { ?>
              <tr>
                <td style="font-family: 'Oswald', sans-serif;"> <?php echo $profesional['nombre_usuario']; ?> </td>
                <td style="font-family: 'Oswald', sans-serif;"> <?php echo $profesional['email_usuario']; ?> </td>
                <td><span><i data-estado="<?php echo $profesional['verificado']; ?>" class="far fa-check-circle estado-verificado">
                  <div class="aviso">
                    Cambiar a verificado
                  </div>
                </i></span> <span><i class="fas fa-trash">
                  <div class="aviso aviso-borrar">
                    Eliminar Usuario
                  </div>
                </i></span> </td>
              </tr>
            <?php }  ?>
          </tbody>

        </table>
      </div>

      <!-- LISTA PROFESIONALES DESTACADOS -->
      <div class="tabla-profesionales">
        <h1>Lista de profesionales destacados</h1>
        <table id="tabla-profesionales" class="tabla-profesionales-destacados">
          <thead>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acciones</th>
          </thead>
          <tbody>
            <?php $profesionales = obtenerProfesionalesDestacados();
            foreach ($profesionales as $profesional) { ?>
                <tr>
                  <td style="font-family: 'Oswald', sans-serif;"> <?php echo $profesional['nombre_usuario']; ?> </td>
                  <td style="font-family: 'Oswald', sans-serif;"> <?php echo $profesional['email_usuario']; ?> </td>
                  <td> <span><i data-estado="<?php echo $profesional['verificado']; ?>" class="far fa-check-circle estado-verificado">
                    <div class="aviso">
                      Eliminar de verificado
                    </div>
                  </i></span> </td>
                </tr>
              <?php }  ?>
            </tbody>

          </table>
        </div>



  <?php } ?>
    <?php } ?>
    <div class="favoritos">
      <div class="alerta alerta-azul">
        <span class="cerrar">X</span>
        <b>FAVORITOS:</b> Esta es la sección de favoritos donde puedes guardar perfiles de profesionales que te hayan interesado o quieras contactar más tarde
      </div>
      <h1>Mis favoritos</h1>
      <section class="profesionales contenedor2 clearfix">
        <?php for ($i=0; $i < 4; $i++) { ?>
        <div class="profesional">
          <div class="check">
            <img src="img/star.png" alt="">
            <p>Destacado!
              <span></span>
            </p>
          </div>
          <a href="#">
          <div class="img">
            <?php if($i % 2 == 0){ ?>
                <img src="img/1.jpg" alt="">
            <?php  } else { ?>
              <img src="img/3.png" alt="">
            <?php } ?>
          </div>
          <div class="info-profesional">
            <p class="profesion">(Médica anestesista)</p>
            <h2>Melisa Carballo</h2>
            <p class="descripcion">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <p class="telefono-profesional"><a href="xd"> <i class="fas fa-mobile-alt"></i>   <span>3624-627173</span></a></p>

            <p class="btn-wsp"><a target="_blank" href="https://api.whatsapp.com/send?phone=5493624627173"><i class="fab fa-whatsapp"></i> Contactar</a> </p>
          </div>
          </a>
        </div>
      <?php } ?>

    </section>

    </div>

  </div><!--.contenedor-->
  <?php include 'inc/templates/svg.php'; ?>
</section>


<!-- MENSAJE SNACKBAR -->

<div class="alerta-azul" id="snackbar">Selecciona una imagen</div>

<?php include 'inc/templates/footer.php'; ?>
<script type="text/javascript">

function mostrar(){
  var archivo = document.getElementById("cambiarimg").files[0];
  var reader = new FileReader();
  if (cambiarimg) {
    reader.readAsDataURL(archivo );
    reader.onloadend = function () {
      document.getElementById("img-user").src = reader.result;
    }
  }
}
$(document).ready( function () {
    $('#tabla-profesionales').DataTable();
} );
</script>
