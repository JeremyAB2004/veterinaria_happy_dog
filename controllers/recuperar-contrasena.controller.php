<?php

ini_set('memory_limit', '2024M');
ini_set('user_agent', 'My-Application/2.5');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../models/recuperar-contrasena.model.php'; // O como se llame tu modelo

// Incluir PHPMailer para manejar el envío de correos con adjuntos
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require  '../extensions/PHPMailer-master/src/Exception.php' ;
require  '../extensions/PHPMailer-master/src/PHPMailer.php' ;
require  '../extensions/PHPMailer-master/src/SMTP.php' ;

function enviarCorreo($email, $codigo) {
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
        $mail->addAddress($email);
        
        // Contenido
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);
        $mail->Subject = 'Recuperación de contraseña Happy Dog';
        
        // Cuerpo HTML del correo con el código visible
        $bodyHtml = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f4f4f4; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; background-color: white; border-radius: 10px; }
                .header { background-color: #0a2463; color: white; padding: 10px 20px; text-align: center; border-radius: 10px 10px 0 0; }
                .content { padding: 20px; border-top: 1px solid #ddd; }
                .code-box {
                    background-color: #f1f1f1;
                    border: 2px dashed #0a2463;
                    color: #0a2463;
                    font-size: 24px;
                    font-weight: bold;
                    text-align: center;
                    padding: 15px;
                    border-radius: 8px;
                    letter-spacing: 5px;
                    margin: 20px 0;
                }
                .footer { margin-top: 20px; font-size: 12px; color: #777; text-align: center; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>Recuperación de contraseña</h2>
                </div>
                <div class='content'>
                    <p>Hola, hemos recibido una solicitud para recuperar tu contraseña en <strong>Veterinaria Happy Dog</strong>.</p>
                    <p>Usá el siguiente código para continuar con el proceso:</p>
                    <div class='code-box'>{$codigo}</div>
                    <p>Este código es válido por unos minutos. Si no solicitaste esto, podés ignorar este mensaje.</p>
                </div>
                <div class='footer'>
                    <p>Este es un mensaje automático, por favor no respondas.</p>
                    <p>&copy; Happy Dog - Sistema de Recuperación de Contraseña</p>
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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';

    if ($accion === 'enviar_codigo') {
        $email = $_POST['email'] ?? '';
        $codigo = $_POST['codigo'] ?? '';

        if (UsuarioModel::existeCorreo($email)) {
            // Llamá tu función para enviar correo aquí
            enviarCorreo($email, $codigo); // IMPLEMENTALO VOS
            echo "correo_enviado";
        } else {
            echo "correo_no_existe";
        }
        exit;
    }

    if ($accion === 'actualizar_pass') {
        $email = $_POST['email'] ?? '';
        $pass = $_POST['pass'] ?? '';

        $claveHash = crypt($pass, '$2y$10$' . bin2hex(random_bytes(22)));

        if (UsuarioModel::actualizarContrasena($email, $claveHash)) {
            echo "actualizado";
        } else {
            echo "error_actualizar";
        }
        exit;
    }
}

?>
