$(document).ready(function(){



    $("#meu2").click(function(){

        $.ajax({
            url: "../api/cadastrar_usuario" ,
            method: "POST",
            data: { 

                nome : $("#nome").val() ,
                email: $("#email").val(),
                senha: $("#senha").val(),
                telefone: $("#telefone").val(),
                nascimento : $("#nascimento").val() ,
                genero: $("#genero").val(),
             },






            success: function (res) {


                console.log(res);
            },

        });

    });



});