<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$bd = "projeto";

// Criando nova conexão 
global $conexao;
$conexao = mysqli_connect($servidor, $usuario, $senha, $bd);
// Verificar a conexão 
if (!$conexao) {
    die("Falha na conexão" . mysqli_connect_error());
}

function executarComando($sql) {
    global $conexao;
    if (mysqli_query($conexao, $sql)) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexao);
        return false;
    }
}

function executarComandoRetornarID($sql) {
    global $conexao;
    if (mysqli_query($conexao, $sql)) {
        $ultimo_id = mysqli_insert_id($conexao);
        return $ultimo_id;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexao);
        return 0;
    }
}

function retornarDados($sql) {
    global $conexao;
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        return $resultado;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexao);
        //return 0;
    }
}
?>



