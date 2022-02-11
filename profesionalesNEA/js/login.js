eventListener();

function eventListener(){
  document.querySelector("#login").addEventListener("submit", loguearUsuario);
}

function loguearUsuario(e){
  e.preventDefault();
  var email     = document.querySelector("#email").value;
  var password  = document.querySelector("#password").value;

  if(email === '' || password === ''){
    swal({
      title: "Error",
      text: "Completa todos los campos!",
      icon: "error",
    });
  } else {
    //Preparar datos para enviar
    var datos     = new FormData();
    datos.append('email', email);
    datos.append('password', password);
    //Llamado ajax
    var xhr       = new XMLHttpRequest();
    xhr.open('POST', 'inc/acciones/loguear_usuario.php', true);
    xhr.onload    = function(){
      if(this.status === 200){
        var respuesta = JSON.parse(xhr.responseText);
        console.log(respuesta);
        if(respuesta.respuesta === 'iniciando_sesion'){
          swal({
            title: "Hola, "+ respuesta.nombre + "!",
            text: "Redirigiendo...",
            icon: "success",
            button:false
          });
          setTimeout( (redireccion) => {
               window.location.href = "index.php";
           }, 1500);
        } else if(respuesta.respuesta === 'password_incorrecto'){
          swal({
            title: "Error",
            text: "Comprueba la contraseña o usuario",
            icon: "error"
          });
        } else if(respuesta.respuesta === 'email_no_existe'){
          swal({
            title: "Error",
            text: "El usuario no se encuentra registrado",
            icon: "error"
          });
        }
      }
    }
    xhr.send(datos);
  }
}
