<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-mail de Boas-vindas</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            width: 100%;
            background: #000000;
            border: 1px solid #d4af37;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5), 0 0 20px rgba(212, 175, 55, 0.3);
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Cabeçalho dourado */
        .header {
            background: linear-gradient(135deg, #d4af37 0%, #ffd700 50%, #b8960c 100%);
            padding: 40px 30px;
            text-align: center;
            position: relative;
        }

        .header::before {
            content: '✦';
            position: absolute;
            top: 10px;
            left: 20px;
            font-size: 30px;
            color: #000;
            opacity: 0.3;
        }

        .header::after {
            content: '✦';
            position: absolute;
            bottom: 10px;
            right: 20px;
            font-size: 30px;
            color: #000;
            opacity: 0.3;
        }

        .logo-icon {
            font-size: 60px;
            margin-bottom: 15px;
            display: inline-block;
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0%, 100% { text-shadow: 0 0 10px rgba(0,0,0,0.3); }
            50% { text-shadow: 0 0 20px rgba(0,0,0,0.5); }
        }

        .header h1 {
            color: #000000;
            font-size: 28px;
            letter-spacing: 2px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .header p {
            color: #1a1a1a;
            font-size: 14px;
            opacity: 0.8;
        }

        /* Conteúdo principal */
        .content {
            padding: 40px 35px;
            background: #000000;
        }

        .welcome-message {
            margin-bottom: 30px;
            border-left: 4px solid #d4af37;
            padding-left: 20px;
        }

        .welcome-message h2 {
            color: #d4af37;
            font-size: 32px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .welcome-message .user-name {
            color: #ffd700;
            font-size: 24px;
            margin-bottom: 15px;
            font-weight: 500;
        }

        .success-text {
            color: #e0e0e0;
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .highlight {
            color: #d4af37;
            font-weight: 600;
        }

        /* Card de informações */
        .info-card {
            background: #0a0a0a;
            border: 1px solid #d4af37;
            border-radius: 15px;
            padding: 25px;
            margin: 30px 0;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.2);
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 10px;
            border-bottom: 1px solid #1a1a1a;
        }

        .info-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .info-icon {
            font-size: 24px;
            margin-right: 15px;
            min-width: 40px;
            color: #d4af37;
        }

        .info-label {
            color: #d4af37;
            font-weight: 600;
            min-width: 100px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .info-value {
            color: #ffffff;
            font-size: 16px;
        }

        /* Botão dourado */
        .button-container {
            text-align: center;
            margin: 35px 0 25px;
        }

        .btn-gold {
            display: inline-block;
            background: linear-gradient(135deg, #d4af37 0%, #ffd700 50%, #b8960c 100%);
            color: #000000;
            padding: 14px 35px;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
            letter-spacing: 1px;
        }

        .btn-gold:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(212, 175, 55, 0.4);
            background: linear-gradient(135deg, #e5c158 0%, #ffe44d 50%, #c9a52d 100%);
        }

        /* Separador decorativo */
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 30px 0;
            color: #d4af37;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #d4af37;
        }

        .divider span {
            margin: 0 15px;
            font-size: 20px;
        }

        /* Rodapé */
        .footer {
            background: #0a0a0a;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #d4af37;
        }

        .footer p {
            color: #888;
            font-size: 12px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .social-links {
            margin-top: 20px;
        }

        .social-icon {
            display: inline-block;
            width: 35px;
            height: 35px;
            background: #1a1a1a;
            color: #d4af37;
            text-decoration: none;
            border-radius: 50%;
            line-height: 35px;
            margin: 0 5px;
            transition: all 0.3s ease;
            font-size: 18px;
        }

        .social-icon:hover {
            background: #d4af37;
            color: #000000;
            transform: translateY(-3px);
        }

        /* Responsividade */
        @media (max-width: 480px) {
            .content {
                padding: 30px 20px;
            }
            
            .welcome-message h2 {
                font-size: 26px;
            }
            
            .welcome-message .user-name {
                font-size: 20px;
            }
            
            .success-text {
                font-size: 16px;
            }
            
            .info-item {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .info-icon {
                margin-bottom: 8px;
            }
            
            .info-label {
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Cabeçalho Dourado -->
        <div class="header">
            <div class="logo-icon">✦</div>
            <h1>XLMOTORS</h1>
            <p>Excelência em tecnologia</p>
        </div>

        <!-- Conteúdo Principal -->
        <div class="content">
            <div class="welcome-message">
                <h2>Bem-vindo(a)!</h2>
                <div class="user-name">{{ $usuario->nome }}</div>
                <p class="success-text">
                    <span class="highlight">✓</span> Você foi <span class="highlight">cadastrado com sucesso</span> em nossa plataforma!
                </p>
                <p class="success-text">
                    Estamos muito felizes em tê-lo(a) conosco. Prepare-se para uma experiência única e exclusiva.
                </p>
            </div>

            <!-- Card com informações do usuário -->
            <div class="info-card">
                <div class="info-item">
                    <div class="info-icon">📧</div>
                    <div class="info-label">E-mail:</div>
                    <div class="info-value">{{ $usuario->email ?? 'usuario@exemplo.com' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-icon">🆔</div>
                    <div class="info-label">ID do usuário:</div>
                    <div class="info-value">{{ $usuario->id ?? rand(10000, 99999) }}</div>
                </div>
                <div class="info-item">
                    <div class="info-icon">📅</div>
                    <div class="info-label">Data de cadastro:</div>
                    <div class="info-value">{{ date('d/m/Y H:i:s') }}</div>
                </div>
                <div class="info-item">
                    <div class="info-icon">⭐</div>
                    <div class="info-label">Status:</div>
                    <div class="info-value">Ativo</div>
                </div>
            </div>

            <!-- Botão de ação -->
            <div class="button-container">
                <a href="#" class="btn-gold">ACESSAR MINHA CONTA →</a>
            </div>

            <!-- Separador decorativo -->
            <div class="divider">
                <span>✦</span>
            </div>

            <div class="info-card" style="background: #050505;">
                <div class="info-item">
                    <div class="info-icon">🎯</div>
                    <div class="info-label">Próximos passos:</div>
                    <div class="info-value" style="font-size: 14px;">
                        ✓ Complete seu perfil<br>
                        ✓ Explore nossos recursos<br>
                        ✓ Ative notificações
                    </div>
                </div>
            </div>
        </div>

        <!-- Rodapé -->
        <div class="footer">
            <p>© 2026 XLMOTORS - Todos os direitos reservados</p>
            <p>Este é um e-mail automático, por favor não responda.</p>
            <p>Caso tenha dúvidas, entre em contato com nosso suporte: <span style="color: #d4af37;">suporte@xlmotors.com</span></p>
            <div class="social-links">
                <a href="#" class="social-icon">📘</a>
                <a href="#" class="social-icon">📷</a>
                <a href="#" class="social-icon">🐦</a>
                <a href="#" class="social-icon">💼</a>
            </div>
        </div>
    </div>
</body>
</html>