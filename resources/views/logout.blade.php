<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sair da Conta</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <!-- Inclusão do JavaScript -->
    <script src="{{ asset('js/scripttema.js') }}"></script>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .logout-container {
            max-width: 400px;
            padding: 40px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .logout-container h1 {
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }

        .logout-container p {
            color: #555;
            margin-bottom: 30px;
        }

        .btn-logout {
            background-color: #dc3545;
            color: #fff;
            font-weight: 600;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .btn-logout:hover {
            background-color: #c82333;
        }

        .btn-cancel {
            background-color: #6c757d;
            color: #fff;
            font-weight: 600;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-right: 10px;
        }

        .btn-cancel:hover {
            background-color: #5a6268;
        }
    </style>
</head>

<body>
    <div class="logout-container">
        <h1>Deseja sair?</h1>
        <p>Ao sair da sua conta, você precisará fazer login novamente para acessar suas informações.</p>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-logout">Sair</button>
            <a href="dashboard" class="btn btn-cancel">Cancelar</a>
        </form>
    </div>

    <!-- Bootstrap Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>