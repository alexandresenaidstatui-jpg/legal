$(document).ready(function(){

    alert("TO FUNFANDO");


    $("#meu").click(function(){

        $.ajax({
            url: "../api/alterar_carro" ,
            method: "PUT",
            data: { 
                id_carro :$("#id_carro").val(),
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

                alert("salvado cria")
                console.log(res);
            },

        });

    });



});