<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MatchApp</title>
    <link rel="icon" href="/logo.png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color:#1B1B1B;
        }
    </style>
</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen dark:bg-gray-900 sm:items-center py-4 sm:pt-0"><!--bg-gray-100-->

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <img class="mx-auto" src="/logo.png" alt="">
            </div>
            <h1 class="text-white text-center text-7xl mb-4">MatchApp</h1>
            <p class="text-white text-center text-xl mb-4">Sports and E-Sports Tournament Management App</p>
            <div class="flex flex-wrap flex-col justify-center">
                <a class="rounded-full bg-white px-6 py-3 border w-1/2 mx-auto mb-2 text-center" href="/admin">Login</a>
                <a class="rounded-full bg-white px-6 py-3 border w-1/2 mx-auto mb-2 text-center"
                    href="/player-register">Register as
                    Player</a>
                <a class="rounded-full bg-white px-6 py-3 border w-1/2 mx-auto mb-2 text-center"
                    href="/host-register">Register as Host</a>
            </div>
        </div>
</body>

</html>
