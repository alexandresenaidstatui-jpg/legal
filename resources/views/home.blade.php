<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XL Motors - compra de Carros de Luxo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="home.css">

</head>

<body>
    <!-- Navbar Premium -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <span class="logo-text">XL <span class="logo-highlight">MOTORS</span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/frota">Frota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/servicos">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/sobre">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contato">Contato</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-reserva" href="/">Compre Agora</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carousel de Luxo -->
    <section id="inicio">
        <div id="carouselLuxury" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselLuxury" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselLuxury" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselLuxury" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="carousel-image carro1"></div>
                    <div class="carousel-caption">
                        <h2>Experiência de Luxo</h2>
                        <p>Dirija os carros mais exclusivos do mercado com conforto e estilo incomparáveis.</p>
                        <a href="/frota" class="btn btn-carousel">Ver Frota</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-image carro2"></div>
                    <div class="carousel-caption">
                        <h2>Performance Inigualável</h2>
                        <p>Potência, tecnologia e design em perfeita harmonia para uma experiência única.</p>
                        <a href="/frota" class="btn btn-carousel">Ver Frota</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-image carro3"></div>
                    <div class="carousel-caption">
                        <h2>Excelência em Serviço</h2>
                        <p>Atendimento personalizado e exclusivo para clientes que exigem o melhor.</p>
                        <a href="/" class="btn btn-carousel">compre Agora</a>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselLuxury" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselLuxury" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Seção de Destaque -->
    <section class="destaque">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 destaque-item">
                    <i class="fas fa-shield-alt"></i>
                    <h4>Segurança Total</h4>
                    <p>Todos os veículos possuem seguro completo e manutenção regular.</p>
                </div>
                <div class="col-md-4 destaque-item">
                    <i class="fas fa-concierge-bell"></i>
                    <h4>Serviço Premium</h4>
                    <p>Entrega e retirada do veículo no local de sua preferência.</p>
                </div>
                <div class="col-md-4 destaque-item">
                    <i class="fas fa-star"></i>
                    <h4>Excelência Garantida</h4>
                    <p>Veículos sempre em perfeito estado de conservação e funcionamento.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Frota de Carros -->
    <section id="frota" class="frota">
        <div class="container">
            <div class="section-title">
                <h2>Nossa Frota Exclusiva</h2>
                <p>Selecione entre os modelos mais desejados do mercado</p>
            </div>
            
            <div class="row">
                <!-- Carro 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="car-card">
                        <div class="car-img img1"></div>
                        <div class="car-info">
                            <h4>Lamborghini Huracán</h4>
                            <div class="car-details">
                                <span><i class="fas fa-tachometer-alt"></i> 640 HP</span>
                                <span><i class="fas fa-bolt"></i> 3.2s 0-100</span>
                                <span><i class="fas fa-chair"></i> 2 Lugares</span>
                            </div>
                            <p>O superesportivo italiano com design agressivo e performance extrema.</p>
                            <div class="car-price">
                                <span class="price">R$ 3.500<span>/dia</span></span>
                                <a href="/" class="btn btn-reserve">Compre</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Carro 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="car-card">
                        <div class="car-img img2"></div>
                        <div class="car-info">
                            <h4>Mercedes-Benz Classe G</h4>
                            <div class="car-details">
                                <span><i class="fas fa-tachometer-alt"></i> 585 HP</span>
                                <span><i class="fas fa-bolt"></i> 4.5s 0-100</span>
                                <span><i class="fas fa-chair"></i> 5 Lugares</span>
                            </div>
                            <p>O lendário SUV de luxo que combina robustez com sofisticação.</p>
                            <div class="car-price">
                                <span class="price">R$ 2.200<span>/dia</span></span>
                                <a href="/hpme" class="btn btn-reserve">compre</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Carro 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="car-card">
                        <div class="car-img img3"></div>
                        <div class="car-info">
                            <h4>Porsche 911 Turbo S</h4>
                            <div class="car-details">
                                <span><i class="fas fa-tachometer-alt"></i> 650 HP</span>
                                <span><i class="fas fa-bolt"></i> 2.7s 0-100</span>
                                <span><i class="fas fa-chair"></i> 4 Lugares</span>
                            </div>
                            <p>O esportivo alemão que equilibra desempenho e conforto diário.</p>
                            <div class="car-price">
                                <span class="price">R$ 2.800<span>/dia</span></span>
                                <a href="/" class="btn btn-reserve">compre</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-5">
                <a href="/frota" class="btn btn-ver-mais">Ver Todos os Modelos</a>
            </div>
        </div>
    </section>

    <!-- Seção de Reserva -->
    <section id="reserva" class="reserva">
        <div class="container">
            <div class="reserva-box">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h2>Reserve seu carro de luxo</h2>
                        <p>Preencha o formulário e nossa equipe entrará em contato para confirmar todos os detalhes da sua compra.</p>
                        <div class="destaque-reserva">
                            <i class="fas fa-check-circle"></i>
                            <span>Cancelamento gratuito até 48h antes da retirada</span>
                        </div>
                        <div class="destaque-reserva">
                            <i class="fas fa-check-circle"></i>
                            <span>Km ilimitado em todas as compras</span>
                        </div>
                        <div class="destaque-reserva">
                            <i class="fas fa-check-circle"></i>
                            <span>Seguro completo incluso no valor</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form class="reserva-form" action="/enviar-reserva" method="POST">
                            <div class="mb-3">
                                <label for="carro" class="form-label">Modelo do Carro</label>
                                <select class="form-select" id="carro" name="carro" required>
                                    <option value="" selected disabled>Selecione um modelo</option>
                                    <option value="Lamborghini Huracán">Lamborghini Huracán</option>
                                    <option value="Mercedes-Benz Classe G">Mercedes-Benz Classe G</option>
                                    <option value="Porsche 911 Turbo S">Porsche 911 Turbo S</option>
                                    <option value="Ferrari F8 Tributo">Ferrari F8 Tributo</option>
                                    <option value="Rolls Royce Ghost">Rolls Royce Ghost</option>
                                </select>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="data-retirada" class="form-label">Data de Retirada</label>
                                    <input type="date" class="form-control" id="data-retirada" name="data_retirada" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="data-devolucao" class="form-label">Data de Devolução</label>
                                    <input type="date" class="form-control" id="data-devolucao" name="data_devolucao" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome" required>
                            </div>
                            <div class="mb-4">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(11) 99999-9999" required>
                            </div>
                            <button type="submit" class="btn btn-reserva-form">Solicitar compra</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 footer-col">
                    <h4>XL Motors</h4>
                    <p>Especialistas em compra de veículos de luxo, oferecendo uma experiência premium e personalizada para clientes exigentes.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 footer-col">
                    <h5>Links Rápidos</h5>
                    <ul>
                        <li><a href="/">Início</a></li>
                        <li><a href="/frota">Frota</a></li>
                        <li><a href="/servicos">Serviços</a></li>
                        <li><a href="/sobre">Sobre</a></li>
                        <li><a href="/contato">Contato</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 footer-col">
                    <h5>Contato</h5>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> Av. Faria Lima, 1500 - São Paulo</li>
                        <li><i class="fas fa-phone"></i> (11) 3000-4000</li>
                        <li><i class="fas fa-envelope"></i> contato@xlmotors.com.br</li>
                    </ul>
                </div>
                <div class="col-lg-3 footer-col">
                    <h5>Horário de Funcionamento</h5>
                    <ul>
                        <li>Segunda a Sexta: 8h às 20h</li>
                        <li>Sábado: 9h às 18h</li>
                        <li>Domingo: 10h às 16h</li>
                        <li>Atendimento 24h para emergências</li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="footer-bottom">
                <p>&copy; 2023 XL Motors. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Botão do WhatsApp -->
    <a href="https://wa.me/5511999999999?text=Olá,%20gostaria%20de%20saber%20mais%20sobre%20aluguel%20de%20carros%20de%20luxo" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>












    
    <script>
        // Script para atualizar o ano no footer
        document.addEventListener('DOMContentLoaded', function() {
            // Atualizar ano no footer
            const footerYear = document.querySelector('.footer-bottom p');
            if(footerYear) {
                const currentYear = new Date().getFullYear();
                footerYear.innerHTML = `&copy; ${currentYear} XL Motors. Todos os direitos reservados.`;
            }
            
            // Atualizar a data mínima nos campos de data
            const today = new Date().toISOString().split('T')[0];
            const retiradaInput = document.getElementById('data-retirada');
            const devolucaoInput = document.getElementById('data-devolucao');
            
            if(retiradaInput) {
                retiradaInput.min = today;
                retiradaInput.value = today;
            }
            if(devolucaoInput) {
                const tomorrow = new Date();
                tomorrow.setDate(tomorrow.getDate() + 1);
                devolucaoInput.min = tomorrow.toISOString().split('T')[0];
            }
            
            // Quando a data de retirada muda, atualiza a data mínima da devolução
            if(retiradaInput && devolucaoInput) {
                retiradaInput.addEventListener('change', function() {
                    const nextDay = new Date(this.value);
                    nextDay.setDate(nextDay.getDate() + 1);
                    devolucaoInput.min = nextDay.toISOString().split('T')[0];
                    
                    if(devolucaoInput.value && devolucaoInput.value < this.value) {
                        devolucaoInput.value = devolucaoInput.min;
                    }
                });
            }
        });
    </script>
</body>
</html>