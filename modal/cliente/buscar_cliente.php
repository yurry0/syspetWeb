<?php
                  $conn=conexao();
                  try {
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT * FROM cliente WHERE pk_id_cliente=:pk_id_cliente");
                    $stmt->bindParam(':pk_id_cliente', $id);
                    $id = $_GET['id'];
                    $stmt->execute();
                    // set the resulting array to associative
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    foreach($stmt->fetchAll() as $k=>$v) {
                      $nome = $v['cli_nome'];
                      $cidade = $v['cidade'];
                      $rg = $v['cli_rg'];
                      $estado = $v['cli_estado'];
                      $cep = $v['cli_cep'];
                      $endereco = $v['cli_endereco'];
                      $bairro = $v['cli_bairro'];
                      $email = $v['cli_email'];
                                            
                    }
                  } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                  }
                  $conn = null;
                  //echo "</table>";
            ?>