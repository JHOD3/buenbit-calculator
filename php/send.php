<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Rakit\Validation\Validator;

request($_POST['email'],$_POST['full_name'],'Contacto Buenbit Pro');
function request($mail_from_address, $mail_from_name, $mail_subject){
    $validator = new Validator;

    try {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $monto = $_POST['monto'];
        $meses = $_POST['meses'];
        $monto_recibir = $_POST['monto_recibir'];

        $validation = $validator->validate($_POST, [
            'full_name' => 'required|max:128',
            'email'     => 'required|email',
            'monto' =>'required',
            'meses'   => 'required',
            'monto_recibir' => 'required'
        ]);

        $validation->validate();
        if ($validation->fails()) {
            // Debido a que la validacion se realiza del lado front con javascript
            // aqui le devolvemos un error 422, porque se asume que el usuario esta intentando
            // realizar una accion indevida tatando de saltarse la regla de javascript
            http_response_code(302);
            header('Location: /index.php');
            exit(0);
        }
        if (!hash_equals($_SESSION['token'], $_POST['token']) || !$_POST['token']) {
            http_response_code(422);
            header('Location: /index.php');
            exit(0);
        }

        sendForm($mail_from_address, $mail_from_name, $mail_subject, $full_name, $email, $monto, $meses, $monto_recibir);
    } catch (Exception $e) {
        header('HTTP/1.1 500 Internal Server Error');
        exit(0);
    }
}

function sendForm($mail_from_address, $mail_from_name, $mail_subject, $full_name, $email, $monto, $meses, $monto_recibir){
    try {
        $mail = new PHPMailer();
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        //datos de acceso al sevidor smtp <<<INIT>>>
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'XXXXXXXXX';
        $mail->Password   = 'XXXXXXXXXX';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->IsHTML(true);
        //<<<END>>>

        // Emisor de email
        $mail->setFrom('jsdlcs266@gmail.com', 'Contacto Buenbit Pro');
        //$mail->setFrom($mail_from_address, $mail_from_name);
        // Establecer una dirección de respuesta alternativa
        $mail->addReplyTo($email, $full_name);
        // Establecer a quién se enviará el mensaje
        //$mail->addAddress('pro@buenbit.com', 'Buenbit Pro');
        $mail->addAddress('jsdlcs266@gmail.com', 'Buenbit Pro');
        // Asunto
        $mail->Subject = $mail_subject; // '[BBPro.pe] Contacto';
        // Mensaje
        $body = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '../email_plantilla.html');
        $body = str_replace('%full_name%', $full_name, $body);
        $body = str_replace('%email%', $email, $body);
        $body = str_replace('%monto%', $monto, $body);
        $body = str_replace('%meses%', $meses, $body);
        $body = str_replace('%monto_recibir%', $monto_recibir, $body);

        //$mail->Body =  $msg;
        $mail->MsgHTML($body);
        $mail->send();
        header("Location:../gracias.php");
    } catch (Exception $e) {
        header('HTTP/1.1 500 Internal Server Error');
        exit(0);
    }
}
