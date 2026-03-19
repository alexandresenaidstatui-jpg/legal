<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil - XLCars</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: #0a0a0a;
            min-height: 100vh;
            padding: 20px;
            background-image: linear-gradient(rgba(10, 10, 10, 0.9), rgba(10, 10, 10, 0.9)), 
                              url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M50,5 L60,35 L90,35 L65,55 L75,85 L50,70 L25,85 L35,55 L10,35 L40,35 Z" fill="%23D4AF37" opacity="0.1"/></svg>');
        }
        
        /* Scrollbar personalizada */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #1a1a1a;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #D4AF37;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #c19b2e;
        }
        
        .profile-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        /* Card principal */
        .profile-card {
            background-color: #111111;
            border: 1px solid #333;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.15);
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Header do perfil */
        .profile-header {
            background-color: #000000;
            border-bottom: 3px solid #D4AF37;
            padding: 30px;
            position: relative;
        }
        
        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
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
        
        /* Capa do perfil */
        .profile-cover {
            height: 150px;
            background: linear-gradient(45deg, #D4AF37 0%, #000000 100%);
            border-radius: 10px 10px 0 0;
            position: relative;
            margin-bottom: 60px;
        }
        
        /* Avatar */
        .profile-avatar {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: -40px;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid #D4AF37;
            background-color: #1a1a1a;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .avatar-placeholder {
            font-size: 60px;
            color: #D4AF37;
        }
        
        .edit-avatar {
            position: absolute;
            bottom: 5px;
            right: 5px;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: #D4AF37;
            border: 2px solid #000;
            color: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .edit-avatar:hover {
            background-color: #c19b2e;
            transform: scale(1.1);
        }
        
        /* Informações do usuário */
        .user-info {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .user-name {
            font-size: 28px;
            font-weight: 700;
            color: #f0f0f0;
            margin-bottom: 5px;
        }
        
        .user-email {
            color: #888;
            font-size: 16px;
            margin-bottom: 15px;
        }
        
        .user-badge {
            display: inline-block;
            padding: 5px 15px;
            background-color: rgba(212, 175, 55, 0.1);
            border: 1px solid #D4AF37;
            border-radius: 20px;
            color: #D4AF37;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        /* Estatísticas */
        .stats-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 30px 0;
            flex-wrap: wrap;
        }
        
        .stat-item {
            text-align: center;
            min-width: 100px;
        }
        
        .stat-value {
            font-size: 24px;
            font-weight: 700;
            color: #D4AF37;
        }
        
        .stat-label {
            color: #888;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        /* Abas de navegação */
        .profile-tabs {
            display: flex;
            border-bottom: 1px solid #333;
            margin-bottom: 25px;
            overflow-x: auto;
        }
        
        .tab-btn {
            padding: 12px 25px;
            background: none;
            border: none;
            color: #888;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
            border-bottom: 3px solid transparent;
        }
        
        .tab-btn i {
            margin-right: 8px;
        }
        
        .tab-btn:hover {
            color: #D4AF37;
        }
        
        .tab-btn.active {
            color: #D4AF37;
            border-bottom-color: #D4AF37;
        }
        
        /* Conteúdo das abas */
        .tab-content {
            display: none;
            padding: 20px;
        }
        
        .tab-content.active {
            display: block;
        }
        
        /* Formulário de edição */
        .form-label {
            color: #D4AF37;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 8px;
        }
        
        .input-group {
            background-color: #1a1a1a;
            border: 1px solid #333;
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .input-group:focus-within {
            border-color: #D4AF37;
            box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.2);
        }
        
        .input-group-text {
            background-color: transparent;
            border: none;
            color: #D4AF37;
            font-size: 18px;
            padding: 12px 15px;
        }
        
        .form-control, .form-select {
            background-color: transparent;
            border: none;
            color: #f0f0f0;
            font-size: 15px;
            padding: 12px 15px 12px 0;
        }
        
        .form-control:focus, .form-select:focus {
            background-color: transparent;
            box-shadow: none;
            color: #f0f0f0;
        }
        
        .form-control::placeholder {
            color: #555;
        }
        
        .form-select option {
            background-color: #1a1a1a;
            color: #f0f0f0;
        }
        
        /* Botões */
        .btn-gold {
            background-color: #D4AF37;
            color: #000;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-gold:hover {
            background-color: #c19b2e;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }
        
        .btn-outline-gold {
            background-color: transparent;
            border: 1px solid #D4AF37;
            color: #D4AF37;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-outline-gold:hover {
            background-color: #D4AF37;
            color: #000;
        }
        
        .btn-danger-custom {
            background-color: transparent;
            border: 1px solid #ff4444;
            color: #ff4444;
        }
        
        .btn-danger-custom:hover {
            background-color: #ff4444;
            color: #000;
        }
        
        /* Cards de carros */
        .car-card {
            background-color: #1a1a1a;
            border: 1px solid #333;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .car-card:hover {
            transform: translateY(-5px);
            border-color: #D4AF37;
            box-shadow: 0 10px 20px rgba(212, 175, 55, 0.1);
        }
        
        .car-image {
            height: 160px;
            background: linear-gradient(45deg, #222, #111);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        
        .car-image i {
            font-size: 60px;
            color: #D4AF37;
            opacity: 0.5;
        }
        
        .car-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 5px 10px;
            background-color: #D4AF37;
            color: #000;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .car-info {
            padding: 15px;
        }
        
        .car-title {
            font-size: 18px;
            font-weight: 700;
            color: #f0f0f0;
            margin-bottom: 5px;
        }
        
        .car-details {
            color: #888;
            font-size: 14px;
            margin-bottom: 10px;
        }
        
        .car-price {
            color: #D4AF37;
            font-size: 20px;
            font-weight: 700;
        }
        
        .car-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        
        .car-action-btn {
            flex: 1;
            padding: 8px;
            background: none;
            border: 1px solid #333;
            border-radius: 5px;
            color: #888;
            transition: all 0.3s ease;
        }
        
        .car-action-btn:hover {
            border-color: #D4AF37;
            color: #D4AF37;
        }
        
        /* Histórico */
        .history-item {
            display: flex;
            align-items: center;
            padding: 15px;
            background-color: #1a1a1a;
            border: 1px solid #333;
            border-radius: 10px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }
        
        .history-item:hover {
            border-color: #D4AF37;
        }
        
        .history-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgba(212, 175, 55, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }
        
        .history-icon i {
            font-size: 24px;
            color: #D4AF37;
        }
        
        .history-content {
            flex: 1;
        }
        
        .history-title {
            color: #f0f0f0;
            font-weight: 600;
            
            margin-bottom: 5px;
        }
        
        .history-date {
            color: #888;
            font-size: 12px;
        }
        
        .history-status {
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .status-completed {
            background-color: rgba(76, 175, 80, 0.1);
            color: #4CAF50;
        }
        
        .status-pending {
            background-color: rgba(255, 193, 7, 0.1);
            color: #ffc107;
        }
        
        /* Alertas */
        .alert-custom {
            background-color: rgba(255, 68, 68, 0.1);
            color: #ff4444;
            border: none;
            border-left: 4px solid #ff4444;
            border-radius: 8px;
        }
        
        .alert-success-custom {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #1a3c1a;
            color: #4CAF50;
            border: none;
            border-left: 4px solid #4CAF50;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            z-index: 1000;
            animation: slideIn 0.5s ease;
            min-width: 300px;
        }
        
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        /* Responsividade */
        @media (max-width: 768px) {
            .profile-header {
                padding: 20px;
            }
            
            .logo-text {
                font-size: 28px;
            }
            
            .user-name {
                font-size: 24px;
            }
            
            .stats-container {
                gap: 15px;
            }
            
            .stat-item {
                min-width: 70px;
            }
            
            .profile-tabs {
                flex-wrap: nowrap;
            }
            
            .tab-btn {
                padding: 10px 15px;
                font-size: 14px;
            }
            
            .tab-btn i {
                margin-right: 5px;
            }
        }
        
        @media (max-width: 576px) {
            .profile-avatar {
                width: 100px;
                height: 100px;
            }
            
            .avatar-placeholder {
                font-size: 50px;
            }
            
            .user-name {
                font-size: 20px;
            }
            
            .stat-value {
                font-size: 20px;
            }
            
            .stat-label {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-card">
            <!-- Header -->
            <div class="profile-header">
                <div class="logo">
                    <i class="fas fa-crown logo-icon"></i>
                    <div class="logo-text">XLCARS</div>
                </div>
                
                <!-- Capa e Avatar -->
                <div class="profile-cover">
                    <div class="profile-avatar" id="profileAvatar">
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSszTevDZL90v_9smokdnXaGHKa9oSzwTww2g&s" style="width: 150px; height: 150px; border-radius: 50%; border: 4px solid #D4AF37; object-fit: cover; object-position: center 20%;">
                            <i class="fas fa-camera"></i>
                        </div>
                    </div>
                </div>
                
                <!-- Informações do usuário -->
                <div class="user-info">
                    <h2 class="user-name" value="{{$usuario->nome}}" id="userNameDisplay">{{$usuario->nome}}</h2>
                    <div class="user-email" id="userEmailDisplay">{{$usuario->email}}</div>
                    <div class="user-badge">
                        <i class="fas fa-crown me-1"></i> Membro Premium
                    </div>
                </div>

            <!-- Conteúdo das abas -->
            <div class="tab-content active" id="tab-info">
                <div class="row g-4">
                    <div class="col-md-6">
                        <h5 class="text-gold mb-3">
                            <i class="fas fa-info-circle me-2"></i>Informações Pessoais
                        </h5>
                        
                        <div class="mb-4">
                            <label class="form-label">Nome Completo</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" class="form-control" id="profileName" value="{{$usuario->nome}}">
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">E-mail</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" class="form-control" id="profileEmail" value="{{$usuario->email}}">
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">Telefone</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-phone"></i>
                                </span>
                                <input type="text" class="form-control" id="profilePhone" value="{{$usuario->telefone}}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <h5 class="text-gold mb-3">
                            <i class="fas fa-calendar me-2"></i>Informações Adicionais
                        </h5>
                        
                        <div class="mb-4">
                            <label class="form-label">Data de Nascimento</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-calendar"></i>
                                </span>
                                <input type="date" class="form-control" id="profileBirth" value="{{$usuario->nascimento}}">
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">Gênero</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-venus-mars"></i>
                                </span>
                                <input type="text" class="form-control" id="profileBirth" value="{{$usuario->genero}}">
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">Localização</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                                <input type="text" class="form-control" id="profileLocation" value="{{$usuario->cidade}}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <hr class="border-secondary">
                        <div class="d-flex justify-content-end gap-2">
                            <button class="btn btn-outline-gold" id="cancelEdit">
                                <i class="fas fa-times me-2"></i>Cancelar
                            </button>
                            <button class="btn btn-gold" id="saveProfile">
                                <i class="fas fa-save me-2"></i>Salvar Alterações
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="tab-content" id="tab-cars">
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <button class="btn btn-gold" id="addCar">
                        <i class="fas fa-plus me-2"></i>Adicionar Carro
                    </button>
                </div>
                

            
            <div class="tab-content" id="tab-security">
                <div class="row g-4">
                    <div class="col-md-6">
                        <h5 class="text-gold mb-3">
                            <i class="fas fa-lock me-2"></i>Alterar Senha
                        </h5>
                        
                        <div class="mb-4">
                            <label class="form-label">Senha Atual</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" id="currentPassword" placeholder="••••••••">
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">Nova Senha</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-key"></i>
                                </span>
                                <input type="password" class="form-control" id="newPassword" placeholder="••••••••">
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">Confirmar Nova Senha</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-check"></i>
                                </span>
                                <input type="password" class="form-control" id="confirmPassword" placeholder="••••••••">
                            </div>
                        </div>
                        
                        <button class="btn btn-gold w-100" id="changePassword">
                            <i class="fas fa-sync-alt me-2"></i>Alterar Senha
                        </button>
                    </div>
                    
                    <div class="col-md-6">
                        <h5 class="text-gold mb-3">
                            <i class="fas fa-shield-alt me-2"></i>Autenticação
                        </h5>
                        
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center p-3" style="background-color: #1a1a1a; border-radius: 8px; border: 1px solid #333;">
                                <div>
                                    <i class="fas fa-mobile-alt text-gold me-2"></i>
                                    <span class="text-light">Autenticação de dois fatores</span>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="twoFactorAuth" style="cursor: pointer; background-color: #D4AF37; border-color: #D4AF37;">
                                </div>
                            </div>
                        </div>
                        
                        <h5 class="text-gold mb-3 mt-4">
                            <i class="fas fa-exclamation-triangle me-2"></i>Zona de Perigo
                        </h5>
                        
                        <div class="mb-3 p-3" style="background-color: #1a1a1a; border-radius: 8px; border: 1px solid #ff4444;">
                            <p class="text-light mb-3">Excluir permanentemente sua conta e todos os dados associados.</p>
                            <button class="btn btn-danger-custom w-100" id="deleteAccount">
                                <i class="fas fa-trash-alt me-2"></i>Excluir Conta
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal de Avatar -->
    <div class="modal fade" id="avatarModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-light">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title text-gold">
                        <i class="fas fa-camera me-2"></i>Alterar Foto de Perfil
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <div class="profile-avatar-preview mb-3">
                            <img src="https://i.imgflip.com/4/2gn9mj.jpg" style="width: 150px; height: 150px; border-radius: 50%; border: 4px solid #D4AF37; object-fit: cover;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-secondary">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-gold" data-bs-dismiss="modal">Salvar</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal de Exclusão -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-light">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title text-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>Confirmar Exclusão
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja excluir sua conta? Esta ação é <strong class="text-danger">irreversível</strong> e todos os seus dados serão perdidos.</p>
                    <div class="mb-3">
                        <label class="form-label text-gold">Digite sua senha para confirmar</label>
                        <input type="password" class="form-control" placeholder="••••••••">
                    </div>
                </div>
                <div class="modal-footer border-secondary">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <i class="fas fa-trash me-2"></i>Excluir Permanentemente
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Mensagem de sucesso -->
    <div class="alert-success-custom d-none" id="successMessage">
        <i class="fas fa-check-circle me-2"></i>Perfil atualizado com sucesso!
    </div>
    
    <!-- jQuery e Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        $(document).ready(function(){

    alert("TO FUNFANDO");




        $.ajax({
            url: "../api/perfil" ,
            method: "get",
            data: { 

                nome :$("#nome").text(),
                senha : $("#senha").val() ,
                email: $("#email").val(),
                telefone: $("#telefone").val(),
                nascimento: $("#mascimento").val(),
                genero : $("#genero").val() ,
                token:token

             },
            success: function (res) {

                alert("salvado cria")
                console.log(res);
            },

        });

   



});
    </script>
</body>
</html>