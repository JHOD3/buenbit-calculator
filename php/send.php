<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Rakit\Validation\Validator;


function request($mail_from_address, $mail_from_name, $mail_subject){
    $validator = new Validator;

    try {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $business_name = $_POST['business_name'];
        $message = htmlspecialchars($_POST['message']);

        $validation = $validator->validate($_POST, [
            'full_name' => 'required|max:128',
            'email'     => 'required|email',
            'business_name' =>'required|max:128',
            'message'   => 'required|max:1500'
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
        sendForm($mail_from_address, $mail_from_name, $mail_subject, $full_name, $email, $business_name, $message);
    } catch (Exception $e) {
        header('HTTP/1.1 500 Internal Server Error');
        exit(0);
    }
}

function sendForm($mail_from_address, $mail_from_name, $mail_subject, $full_name, $email, $business_name, $message ){
    try {
        $mail = new PHPMailer();
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        //datos de acceso al sevidor smtp <<<INIT>>>
        $mail->Host       = getenv('SMTP_HOST');
        $mail->SMTPAuth   = true;
        $mail->Username   = getenv('SMTP_USER');
        $mail->Password   = getenv('SMTP_PASSWORD');
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->IsHTML(true);
        //<<<END>>>

        // Emisor de email
        //$mail->setFrom('contacto@pro.buenbit.com', 'Contacto Buenbit Pro');
        $mail->setFrom($mail_from_address, $mail_from_name);
        // Establecer una dirección de respuesta alternativa
        $mail->addReplyTo($email, $full_name);
        // Establecer a quién se enviará el mensaje
        $mail->addAddress('pro@buenbit.com', 'Buenbit Pro');
        // Asunto
        $mail->Subject = $mail_subject; // '[BBPro.pe] Contacto';
        // Mensaje
        $body = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/../templates/mail_template.html');
        $body = str_replace('%full_name%', $full_name, $body);
        $body = str_replace('%email%', $email, $body);
        $body = str_replace('%business_name%', $business_name, $body);
        $body = str_replace('%message%', $message, $body);
        $body = str_replace('%date%', date('d/m/Y', time()), $body);

        //$mail->Body =  $msg;
        $mail->MsgHTML($body);
        $mail->send();
        header("Location:" . $_SERVER['HTTP_REFERER']);
    } catch (Exception $e) {
        header('HTTP/1.1 500 Internal Server Error');
        exit(0);
    }
}

?>
