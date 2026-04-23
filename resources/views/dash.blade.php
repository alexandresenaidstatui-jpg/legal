<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - XLCars</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: #0a0a0a;
            min-height: 100vh;
            background-image: linear-gradient(rgba(10, 10, 10, 0.95), rgba(10, 10, 10, 0.95)), 
                              url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M50,5 L60,35 L90,35 L65,55 L75,85 L50,70 L25,85 L35,55 L10,35 L40,35 Z" fill="%23D4AF37" opacity="0.1"/></svg>');
        }
        
        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 280px;
            background-color: #000000;
            border-right: 1px solid #333;
            transition: all 0.3s ease;
            z-index: 1000;
        }
        
        .sidebar-header {
            padding: 25px 20px;
            border-bottom: 1px solid #333;
            text-align: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .logo-icon {
            color: #D4AF37;
            font-size: 32px;
            margin-right: 10px;
        }
        
        .logo-text {
            font-size: 28px;
            font-weight: 700;
            color: #D4AF37;
            letter-spacing: 2px;
        }
        
        .sidebar-menu {
            padding: 20px 0;
        }
        
        .menu-item {
            padding: 12px 25px;
            display: flex;
            align-items: center;
            color: #888;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .menu-item:hover, .menu-item.active {
            background-color: rgba(212, 175, 55, 0.1);
            color: #D4AF37;
            border-left: 3px solid #D4AF37;
        }
        
        .menu-item i {
            width: 30px;
            font-size: 20px;
        }
        
        .menu-item span {
            font-size: 15px;
            font-weight: 500;
        }
        
        /* Main Content */
        .main-content {
            margin-left: 280px;
            padding: 20px;
        }
        
        /* Navbar */
        .navbar-custom {
            background-color: #111111;
            border: 1px solid #333;
            border-radius: 12px;
            padding: 15px 25px;
            margin-bottom: 25px;
        }
        
        .page-title {
            color: #f0f0f0;
            font-size: 24px;
            font-weight: 600;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background-color: #D4AF37;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #000;
            font-weight: bold;
            font-size: 18px;
        }
        
        /* Cards - Tamanhos iguais */
        .stat-card {
            background-color: #111111;
            border: 1px solid #333;
            border-radius: 12px;
            padding: 20px;
            transition: all 0.3s ease;
            height: 100%;
            min-height: 130px;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            border-color: #D4AF37;
            box-shadow: 0 10px 20px rgba(212, 175, 55, 0.1);
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background-color: rgba(212, 175, 55, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #D4AF37;
        }
        
        .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: #f0f0f0;
        }
        
        .stat-label {
            color: #888;
            font-size: 14px;
        }
        
        /* Charts */
        .chart-card {
            background-color: #111111;
            border: 1px solid #333;
            border-radius: 12px;
            padding: 20px;
            height: 100%;
        }
        
        .chart-title {
            color: #D4AF37;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        
        /* Tabela - Fundo preto */
        .table-custom {
            background-color: #111111;
            border: 1px solid #333;
            border-radius: 12px;
            overflow: hidden;
        }
        
        .table-custom thead th {
            background-color: #1a1a1a;
            color: #D4AF37;
            border-bottom: 1px solid #333;
            padding: 15px;
        }
        
        .table-custom tbody td {
            background-color: #111111;
            color: #f0f0f0;
            padding: 12px 15px;
            border-bottom: 1px solid #222;
        }
        
        .table-custom tbody tr:hover td {
            background-color: #1a1a1a;
        }
        
        .btn-action {
            background: none;
            border: none;
            color: #888;
            margin: 0 5px;
            transition: all 0.3s ease;
        }
        
        .btn-action:hover {
            color: #D4AF37;
        }
        
        .btn-gold {
            background-color: #D4AF37;
            color: #000;
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-gold:hover {
            background-color: #c19b2e;
            transform: translateY(-2px);
        }
        
        .btn-outline-gold {
            background-color: transparent;
            border: 1px solid #D4AF37;
            color: #D4AF37;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-outline-gold:hover {
            background-color: #D4AF37;
            color: #000;
        }
        
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.8);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
        
        .spinner-custom {
            width: 50px;
            height: 50px;
            border: 3px solid #333;
            border-top-color: #D4AF37;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
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
        
        @media (max-width: 768px) {
            .sidebar {
                left: -280px;
            }
            .sidebar.active {
                left: 0;
            }
            .main-content {
                margin-left: 0;
            }
            .menu-toggle {
                display: block;
            }
        }
        
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            color: #D4AF37;
            font-size: 24px;
            cursor: pointer;
        }
        
        .text-gold {
            color: #D4AF37;
        }
        
        .form-control, .form-select {
            background-color: #1a1a1a;
            border: 1px solid #333;
            color: #f0f0f0;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #D4AF37;
            box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
        }
        
        .modal-content-custom {
            background-color: #111111;
            border: 1px solid #333;
            border-radius: 12px;
        }
        
        /* Garantir que todas as colunas tenham mesma altura */
        .row-cards {
            display: flex;
            flex-wrap: wrap;
        }
        
        .col-card {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <!-- Loading -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="spinner-custom"></div>
    </div>
    
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <i class="fas fa-crown logo-icon"></i>
                <div class="logo-text">XLCARS</div>
            </div>
        </div>
        <div class="sidebar-menu">
            <div class="menu-item active" data-page="dashboard">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </div>
            <div class="menu-item" data-page="carros">
                <i class="fas fa-car"></i>
                <span>Meus Carros</span>
            </div>
            <div class="menu-item" data-page="cadastrar">
                <i class="fas fa-plus-circle"></i>
                <span>Cadastrar Carro</span>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <div class="navbar-custom">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <button class="menu-toggle" id="menuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h2 class="page-title" id="pageTitle">Dashboard</h2>
                </div>
                <div class="user-info">
                    <span class="text-light">Bem-vindo, Admin</span>
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Dashboard Page -->
        <div id="dashboardPage">
            <!-- Stats Cards - Todos com mesmo tamanho -->
            <div class="row g-4 mb-4 row-cards">
                <div class="col-md-3 col-sm-6 col-card">
                    <div class="stat-card d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-value" id="totalCarros">0</div>
                            <div class="stat-label">Total de Carros</div>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-car"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-card">
                    <div class="stat-card d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-value" id="valorTotal">R$ 0</div>
                            <div class="stat-label">Valor Total da Frota</div>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-card">
                    <div class="stat-card d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-value" id="potenciaMedia">0</div>
                            <div class="stat-label">Potência Média (cv)</div>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-card">
                    <div class="stat-card d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-value" id="fabricantes">0</div>
                            <div class="stat-label">Fabricantes</div>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-industry"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Charts -->
            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="chart-card">
                        <div class="chart-title">
                            <i class="fas fa-chart-bar me-2"></i>Carros por Fabricante
                        </div>
                        <canvas id="fabricanteChart" height="250"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="chart-card">
                        <div class="chart-title">
                            <i class="fas fa-chart-pie me-2"></i>Distribuição por Combustível
                        </div>
                        <canvas id="combustivelChart" height="250"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- Últimos Carros - Fundo preto -->
            <div class="chart-card">
                <div class="chart-title">
                    <i class="fas fa-clock me-2"></i>Últimos Carros Cadastrados
                </div>
                <div class="table-responsive">
                    <table class="table table-custom">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Modelo</th>
                                <th>Fabricante</th>
                                <th>Ano</th>
                                <th>Cor</th>
                                <th>Placa</th>
                                <th>Valor</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody id="ultimosCarros">
                            <tr><td colspan="8" class="text-center">Carregando...</td></tr>
                        </tbody>
                    赶
                </div>
            </div>
        </div>
        
        <!-- Carros Page -->
        <div id="carrosPage" style="display: none;">
            <div class="chart-card">
                <div class="chart-title">
                    <i class="fas fa-list me-2"></i>Todos os Carros
                    <button class="btn btn-gold btn-sm float-end" id="refreshBtn"><i class="fas fa-sync-alt me-1"></i>Atualizar</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-custom">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Modelo</th>
                                <th>Fabricante</th>
                                <th>Ano</th>
                                <th>Cor</th>
                                <th>Placa</th>
                                <th>Dono</th>
                                <th>Potência</th>
                                <th>Valor</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody id="todosCarros">
                            <tr><td colspan="10" class="text-center">Carregando...</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Cadastrar Page -->
        <div id="cadastrarPage" style="display: none;">
            <div class="chart-card">
                <div class="chart-title">
                    <i class="fas fa-plus-circle me-2"></i>Cadastrar Novo Carro
                </div>
                <form id="cadastroCarroForm">
                    <div class="row g-3">
                        <div class="col-md-6"><label class="form-label text-gold">Modelo</label><input type="text" class="form-control" id="modelo" required></div>
                        <div class="col-md-6"><label class="form-label text-gold">Fabricante</label><input type="text" class="form-control" id="fabricante" required></div>
                        <div class="col-md-3"><label class="form-label text-gold">Ano</label><input type="number" class="form-control" id="ano" required></div>
                        <div class="col-md-3"><label class="form-label text-gold">Cor</label><input type="text" class="form-control" id="cor" required></div>
                        <div class="col-md-3"><label class="form-label text-gold">Placa</label><input type="text" class="form-control" id="placa" required></div>
                        <div class="col-md-3"><label class="form-label text-gold">Potência (cv)</label><input type="number" class="form-control" id="potencia" required></div>
                        <div class="col-md-6"><label class="form-label text-gold">Dono</label><input type="text" class="form-control" id="dono" required></div>
                        <div class="col-md-6"><label class="form-label text-gold">Valor (R$)</label><input type="text" class="form-control" id="valor" required></div>
                        <div class="col-md-12">
                            <label class="form-label text-gold">Tipo de Combustível</label>
                            <select class="form-select" id="tipo_gasolina" required>
                                <option value="1">Gasolina</option>
                                <option value="2">Etanol</option>
                                <option value="3">Flex</option>
                                <option value="4">Diesel</option>
                                <option value="5">Elétrico</option>
                                <option value="6">Híbrido</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <hr class="border-secondary">
                            <button type="submit" class="btn btn-gold"><i class="fas fa-save me-2"></i>Salvar Carro</button>
                            <button type="reset" class="btn btn-outline-gold ms-2"><i class="fas fa-undo me-2"></i>Limpar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Modal Editar -->
    <div class="modal fade" id="editarModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-content-custom">
                <div class="modal-header border-secondary"><h5 class="modal-title text-gold">Editar Carro</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div>
                <div class="modal-body">
                    <input type="hidden" id="edit_id_carro">
                    <div class="mb-3"><label class="form-label text-gold">Modelo</label><input type="text" class="form-control" id="edit_modelo"></div>
                    <div class="mb-3"><label class="form-label text-gold">Fabricante</label><input type="text" class="form-control" id="edit_fabricante"></div>
                    <div class="row"><div class="col-md-6"><label class="form-label text-gold">Ano</label><input type="number" class="form-control" id="edit_ano"></div>
                    <div class="col-md-6"><label class="form-label text-gold">Cor</label><input type="text" class="form-control" id="edit_cor"></div></div>
                    <div class="row mt-3"><div class="col-md-6"><label class="form-label text-gold">Placa</label><input type="text" class="form-control" id="edit_placa"></div>
                    <div class="col-md-6"><label class="form-label text-gold">Potência</label><input type="number" class="form-control" id="edit_potencia"></div></div>
                    <div class="mt-3"><label class="form-label text-gold">Dono</label><input type="text" class="form-control" id="edit_dono"></div>
                    <div class="mt-3"><label class="form-label text-gold">Valor</label><input type="text" class="form-control" id="edit_valor"></div>
                    <div class="mt-3"><label class="form-label text-gold">Tipo Combustível</label>
                        <select class="form-select" id="edit_tipo_gasolina">
                            <option value="1">Gasolina</option>
                            <option value="2">Etanol</option>
                            <option value="3">Flex</option>
                            <option value="4">Diesel</option>
                            <option value="5">Elétrico</option>
                            <option value="6">Híbrido</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer border-secondary"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button><button type="button" class="btn btn-gold" id="salvarEdicao">Salvar</button></div>
            </div>
        </div>
    </div>
    
    <!-- Modal Deletar -->
    <div class="modal fade" id="deletarModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-content-custom">
                <div class="modal-header border-secondary"><h5 class="modal-title text-danger">Excluir Carro</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div>
                <div class="modal-body"><p>Tem certeza que deseja excluir o carro <strong id="deleteModelo"></strong>?</p><p class="text-danger">Esta ação não pode ser desfeita!</p></div>
                <div class="modal-footer border-secondary"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button><button type="button" class="btn btn-danger" id="confirmarDelete">Excluir</button></div>
            </div>
        </div>
    </div>
    
    <div class="alert-success-custom d-none" id="successMessage"><i class="fas fa-check-circle me-2"></i><span id="successText"></span></div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        const API_URL = '';
        let csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        let fabricanteChart, combustivelChart;
        
        function showLoading(show) { $('#loadingOverlay').css('display', show ? 'flex' : 'none'); }
        function showSuccess(msg) { $('#successText').text(msg); $('#successMessage').removeClass('d-none'); setTimeout(() => $('#successMessage').addClass('d-none'), 3000); }
        
        async function fetchCarros() {
            try {
                const response = await fetch('/api/todos_carros');
                const data = await response.json();
                return data.carro || [];
            } catch (error) { return []; }
        }
        
        async function updateDashboard() {
            showLoading(true);
            try {
                const response = await fetch('/api/dashboard');
                const data = await response.json();
                if (data.erro === 'n') {
                    const d = data.dashboard;
                    $('#totalCarros').text(d.total_carros);
                    $('#valorTotal').text(`R$ ${parseFloat(d.valor_total).toLocaleString('pt-BR', { minimumFractionDigits: 2 })}`);
                    $('#potenciaMedia').text(d.potencia_media);
                    $('#fabricantes').text(d.total_fabricantes);
                    
                    let html = '';
                    d.ultimos_carros.forEach(c => {
                        html += `<tr>
                            <td>${c.id}</td>
                            <td>${c.modelo}</td>
                            <td>${c.fabricante}</td>
                            <td>${c.ano}</td>
                            <td>${c.cor}</td>
                            <td>${c.placa}</td>
                            <td>R$ ${parseFloat(c.valor).toLocaleString('pt-BR', { minimumFractionDigits: 2 })}</td>
                            <td>
                                <button class="btn-action" onclick="editarCarro(${c.id})"><i class="fas fa-edit"></i></button>
                                <button class="btn-action" onclick="deletarCarro(${c.id}, '${c.modelo}')"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>`;
                    });
                    $('#ultimosCarros').html(html || '<tr><td colspan="8" class="text-center">Nenhum carro cadastrado</td></tr>');
                    
                    const fabricantes = {};
                    const combustiveis = {1:'Gasolina',2:'Etanol',3:'Flex',4:'Diesel',5:'Elétrico',6:'Híbrido'};
                    const combustivelCount = {};
                    d.carros_por_fabricante.forEach(item => { fabricantes[item.fabricante] = item.total; });
                    d.carros_por_combustivel.forEach(item => { const tipo = combustiveis[item.tipo_gasolina] || 'Outro'; combustivelCount[tipo] = (combustivelCount[tipo] || 0) + item.total; });
                    
                    if (fabricanteChart) fabricanteChart.destroy();
                    if (combustivelChart) combustivelChart.destroy();
                    
                    fabricanteChart = new Chart(document.getElementById('fabricanteChart'), { type: 'bar', data: { labels: Object.keys(fabricantes), datasets: [{ label: 'Quantidade', data: Object.values(fabricantes), backgroundColor: '#D4AF37' }] }, options: { responsive: true, maintainAspectRatio: true, plugins: { legend: { labels: { color: '#f0f0f0' } } }, scales: { y: { ticks: { color: '#f0f0f0' }, grid: { color: '#333' } }, x: { ticks: { color: '#f0f0f0' }, grid: { color: '#333' } } } } });
                    combustivelChart = new Chart(document.getElementById('combustivelChart'), { type: 'pie', data: { labels: Object.keys(combustivelCount), datasets: [{ data: Object.values(combustivelCount), backgroundColor: ['#D4AF37', '#c19b2e', '#a0862a', '#8a6e20', '#6e5518', '#523f10'] }] }, options: { responsive: true, maintainAspectRatio: true, plugins: { legend: { labels: { color: '#f0f0f0' } } } } });
                }
            } catch(e) { console.error(e); }
            showLoading(false);
        }
        
        async function updateTodosCarros() {
            showLoading(true);
            const carros = await fetchCarros();
            let html = '';
            carros.forEach(c => {
                html += `<tr>
                    <td>${c.id}</td>
                    <td>${c.modelo}</td>
                    <td>${c.fabricante}</td>
                    <td>${c.ano}</td>
                    <td>${c.cor}</td>
                    <td>${c.placa}</td>
                    <td>${c.dono}</td>
                    <td>${c.potencia} cv</td>
                    <td>R$ ${parseFloat(c.valor).toLocaleString('pt-BR', { minimumFractionDigits: 2 })}</td>
                    <td>
                        <button class="btn-action" onclick="editarCarro(${c.id})"><i class="fas fa-edit"></i></button>
                        <button class="btn-action" onclick="deletarCarro(${c.id}, '${c.modelo}')"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>`;
            });
            $('#todosCarros').html(html || '<tr><td colspan="10" class="text-center">Nenhum carro cadastrado</td></tr>');
            showLoading(false);
        }
        
        $('#cadastroCarroForm').on('submit', async function(e) {
            e.preventDefault();
            const valor = $('#valor').val().replace(/\./g, '').replace(',', '.');
            const dados = { modelo: $('#modelo').val(), ano: $('#ano').val(), cor: $('#cor').val(), placa: $('#placa').val(), dono: $('#dono').val(), valor: parseFloat(valor), potencia: $('#potencia').val(), fabricante: $('#fabricante').val(), tipo_gasolina: $('#tipo_gasolina').val() };
            showLoading(true);
            try {
                const response = await fetch('/api/salva_carro', { method: 'POST', headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken }, body: JSON.stringify(dados) });
                const result = await response.json();
                if (result.erro === 'n') { showSuccess('Carro cadastrado com sucesso!'); $('#cadastroCarroForm')[0].reset(); updateDashboard(); } else { alert('Erro ao cadastrar carro: ' + result.mensagem); }
            } catch(e) { alert('Erro ao conectar com o servidor'); }
            showLoading(false);
        });
        
        window.editarCarro = async function(id) {
            try {
                const response = await fetch(`/api/exibe_carro/${id}`);
                const data = await response.json();
                const c = data.carro;
                $('#edit_id_carro').val(c.id); $('#edit_modelo').val(c.modelo); $('#edit_fabricante').val(c.fabricante); $('#edit_ano').val(c.ano); $('#edit_cor').val(c.cor);
                $('#edit_placa').val(c.placa); $('#edit_potencia').val(c.potencia); $('#edit_dono').val(c.dono); $('#edit_valor').val(parseFloat(c.valor).toLocaleString('pt-BR', { minimumFractionDigits: 2 })); $('#edit_tipo_gasolina').val(c.tipo_gasolina);
                new bootstrap.Modal(document.getElementById('editarModal')).show();
            } catch(e) { alert('Erro ao carregar dados do carro'); }
        };
        
        $('#salvarEdicao').on('click', async function() {
            const valor = $('#edit_valor').val().replace(/\./g, '').replace(',', '.');
            const dados = { id_carro: $('#edit_id_carro').val(), modelo: $('#edit_modelo').val(), ano: $('#edit_ano').val(), cor: $('#edit_cor').val(), placa: $('#edit_placa').val(), dono: $('#edit_dono').val(), valor: parseFloat(valor), potencia: $('#edit_potencia').val(), fabricante: $('#edit_fabricante').val(), tipo_gasolina: $('#edit_tipo_gasolina').val() };
            showLoading(true);
            try {
                const response = await fetch('/api/alterar_carro', { method: 'PUT', headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken }, body: JSON.stringify(dados) });
                const result = await response.json();
                if (result.erro === 'n') { showSuccess('Carro alterado com sucesso!'); bootstrap.Modal.getInstance(document.getElementById('editarModal')).hide(); updateDashboard(); updateTodosCarros(); } else { alert('Erro ao alterar carro'); }
            } catch(e) { alert('Erro ao conectar com o servidor'); }
            showLoading(false);
        });
        
        let deleteId = null;
        window.deletarCarro = function(id, modelo) { deleteId = id; $('#deleteModelo').text(modelo); new bootstrap.Modal(document.getElementById('deletarModal')).show(); };
        
        $('#confirmarDelete').on('click', async function() {
            if (!deleteId) return;
            showLoading(true);
            try {
                const response = await fetch('/api/deletar_carro', { method: 'DELETE', headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken }, body: JSON.stringify({ id_carro: deleteId }) });
                const result = await response.json();
                if (result.erro === 'n') { showSuccess('Carro deletado com sucesso!'); bootstrap.Modal.getInstance(document.getElementById('deletarModal')).hide(); updateDashboard(); updateTodosCarros(); deleteId = null; } else { alert('Erro ao deletar carro'); }
            } catch(e) { alert('Erro ao conectar com o servidor'); }
            showLoading(false);
        });
        
        $('.menu-item').on('click', function() {
            const page = $(this).data('page');
            $('.menu-item').removeClass('active'); $(this).addClass('active');
            $('#dashboardPage, #carrosPage, #cadastrarPage').hide();
            if (page === 'dashboard') { $('#dashboardPage').show(); $('#pageTitle').text('Dashboard'); updateDashboard(); }
            else if (page === 'carros') { $('#carrosPage').show(); $('#pageTitle').text('Meus Carros'); updateTodosCarros(); }
            else if (page === 'cadastrar') { $('#cadastrarPage').show(); $('#pageTitle').text('Cadastrar Carro'); }
        });
        
        $('#refreshBtn').on('click', () => updateTodosCarros());
        $('#menuToggle').on('click', () => $('#sidebar').toggleClass('active'));
        $('#valor, #edit_valor').on('input', function() { let v = $(this).val().replace(/\D/g, ''); if (v.length) { v = (parseInt(v)/100).toFixed(2).replace('.',',').replace(/\B(?=(\d{3})+(?!\d))/g, '.'); $(this).val(v); } });
        
        updateDashboard();
    </script>
</body>
</html>