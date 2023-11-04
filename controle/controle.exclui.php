<?php 

require_once __DIR__ . "/../classe/tarefa.php";

$idExcluiTarefa = (int) $_GET['idTarefa'];

// exclui tarefa
$tarefa = new Tarefa (
    $idExcluiTarefa
);
$tarefa->ExcluiTarefa();
header("location: /inicio");

?>
