<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa - Responder</title>

    <!-- Estilos -->
    <link rel="stylesheet" href="./index.css" />

    <!-- Bibliotecas Externas -->
    <script src="https://use.fontawesome.com/8aae9daeac.js"></script>

    <title>Trabalho de OT - Detalhes da Entrevista</title>
</head>

<body>
    <div class="header">
        Pesquisa
    </div>

    <div class="page-content">
        <div class="error" id="error">
            <div class="description">
                <span id="error-description">A data informada é inválida.</span>
            </div>
        </div>

        <div class="central-message">
            <p>Esta pesquisa foi desenvolvida com o intuito de tentar provar a veracidade de horóscopos
                por meio da entrevista de alunos do Colégio Padre João Bagozzi.<br>A entrega das respostas é
                <b>completamente anônima</b>, sendo o dia e mês de nascimento o único dado pessoal requerido.
            </p>
            <p>Tempo médio para resposta completa: <b>de 1 a 2 minutos</b></p>

            <div class="date-input">
                <hr>
                Informe o dia e mês do aniversário:<br>
                <input type="text" placeholder="DD" class="input-number" id="input-day">/<input type="text"
                    placeholder="MM" class="input-number" id="input-month">
            </div>

            <div class="button">
                <div class="survey-start-button" id="survey-start">
                    Iniciar Pesquisa
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        Desenvolvido por Gustavo Antonio<br>
        <a href="https://www.instagram.com/ogustavo.a/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="https://twitter.com/srpattif_dev"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        <a href="https://github.com/SrPattif"><i class="fa fa-github" aria-hidden="true"></i></a><br>
        <a href="../feedback" class="feedback"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Enviar Feedback</a>


    </div>

    <script>
    var startButton = document.getElementById('survey-start');

    var dayInput = document.getElementById('input-day');
    var monthInput = document.getElementById('input-month');

    startButton.addEventListener('click', () => {
        const date = new Date();

        let day = parseInt(dayInput.value);
        let month = parseInt(monthInput.value);

        if (!day || !month) {
            document.getElementById('error-description').innerHTML = "Preencha todos os campos de dia e mês.";
            document.getElementById('error').style.display = "block";
            return;
        }

        if (day > 31 || day < 1 || month < 1 || month > 12) {
            document.getElementById('error-description').innerHTML = "A data informada é inválida.";
            document.getElementById('error').style.display = "block";
            return;
        } else {
            document.getElementById('error').style.display = "none";
        }

        date.setMonth(month - 1);
        date.setDate(day);
        const findSign = (date) => {
            const days = [21, 20, 21, 21, 22, 22, 23, 24, 24, 24, 23, 22];
            const signs = ["Aquarius", "Pisces", "Aries", "Taurus", "Gemini", "Cancer", "Leo", "Virgo",
                "Libra", "Scorpio", "Sagittarius", "Capricorn"
            ];
            let month = date.getMonth();
            let day = date.getDate();
            if (month == 0 && day <= 20) {
                month = 11;
            } else if (day < days[month]) {
                month--;
            };
            return signs[month];
        };

        const getSurveyIDFromSign = (sign) => {
            if (sign == "Aquarius") return 1;
            if (sign == "Pisces") return 12;
            if (sign == "Aries") return 2;
            if (sign == "Taurus") return 3;
            if (sign == "Gemini") return 4;
            if (sign == "Cancer") return 5;
            if (sign == "Leo") return 6;
            if (sign == "Virgo") return 7;
            if (sign == "Libra") return 8;
            if (sign == "Scorpio") return 9;
            if (sign == "Sagittarius") return 10;
            if (sign == "Capricorn") return 11;
        }
        window.location.href = "../surveyAnswer/?surveyID=" + getSurveyIDFromSign(findSign(date));
    })
    </script>

    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script>
    $(document).ready(function() {
        console.log('a');
        $('#input-day').mask('00');
        $('#input-month').mask('00');
    });
    </script>
</body>

</html>