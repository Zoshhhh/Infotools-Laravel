<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Infotools Login</title>
    <!-- Styles -->
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to bottom, #2c3e50 0%, #34495e 100%);
            color: #ecf0f1;
        }

        .login-container {
            text-align: center;
            padding: 40px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            border-radius: 10px;
            background: #ffffff; /* Changement pour un fond blanc */
            color: #333333; /* Texte plus foncé pour contraste */
            max-width: 400px;
            width: 100%;
        }

        .login-logo img {
            max-width: 100px;
            height: auto;
        }

        .button {
            display: inline-block;
            margin: 10px 5px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #3490dc; /* Couleur bleue pour les boutons */
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.2s, transform 0.2s;
        }

        .button:hover {
            background-color: #6cb2eb;
            transform: translateY(-2px); /* Effet de survole subtil */
        }
    </style>
</head>
<body>
    <div class="login-container">

        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="button">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="button">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="button">Register</a>
                @endif
            @endauth
        @endif
    </div>
</body>
</html>
