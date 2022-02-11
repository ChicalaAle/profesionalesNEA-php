<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
var_dump($_POST);
// DEFINIR VARIABLES DE DATOS ENTRANTES
$nombre     = htmlspecialchars($_POST['nombre']);
$email      = htmlspecialchars($_POST['email']);
$password   = bin2hex(openssl_random_pseudo_bytes(3));
$imagenDefault = "degrade.jpg";
$tipoUsuario   = $_POST['tipo_usuario'];
$verificado    = 0;
$fechaRegistro = strftime("%d/%m/%Y a las %T hs");


//HASHEO DE PASSWORD

$opt = array(
  'cost' => 12
);

$hashPassword = password_hash($password, PASSWORD_BCRYPT, $opt);
try {
  include '../funciones/bd.php';

  $stmt = $conn->prepare("SELECT email_usuario FROM usuarios WHERE email_usuario = ?");
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $stmt->bind_result($emailOcupado);
  $stmt->fetch();
    if($emailOcupado != null){
      // El email ingresado ya existe
      $respuesta = array(
        'respuesta' => 'repetido'
       );
    } else {
      try {
        $token   = bin2hex(openssl_random_pseudo_bytes(30));
        $stmt = $conn->prepare("INSERT INTO usuarios (uniq_id, fecha_registro, nombre_usuario, email_usuario, password, imagen_usuario, tipo_usuario, verificado) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssii", $token, $fechaRegistro, $nombre, $email, $hashPassword, $imagenDefault, $tipoUsuario, $verificado);
        $stmt->execute();
          if($stmt->affected_rows > 0){
            $respuesta = array(
              'respuesta' => 'registrado',
              'nombre'    => $nombre,
              'contraseña' => $password
            );
            switch ($tipoUsuario) {
              case '0':
                $tipoUsuarioReal = "Usuario Normal";
                break;
                case '1':
                  $tipoUsuarioReal = "Profesional";
                  break;
                  case '2':
                    $tipoUsuarioReal = "Administrador";
                    break;
            }


            require 'PHPMailer/Exception.php';
            require 'PHPMailer/PHPMailer.php';
            require 'PHPMailer/SMTP.php';

            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 2;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host       = 'smtp.gmail.com;smtp.live.com;smtp.mail.yahoo.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'pruebaswebchicala@gmail.com';                     // SMTP username
                $mail->Password   = 'u';                               // SMTP password
                $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                $mail->Port       = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('pruebaswebchicala@gmail.com', 'Profesionales NEA');
                $mail->addAddress($email);     // Add a recipient
                $mail->addAddress('pruebaswebchicala@gmail.com');               // Name is optional
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Datos de acceso PROFESIONALES NEA';
                $mail->Body    = 'Hola, '.$nombre.' <br><br> Estos son tus datos de acceso a ProfesionalesNEA: <br><br> Cuenta: '. $email . '<br> Contraseña: '.$password .
                '<br> Cuenta tipo: '.$tipoUsuarioReal.' <br><hr> <a target="_blank" href="http://stimulated-stages.000webhostapp.com/profesionalesNEA/login.php">Iniciar Sesión</a>'

                ;

                $mail->send();
                echo ' El mensaje se envio correctamente';
            } catch (Exception $e) {
                echo "Error: {$mail->ErrorInfo}";
            }






          } else {
            $respuesta = array(
              'respuesta' => 'error'
            );
          }
        $stmt->close();
        $conn->close();
        } catch (\Exception $e) {
        $respuesta = array(
          'respuesta' => 'error'
        );
        }
      }
    } catch (\Exception $e) {
    $respuesta = array(
      'respuesta' => 'error'
    );
    }

//-------------------


// -----------------
echo json_encode($respuesta);
