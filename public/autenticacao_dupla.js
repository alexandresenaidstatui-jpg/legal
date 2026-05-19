$(document).ready(function () {
    $('#enviar_codigo').click(function () {


        $.ajax({
            type: "GET",
            url: "api/enviar_codigo",
            data: {
                codigo: $('#codigo').val(),
                email: $('#email').val(),

            },
            dataType: "json",
            success: function (response) {

                if (response.erro == 'n') {

                    $.cookie('token', response.token, { expires: 7 });
                    alert('funcionou');

                    setTimeout(function () {
                        window.location.href = "/";
                    }, 1000);

                }
            },

        });
    });

});