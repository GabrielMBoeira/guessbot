    $(document).ready(function () {
        $('#answer-write').keyup(function () {
            $('#answer-read').text(this.value).css({'color': 'white'});
            console.log(this.value)
        });
    })

