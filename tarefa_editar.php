<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefa :: Editar</title>
    <?php
    include "referencias.php";
    ?>
</head>

<body>
    <br>
    <?php

    $id = "";
    $descricao = "";
    $data_entrega = "";
    $prioridade = "";
    $responsavel = "";

    // O ID do registro que você quer buscar
    $id = $_POST["txtId"]; // Por exemplo, buscar o usuário com ID 5
    
    // Prepara a instrução SQL com um placeholder '?'
    $sql = "SELECT * FROM tarefa WHERE id = ?";

    // Prepara o statement
    $comando = $conexao->prepare($sql);

    // Vincula o parâmetro à instrução
    // 'i' significa integer, pois o ID é um número inteiro
    $comando->bind_param("i", $id);

    // Executa o statement
    $comando->execute();

    // Pega o resultado da consulta
    $resultado = $comando->get_result();

    // Verifica se encontrou o registro
    if ($resultado->num_rows > 0) {
        // Pega o registro (array associativo)
        $registro = $resultado->fetch_assoc();

        $descricao = $registro["descricao"];
        $data_entrega = $registro["data_entrega"];
        $prioridade = $registro["prioridade"];
        $responsavel = $registro["responsavel"];

    } else {
        echo "Nenhum registro encontrado com o ID fornecido.";
    }

    // Fecha o statement e a conexão
    $comando->close();
    $conexao->close();
    ?>


    <form method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Tarefa :: Editar</h2>
                    <div class="form-group">
                        <label>Id</label>
                        <input  type="text" class="form-control" required="" placeholder="Id da tarefa" name="txtId"
                            value="<?php echo $id ?>">
                    </div>

                    <div class="form-group">
                        <label>Descrição</label>
                        <input type="text" class="form-control" required="" placeholder="Descricao da tarefa"
                            name="txtDescricao" value="<?php echo $descricao ?>">
                    </div>

                    <div class="form-group">
                        <label>Data</label>
                        <input type="date" class="form-control" required="" name="txtData"
                            value="<?php echo $data_entrega ?>">
                    </div>

                    <div class="form-group">
                        <label>Prioridade</label>
                        <select name="txtPrioridade" class="form-control">
                            <option <?php if ($prioridade == 'Alta')
                                echo 'selected'; ?> value="Alta">Alta</option>
                            <option <?php if ($prioridade == 'Média')
                                echo 'selected'; ?> value="Média">Média</option>
                            <option <?php if ($prioridade == 'Baixa')
                                echo 'selected'; ?> value="Baixa">Baixa</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Responsável</label>
                        <input type="text" class="form-control" placeholder="Responsável pela tarefa"
                            name="txtResponsavel" value="<?php echo $responsavel ?>">
                    </div>


                    <br>
                    <div class="form-group">

                        <button type="submit" class="btn btn-primary" name="btEditar" formaction="tarefa_atualizar.php">
                            Editar
                        </button>

                        <button type="submit" class="btn btn-warning" name="btExcluir" formaction="tarefa_deletar.php">
                            Excluir
                        </button>


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