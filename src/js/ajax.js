
$('#form1').submit(function (e) {
    e.preventDefault();

    var u_question = $('#question1').val();

    $.ajax({
        url: 'ajax_question',
        method: 'post',
        data: { question: u_question },
    }).done(function (result) {
        console.log(result)
    });
})

function getQuestion() {

    $.ajax({
        url: 'ajax_answer',
        method: 'GET',
        dataType: 'json'
    }).done(function (result) {

        for (var i = 0; i < result.length; i++) {
            $('#question2').html(result[i].question);
        }

    });
}

setInterval(() => {
    getQuestion();
}, 1000);
