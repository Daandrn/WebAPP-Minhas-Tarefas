<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Minhas tarefas</title>
</head>
<body>
    <header class="cabecalho">
        <h1>
            Minhas tarefas
        </h1>
    </header>
    <main class="principal">
        <div id="divBotoesInicio">
            <input type="search" name="filtraInicio" id="" placeholder="Pesquisar" value="">
            <button class="Botoes" onclick="window.location.href='/controle/controle.cria.php'">
                Nova tarefa
            </button>
        </div>
        <span class="juntaCoropoExibicao">
            <span class="cabecalhoExibicao">
                <div class="idFormat">
                    Código tarefa
                </div>
                <div class="estadoFormat">
                    Estado
                </div>
                <div class="descricaoFormat">
                    Descrição
                </div>
                <div class="prazoFormat">
                    Prazo
                </div>
            </span>
            <?php foreach($carregaTarefas as $tarefas): ?>
                <span class="corpoExibicao" id="linkAltera" onclick="window.location.href='/controle/controle.atualiza.php?idAltera=<?php echo $tarefas['id']; ?>'" >
                    <div class="idFormat">
                        <?php echo $tarefas['id']; ?>
                    </div>
                    <div class="estadoFormat">
                        <?php echo $tarefas['status_tarefa']; ?>
                    </div>
                    <div class="descricaoFormat">
                        <?php echo $tarefas['descricao']; ?>
                    </div>
                    <div class="prazoFormat">
                        <?php $data = date_create($tarefas['prazo']); echo date_format($data, 'd/m/Y h:m');
                        ?>
                    </div>
                </span>
            <?php endforeach; ?>
        </span>
    </main>
    <footer>
        <p>Minhas Tarefas &trade; 2023</p>
        <p>Todos os direitos reservados &copy;</p>
    </footer>
</body>
</html>