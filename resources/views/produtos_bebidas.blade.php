<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compare Bem</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <!-- Importação do Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Inclusão do JavaScript -->
<script src="{{ asset('js/scriptsprodutos.js') }}"></script>
    <script src="{{ asset('js/scripttema.js') }}"></script>
    <!-- Img barra de pesquisa -->
    <link rel="icon" href="images/logo_cb.png" type="image/png">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <style>

        /* Estilo para garantir que o rodapé fique na parte inferior */
       html, body {
            height: 100%;
            margin: 0;
        }

        #content {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ocupa pelo menos 100% da altura da janela */
        }

        .flex-grow {
            flex-grow: 1; /* Faz com que o conteúdo ocupe o espaço restante */
        }

        .circle-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 20px; /* Espaçamento entre os círculos e o texto abaixo */
        }
        .circle {
            width: 250px;
            height: 250px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa; /* Fundo dos círculos */
            margin: 0 auto; /* Espaçamento entre os círculos */
            transition: transform 0.3s ease-in-out;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .circle:hover {
        transform: scale(1.05); /* Efeito de aumentar */
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2); /* Sombra mais intensa */
        }

        .circle img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ajusta a imagem para cobrir o círculo */
            transition: transform 0.3s ease-in-out;
        }

        .circle:hover img {
        transform: scale(1.1); /* Zoom na imagem */
        }
        
        .highlight-text {
            text-align: center;
            font-weight: bold;
            font-size: 1.2rem;
            margin-top: 5px; /* Espaço entre a imagem e o texto */
        }
        .circle-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px 0; /* Espaço entre as linhas de círculos */
        }
        /* Ajuste o espaçamento entre o círculo da primeira linha e o círculo da linha abaixo */
        .row .col-4 {
            margin-bottom: 80px; /* Ajuste esse valor conforme necessário */
        }
        .row .col-4:last-child {
            margin-bottom: 0; /* Remove a margem inferior do último círculo da linha */
        }
        .circle-text {
            text-align: center;
            margin-top: 10px; /* Espaçamento entre o círculo e o texto */
        }
    </style>
</head>

<body>

<!-- Contêiner principal para manter o conteúdo e o rodapé -->
<div id="content">
    
 <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Logo -->
        <div class="navbar-logo">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="images/logo_cb.png" alt="Logo" class="logo-image">
            </a>
        </div>

        <!-- Botão do Menu Colapsável -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links do Menu (Colapsáveis) -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('mercados') }}">Mercados</a>
                </li>
                
                <!-- Produtos como link direto em telas menores -->
                <li class="nav-item d-lg-none">
                    <a class="nav-link" href="{{ route('produtos') }}">Produtos</a>
                </li>

                <!-- Cadastrar Preço do Produto para telas menores -->
                <li class="nav-item d-lg-none">
                    <a class="nav-link" href="{{ route('cadastro_produto') }}">Cadastrar Preço do Produto</a>
                </li>

                <!-- Produtos: Com dropdown para telas grandes -->
                <li class="nav-item dropdown d-none d-lg-block" id="produtosDropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                        role="button" aria-expanded="false" onmouseover="showDropdown()" onmouseleave="hideDropdown()">
                        Produtos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" onmouseenter="keepDropdown()" onmouseleave="hideDropdown()">
                        <li><a class="dropdown-item" href="{{ route('cadastro_produto') }}">Cadastrar Preço do Produto</a></li>
                        </ul>
                    </li>
                </ul>
                 @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 m-3" role="alert" id="success-alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <script>
                    setTimeout(function() {
                        var alert = document.getElementById('success-alert');
                        if (alert) {
                            alert.classList.remove('show');
                            alert.classList.add('fade');
                        }
                    }, 5000); // 5000ms = 5 segundos
                </script>
                @endif
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show position-fixed top-0 end-0 m-3" role="alert" id="error-alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    setTimeout(function() {
                        var alert = document.getElementById('error-alert');
                        if (alert) {
                            alert.classList.remove('show');
                            alert.classList.add('fade');
                        }
                    }, 5000); // 5000ms = 5 segundos
                </script>
                @endif
                    </ul>
                </li>
            </ul>
        </div>

