function getAjax(input, file) {
    var pagina = file;

    $.ajax({
        url:pagina,
        type:'POST',
        beforeSend: function () {
            $('#result').html('Carregando...');
        },
        data: {input: input},
        success: function(msg) {
            $('#result').html(msg)
        }
    })
}