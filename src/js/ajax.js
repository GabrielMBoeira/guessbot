// function getAjax(input, file) {
//     var pagina = file;

//     $.ajax({
//         url:pagina,
//         type:'POST',
//         beforeSend: function () {
//             $('#result').html('Carregando...');
//         },
//         data: {input: input},
//         success: function(msg) {
//             $('#result').html(msg)
//         }
//     })
// }

// function ajax(id_input, file) {
//     var req = new XMLHttpRequest();
//     req.onreadystatechange = function() {
//         if (req.readyState == 4 && req.status == 200) {
//             document.getElementById(id_input).innerHTML = req.responseText;
//         }
//     }
//     req.open('GET', file, true);
//     req.send();
// }



