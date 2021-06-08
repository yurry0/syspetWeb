<?php
                if (isset($_SESSION['usuario_existe'])) :
                ?>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Email de acesso já existe no banco de dados.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <?php
                endif;
                unset($_SESSION['usuario_existe']);

                ?>



                <?php
                if (isset($_SESSION['invalid_email'])) :
                ?>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Campos de e-mail não coincidem.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <?php
                endif;
                unset($_SESSION['invalid_email']);

                ?>



                <?php
                if (isset($_SESSION['nome_vazio'])) :
                ?>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Campo de nome está vazio ou inserido com somente espaços!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <?php
                endif;
                unset($_SESSION['nome_vazio']);

                ?>


                <?php
                if (isset($_SESSION['senha_vazia'])) :
                ?>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Campo de senha está vazio ou inserido com somente espaços!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <?php
                endif;
                unset($_SESSION['senha_vazia']);

                ?>


                <?php
                if (isset($_SESSION['invalid_senha'])) :
                ?>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Campos de senha não coincidem.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <?php
                endif;
                unset($_SESSION['invalid_senha']);

                ?>