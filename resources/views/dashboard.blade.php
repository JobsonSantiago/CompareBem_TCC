<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Compare Bem</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <!-- Inclusão do JavaScript -->
    <script src="{{ asset('js/scriptsprodutos.js') }}"></script>
    <script src="{{ asset('js/scripttema.js') }}"></script>
    <!-- Img barra de pesquisa -->
    <link rel="icon" href="images/logo_cb.png" type="image/png">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
        }

        .dashboard-container {
            display: flex;
            flex-wrap: wrap;
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

        .form-label {
            font-weight: 600;
            color: #333;
        }

        .form-control {
            color: #333;
            border-radius: 4px;
        }

        .btn-save,
        .btn-delete {
            color: #fff;
            border: none;
            font-weight: 600;
        }

        .btn-save {
            background-color: #333;
        }

        .btn-save:hover {
            background-color: #555;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        /* Navbar adjustments */
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
            margin-left: 16px;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                padding: 20px;
                border-right: none;
                border-bottom: 1px solid #dee2e6;
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

            .btn-save,
            .btn-delete {
                width: 100%;
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
            <h1 class="section-title">Configurações de Conta</h1>

            <!-- Profile Information Form -->
            <div class="data-card">
                <h2 class="mb-3">Informações do perfil</h2>
                <p>Atualize as informações de perfil e endereço de e-mail da sua conta.</p>
                <form method="post" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                        @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800">Seu endereço de e-mail não está verificado.
                                <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900">Clique aqui para reenviar o e-mail de verificação.</button>
                            </p>
                        </div>
                        @endif
                    </div>
                    <x-primary-button class="btn btn-save">{{ __('Salvar') }}</x-primary-button>
                </form>
            </div>

            <!-- Update Password Form -->
            <div class="data-card">
                <h2 class="mb-3">Atualizar senha</h2>
                <p>Certifique-se de que sua conta esteja usando uma senha longa e forte para permanecer segura.</p>
                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <x-input-label for="update_password_current_password" class="form-label" :value="__('Senha atual')" />
                        <x-text-input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-danger d-block" />
                    </div>

                    <div class="mb-3">
                        <x-input-label for="update_password_password" class="form-label" :value="__('Nova Senha')" />
                        <x-text-input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-danger d-block" />
                    </div>

                    <div class="mb-3">
                        <x-input-label for="update_password_password_confirmation" class="form-label" :value="__('Confirme sua Senha')" />
                        <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-danger d-block" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button class="btn btn-save">{{ __('Salvar') }}</x-primary-button>

                        @if (session('status') === 'password-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600">{{ __('Salvo.') }}</p>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Delete Account Section -->
            <div class="data-card">
                <h2 class="mb-3">Deletar Conta</h2>
                <p>Depois que sua conta for excluída, todos os seus recursos e dados serão excluídos permanentemente. Antes de excluir sua conta, baixe todos os dados ou informações que deseja.</p>
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-delete">Deletar Conta</button>

                    <x-modal id="modal-deletar" name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                            @csrf
                            @method('delete')
                            <div class="modal-content">
                                <br>
                                <h2 class="text-lg font-medium text-gray-900">
                                    {{ __('Você tem certeza que deseja deletar sua conta?') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600">
                                    {{ __('Uma vez que sua conta for deletada, todos os seus recursos e dados serão permanentemente excluídos. Por favor, insira sua senha para confirmar que você deseja deletar sua conta permanentemente.') }}
                                </p>

                                <div class="mt-6">
                                    <x-input-label for="password" value="{{ __('Senha') }}" class="sr-only" />

                                    <x-text-input
                                        id="password"
                                        name="password"
                                        type="password"
                                        class="mt-1 block w-3/4"
                                        placeholder="{{ __('Senha') }}" />

                                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                </div>

                                <div class="mt-6 flex justify-end">
                                    <button type="submit" class="btn btn-delete">Deletar</button>
                                </div>
                            </div>
                        </form>
                    </x-modal>

                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>