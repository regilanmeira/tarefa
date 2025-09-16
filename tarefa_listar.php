<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas :: Listar</title>

    <?php
    include "referencias.php";

    ?>

</head>

<body>
    <form action="" method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">


                <br>
                    <h2>Tarefas :: Listar</h2>

                    <br>

                    <div class="form-group">
                        <table>


                            <tr>
                                <th>Descrição</th>
                                <th>Data</th>
                                <th>Prioridade</th>
                                <th>Responsável</th>
                            </tr>

                            <?php
                            // Prepara a instrução SQL com um placeholder '?'
                            $sql = "SELECT * FROM tarefa ORDER BY data_entrega DESC";

                            // Prepara o statement
                            $comando = $conexao->prepare($sql);

                            // Executa o statement
                            $comando->execute();

                            // Pega o resultado da consulta
                            $resultado = $comando->get_result();

                            while($registro = $resultado->fetch_assoc())
                                {
                                   
                                   $descricao = $registro["descricao"];
                                   $data_entrega = $registro["data_entrega"];
                                   $prioridade = $registro["prioridade"];
                                   $responsavel = $registro["responsavel"];      
                            ?>

                            <tr>
                                <td><?php echo $descricao ?></td>
                                <td><?php echo $data_entrega ?></td>
                                <td><?php echo $prioridade ?></td>
                                <td><?php echo $responsavel ?></td>
                            </tr>
                            
                            <?php } ?>
                        

                        </table>
                    </div>

                    <br>

                    <div class="form-group">

                        <a href="index.php">
                            <button type="button" class="btn btn-danger" name="btVoltar">
                                Voltar
                            </button>
                        </a>

                    </div>

                </div>

            </div>
        </div>

    </form>

</body>

</html>