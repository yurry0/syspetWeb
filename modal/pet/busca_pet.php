<?php
                  $conn=conexao();
                  try {
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT * FROM pet WHERE pk_id_pet=:pk_id_pet");
                    $stmt->bindParam(':pk_id_pet', $id);
                    $id = $_GET['id'];
                    $stmt->execute();
                    // set the resulting array to associative
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    foreach($stmt->fetchAll() as $k=>$v) {

                        $nome = $v['nome'];
                        $id = $v['pk_id_pet'];
                        $raca = $v['raca'];
                        $especie = $v['especie'];
                        $pelagem = $v['pelagem'];
                        $porte = $v['porte'];
                        $valid_date = date('d/m/y g:i A', strtotime($v['data_cadastro']));

                        
                        $sexo = $v['sexo'];
                        $idade = $v['idade'];
                        $vacinas = $v['vacinas'];
                        $altura = $v['altura'];
                        $peso = $v['peso'];
                        
                        if($v['adotado'] == 1){
                            $adotado = "Sim";

                        }
                        else{
                            $adotado = "Não";
                        }
                        $img_pet = $v['img_pet'];
                      
                                            
                    }
                  } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                  }
                  $conn = null;
                  //echo "</table>";
            ?>