<script>
    // Função para mostrar o dropdown
    function showDropdown() {
        const dropdownMenu = document.querySelector('.dropdown-menu');
        dropdownMenu.classList.add('show');
    }

    // Função para esconder o dropdown
    function hideDropdown() {
        const dropdownMenu = document.querySelector('.dropdown-menu');
        dropdownMenu.classList.remove('show');
    }

    // Função para manter o dropdown visível enquanto o mouse está sobre ele
    function keepDropdown() {
        const dropdownMenu = document.querySelector('.dropdown-menu');
        dropdownMenu.classList.add('show');
    }

    // Lógica para redirecionar ao clicar em "Produtos" em telas grandes
    document.addEventListener("DOMContentLoaded", function () {
        const produtosLink = document.getElementById("navbarDropdown");

        produtosLink.addEventListener("click", function (event) {
            if (window.innerWidth > 992) {
                // Redireciona para a página de produtos ao clicar
                window.location.href = "{{ route('produtos') }}";
            }
        });
    });
</script>

        <!-- Ícone da Conta -->
        <div class="navbar-icon">
            <a href="{{ route('register') }}" class="navbar-brand d-flex align-items-center">
                <img src="{{ asset('images/conta_tcc.png') }}" alt="Conta" class="conta-image">
            </a>
        </div>
    </div>
</nav>

<!-- Market Listings -->
<div class="container mt-5">
    <h2 class="text-start mb-4">Produtos em destaque</h2>
    <br>

    <div class="row text-center">
        <div class="col-12">

<!-- Primeira fileira de círculos -->
<div class="row text-center">
    <div class="col-12 col-md-4 mb-3">
        <div class="circle">
            <a href="leite">
                <img src="images/pd_leite_tcc.png" alt="Leite">
            </a>
        </div>
        <h5>Leite</h5>
    </div>
    <div class="col-12 col-md-4 mb-3">
        <div class="circle">
            <a href="suco">
                <img src="images/pd_suco_tcc.png" alt="Suco">
            </a>
        </div>
        <h5>Refresco em Pó</h5>
    </div>
</div>
    </div>
    </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    </div>
    <footer class="bg-dark text-light pt-5 pb-4 mt-auto" style="font-family: 'Montserrat', sans-serif;">
    <div class="container">
        <div class="row text-center text-md-start justify-content-center">
            <!-- Logo -->
            <div class="col-12 col-sm-6 col-md-2 mb-4 d-flex justify-content-center align-items-center">
    <img src="images/logo_cb.png" alt="Logo" class="img-fluid footer-logo">
</div>

            <!-- Sobre Nós -->
            <div class="col-12 col-sm-6 col-md-3 mb-4 d-flex flex-column align-items-center align-items-md-start">
                <h5 class="footer-title text-uppercase text-primary">Sobre Nós</h5>
                <p class="text-center text-md-start">Nosso compromisso é comparar e oferecer as melhores opções de produtos, unindo qualidade e preços acessíveis para ajudar você a fazer a melhor escolha.</p>
            </div>

            <!-- Links do Site -->
            <div class="col-12 col-sm-6 col-md-2 mb-4 d-flex flex-column align-items-center align-items-md-start">
                <h5 class="footer-title text-uppercase text-primary">Links do Site</h5>
                <ul class="list-unstyled text-center text-md-start">
                    <li><a href="{{ route('home') }}" class="text-light">Início</a></li>
                    <li><a href="{{ route('mercados') }}" class="text-light">Mercados</a></li>
                    <li><a href="{{ route('produtos') }}" class="text-light">Produtos</a></li>
                    <li><a href="{{ route('cadastro_produto') }}" class="text-light">Cadastrar Preço do Produto</a></li>
                </ul>
            </div>

            <!-- Contato -->
            <div class="col-12 col-sm-6 col-md-3 mb-4 d-flex flex-column align-items-center align-items-md-start">
                <h5 class="footer-title text-uppercase text-primary">Contato</h5>
                <div class="contact-info d-flex align-items-center">
                    <i class="fas fa-envelope me-2"></i>
                    <span>cbcompare.bem@gmail.com</span>
                </div>
            </div>

            <!-- Redes Sociais -->
            <div class="col-12 col-sm-6 col-md-2 mb-4 d-flex flex-column align-items-center align-items-md-start">
                <h5 class="footer-title text-uppercase text-primary">Siga-nos</h5>
                <div class="social-icons d-flex align-items-center">
                    <a href="https://www.instagram.com/cbcompare.bem/" class="text-light">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>

        <hr class="bg-light">

        <div class="row text-center text-md-start">
            <div class="col-12 col-md-8 mb-2 mb-md-0">
                <p>© 2024 <span class="text-primary fw-bold">Compare Bem</span></p>
            </div>
            <div class="col-12 col-md-4 text-center text-md-end">
                <p>Desenvolvido por <span class="text-primary fw-bold">Jobson, Samuel, João Vitor e Raphaela</span></p>
            </div>
        </div>
    </div>
</footer>

<!-- Font Awesome (para ícones de redes sociais) -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


</body>
</html>
