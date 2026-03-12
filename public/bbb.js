$(document).ready(function(){

   
    $("#meu3").click(function(){

       
        $.ajax({
            url: "../api/login",
            method: "GET",
            data: { 
                
                email: $("#email").val(),
                senha: $("#senha").val(),

            },success: function(response){
                if(response['erro'] =='n'){
                    alert("loguei");
                    $.cookie('token',response['token'],{expire:7});

                    

                    setTimeout(function(){
                        window.location.href="/"; 
                    },2000);
                    
                }else{

                    }
                },

            error: function (xhr) {

                console.log("Erro ao consultar status Pix:", xhr.responseText);
            }
        });
    });
});