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
    <form method="POST" action="../../libs/admin/createSurvey.php" typ>
        <h2 class="bold">Criar Pesquisa</h2>
        <p>Informe o título da pesquisa:</p>
        <input name="surveyTitle" type="text">
        <p>O título da pesquisa permanecerá visivel?</p>
        <select name="surveyTitleVisible" id="">
            <option value="1">Sim</option>
            <option value="0">Não</option>
        </select>
        <p>Informe a descrição da pesquisa:</p>
        <textarea name="surveyDescription" id="" cols="30" rows="10"></textarea><br>
        <button type="submit">Criar Pesquisa</button>
    </form>
</body>

</html>