<?php 

 class Tarefa {

    private int $idTarefa;
    private ?int $statusTarefa;
    private ?string $descricaoTarefa;
    private ?string $tarefa;
    private ?string $prazoTarefa;

    public function __construct(int $idTarefa, int $statusTarefa = null, string $descricaoTarefa = null, string $tarefa = null, string $prazoTarefa = null) {

        $this->idTarefa = $idTarefa;
        $this->statusTarefa = $statusTarefa;
        $this->descricaoTarefa = $descricaoTarefa;
        $this->tarefa = $tarefa;
        $this->prazoTarefa = $prazoTarefa;
        
    }
    
    public function CriaTarefa() : void {
        
        try {
            
            $consulta = Tarefa::ConexaoClasse()->prepare("INSERT INTO tarefas VALUES (:id, :statusTarefa, :descricao, :tarefa, :prazo)");
            $consulta->bindParam(':id', $this->idTarefa, PDO::PARAM_INT);
            $consulta->bindParam(':statusTarefa', $this->statusTarefa, PDO::PARAM_INT);
            $consulta->bindParam(':descricao', $this->descricaoTarefa, PDO::PARAM_STR);
            $consulta->bindParam(':tarefa', $this->tarefa, PDO::PARAM_STR);
            $consulta->bindParam(':prazo', $this->prazoTarefa, PDO::PARAM_STR);
            $consulta->execute();
            
        } catch (PDOException $erro) {
            echo "Erro ao criar tarefa: " . $erro->getMessage();
        }
        
    }

    public function atualizaTarefa() : void {
        
        try {
            
            $consulta = Tarefa::ConexaoClasse()->prepare("UPDATE tarefas SET status_tarefa = :statusTarefa, descricao = :descricao, tarefa = :tarefa, prazo = :prazo WHERE id = :id");
            $consulta->bindParam(':id', $this->idTarefa, PDO::PARAM_INT);
            $consulta->bindParam(':statusTarefa', $this->statusTarefa, PDO::PARAM_INT);
            $consulta->bindParam(':descricao', $this->descricaoTarefa, PDO::PARAM_STR);
            $consulta->bindParam(':tarefa', $this->tarefa, PDO::PARAM_STR);
            $consulta->bindParam(':prazo', $this->prazoTarefa, PDO::PARAM_STR);
            $consulta->execute();
            
        } catch (PDOException $erro) {
            echo "Erro ao atualizar tarefa: " . $erro->getMessage();
        }
        
    }
    
    public function ExcluiTarefa() : void {
        
        try {
            
            $consulta = Tarefa::ConexaoClasse()->prepare("DELETE FROM tarefas WHERE id = :id");
            $consulta->bindParam(':id', $this->idTarefa, PDO::PARAM_INT);
            $consulta->execute();
            
        } catch (PDOException $erro) {
            echo "Erro ao excluir tarefa: " . $erro->getMessage();
        }
        
    }

    public static function ConexaoClasse() : PDO{

        require __DIR__ . "/../conexao.php";
    
        return $conexao;
        
    }

}

?>