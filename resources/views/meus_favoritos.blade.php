<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Favoritos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <!-- Inclusão do JavaScript -->
    <script src="{{ asset('js/scriptsprodutos.js') }}"></script>
    <script src="{{ asset('js/scripttema.js') }}"></script>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
        }

        .dashboard-container {
            display: flex;
            margin-top: 80px;
        }

        .sidebar {
            width: 200px;
            background-color: #fff;
            padding: 30px 20px;
            height: 100vh;
            border-right: 1px solid #dee2e6;
            position: fixed;
        }

        .profile-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-logo {
            width: 60px;
            border-radius: 50%;
        }

        .greeting {
            font-size: 1.2rem;
            color: #333;
            margin-top: 10px;
        }

        .sidebar-links li {
            list-style: none;
            margin-bottom: 15px;
        }

        .sidebar-links a {
            text-decoration: none;
            color: #333;
            font-weight: 600;
        }

        .sidebar-links a:hover {
            color: #1567be;
        }

        .sidebar-links .active a {
            color: #1567be;
            font-weight: 700;
        }

        .main-content {
            margin-left: 220px;
            padding: 40px;
            flex-grow: 1;
        }

        .section-title {
            font-weight: 600;
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .data-card {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            margin-bottom: 20px;
        }

        .btn-remove {
            background-color: #dc3545;
            color: #fff;
            border: none;
            font-weight: 600;
        }

        .btn-remove:hover {
            background-color: #c82333;
        }

        .navbar {
            height: 80px;
            background: linear-gradient(to right, #007bff, #0056b3);
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .navbar-brand {
            width: 100%;
            text-align: center;
        }

        .logo-image {
            height: 140px;
            margin-top: -40px;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding: 20px;
                border-right: none;
                border-bottom: 1px solid #dee2e6;
            }

            .profile-section {
                display: flex;
                flex-direction: column;
                align-items: center;
                margin-top: -20px;
                text-align: center;
            }

            .profile-section .greeting {
                margin-left: -17px;
                /* Ajuste o valor conforme necessário */
            }


            .main-content {
                margin-left: 0;
                padding: 20px;
                width: 100%;
            }

            .dashboard-container {
                flex-direction: column;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .btn-remove {
                width: 100%;
            }

            .logo-image {
                height: 140px;
                margin-top: -40px;
            }

            .profile-logo {
                margin-top: 20px;
                margin-left: -16px;
                width: 60px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="home">
                <img src="images/logo_cb.png" alt="Logo" class="logo-image">
            </a>
        </div>
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
    </nav>

    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="profile-section">
                <img src="images/conta_tcc.png" alt="Perfil" class="profile-logo">
                <p class="greeting">Olá, {{ auth()->user()->name }}!</p>
            </div>
            <ul class="sidebar-links">
                <li class="active"><a href="dashboard">Dados pessoais</a></li>
                <li><a href="meus_favoritos">Favoritos</a></li>
                <li><a href="#" class="theme-toggle" onclick="doDemo(this);">Mudar Tema</a></li>
                <li><a href="logout">Sair</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h1 class="section-title">Meus Favoritos</h1>

            <div class="data-card">
                <h2 class="mb-3">Itens Favoritos</h2>
                <p>Veja abaixo sua lista de itens favoritos.</p>
                <li class="list-group-item">
                    @if($favoritos->isEmpty())
                    <div class="alert alert-info">
                        <p>Você não tem favoritos ainda.</p>
                    </div>
                    @else
                    <ul class="list-unstyled">
                        @foreach ($favoritos as $favorito)
                        <li class="d-flex justify-content-between align-items-center mb-3 p-3 border rounded shadow-sm">
                            <div>
                                <strong>Produto:</strong> {{ $favorito->produto->nome_produto }} <br>
                                <strong>Marca:</strong> {{ $favorito->produto->marca }} <br>
                                <strong>Mercado:</strong> {{ $favorito->mercado->nome_mercado }} <br>
                                <strong>Preço Médio:</strong>
                                <span class="text-success">
                                    {{
                                number_format(
                                $favorito->caracteristicas
                                    ->where('id_mercado', $favorito->id_mercado)
                                    ->where('id_produto', $favorito->id_produto)
                                    ->avg('preco'), 2, ',', '.') ?: 'N/A' 
                            
                                }}
                                </span>
                            </div>
                            <form action="{{ route('favoritar_remover') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_produto" value="{{$favorito->produto->id_produto}}">
                                <input type="hidden" name="id_mercado" value="{{$favorito->mercado->id_mercado}}">
                                <button class="btn btn-danger btn-remove">Remover</button>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                    @endif

                </li>

            </div>
        </div>
    </div>

    <!-- Bootstrap Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>