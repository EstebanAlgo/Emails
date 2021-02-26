<?php

use Phpmailer\PHPMailer\PHPMailer;
use Phpmailer\PHPMailer\Exception;

require 'Phpmailer/Exception.php';
require 'Phpmailer/PHPMailer.php';
require 'Phpmailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
  //Server settings ------------------SERVIDOR---------------
  $mail->SMTPDebug = 0;                                       // Enable verbose debug output
  $mail->isSMTP();                                            // Set mailer to use SMTP
  $mail->Host       = 'platanerosoconusco.com';                       // Specify main and backup SMTP servers
  $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
  $mail->Username   = 'sistemas@platanerosoconusco.com';                // SMTP username
  $mail->Password   = 'sistemas2019';                        // SMTP password
  $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
  $mail->Port       = 587;                                    // TCP port to connect to
  $mail->CharSet    = 'UTf-8';

  //Recipients
  $mail->setFrom('sistemas@platanerosoconusco.com');
  $mail->FromName = "Cobafrut";
  $mail->addAddress('almanza_1811@hotmail.com', 'Usuario'); // AÑADIR CORREO DESTINATARIO
  $mail->addEmbeddedImage('images/cobafrut.jpg', 'logo');     // Agregar una imagen   
  $mail->addEmbeddedImage('images/2019.jpg', 'logo21');
  $mail->addEmbeddedImage('images/contactomail.jpg', 'coba');
  date_default_timezone_set("Mexico/General"); // Zona Horaria de Mexico
  $fecha = date("d-m-Y g:i:s:a");

  // Content
  $mail->isHTML(true);                                   // Set email format to HTML
  $mail->Subject = 'Asunto: Programa Semanal Fijo';
  $mail->Body =

    ' <!DOCTYPE html>
    <html lang="en">
    <head>

        <meta charset="UTF-8">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <title></title>
        
    </head>
  

    <div class="principal">
    <img src="cid:logo" style="width: 13%;height:auto;">
        </div>' . "<br>" . "<br>" .

    '<div style="text-align: center ;border: 2px dashed #000; display: inline-block; text-align: center; padding: .5em 0.8em .3em;">
 
           <h3 style="color:#FF0000;">---Mensaje de Aviso---</h3>
             <p style="color:#FFFFFF  ; text-align: justify;"> <b> Hola usuario Cobafrut te avisamos  que tienes un pendiente por realizar en tu programa semanal fijo.   </b></p>
             <p style="text-align: justify;">El cual debes cumprirlo en lo mas probable.
             </p>  

             <p>
              Atetamente: <br> 
             Equipo de Cobafrut
             </p>
             <b> Fecha y Hora:' . $fecha . '"<br>"
        </div>' . '    
        <div  style="background-color:; width: 100%; center; ">

         
        
          ' . '<br>' .



    '<div style="text-align: left;">
        <div style="text-align: center;">
        <img src="cid:logo21" style="width: 30%;height:auto;"/>
        </div>' . '<br>' . '   

          


    </div>
<div class="footer" style="background-color:MediumSeaGreen;">
<img src="cid:coba" style="width: 100%; height:auto;">
           </div>
    </body>
    </html>';
  $mail->send();
  echo '<script> alert("Alerta Enviada")</script>';
} catch (Exception $e) {
  echo "Hubo un error al enviar un mensaje" . $e;
}
echo $mail->Body;
