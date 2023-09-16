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
        // Configurações do servidor SMTP
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host = 'smtp.seuhost.com';  // Substitua pelo seu servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'seu_email@example.com';  // Substitua pelo seu email
        $mail->Password = 'sua_senha';  // Substitua pela sua senha
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Use ENCRYPTION_SMTPS se necessário
        $mail->Port = 587;  // Porta do servidor SMTP

        // Destinatário
        $mail->setFrom('seu_email@example.com', 'Seu Nome');
        $mail->addAddress('destinatario@example.com');  // Substitua pelo endereço do destinatário

        // Conteúdo do email
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
