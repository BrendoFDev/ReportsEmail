<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if ($_POST) {
    
    $nome_cidade = $_POST['cidade'];
    $id_cidade = $_POST['id'];
    $data = $_POST['data'];
    $url = $_POST['url'];
    $desc = $_POST['desc'];
    $file = $_FILES['arquivo'];

    
    $Enviado = false;

    ob_start();
    try {
        
        set_time_limit(60);
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = "spacegroupbombeiros@gmail.com";                     //SMTP username
        $mail->Password   = "ybtxtkrrxoaiybjh";                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('spacegroupbombeiros@gmail.com', 'Denuncia SG Bombeiros');
        $mail->addAddress('edsonmdm@hotmail.com', 'Denuncia');     //Add a recipient
        $mail->addReplyTo('spacegroupbombeiros@gmail.com', 'Reply');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Denuncia';
        $mail->Body    = "<!DOCTYPE html>
    <html lang=pt-br>
    <head>
        <meta charset=UTF-8>
        <meta http-equiv=X-UA-Compatible content=IE=edge>
        <meta name=viewport content=width=device-width, initial-scale=1.0>
        <link rel=preconnect href=https://fonts.googleapis.com>
        <link rel=preconnect href=https://fonts.gstatic.com crossorigin>
        <link href=https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap rel=stylesheet>
        
        <title>Denuncia SG Bombeiros</title>
        <link rel=shortcut icon type=image/x-icon href=IMG/escudo_bombeiro_2.0_icon.ico>
        <style>
            body{
                margin:0;
                padding:0;
                display:flex;
                flex-direction:column;
                justify-content:center;
                align-items:center;
                font-family: Roboto, sans-serif;
                font-weight: 400;
                font-style: normal;
            }
            #all{
                display: flex;
                width:fit-content;
                flex-direction: column;
                justify-content: left;
                align-items: center;
                align-content: center;
            }
            #denuncia{
                width: 280px;
                height: fit-content;
                justify-content:center;
                border:2px solid black;
                border-radius: 5px;
                padding: 5px;
                font-size:18px
            }
            #desc{
                display:flex;
                width:auto;
                text-align:justify;
                word-wrap: break-word;
            }
            div{
                margin:10px;
            }
        </style>
    </head>
    <body>
        <div id=all>
            <div id=denuncia>
            <div id=Local>
            Local da Ocorrencia:<br>
            " . $nome_cidade . "  <br><br>ID:<br>" . $id_cidade . "
        </div>
        <div id=url>
            URL:<br> " . $url . "
        </div>
        <div id=data>
            Data do ocorrido: " . date("d/m/Y", strtotime($data)) . "
        </div>
        <div id=desc 
        style=word-wrap:break-word;>
            Descrição do ocorrido: <br>
            " . $desc . "
        </div>
            </div>
        </div>
    </body>
    </html>";
        
    
        $mail->AltBody = '';
        if (!empty(($file['tmp_name']))) {
            $mail->addAttachment($file['tmp_name'], $file['name']);
        }
        if ($mail->send()) {
            header("location:confirm.html");
            exit;
        }
    } catch (Exception $e) {
        echo "O Email não pode ser enviado, Fale com o Host. <br> Exception: {$mail->ErrorInfo}";
    }
    ob_end_flush();
}
