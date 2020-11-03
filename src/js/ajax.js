//ENVIANDO PERGUNTA PARA O GUESSBOT (VIEW: ASK)
$(document).ready(function () {
    $('#form1').submit(function (e) {
        e.preventDefault();

        var u_question = $('#question1').val();

        $.ajax({
            url: 'ajax_insert_question',
            method: 'post',
            data: { question: u_question },
        }).done(function (result) {
            console.log(result)
        });
    })
});


//RECUPERANDO PERGUNTA (VIEW: PRANKUSER)
function getQuestion() {
    $.ajax({
        url: 'ajax_get_database',
        method: 'GET',
        dataType: 'json'
    }).done(function (result) {
        for (var i = 0; i < result.length; i++) {
            $('#question2').html(result[i].question);
        }
    });
}


//ENVIANDO RESPOSTA PARA USUARIO (VIEW: PRANKUSER)
$(document).ready(function () {
    $('#form2').submit(function (e) {
        e.preventDefault();

        var u_answer = $('#answer2').val();

        $.ajax({
            url: 'ajax_insert_answer',
            method: 'POST',
            data: { answer: u_answer },
            dataType: 'json'
        }).done(function (result) {
            console.log(result)
            $('#answer2').val('');

        });
    });
});


//RECUPERANDO RESPOSTA (VIEW: ASK)
function getAnswer() {

    $.ajax({
        url: 'ajax_get_database',
        method: 'GET',
        dataType: 'json'
    }).done(function (result) {
        for (var i = 0; i < result.length; i++) {
            $('#answer1').html(result[i].answer);
        }
    });
}

//MONITORANDO PERGUNTAS E RESPOSTAS DE 1s EM 1s.
setInterval(() => {
    getQuestion();
    getAnswer();
}, 1000);