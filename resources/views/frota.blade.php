<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frota - XL Motors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="visual.css">
        <link rel="stylesheet" href="frota.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
   
</head>

<body>
    <!-- Navbar Premium -->
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
                    <li class="nav-item">
                        <a class="nav-link" href="/">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/frota">Frota</a>
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
                        <a class="btn btn-reserva" href="/">compre Agora</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Banner da Frota -->
    <section class="frota-hero">
        <div class="container">
            <div class="frota-hero-content">
                <h1>Nossa Frota</h1>
                <p>As marcas mais exclusivas do mundo em um só lugar</p>
            </div>
        </div>
    </section>

    <!-- ===== SEÇÃO DE MARCAS EM CARROSSEL COM LOGOS ONLINE ===== -->
    <section class="marcas-section">
        <div class="container">
            <div class="section-title">
                <h2>Escolha sua marca</h2>
                <p>Clique em uma das marcas abaixo para ver todos os modelos disponíveis</p>
            </div>

            <div class="marcas-carousel">
                <div class="carrossel-container">
                    <!-- Setas de Navegação -->
                    <button class="carrossel-control prev" id="prevBtn">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="carrossel-control next" id="nextBtn">
                        <i class="fas fa-chevron-right"></i>
                    </button>

                    <!-- Wrapper do Carrossel -->
                    <div class="carrossel-wrapper">
                        <div class="carrossel-slides" id="carrosselSlides">
                            <!-- Lamborghini -->
                            <div class="carrossel-slide">
                                <a href="/frota/lamborghini" class="marca-card">
                                    <div class="marca-avatar">
                                        <img src="https://tse1.mm.bing.net/th/id/OIP.JwVz7LgRBeLNfCI3vVi-hgHaE8?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Lamborghini">
                                    </div>
                                    <h3>Lamborghini</h3>
                                    <span>8 modelos</span>
                                </a>
                            </div>
                            
                            <!-- Ferrari -->
                            <div class="carrossel-slide">
                                <a href="/frota/ferrari" class="marca-card">
                                    <div class="marca-avatar">
                                        <img src="https://tse4.mm.bing.net/th/id/OIP.rtcNqcprfCXgtbJ1bFb7IAHaFS?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Ferrari">
                                    </div>
                                    <h3>Ferrari</h3>
                                    <span>6 modelos</span>
                                </a>
                            </div>
                            
                            <!-- Porsche -->
                            <div class="carrossel-slide">
                                <a href="/frota/porsche" class="marca-card">
                                    <div class="marca-avatar">
                                        <img src="https://s1.cdn.autoevolution.com/images/news/porsche-macan-hd-wallpapers-81724_6.jpg" alt="Porsche">
                                    </div>
                                    <h3>Porsche</h3>
                                    <span>10 modelos</span>
                                </a>
                            </div>
                            
                            <!-- Mercedes-Benz -->
                            <div class="carrossel-slide">
                                <a href="/frota/mercedes" class="marca-card">
                                    <div class="marca-avatar">
                                        <img src="https://tse4.mm.bing.net/th/id/OIP.iHY0auMnKdqR90ZhZmrSfgHaEX?w=312&h=183&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3" alt="Mercedes-Benz">
                                    </div>
                                    <h3>Mercedes-Benz</h3>
                                    <span>12 modelos</span>
                                </a>
                            </div>
                            
                            <!-- BMW -->
                            <div class="carrossel-slide">
                                <a href="/frota/bmw" class="marca-card">
                                    <div class="marca-avatar">
                                        <img src="https://tse2.mm.bing.net/th/id/OIP.DkUOwy5OvcWTJ3WuyAGUQQHaFb?rs=1&pid=ImgDetMain&o=7&rm=3" alt="BMW">
                                    </div>
                                    <h3>BMW</h3>
                                    <span>9 modelos</span>
                                </a>
                            </div>
                            
                            <!-- Audi -->
                            <div class="carrossel-slide">
                                <a href="/frota/audi" class="marca-card">
                                    <div class="marca-avatar">
                                        <img src="https://images.unsplash.com/photo-1638073732451-530d995ddd0e?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8czV8ZW58MHwwfDB8fHwwg" alt="Audi">
                                    </div>
                                    <h3>Audi</h3>
                                    <span>7 modelos</span>
                                </a>
                            </div>
                            
                            <!-- Rolls Royce -->
                            <div class="carrossel-slide">
                                <a href="/frota/rolls-royce" class="marca-card">
                                    <div class="marca-avatar">
                                        <img src="https://tse3.mm.bing.net/th/id/OIP.deCWpueudGuv_iR5iwtYVgHaE-?pid=ImgDet&w=60&h=60&c=7&dpr=1,3&rs=1&o=7&rm=3" alt="Rolls Royce">
                                    </div>
                                    <h3>Rolls Royce</h3>
                                    <span>4 modelos</span>
                                </a>
                            </div>
                            
                            <!-- Bentley -->
                            <div class="carrossel-slide">
                                <a href="/frota/bentley" class="marca-card">
                                    <div class="marca-avatar">
                                        <img src="https://tse1.mm.bing.net/th/id/OIP.aFKct7YUqyTn1VYevlUSyQHaEK?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Bentley">
                                    </div>
                                    <h3>Bentley</h3>
                                    <span>5 modelos</span>
                                </a>
                            </div>
                            
                            <!-- Maserati -->
                            <div class="carrossel-slide">
                                <a href="/frota/maserati" class="marca-card">
                                    <div class="marca-avatar">
                                        <img src="https://tse1.mm.bing.net/th/id/OIP.-T4TDHVJLaMNHvvSzf6_-wHaEK?pid=ImgDet&w=60&h=60&c=7&dpr=1,3&rs=1&o=7&rm=3" alt="Maserati">
                                    </div>
                                    <h3>Maserati</h3>
                                    <span>6 modelos</span>
                                </a>
                            </div>
                            
                            <!-- McLaren -->
                            <div class="carrossel-slide">
                                <a href="/frota/mclaren" class="marca-card">
                                    <div class="marca-avatar">
                                        <img src="https://tse4.mm.bing.net/th/id/OIP.CYbgvjq4BBKkcjXulr0mzQHaEK?pid=ImgDet&w=60&h=60&c=7&dpr=1,3&rs=1&o=7&rm=3" alt="McLaren">
                                    </div>
                                    <h3>McLaren</h3>
                                    <span>4 modelos</span>
                                </a>
                            </div>
                            
                            <!-- Aston Martin -->
                            <div class="carrossel-slide">
                                <a href="/frota/aston-martin" class="marca-card">
                                    <div class="marca-avatar">
                                        <img src="https://tse2.mm.bing.net/th/id/OIP.L06MJ0x5AT4nUC_9LaRXCwHaFj?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Aston Martin">
                                    </div>
                                    <h3>Aston Martin</h3>
                                    <span>5 modelos</span>
                                </a>
                            </div>
                            
                            <!-- Jaguar -->
                            <div class="carrossel-slide">
                                <a href="/frota/jaguar" class="marca-card">
                                    <div class="marca-avatar">
                                        <img src="https://wallpapercave.com/wp/wp1854093.jpg" alt="Jaguar">
                                    </div>
                                    <h3>Jaguar</h3>
                                    <span>6 modelos</span>
                                </a>
                            </div>
                            
                            <!-- Land Rover -->
                            <div class="carrossel-slide">
                                <a href="/frota/land-rover" class="marca-card">
                                    <div class="marca-avatar">
                                        <img src="https://tse4.mm.bing.net/th/id/OIP.YjQk2IVCs0T6RLgLimcE2wHaE7?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Land Rover">
                                    </div>
                                    <h3>Land Rover</h3>
                                    <span>7 modelos</span>
                                </a>
                            </div>
                            
                            <!-- Bugatti -->
                            <div class="carrossel-slide">
                                <a href="/frota/bugatti" class="marca-card">
                                    <div class="marca-avatar">
                                        <img src="https://tse4.mm.bing.net/th/id/OIP.9HiyUxiARpqGvEh3f3xYdwHaE8?w=1024&h=683&rs=1&pid=ImgDetMain&o=7&rm=3" alt="Bugatti">
                                    </div>
                                    <h3>Bugatti</h3>
                                    <span>3 modelos</span>
                                </a>
                            </div>
                            
                           
                        </div>
                    </div>
                </div>

                <!-- Indicadores (bolinhas) -->
                <div class="carrossel-indicators" id="indicators"></div>
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
                        <li><i class="fas fa-envelope"></i> contato@XLmotors.com.br</li>
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
                <p>&copy; 2026 XL Motors. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Botão do WhatsApp -->
    <a href="https://wa.me/5511999999999?text=Olá,%20gostaria%20de%20saber%20mais%20sobre%20a%20frota%20da%20WL%20Motors" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>










    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ===== CARROSSEL DE MARCAS COM ROTAÇÃO INFINITA =====
            const slides = document.getElementById('carrosselSlides');
            const slidesCount = document.querySelectorAll('.carrossel-slide').length;
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const indicatorsContainer = document.getElementById('indicators');
            
            let currentIndex = 0;
            let slidesPerView = 6;
            let maxIndex = 0;
            let autoPlayInterval;
            let isPlaying = true;

            // Função para atualizar slides por view baseado no tamanho da tela
            function updateSlidesPerView() {
                if (window.innerWidth <= 576) {
                    slidesPerView = 2;
                } else if (window.innerWidth <= 768) {
                    slidesPerView = 3;
                } else if (window.innerWidth <= 992) {
                    slidesPerView = 4;
                } else if (window.innerWidth <= 1200) {
                    slidesPerView = 5;
                } else {
                    slidesPerView = 6;
                }
                
                maxIndex = Math.max(0, Math.ceil(slidesCount / slidesPerView) - 1);
                if (currentIndex > maxIndex) currentIndex = maxIndex;
                
                createIndicators();
                updateCarousel();
            }

            // Criar indicadores (bolinhas)
            function createIndicators() {
                if (!indicatorsContainer) return;
                
                const totalIndicators = Math.ceil(slidesCount / slidesPerView);
                let indicatorsHTML = '';
                
                for (let i = 0; i < totalIndicators; i++) {
                    indicatorsHTML += `<button class="indicator ${i === currentIndex ? 'active' : ''}" data-index="${i}"></button>`;
                }
                
                indicatorsContainer.innerHTML = indicatorsHTML;
                
                // Adicionar evento aos indicadores
                document.querySelectorAll('.indicator').forEach(indicator => {
                    indicator.addEventListener('click', function() {
                        currentIndex = parseInt(this.dataset.index);
                        updateCarousel();
                        updateIndicators();
                        resetAutoPlay();
                    });
                });
            }

            // Atualizar indicadores
            function updateIndicators() {
                document.querySelectorAll('.indicator').forEach((indicator, index) => {
                    if (index === currentIndex) {
                        indicator.classList.add('active');
                    } else {
                        indicator.classList.remove('active');
                    }
                });
            }

            // Atualizar posição do carrossel
            function updateCarousel() {
                if (slides) {
                    const slideWidth = 100 / slidesPerView;
                    slides.style.transform = `translateX(-${currentIndex * 100}%)`;
                }
            }

            // Função para próximo slide (com loop infinito)
            function nextSlide() {
                if (currentIndex < maxIndex) {
                    currentIndex++;
                } else {
                    currentIndex = 0; // Volta para o primeiro
                }
                updateCarousel();
                updateIndicators();
            }

            // Função para slide anterior (com loop infinito)
            function prevSlide() {
                if (currentIndex > 0) {
                    currentIndex--;
                } else {
                    currentIndex = maxIndex; // Vai para o último
                }
                updateCarousel();
                updateIndicators();
            }

            // Iniciar autoplay
            function startAutoPlay() {
                if (autoPlayInterval) clearInterval(autoPlayInterval);
                autoPlayInterval = setInterval(nextSlide, 3000); // Muda a cada 3 segundos
                isPlaying = true;
            }

            // Parar autoplay
            function stopAutoPlay() {
                if (autoPlayInterval) {
                    clearInterval(autoPlayInterval);
                    autoPlayInterval = null;
                    isPlaying = false;
                }
            }

            // Resetar autoplay (quando o usuário interage)
            function resetAutoPlay() {
                stopAutoPlay();
                startAutoPlay();
            }

            // Evento do botão próximo
            if (nextBtn) {
                nextBtn.addEventListener('click', function() {
                    nextSlide();
                    resetAutoPlay();
                });
            }

            // Evento do botão anterior
            if (prevBtn) {
                prevBtn.addEventListener('click', function() {
                    prevSlide();
                    resetAutoPlay();
                });
            }

            // Pausar autoplay quando o mouse está sobre o carrossel
            const carrossel = document.querySelector('.carrossel-container');
            if (carrossel) {
                carrossel.addEventListener('mouseenter', stopAutoPlay);
                carrossel.addEventListener('mouseleave', startAutoPlay);
            }

            // Atualizar quando a janela for redimensionada
            window.addEventListener('resize', function() {
                updateSlidesPerView();
                resetAutoPlay();
            });

            // Inicializar
            updateSlidesPerView();
            startAutoPlay(); // Inicia a rotação automática

            // ===== ATUALIZAR ANO NO FOOTER =====
            const footerYear = document.querySelector('.footer-bottom p');
            if(footerYear) {
                const currentYear = new Date().getFullYear();
                footerYear.innerHTML = `&copy; ${currentYear} XL Motors. Todos os direitos reservados.`;
            }
        });
    </script>
</body>
</html>