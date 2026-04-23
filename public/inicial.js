$(document).ready(function(){

 

    $("#meu").click(function(){

        $.ajax({
            url: "../api/salva_carro" ,
            method: "POST",
            data: { 
                token:token,
                modelo : $("#modelo").val() ,
                email: $("#email").val(),
                cor: $("#cor").val(),
                ano: $("#ano").val(),
                placa : $("#placa").val() ,
                dono: $("#dono").val(),
                valor: $("#valor").val(),
                potencia: $("#potencia").val(),
                tipo_gasolina: $("#tipo_gasolina").val(),
                fabricante: $("#fabricante").val()

             },
            success: function (res) {
                console.log('funcionei')

                console.log(res);
            },

        });

    });



});