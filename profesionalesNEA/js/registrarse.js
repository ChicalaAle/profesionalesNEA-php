eventListener();
function eventListener(){
  document.querySelector("#registrar").addEventListener("submit", registrarUsuario);
}

function registrarUsuario(e){
  e.preventDefault();
  // TOMAR DATOS DEL FORMULARIO PARA REGISTRAR
  var nombre    = document.querySelector("#nombre").value;
  var email     = document.querySelector("#email").value;
  var password  = document.querySelector("#password").value;
  if(nombre === '' || email === '' || password === ''){
    swal({
      title: "Error",
      text: "Completa todos los campos para registrarte!",
      icon: "error",
    });
  } else if(password.length < 5){
    swal({
      title: "Contraseña insegura",
      text: "Por favor, elige una contraseña con almenos 5 caracteres!",
      icon: "error",
    });
  }else{
    //Preparar datos para enviar
    var datos     = new FormData();
    datos.append('nombre', nombre);
    datos.append('email', email);
    datos.append('password', password);
    //Llamado ajax
    var xhr       = new XMLHttpRequest();
    xhr.open('POST', 'inc/acciones/registrar_usuario.php', true);
    xhr.onload    = function(){
      if(this.status === 200){
        var respuesta = JSON.parse(xhr.responseText);
        if(respuesta.respuesta === 'registrado'){
          swal({
            title: "Genial!",
            text: "Te has registrado con éxito!",
            icon: "success",
          }).then((res) => {
            window.location.href = 'login.php';
          });
        }else if(respuesta.respuesta === 'repetido'){
          swal({
            title: "Ya registrado!",
            text: "El correo ya se encuentra registrado!",
            icon: "error",
          })
        } else {

        }
      }
    }
    xhr.send(datos);
  }

}
