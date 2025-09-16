<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefa :: Marcar</title>

    <?php
    include "referencias.php"
        ?>
</head>

<body>
    <br>
    <?php

    $descricao = $_POST["txtDescricao"];
    $data_entrega = $_POST["txtData"];
    $prioridade = $_POST["txtPrioridade"];
    $responsavel = $_POST["txtResponsavel"];

    // Prepara a instrução SQL
    // Os '?' são parametros para os dados
    $sql = "INSERT INTO tarefa (descricao, data_entrega, prioridade,responsavel) VALUES (?, ?, ?, ?)";

    // Prepara o comando
    $comando = $conexao->prepare($sql);


    // Vincula os parâmetros à instrução
    // 's' significa string, 'i' significa integer, 'd' significa double
    // O número de 's's deve corresponder ao número de '?'s
    $comando->bind_param("ssss", $descricao, $data_entrega, $prioridade, $responsavel);

    // Executa o statement
    if ($comando->execute()) {
        echo "<h1 class='alert alert-success'>Nova tarefa criado com sucesso!</h1>";
    } else {
        echo "<h1 class='alert alert-danger'>Erro ao inserir o registro:</h1> "; 
    }

    // Fecha o statement e a conexão
    $comando->close();
    $conexao->close();
    ?>
</body>

</html>