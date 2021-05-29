<?php




$email = $_POST['email'];

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();

$mail->Host = "smtp.gmail.com";
$mail->Port = "587";
$mail->SMTPSecure = "tls";
$mail->SMTPAuth = true;
$mail->Username = "syspetweb@gmail.com";
$mail->Password = "sysadmin!";


//Configuração da Mensagem 

$mail->setFrom($mail->Username, "SysPet - Sistema de Adoções de Animais na Web");
$mail->addAddress($email); //Destinario
$mail->Subject = "Recuperação de Senha";

$conteudo_email = "A sua nova senha é: $novasenha 
<br>
<br>
<br>
Syspet.";


$mail->isHTML(true);
$mail->Body = $conteudo_email;

if ($mail->send()) {
    $_SESSION['email_feito'] = true;
    echo "E-mail enviado com sucesso";
    //    header('Location: esqueceu_senha.php'); 

} else {

    echo "Falha ao enviar e-mail: " . $mail->ErrorInfo;
}
