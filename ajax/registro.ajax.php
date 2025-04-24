<?php

ini_set('memory_limit', '2024M');
ini_set('user_agent', 'My-Application/2.5');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../controllers/registro.controller.php";
require_once "../models/registro.model.php";

// Incluir PHPMailer para manejar el envío de correos con adjuntos
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require  '../extensions/PHPMailer-master/src/Exception.php' ;
require  '../extensions/PHPMailer-master/src/PHPMailer.php' ;
require  '../extensions/PHPMailer-master/src/SMTP.php' ;

class AjaxRegistro{

    private function enviarCorreoNotificacion($datos) {
        try {
            // Crear una nueva instancia de PHPMailer
            $mail = new PHPMailer(true);
            
            // Configuración del servidor (tu configuración existente)
            $mail->isSMTP();
            $mail->Host       = 'smtp.hostinger.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'bot_proyecto@racura-sg.com';
            $mail->Password   = 'UsoTemporal2025*';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;
            
            // Destinatarios
            $mail->setFrom('bot_proyecto@racura-sg.com', 'Sistema de Usuarios');
            $mail->addAddress($datos['email']);
            
            // Contenido
            $mail->CharSet = 'UTF-8';
            $mail->isHTML(true);
            $mail->Subject = 'Bienvenido(a) a Happy Dog: ' . $datos['nombre'];
            
            // URL a la que redirigirá el botón
            $urlRedireccion = 'localhost/veterinaria_happy_dog/login';
            
            // Cuerpo del correo en HTML con botón
            $bodyHtml = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                    .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                    .header { background-color: #0a2463; color: white; padding: 10px 20px; text-align: center; }
                    .content { padding: 20px; border: 1px solid #ddd; }
                    .info-item { margin-bottom: 10px; }
                    .label { font-weight: bold; }
                    .footer { margin-top: 20px; font-size: 12px; color: #777; text-align: center; }
                    .btn {
                        display: inline-block;
                        padding: 10px 20px;
                        background-color: #0a2463;
                        color: white !important;
                        text-decoration: none;
                        border-radius: 5px;
                        margin: 15px 0;
                        font-weight: bold;
                    }
                    .btn:hover {
                        background-color: #1a346b;
                    }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h2>Nueva Cuenta creada correctametne</h2>
                    </div>
                    <div class='content'>
                        <p>Te damos la bienvenida a Happy Dog</p>
                        <p>¡Gracias por registrarte en nuestro sistema!</p>
                        
                        <!-- Botón que redirige -->
                        <div style='text-align: center; margin: 20px 0;'>
                            <a href='$urlRedireccion' class='btn'>Acceder a mi cuenta</a>
                        </div>
                        
                        <p>O copia y pega este enlace en tu navegador:</p>
                        <p><a href='$urlRedireccion'>$urlRedireccion</a></p>
                    </div>
                    <div class='footer'>
                        <p>Este es un correo automático, por favor no responda directamente a este mensaje.</p>
                        <p>Sistema de notificaciones - Veterinaria Happy Dog</p>
                    </div>
                </div>
            </body>
            </html>
            ";
            
            $mail->Body = $bodyHtml;
            
            $mail->send();
            return true;
        } catch (Exception $e) {
            // Registrar error en el log del sistema
            error_log("Error al enviar correo: {$mail->ErrorInfo}");
            return false;
        }
    }

    public $datos;

    public function ajaxRegistroUsuario(){

        $datos = $this->datos;

        $datos = json_decode($datos, true);

        $nombre = $datos['nombre'];
        $primer_apellido = $datos['primer_apellido'];
        $segundo_apellido = $datos['segundo_apellido'];
        $telefono = $datos['telefono'];
        $correo = $datos['email'];
        $clavePlano = $datos['password'];
        $id_rol = 3;   
        
        try {
            $response = RegistroController::ctrCargarUsuarios($correo);
            
            if(isset($response[0])){

                $response = array(
                    'status' => 'error',
                    'message' => 'Este correo ya está registrado.'
                );

                echo json_encode($response);
                exit;
            }
            
    
            // Si no existe, insertar
            $claveHash = crypt($clavePlano, '$2y$10$' . bin2hex(random_bytes(22)));
    
            $response = RegistroController::mdlInsertarUsuarios($nombre, $primer_apellido, $segundo_apellido, $correo, $claveHash, $telefono, $id_rol);

            if($response == "ok") {
                // Enviar correo de notificación
                $correoEnviado = $this->enviarCorreoNotificacion($datos);
                
                $response = array(
                    'status' => 'success',
                    'message' => 'Usuario creado correctamente, revise su correo.'
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Hubo un error al procesar su solicitud. Por favor, inténtelo más tarde.'
                );
            }
    
            echo json_encode($response);
    
        } catch (PDOException $e) {
            $response = array(
                'status' => 'error',
                'message' => "Error del servidor: " . $e->getMessage()
            );
            echo json_encode($response);
        }

        /* echo json_encode($response);*/

    }

}

if(isset($_POST["datos"])){

    $edit = new AjaxRegistro();

    $edit -> datos = $_POST["datos"];

    $edit -> ajaxRegistroUsuario();

}