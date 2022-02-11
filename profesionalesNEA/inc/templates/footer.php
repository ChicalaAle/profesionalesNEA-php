<!-- Scripts -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
$pagActual = obtenerPaginaActual();
  if($pagActual === 'registrarse'){
    echo '<script src="js/registrarse.js"></script>';
  }else if($pagActual === 'login'){
    echo '<script src="js/login.js"></script>';
  } else {
    echo '<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>';
    echo '<script src="js/app.js"></script>';
    echo '<script src="js/wow.min.js"></script>';
    echo '<script src="js/jPages.min.js"></script>';
    echo '<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>';
  }
 ?>



<!-- <script src="js/jquery.paginate.js"></script> -->


  </script>
  </body>
</html>
