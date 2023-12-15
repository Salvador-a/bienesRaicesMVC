<?php
namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaguinasController {

    public static function index( Router $router ) {

        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router ->render('paguinas/index',[
            'propiedades' => $propiedades,
            'inicio' => $inicio

        ]);
    }

    public static function nosotros( Router $router ) {
        

        $router->render('paguinas/nosotros',[
            

        ]);
    }

    public static function propiedades( Router $router ) {

        $propiedades = Propiedad::all();

        $router->render('paguinas/propiedades', [

            'propiedades' => $propiedades


        ]);
    }

    public static function propiedad( Router $router ) {

        $id = validarORedireccionar('/propieades');

        // Busacar la propiedad por su id
        $propiedad = Propiedad::find($id);
        
        $router->render('paguinas/propiedad', [
            'propiedad' => $propiedad

        ]);
    }
    public static function blog( Router $router ) {
        $router->render('paguinas/blog');
    }
    public static function entrada( Router $router ) {
        $router->render('paguinas/entrada', [

        ]);
    }
    public static function contacto( Router $router ) {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Validar 
            $respuestas = $_POST['contacto'];

            

            // Crear una instacias de phpMAiler
            $mail = new PHPMailer();

            // Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '55bb8282d15fb4';
            $mail->Password = 'faf2cc4ea35d62';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            // Configurar ek contenido del mail

            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com' );
            $mail->Subject = 'Tienes un nuevo mensaje';

            //Habiliatar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje </p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';
            $contenido .= '<p>Email: ' . $respuestas['email'] . '</p>';
            $contenido .= '<p>Telefono: ' . $respuestas['telefono'] . '</p>';
            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Vende o Compra: ' . $respuestas['tipo'] . '</p>';
            $contenido .= '<p>Precio o Presupuesto: $' . $respuestas['precio'] . '</p>';
            $contenido .= '<p>Prefieres ser contactado por: ' . $respuestas['contacto'] . '</p>';
            $contenido .= '<p>Fecha Contacto: ' . $respuestas['fecha'] . '</p>';
            $contenido .= '<p>Hora: ' . $respuestas['hora'] . '</p>';
            $contenido .= '</html>';


            
            $mail->Body = $contenido;

            $mail->AltBody = 'Esto es texto alternativo sin HTML';

            // Enviar el email
            if ($mail->send()) {
                echo "Mensaje enviado Correctamente";
            } else {
                echo "El mensaje no se pueod enviar...";
            }
            
        }
        $router ->render('paguinas/contacto',[

        ]);
    }
   
}