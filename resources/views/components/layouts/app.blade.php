<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva tu cita médica</title>
    @livewireStyles
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container">
        <header>
            <h1>Reserva tu cita médica</h1>
        </header>
        <main>
            @yield('content')  <!-- Aquí se cargará el contenido de tu formulario -->
        </main>
    </div>
    @livewireScripts
</body>
</html>
