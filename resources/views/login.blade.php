<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - XLCars</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #0a0a0a;
            color: #f0f0f0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-image: linear-gradient(rgba(10, 10, 10, 0.9), rgba(10, 10, 10, 0.9)), 
                              url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M50,5 L60,35 L90,35 L65,55 L75,85 L50,70 L25,85 L35,55 L10,35 L40,35 Z" fill="%23D4AF37" opacity="0.1"/></svg>');
        }
        
        .container {
            width: 100%;
            max-width: 450px;
            background-color: #111111;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.15);
            border: 1px solid #333;
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .header {
            background-color: #000000;
            padding: 30px 30px 20px;
            text-align: center;
            border-bottom: 3px solid #D4AF37;
        }
        
        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        
        .logo-icon {
            color: #D4AF37;
            font-size: 40px;
            margin-right: 15px;
        }
        
        .logo-text {
            font-size: 36px;
            font-weight: 700;
            color: #D4AF37;
            letter-spacing: 2px;
        }
        
        .header h1 {
            font-size: 24px;
            font-weight: 300;
            color: #f0f0f0;
            margin-bottom: 5px;
        }
        
        .header p {
            color: #888;
            font-size: 14px;
        }
        
        .form-container {
            padding: 30px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #D4AF37;
            font-weight: 600;
            font-size: 14px;
        }
        
        .input-container {
            position: relative;
        }
        
        input {
            width: 100%;
            padding: 15px 15px 15px 45px;
            background-color: #1a1a1a;
            border: 1px solid #333;
            border-radius: 8px;
            color: #f0f0f0;
            font-size: 15px;
            transition: all 0.3s ease;
        }
        
        input:focus {
            outline: none;
            border-color: #D4AF37;
            box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.2);
        }
        
        input::placeholder {
            color: #555;
            font-size: 14px;
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #D4AF37;
            font-size: 18px;
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #D4AF37;
            cursor: pointer;
            font-size: 18px;
        }
        
        .forgot-password {
            text-align: right;
            margin-top: 5px;
        }
        
        .forgot-password a {
            color: #D4AF37;
            text-decoration: none;
            font-size: 13px;
            transition: color 0.3s ease;
        }
        
        .forgot-password a:hover {
            color: #c19b2e;
            text-decoration: underline;
        }
        
        .btn-login {
            width: 100%;
            padding: 16px;
            background-color: #D4AF37;
            color: #000;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 30px 0 20px;
        }
        
        .btn-login:hover {
            background-color: #c19b2e;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }
        
        .btn-login i {
            margin-right: 10px;
            font-size: 18px;
        }
        
        .register-link {
            text-align: center;
            color: #888;
            font-size: 15px;
            margin-bottom: 20px;
        }
        
        .register-link a {
            color: #D4AF37;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        
        .register-link a:hover {
            color: #c19b2e;
            text-decoration: underline;
        }
        
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: #555;
            font-size: 14px;
            margin: 20px 0;
        }
        
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #333;
        }
        
        .divider::before {
            margin-right: 10px;
        }
        
        .divider::after {
            margin-left: 10px;
        }
        
        .social-login {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 15px;
        }
        
        .social-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #1a1a1a;
            border: 1px solid #333;
            color: #D4AF37;
            font-size: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .social-btn:hover {
            background-color: #D4AF37;
            color: #000;
            transform: translateY(-3px);
            border-color: #D4AF37;
        }
        
        .error-message {
            display: none;
            background-color: rgba(255, 68, 68, 0.1);
            color: #ff4444;
            padding: 12px;
            border-radius: 8px;
            border-left: 4px solid #ff4444;
            margin-bottom: 20px;
            font-size: 14px;
            align-items: center;
            gap: 10px;
        }
        
        .error-message i {
            font-size: 16px;
        }
        
        .success-message {
            display: none;
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #1a3c1a;
            color: #4CAF50;
            padding: 15px 25px;
            border-radius: 8px;
            border-left: 4px solid #4CAF50;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            z-index: 1000;
            animation: slideIn 0.5s ease;
        }
        
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        .car-animation {
            position: relative;
            height: 60px;
            overflow: hidden;
            margin: 20px 0;
        }
        
        .car-animation i {
            position: absolute;
            color: #D4AF37;
            font-size: 40px;
            animation: drive 8s linear infinite;
        }
        
        @keyframes drive {
            from { left: -50px; }
            to { left: 100%; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <i class="fas fa-crown logo-icon"></i>
                <div class="logo-text">XLCARS</div>
            </div>
            <h1>Bem-vindo de volta!</h1>
            <p>Faça login para acessar sua conta</p>
        </div>
    
            
            <!-- Formulário de login -->

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <div class="input-container">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" id="email" placeholder="Digite seu e-mail" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <div class="input-container">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" id="senha" placeholder="Digite sua senha" required>
                        <i class="fas fa-eye password-toggle" id="toggleSenha"></i>
                    </div>
                    <div class="forgot-password">
                        <a href="#">Esqueceu a senha?</a>
                    </div>
                </div>
                
                <button type="button" id="meu3" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Entrar
                </button>


    
    <script>
    $(document).ready(function(){

   
    $("#meu3").click(function(){

       
        $.ajax({
            url: "../api/login",
            method: "GET",
            data: { 
                
                email: $("#email").val(),
                senha: $("#senha").val(),

            },success: function(response){
                console.log(response)
                if(response['erro'] =='n'){
                    console.log(response)
                    
                    $.cookie('token',response['token'],{expire:7});

                    

                    setTimeout(function(){
                        window.location.href="/"; 
                    },2000);
                    
                }else{

                    }
                },

            error: function (xhr) {

                
            }
        });
    });
});
</script>

            

</body>
</html>