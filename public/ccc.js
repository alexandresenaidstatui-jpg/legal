$(document).ready(function(){



    $("#meu").click(function(){

        $.ajax({
            url: "../api/salva_servico" ,
            method: "POST",
            data: { 

                modelo : $("#nome").val() ,
                email: $("#contato").val(),
                cor: $("#tipo").val(),
                ano: $("#cidade").val(),
                placa : $("#descricão").val() ,
                valor: $("#valor").val()


             },
            success: function (res) {
                console.log('funcionei')

                console.log(res);
            },

        });

    });



});