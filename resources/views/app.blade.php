<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contatos</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"> {{-- ADICIONE ESTA LINHA --}}
    @vite('resources/js/app.js')
</head>
<body class="antialiased">
    @inertia
</body>
</html>