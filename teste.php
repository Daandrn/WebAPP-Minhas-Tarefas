<?php 

function conexaoServicos() : PDO{

    require __DIR__ . "/conexao.php";

    return $conexao;
    
}

function carregaStatusTarefas() {

    try {

        $consulta = conexaoServicos()->query("SELECT * FROM statustarefa");
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;

    } catch (PDOException $erro) {
        echo "Erro ao carregar status: " . $erro->getMessage();
    }

}

function carregaTarefas() {

    try {
        
        $consulta = conexaoServicos()->query("SELECT tarefas.id, statustarefa.descricao AS status_tarefa, tarefas.descricao, tarefa, prazo 
                                        FROM tarefas
                                        INNER JOIN statustarefa ON tarefas.status_tarefa = statustarefa.id");
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;

    } catch (PDOException $erro) {
        echo "Erro ao carregar tarefa: " . $erro->getMessage();
    }

}

var_dump(carregaTarefas());
var_dump(carregaStatusTarefas());

?>