<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefa :: Atualizar</title>

    <?php
    include "referencias.php"
        ?>
</head>

<body>
    <br>
    <?php

    $id = $_POST["txtId"];
    $descricao = $_POST["txtDescricao"];
    $data_entrega = $_POST["txtData"];
    $prioridade = $_POST["txtPrioridade"];
    $responsavel = $_POST["txtResponsavel"];

    // Prepara a instrução SQL
    // Os '?' são parametros para os dados
    $sql = "UPDATE tarefa SET descricao = ?, data_entrega = ?, prioridade = ?, responsavel = ? WHERE id = ?";

    // Prepara o comando
    $comando = $conexao->prepare($sql);

    
    // Vincula os parâmetros à instrução
    // 's' significa string, 'i' significa integer, 'd' significa double
    // O número de 's's deve corresponder ao número de '?'s
    $comando->bind_param("ssssi", $descricao, $data_entrega, $prioridade, $responsavel,$id);

    // Executa o statement
    if ($comando->execute()) {
        echo "<h1 class='alert alert-success'>Tarefa atualizada com sucesso!</h1>";
    } else {
        echo "<h1 class='alert alert-danger'>Erro ao atualizar a tarefa:</h1> " ;
    }

    // Fecha o statement e a conexão
    $comando->close();
    $conexao->close();
    ?>
</body>

</html>