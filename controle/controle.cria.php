<?php 

require_once __DIR__ . "/../classe/tarefa.php";
require_once __DIR__ . "/../servico/servicos.php";

$carregaStatusTarefa = carregaStatusTarefa();

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['salvar']) && $_POST['salvar'] === "Salvar") {
    
    $idTarefa = GeraIdTarefa();
    $statusTarefa = $_POST['statusTarefa'];
    $descricaoTarefa = $_POST['descricaoTarefa'];
    $tarefaCria = $_POST['tarefa'];
    $prazoTarefa = str_ireplace('T', ' ', $_POST['prazoTarefa']);

    // cria tarefa
    $tarefa = new Tarefa (
        $idTarefa,
        $statusTarefa,
        $descricaoTarefa,
        $tarefaCria,
        $prazoTarefa
    );
    $tarefa->CriaTarefa();
    header("location: /inicio");

}

require_once __DIR__ . "/../visao/visao.cria.php";

?>