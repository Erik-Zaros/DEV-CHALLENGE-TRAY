<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $mensagem = $_POST["mensagem"];

    $mail = new PHPMailer(true);

    try {
        
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host = 'smtp.seuhost.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'seu_email@example.com'; 
        $mail->Password = 'sua_senha'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port = 587;  

        $mail->setFrom('seu_email@example.com', 'Seu Nome');
        $mail->addAddress('destinatario@example.com'); 

        $mail->isHTML(false);
        $mail->Subject = 'Formulário de Contato - ' . $nome;
        $mail->Body = "Nome: $nome\n";
        $mail->Body .= "Email: $email\n";
        $mail->Body .= "Mensagem:\n$mensagem";

        $mail->send();

        echo 'Email enviado com sucesso!';
    } catch (Exception $e) {
        echo "Erro ao enviar o email: {$mail->ErrorInfo}";
    }
}
?>

