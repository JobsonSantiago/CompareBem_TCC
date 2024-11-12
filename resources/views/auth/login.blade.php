<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Inclusão do JavaScript -->
    <script src="{{ asset('js/scripttema.js') }}"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Custom CSS -->
    <style>
        /* Fundo com imagem */
        body {
            background-image: url('images/banner_login.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Montserrat', sans-serif;
        }

        .input-icon {
            position: absolute;
            right: 15px;
            /* Ajusta a posição para que fique dentro do campo */
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            background: transparent;
            /* Sem fundo */
            z-index: 2;
            /* Garante que o botão esteja acima do campo */
        }

        .mb-3 {
            position: relative;
            /* Mantém a posição relativa para o ícone */
        }

        #error {
            margin-top: 5px;
            /* Espaçamento acima da mensagem de erro */
            color: red;
            /* Cor da mensagem de erro */
        }

        .input-icon button {
            background: transparent;
            /* Sem fundo */
            border: none;
            /* Remove borda */
            color: black;
            /* Cor do ícone do olho */
            cursor: pointer;
            /* Muda o cursor para mão ao passar por cima */
        }

        .input-icon button:hover {
            color: #28a745;
            /* Cor ao passar o mouse */
        }

        .input-group {
            position: relative;
            /* Adiciona posição relativa para o grupo de entrada */
        }

        /* Aplica o fundo completo para garantir que ele não desapareça */
        #email.input-with-icon {
            background: url('images/envelope.png') no-repeat 10px center;
            background-size: 20px 15px;
            padding-left: 40px;
            /* Mantém o padding à esquerda para o ícone do envelope */
        }

        #password.input-with-icon {
            background: url('images/cadeado.png') no-repeat 10px center;
            /* Ícone do cadeado */
            background-size: 20px 15px;
            /* Tamanho do ícone */
            padding-left: 40px;
            /* Espaço para o ícone do cadeado */
            padding-right: 40px;
            /* Espaço para o ícone de visibilidade */
            position: relative;
            /* Certifique-se de que o botão de visibilidade fique alinhado */
        }

        /* Específico para senha */
        #password.input-with-icon {
            background-image: url('images/cadeado.png');
        }

        /* Mantém o espaço para o texto */
        .input-with-icon {
            padding-left: 40px;
            border-radius: 15px;
            transition: background 0.3s ease-in-out;
            border: 2px solid transparent;
            /* Borda padrão transparente */
        }

        /* Garante que o ícone permaneça mesmo ao focar */
        .input-with-icon:focus {
            background-position: 10px center;
            outline: none;
            border-color: #28a745;
            /* Borda verde ao focar */
        }

        /* Container principal */
        .main-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            padding: 2rem;
            display: flex;
            max-width: 900px;
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Área da imagem */
        .image-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            perspective: 1000px;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            transition: transform 0.2s ease;
            transform-style: preserve-3d;
        }

        /* Container de Login */
        .login-container {
            flex: 1;
            padding: 2rem;
        }

        /* Títulos */
        h3 {
            color: #333;
            text-align: center;
            font-family: 'Montserrat', sans-serif;
        }

        /* Botão de Login */
        .btn-login {
            background-color: #28a745;
            /* Cor do botão verde */
            color: #fff;
            font-weight: bold;
            transition: background-color 0.3s ease;
            width: 100%;
            border-radius: 50px;
        }

        .btn-login:hover {
            background-color: #218838;
            /* Cor do botão verde ao passar o mouse */
        }

        /* Estilo do botão para alternar a senha */
        .toggle-password {
            background-color: transparent;
            /* Fundo do botão transparente */
            border: none;
            /* Remove borda */
            position: absolute;
            /* Posiciona o botão absolutamente dentro do grupo */
            right: 10px;
            /* Alinha à direita */
            top: 50%;
            /* Alinha verticalmente ao centro */
            transform: translateY(-50%);
            /* Centraliza verticalmente */
            color: #000;
            /* Cor do ícone */
            cursor: pointer;
            /* Muda o cursor para mão ao passar por cima */
        }

        .toggle-password:focus {
            outline: none;
            /* Remove contorno */
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .main-container {
                flex-direction: column;
            }

            .image-container {
                margin-bottom: 1rem;
            }
        }

        .custom-rounded {
            border-radius: 15px;
        }

        /* Efeitos de foco e luz */
        .form-control.custom-focus:focus {
            box-shadow: 0 0 20px rgba(40, 167, 69, 1) !important,
                0 0 40px rgba(40, 167, 69, 0.7) !important,
                0 0 60px rgba(40, 167, 69, 0.5) !important;
            border-color: #28a745 !important;
            outline: none !important;
        }
    </style>
