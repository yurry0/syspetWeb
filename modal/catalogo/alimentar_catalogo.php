    <div class="content">
        <div class="container">
            <?php
            $adocao = new pet_rn();
            $dados = $adocao->buscaTotal();
            $contador = 0;
            $novaLinha = true;            
            while ($row = $dados->fetch_assoc()) {
                if ($novaLinha) {
                    echo "<div class='card-deck'>";
                    $novaLinha = false;
                }
                echo "<div class='card text-center'>";
                echo "<img class='mx-auto' scr='img/pet-care.png'";
                echo "<div class='card-body'>";
                echo '<td>' . '<img width="250" style="align-self: center;" height="250" src="Uploads/' . $row['img_pet'] . '"/>';
                echo "<h4 class='card-title'>" . $row['nome'] . "<h4> <br>";
                echo "<p class='card=text'> Raça: " . $row['raca'] . "</p>";
                echo "<button type='button' id='detalhes' class='modalButton btn btn-primary' data-toggle='modal' data-target='#detailsModal'
                        data-img='" . $row['img_pet'] . "'
                        data-pk-id-pet='" . $row['pk_id_pet'] . "'
                        data-nome='" . $row['nome'] . "'
                        data-raca='" . $row['raca'] . "'
                        data-idade='" . $row['idade'] . "'
                        data-sexo='" . $row['sexo'] . "'
                        data-vacinas='" . $row['vacinas'] . "'
                        data-peso='" . $row['peso'] . "'
                        data-altura='" . $row['altura'] . "'
                        data-especie='" . $row['especie'] . "'
                        data-pelagem='" . $row['pelagem'] . "'
                        data-porte='" . $row['porte'] . "'>
                        +Detalhes
                        </button>";
                echo "</div>";
                echo "";
                $contador++;
                if ($contador == 3) {
                    echo "";
                    $novaLinha = true;
                    $contador = 0;
                }
            }
            ?>
     
    </div>
