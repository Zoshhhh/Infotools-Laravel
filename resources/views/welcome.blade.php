<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Infotools</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="antialiased bg-gray-900 text-gray-200">
    <div class="flex justify-center items-center h-screen bg-cover bg-center" style="background-image: url('your-background-image-url.jpg');">
        <div class="text-center bg-gray-800 p-10 rounded-lg shadow-lg max-w-sm">
            <h1 class="text-4xl font-bold mb-6">Infotools</h1>
            <p class="mb-6">Bienvenue sur l'application Infotools. Connectez-vous pour continuer.</p>
            @if (Route::has('login'))
            <div class="flex flex-col space-y-4">
                @auth
                <a href="{{ url('/dashboard') }}" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Accéder à l'application</a>
                @else
                <a href="{{ route('login') }}" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Connexion</a>
                @endauth
            </div>
            @endif
                </div>
    </div>
</body>

</html>
