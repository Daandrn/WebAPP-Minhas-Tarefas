<?php 

try {

    $tipoBD = "pgsql";
    $host = "localhost";
    $baseDados = "MinhasTarefas";
    $usuario = "postgres";
    $senha = "123";
    
    $conexao = new PDO("$tipoBD:host=$host;dbname=$baseDados", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $erro) {
    echo "Erro na conexao ao banco de dados: " . $erro->getMessage();
}

?>