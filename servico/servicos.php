<?php 

function conexaoServicos() : PDO{

    require __DIR__ . "/../conexao.php";

    return $conexao;
    
}

function carregaTarefas() {

    try {
        
        $consulta = conexaoServicos()->prepare("SELECT tarefas.id, statustarefa.descricao AS status_tarefa, tarefas.descricao, tarefa, prazo 
                                        FROM tarefas
                                        INNER JOIN statustarefa ON tarefas.status_tarefa = statustarefa.id
                                        ORDER BY tarefas.prazo ASC");
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;

    } catch (PDOException $erro) {
        echo "Erro ao carregar tarefa: " . $erro->getMessage();
    }

}

function carregaTarefa(int $idTarefa) {

    try {
        
        $consulta = conexaoServicos()->prepare("SELECT tarefas.id, statustarefa.id AS id_status,statustarefa.descricao AS status_tarefa, tarefas.descricao, tarefa, prazo 
                                        FROM tarefas
                                        INNER JOIN statustarefa ON tarefas.status_tarefa = statustarefa.id
                                        WHERE tarefas.id = :id");
        $consulta->bindParam(':id', $idTarefa, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    
        return $resultado;
    
    } catch (PDOException $erro) {
        echo "Erro ao carregar tarefa: " . $erro->getMessage();
    }
    
}

function carregaStatusTarefa() {

    try {
        
        $consulta = conexaoServicos()->prepare("SELECT * FROM statustarefa");
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;

    } catch (PDOException $erro) {
        echo "Erro ao carregar status: " . $erro->getMessage();
    }

}

function GeraIdTarefa() : int {
    
    try {
        
        $consulta = conexaoServicos()->query("SELECT max(id) AS id FROM tarefas");
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        $idTarefa = $resultado['id'] + 1;

        return $idTarefa;

    } catch (PDOException $erro) {
        echo "Erro ao buscar id ultima tarefa: " . $erro->getMessage();
    }

}

?>
