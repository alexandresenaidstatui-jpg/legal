<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Prestador - XLCars</title>

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
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-image: linear-gradient(rgba(10, 10, 10, 0.9), rgba(10, 10, 10, 0.9)),
                url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M50,5 L60,35 L90,35 L65,55 L75,85 L50,70 L25,85 L35,55 L10,35 L40,35 Z" fill="%23D4AF37" opacity="0.1"/></svg>');
        }

        .container-custom {
            max-width: 700px;
            width: 100%;
        }

        .provider-card {
            background-color: #111111;
            border: 1px solid #333;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.15);
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-header {
            background-color: #000000;
            border-bottom: 3px solid #D4AF37;
            padding: 30px;
            text-align: center;
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

        .card-header h1 {
            font-size: 24px;
            font-weight: 300;
            color: #f0f0f0;
            margin-bottom: 5px;
        }

        .card-header p {
            color: #888;
            font-size: 14px;
            margin-bottom: 0;
        }

        .card-body {
            padding: 30px;
        }

        /* Estilização dos inputs */
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

        .form-control,
        .form-select,
        textarea {
            background-color: transparent;
            border: none;
            color: #f0f0f0;
            font-size: 15px;
            padding: 12px 15px 12px 0;
        }

        .form-control:focus,
        .form-select:focus,
        textarea:focus {
            background-color: transparent;
            box-shadow: none;
            color: #f0f0f0;
        }

        .form-control::placeholder,
        textarea::placeholder {
            color: #555;
        }

        .form-select option {
            background-color: #1a1a1a;
            color: #f0f0f0;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        /* Botões */
        .btn-gold {
            background-color: #D4AF37;
            color: #000;
            border: none;
            padding: 12px 30px;
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
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-gold:hover {
            background-color: #D4AF37;
            color: #000;
        }

        .required::after {
            content: " *";
            color: #ff4444;
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
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            animation: slideIn 0.5s ease;
            min-width: 300px;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* Estados e Cidades */
        .row-selects {
            display: flex;
            gap: 10px;
        }

        .state-select {
            flex: 1;
        }

        .city-select {
            flex: 2;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .card-header {
                padding: 20px;
            }

            .logo-text {
                font-size: 28px;
            }

            .card-body {
                padding: 20px;
            }

            .row-selects {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="container-custom">
        <div class="provider-card">
            <div class="card-header">
                <div class="logo">
                    <i class="fas fa-crown logo-icon"></i>
                    <div class="logo-text">XLCARS</div>
                </div>
                <h1>Cadastro de Prestador de Serviço</h1>
                <p>Preencha seus dados para oferecer serviços automotivos</p>
            </div>

            <div class="card-body">
                <!-- Formulário de cadastro -->
                <form id="providerForm">
                    <div class="row g-4">
                        <!-- Nome do Prestador -->
                        <div class="col-12">
                            <label for="providerName" class="form-label required">Nome do Prestador</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" class="form-control" id="nome" alue="{{$servico->nome}}" placeholder="Digite seu nome completo ou nome da empresa" required>
                            </div>
                        </div>

                        <!-- Contato -->
                        <div class="col-md-6">
                            <label for="providerPhone" class="form-label required">Telefone/WhatsApp</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-phone-alt"></i>
                                </span>
                                <input type="tel" class="form-control" alue="{{$servico->contato}}" id="contato" placeholder="(11) 99999-9999"
                                    required>
                            </div>
                        </div>


                        <!-- Tipo de Serviço -->
                        <div class="col-12">
                            <label for="serviceType" class="form-label required">Tipo de Serviço</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-tools"></i>
                                </span>
                                <select class="form-select" alue="{{$servico->tipo}}" id="tipo" required>
                                    <option value="" selected disabled>Selecione o tipo de serviço</option>
                                    <option value="mecanica">Mecânica Geral</option>
                                    <option value="eletrica">Elétrica Automotiva</option>
                                    <option value="funilaria">Funilaria</option>
                                    <option value="pintura">Pintura</option>
                                    <option value="higienizacao">Higienização e Limpeza</option>
                                    <option value="vidros">Vidros e Para-brisas</option>
                                    <option value="suspensao">Suspensão</option>
                                    <option value="freios">Freios</option>
                                    <option value="injeção">Injeção Eletrônica</option>
                                    <option value="arcondicionado">Ar Condicionado</option>
                                    <option value="escapamento">Escapamento</option>
                                    <option value="alinhamento">Alinhamento e Balanceamento</option>
                                    <option value="som">Som e Acessórios</option>
                                    <option value="insulfilm">Insulfilm</option>
                                    <option value="guincho">Guincho</option>
                                    <option value="outros">Outros</option>
                                </select>
                            </div>
                        </div>

                        <!-- Cidade e Estado -->
                        <div class="col-12">
                            <label class="form-label required">Localização</label>
                            <div class="row-selects">
                                <div class="state-select">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                        <select class="form-select" alue="{{$servico->2}}" id="2" required>
                                            <option value="" selected disabled>Estado</option>
                                            <option value="AC">Acre (AC)</option>
                                            <option value="AL">Alagoas (AL)</option>
                                            <option value="AP">Amapá (AP)</option>
                                            <option value="AM">Amazonas (AM)</option>
                                            <option value="BA">Bahia (BA)</option>
                                            <option value="CE">Ceará (CE)</option>
                                            <option value="DF">Distrito Federal (DF)</option>
                                            <option value="ES">Espírito Santo (ES)</option>
                                            <option value="GO">Goiás (GO)</option>
                                            <option value="MA">Maranhão (MA)</option>
                                            <option value="MT">Mato Grosso (MT)</option>
                                            <option value="MS">Mato Grosso do Sul (MS)</option>
                                            <option value="MG">Minas Gerais (MG)</option>
                                            <option value="PA">Pará (PA)</option>
                                            <option value="PB">Paraíba (PB)</option>
                                            <option value="PR">Paraná (PR)</option>
                                            <option value="PE">Pernambuco (PE)</option>
                                            <option value="PI">Piauí (PI)</option>
                                            <option value="RJ">Rio de Janeiro (RJ)</option>
                                            <option value="RN">Rio Grande do Norte (RN)</option>
                                            <option value="RS">Rio Grande do Sul (RS)</option>
                                            <option value="RO">Rondônia (RO)</option>
                                            <option value="RR">Roraima (RR)</option>
                                            <option value="SC">Santa Catarina (SC)</option>
                                            <option value="SP">São Paulo (SP)</option>
                                            <option value="SE">Sergipe (SE)</option>
                                            <option value="TO">Tocantins (TO)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="city-select">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-city"></i>
                                        </span>
                                        <input type="text" class="form-control"alue="{{$servico->1}}" id="1" placeholder="Cidade" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Descrição do Serviço -->
                        <div class="col-12">
                            <label for="serviceDescription" class="form-label required">Descrição do Serviço</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-align-left"></i>
                                </span>
                                <textarea class="form-control" value="{{$servico->descricão}}" id="descricão"
                                    placeholder="Descreva detalhadamente os serviços que você oferece, sua experiência, especialidades, etc."
                                    required></textarea>
                            </div>
                        </div>

                        <!-- Valor do Serviço -->
                        <div class="col-md-6">
                            <label for="servicePrice" class="form-label required">Valor do Serviço (R$)</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-dollar-sign"></i>
                                </span>
                                <input type="text" class="form-control" value="{{$servico->valor}}" id="valor" placeholder="0,00" required>
                            </div>
                            <small class="text-secondary">Digite o valor médio ou valor base do serviço</small>
                        </div>


                        <!-- Botões -->
                        <div class="col-12">
                            <hr class="border-secondary">
                            <div class="d-flex justify-content-end gap-2">
                                <button type="button" class="btn btn-gold" id="meu5">
                                    <i class="fas fa-save me-2"></i>Cadastrar Prestador
                                </button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>





    <!-- jQuery e Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script>
        $(document).ready(function(){

    alert("TO FUNFANDO");


    $("#meu5").click(function(){

        $.ajax({
            url: "../api/alterar_servico" ,
            method: "PUT",
            data: { 
                nome :$("#nome").val(),
                contato : $("#contato").val() ,
                tipo: $("#tipo").val(),
                cidade: $("#cidade").val(),
                descricão: $("#descricão").val(),
                valor : $("#valor").val() ,

             },
            success: function (res) {

                alert("salvado cria")
                console.log(res);
            },

        });

    });



});
    </script>

</body>

</html>