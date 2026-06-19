<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteio de Venda - XL Motors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('home.css') }}">
    <style>
        body {
            min-height: 100vh;
            background:
                linear-gradient(rgba(10, 10, 10, 0.78), rgba(10, 10, 10, 0.95)),
                url('https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&w=2000&q=80') center/cover fixed;
        }

        .sorteio-page {
            padding: 130px 0 70px;
        }

        .sorteio-title {
            margin-bottom: 35px;
        }

        .sorteio-title h1 {
            color: #fff;
            font-size: clamp(2.2rem, 5vw, 4rem);
            margin-bottom: 12px;
        }

        .sorteio-title p {
            color: #cfcfcf;
            max-width: 720px;
            font-size: 1.05rem;
        }

        .result-panel {
            background: rgba(18, 18, 18, 0.92);
            border: 1px solid rgba(212, 175, 55, 0.25);
            border-radius: 8px;
            box-shadow: 0 22px 55px rgba(0, 0, 0, 0.45);
            overflow: hidden;
        }

        .result-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 24px 28px;
            border-bottom: 1px solid #252525;
        }

        .result-header h2 {
            margin: 0;
            color: #fff;
            font-size: 1.8rem;
        }

        .refresh-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(to right, #d4af37, #b8941f);
            color: #0a0a0a;
            border-radius: 30px;
            padding: 10px 18px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0;
        }

        .info-box {
            padding: 28px;
            border-right: 1px solid #252525;
        }

        .info-box:last-child {
            border-right: 0;
        }

        .info-box h3 {
            color: #d4af37;
            font-size: 1.4rem;
            margin-bottom: 22px;
        }

        .detail-list {
            display: grid;
            gap: 14px;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            gap: 18px;
            padding-bottom: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .detail-item span:first-child {
            color: #999;
        }

        .detail-item span:last-child {
            color: #fff;
            font-weight: 600;
            text-align: right;
            overflow-wrap: anywhere;
        }

        .profit-band {
            display: grid;
            grid-template-columns: 1fr auto;
            align-items: center;
            gap: 20px;
            padding: 28px;
            background: rgba(212, 175, 55, 0.1);
            border-top: 1px solid rgba(212, 175, 55, 0.25);
        }

        .profit-band p {
            color: #d8d8d8;
            margin: 0;
        }

        .profit-value {
            color: #d4af37;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            line-height: 1;
            white-space: nowrap;
        }

        .empty-state {
            padding: 32px;
            color: #ddd;
        }

        @media (max-width: 768px) {
            .result-header,
            .profit-band {
                grid-template-columns: 1fr;
                display: grid;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .info-box {
                border-right: 0;
                border-bottom: 1px solid #252525;
            }

            .refresh-link,
            .profit-value {
                justify-self: start;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <span class="logo-text">XL <span class="logo-highlight">MOTORS</span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="/frota">Frota</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/sorteio">Sorteio</a></li>
                    <li class="nav-item"><a class="nav-link" href="/stores/create">Lojas</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contato">Contato</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="sorteio-page">
        <div class="container">
            <div class="sorteio-title">
                <h1>Venda realizada</h1>
            </div>

            <section class="result-panel">
                <div class="result-header">
                    <h2>Resultado atual</h2>
                    <a class="refresh-link" href="{{ route('sorteio') }}">
                        <i class="fas fa-rotate"></i>
                        Sortear novamente
                    </a>
                </div>

                @if ($carro && $loja)
                    <div class="info-grid">
                        <div class="info-box">
                            <h3><i class="fas fa-car-side me-2"></i>Carro</h3>
                            <div class="detail-list">
                                <div class="detail-item"><span>Modelo</span><span>{{ $carro->modelo }}</span></div>
                                <div class="detail-item"><span>Fabricante</span><span>{{ $carro->fabricante }}</span></div>
                                <div class="detail-item"><span>Ano</span><span>{{ $carro->ano }}</span></div>
                                <div class="detail-item"><span>Cor</span><span>{{ $carro->cor }}</span></div>
                                <div class="detail-item"><span>Placa</span><span>{{ $carro->placa }}</span></div>
                                <div class="detail-item"><span>Dono</span><span>{{ $carro->dono }}</span></div>
                                <div class="detail-item"><span>Potencia</span><span>{{ $carro->potencia }} cv</span></div>
                                <div class="detail-item"><span>Combustivel</span><span>{{ $carro->tipo_gasolina }}</span></div>
                                <div class="detail-item"><span>Valor</span><span>R$ {{ number_format($carro->valor, 2, ',', '.') }}</span></div>
                            </div>
                        </div>

                        <div class="info-box">
                            <h3><i class="fas fa-store me-2"></i>Loja</h3>
                            <div class="detail-list">
                                <div class="detail-item"><span>Nome</span><span>{{ $loja->name }}</span></div>
                                <div class="detail-item"><span>CNPJ</span><span>{{ $loja->formatted_cnpj }}</span></div>
                                <div class="detail-item"><span>Telefone</span><span>{{ $loja->phone }}</span></div>
                                <div class="detail-item"><span>Email</span><span>{{ $loja->email ?? 'Nao informado' }}</span></div>
                                <div class="detail-item"><span>Endereco</span><span>{{ $loja->address }}</span></div>
                                <div class="detail-item"><span>Cidade</span><span>{{ $loja->city }} - {{ $loja->state }}</span></div>
                                <div class="detail-item"><span>Status</span><span>{{ $loja->is_active ? 'Ativa' : 'Inativa' }}</span></div>
                                <div class="detail-item"><span>Destaque</span><span>{{ $loja->is_featured ? 'Sim' : 'Nao' }}</span></div>
                            </div>
                        </div>
                    </div>

                    <div class="profit-band">
                        <p>Lucro da loja nesta venda, calculado como 20% do valor do carro.</p>
                        <strong class="profit-value">R$ {{ number_format($lucroLoja, 2, ',', '.') }}</strong>
                    </div>
                @else
                    <div class="empty-state">
                        <h3>Cadastre pelo menos um carro e uma loja</h3>
                        <p class="mb-0">A tela precisa encontrar registros salvos nas tabelas de carros e lojas para montar o sorteio.</p>
                    </div>
                @endif
            </section>
        </div>
    </main>
</body>
</html>
