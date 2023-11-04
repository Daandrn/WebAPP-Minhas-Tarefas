<?php 

require_once __DIR__ . "/../classe/tarefa.php";
require_once __DIR__ . "/../servico/servicos.php";

$idAlteraTarefa = $_GET['idAltera'];

$carregaTarefa = carregaTarefa($idAlteraTarefa);
$carregaStatusTarefa = carregaStatusTarefa();

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['salvar']) && $_POST['salvar'] === "Salvar") {
    
    $idTarefa = (int) $idAlteraTarefa;
    $statusTarefa = (int) $_POST['statusTarefa'];
    $descricaoTarefa = $_POST['descricaoTarefa'];
    $tarefaAtualiza = $_POST['tarefa'];
    $prazoTarefa = str_ireplace('T', ' ', $_POST['prazoTarefa']);
    
    // atualiza tarefa
    $tarefa = new Tarefa (
        $idTarefa,
        $statusTarefa,
        $descricaoTarefa,
        $tarefaAtualiza,
        $prazoTarefa
    );
    $tarefa->AtualizaTarefa();

    header("location: /controle/controle.atualiza.php?idAltera=$idTarefa");

}

require_once __DIR__ . "/../visao/visao.altera.php";

?>
