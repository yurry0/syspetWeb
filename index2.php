<!DOCTYPE html>
<html lang="pt-br">
<?php

session_start();

?>

<head>
    <meta charset="UTF-8">
    <title>Creative Code - login </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="css/modal_login_style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">


</head>

<body>

    <!-- partial:index.partial.html -->
    <div class="scroll-down">Creative Code - Role para Baixo
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
            <path d="M16 3C8.832031 3 3 8.832031 3 16s5.832031 13 13 13 13-5.832031 13-13S23.167969 3 16 3zm0 2c6.085938 0 11 4.914063 11 11 0 6.085938-4.914062 11-11 11-6.085937 0-11-4.914062-11-11C5 9.914063 9.914063 5 16 5zm-1 4v10.28125l-4-4-1.40625 1.4375L16 23.125l6.40625-6.40625L21 15.28125l-4 4V9z" />
        </svg>
    </div>
    <div class="container"></div>
    <form method="POST" action="login.php">
        <div class="modal">
            <div class="modal-container">
                <div class="modal-left">

                    <?php

                    if (isset($_SESSION['status_cadastro'])) :
                    ?>

                        <div class="alert alert-success" style="background-color: red;" role="alert">
                            <p style="background-color: yellow;"> Usuário cadastrado com sucesso. </p>
                        </div>

                    <?php
                    endif;
                    unset($_SESSION['status_cadastro']);

                    ?>




                    <?php
                    if (isset($_SESSION['nao_autenticado'])) :
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <p style="background-color: yellow;"> Usuário ou Senha inválidos. </p>
                        </div>
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
                    <h1 class="modal-title">Bem vindo ao Syspet WEB!</h1>
                    <p class="modal-desc">Realize o seu login para acessar as funções do sistema.</p>
                    <div class="input-block">
                        <label for="email" class="input-label">Email</label>
                        <input type="email" name="usuario" id="usuario" placeholder="Email de Acesso">
                    </div>
                    <div class="input-block">
                        <label for="password" class="input-label">Senha</label>
                        <input type="password" name="senha" id="senha" placeholder="Senha de Acesso">
                    </div>
                    <div class="modal-buttons">
                        <a href="esqueceu_senha.php" class="">Esqueceu sua senha?</a>
                        <button class="input-button">Login</button>
                    </div>
                    <p class="sign-up">Não tem uma conta?<a href="usuario_add_form.php">Cadastre-se</a></p>
                </div>
                <div class="modal-right">
                    <img src="img/Screenshot_4.png" style="height:fit-content;" alt="Pet">
                </div>

            </div>
            <button class="modal-button">Acessar</button>
        </div>

    </form>
    <!-- partial -->
    <script src="script/script.js"></script>

</body>

</html>