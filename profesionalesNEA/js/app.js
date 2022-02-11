
eventListeners();

function eventListeners(){

// FUNCION PARA SABER SI ESTÁ CONECTADA O DESCONECTADA LA PC

  window.addEventListener('load', function(e) {
    if (navigator.onLine) {
      document.querySelector(".con-lost").style.display = "none";
      // console.log("conectado");
    } else {
      document.querySelector(".con-lost").style.display = "block";
      // console.log("desconectado");
    }
  }, false);
  window.addEventListener('online', function(e) {
    document.querySelector(".con-lost").style.display = "none";
    // console.log("ya esta conectado");
    // Get updates from server.
  }, false);
  window.addEventListener('offline', function(e) {
    document.querySelector(".con-lost").style.display = "block";
    // console.log("Ya está desconectado");
    // Use offine mode.
  }, false);

  document.querySelector('.icon-menu').addEventListener('click', abrirMenu);
  document.querySelector('.cerrar').addEventListener('click', cerrarMenu);
}

function abrirMenu(e){
  e.preventDefault();
  var menuExpandible = document.querySelector('.menu-cel');
  menuExpandible.style.transform = "scale(1)";
}

function cerrarMenu(e){
  var menuExpandible = document.querySelector('.menu-cel');
  menuExpandible.style.transform = "scale(0)";

}

function snackBar() {
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");

  // Add the "show" class to DIV
  x.className = "show";

  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
