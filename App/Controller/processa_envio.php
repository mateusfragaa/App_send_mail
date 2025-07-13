<?php
namespace App\Controller;

// require '../../vendor/autoload.php';
require_once __DIR__ . '/../../vendor/autoload.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Model\Mensagem; // require '../Model/Mensagem.php';

$mensagem = new Mensagem();

// Setando valores do formulário do front-end
$mensagem->__set('para',htmlspecialchars($_POST['para']))->__set('assunto',htmlspecialchars($_POST['assunto']))->__set('mensagem',htmlspecialchars($_POST['mensagem']));

// Encerra o script caso o tenha dados faltando
if (!$mensagem->validaMensagem()){
    header('Location: ../../index.php?erro=login');
    die();
} 

//Load Composer's autoloader (created by composer, not included with PHPMailer)
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

// ínicio da session para armazenar dados dinâmicos
session_start();
try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->SMTPDebug = false;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'seuHost.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'seuEmail@.com';                     //SMTP username
    $mail->Password   = 'suaSenhaApp';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('seuEmail@.com', 'nome');
    $mail->addAddress($mensagem->__get('para'));     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $mensagem->__get('assunto');
    $mail->Body    = $mensagem->__get('mensagem');
    $mail->AltBody = $mensagem->__get('mensagem');

    $mail->send();

    $mensagem->setResposta(1, 'E-mail enviado com sucesso!');
    
    $_SESSION['status'] = $mensagem->__get('resposta')['status'];
    $_SESSION['mensagem'] = $mensagem->__get('resposta')['resposta'];
    header('Location: ../View/resposta.php');
    exit;

} catch (Exception $e) {

    $mensagem->setResposta(2, $mail->ErrorInfo);
    $_SESSION['status'] = $mensagem->__get('resposta')['status'];
    $_SESSION['mensagem'] = $mensagem->__get('resposta')['resposta'];
    header('Location: ../View/resposta.php');
    exit;
}