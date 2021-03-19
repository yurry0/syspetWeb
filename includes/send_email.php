<?php

    $email = $_POST['email'];

    require 'PHPMailer/PHPMailerAutoload.php';


    $mail = new PHPMailer;
    $mail->isSMTP();

    //Configurações do Servidor de E-Mail

    $mail->Host = "smtp.gmail.com";
    $mail->Port = "587";
    $mail->SMTPSecure = "tls";
    $mail->SMTPAuth = true;
    $mail->Username= "syspetweb@gmail.com";
    $mail->Password= "sysadmin!";

    

    //Configuração da mensagem

    $mail->setFrom($mail->Username, "SysPet");
    $mail->addAddress($email); // Destinatário
    $mail->Subject = utf8_encode(" Solicitacao de Nova Senha ");
    $conteudo_email ="A sua nova senha é: $novasenha
    Syspet.

    ";
    $mail->isHTML(true);
    $mail->Body = $conteudo_email;

    if($mail->send()){
        $_SESSION['email_feito'] = true;
        echo "E-mail enviado com sucesso";
        header('Location: esqueceu_senha.php'); 

    }

    else{

        echo "Falha ao enviar e-mail: ".$mail->ErrorInfo;

    }


    ?>