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
        <form method="POST">
            <div class="divBotaoNovo">
                <button class="Botoes" onclick="window.location.href='/inicio'" type="button">Inicio</button>
                <input class="Botoes" name="salvar" type="submit" value="Salvar">
            </div>
            <span class="juntaCoropoExibicao">
                <span class="cabecalhoExibicao">
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
                <span class="corpoExibicao">
                    <select class="estadoFormat" name="statusTarefa" required>
                        <option value="1">Cadastrar</option>
                    </select>
                    <input class="descricaoFormat" type="text" name="descricaoTarefa" autofocus value="" required>
                    <input class="prazoFormat" type="datetime-local" name="prazoTarefa" min="<?php echo date('Y-m-dTH:m');?>" max="2050-12-31T23:59" value="" required>
                </span>
                <span id="alteraTarefa">
                    <div class="tarefaFormat">
                        Tarefa
                    </div>
                    <textarea class="tarefaFormat" name="tarefa" type="text" required></textarea>
                </span>
            </span>
        </form>
    </main>
    <footer>
        <p>Minhas Tarefas &trade; 2023</p>
        <p>Todos os direitos reservados &copy;</p>
    </footer>
</body>
</html>