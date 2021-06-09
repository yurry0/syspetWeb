
<?php
    $corpo = "Adoção do animal"+$_SESSION['nome']+'realizada com sucesso, na data de'+$_SESSION['valid_date']+'pelo cliente'+$_SESSION['nome_cliente']+'<br>
    SyspetWeb';
    $email = $_POST['email'];

    require 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;
    $mail->isSMTP();

    //Configurações do Servidor de E-Mail

    $mail->Host = "smtp.gmail.com";
    $mail->Port = "587";
    $mail->SMTPSecure = "tsl";
    $mail->SMTPAuth = true;
    $mail->Username= "syspetweb@gmail.com";
    $mail->Password= "sysadmin!";

    

    //Configuração da mensagem

    $mail->setFrom($mail->Username, "SysPet");
    $mail->addAddress($email); // Destinatário
    $mail->Subject = utf8_encode("Adoção concluida com sucesso.");
    $conteudo_email = $corpo;
    $mail->isHTML(true);
    $mail->Body = $conteudo_email;

    if($mail->send()){
        $_SESSION['email_feito'] = true;
        echo "E-mail enviado com sucesso";



    }

    else{

        echo "Falha ao enviar e-mail: ".$mail->ErrorInfo;


    }

    header('recibo.php');

    ?>