</head>

<body>

    <!-- Container Principal -->
    <div class="main-container">
        <!-- Imagem -->
        <div class="image-container">
            <img src="images/img_login.png" alt="Imagem de Login" id="loginImage">
        </div>

        <!-- Formulário de Login -->
        <div class="login-container">
            <div class="text-center mb-4">
                <h3>Faça seu Login</h3>
            </div>

            <!-- Exibição de erros -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Formulário de Login -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- E-mail -->
                <div class="mb-3 position-relative">
                    <x-text-input id="email"
                        class="form-control custom-rounded custom-focus input-with-icon"
                        type="email" name="email"
                        :value="old('email')"
                        required autofocus placeholder="E-mail" />
                    <div id="email-error" class="mt-2 text-danger"></div>
                </div>

                <!-- Senha -->
                <div class="mb-3 position-relative">
                    <x-text-input id="password"
                        class="form-control custom-rounded custom-focus input-with-icon"
                        type="password" name="password"
                        required placeholder="Senha" />
                    <div class="input-icon">
                        <button type="button" class="toggle-password" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                <div id="password-error" class="mt-2 text-danger"></div> <!-- Mensagem de erro -->




                <!-- Botão de Login -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-login btn-lg">Entrar</button>
                </div>

                <!-- Lembrar de mim e Esqueceu sua senha -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="form-check">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label for="remember_me" class="form-check-label">{{ __('Lembrar de mim') }}</label>
                    </div>
                    <a href="{{ route('password.request') }}">Esqueceu sua senha?</a>
                </div>
            </form>

            <div class="text-center mt-3">
                <p><br>Ainda não tem uma conta? <a href="{{ route('register') }}">Crie uma agora</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, e jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Efeito 3D na imagem
        const image = document.getElementById('loginImage');

        image.addEventListener('mousemove', (event) => {
            const rect = image.getBoundingClientRect();
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;

            const rotateY = ((x / rect.width) - 0.5) * 140;
            const rotateX = ((y / rect.height) - 0.5) * -140;

            image.style.transform = `rotateY(${rotateY}deg) rotateX(${rotateX}deg) scale(1.05)`;
        });

        image.addEventListener('mouseleave', () => {
            image.style.transform = 'rotateY(0) rotateX(0) scale(1)';
        });

        // JavaScript para alternar a visibilidade da senha
        document.querySelectorAll('.toggle-password').forEach(button => {
            // Seleciona o input de senha correspondente ao botão
            const passwordField = button.closest('.mb-3').querySelector('input'); // Altera para o campo correto
            const icon = button.querySelector('i');

            // Garantir que o campo de senha comece oculto
            passwordField.setAttribute('type', 'password');
            icon.classList.remove('fa-eye'); // Ícone inicial deve ser o olho fechado
            icon.classList.add('fa-eye-slash'); // Ícone do olho fechado

            button.addEventListener('click', function() {
                // Alterna o tipo do input entre 'password' e 'text'
                const isPassword = passwordField.getAttribute('type') === 'password';
                passwordField.setAttribute('type', isPassword ? 'text' : 'password');

                // Troca o ícone conforme a visibilidade
                if (isPassword) {
                    icon.classList.remove('fa-eye-slash'); // Olho fechado
                    icon.classList.add('fa-eye'); // Olho aberto
                } else {
                    icon.classList.remove('fa-eye'); // Olho aberto
                    icon.classList.add('fa-eye-slash'); // Olho fechado
                }
            });
        });

        // Validação em tempo real
        document.addEventListener('DOMContentLoaded', () => {
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const emailError = document.getElementById('email-error');
            const passwordError = document.getElementById('password-error');

            // Função para validar email
            function validateEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Expressão regular simples para validar e-mail
                return re.test(String(email).toLowerCase());
            }

            // Validação do email
            emailInput.addEventListener('input', () => {
                if (!validateEmail(emailInput.value)) {
                    emailError.textContent = 'Digite um e-mail válido.';
                } else {
                    emailError.textContent = '';
                }
            });

            // Validação da senha
            passwordInput.addEventListener('input', () => {
                if (passwordInput.value.length < 8) {
                    passwordError.textContent = 'A senha deve ter pelo menos 8 caracteres.';
                } else {
                    passwordError.textContent = '';
                }
            });
        });
    </script>
</body>

</html>