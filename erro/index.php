<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa - Ocorreu um erro</title>

    <!-- Estilos -->
    <link rel="stylesheet" href="./index.css" />

    <!-- Bibliotecas Externas -->
    <script src="https://use.fontawesome.com/8aae9daeac.js"></script>
</head>

<body>
    <div class="pageContent">
        <i class="fa fa-times" aria-hidden="true"></i><br>
        <span class="errorTitle">Ocorreu um Erro</span><br>
        <span class="errorDescription">Tivemos um problema enquanto tentávamos processar as informações. :/</span><br><br>
        <span class="errorCode">
            <?php
                if(!isset($_GET['id'])) {
                    echo('Erro Desconhecido');

                } else if($_GET['id'] == 1) {
                    echo('Página Não Encontrada');
                } else {
                    echo('Erro Desconhecido');
                }
            ?>
        </span><br><br>
        <a href="../" class="mainMenu"><i class="fa fa-home" aria-hidden="true"></i> Voltar ao menu principal</a>
    </div>
</body>

</html>