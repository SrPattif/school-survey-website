<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalho de OT - Painel do Administrador - Criar Pesquisa</title>

    <!-- Estilos -->
    <link rel="stylesheet" href="./index.css" />

    <!-- Bibliotecas Externas -->
    <script src="https://use.fontawesome.com/8aae9daeac.js"></script>
</head>

<body>
    <form method="POST" action="../../libs/admin/addQuestion.php">
        <h2 class="bold">Adicionar Pergunta</h2>
        <p>Informe o ID da pesquisa:</p>
        <input name="surveyID" type="number">
        <p>Informe o título da pergunta:</p>
        <input name="answerName" type="text"><br>
        <button type="submit">Adicionar Pergunta</button>
    </form>
</body>

</html>