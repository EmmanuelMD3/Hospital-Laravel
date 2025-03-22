<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Inicio de Sesión</title>
    <!-- Usa la función asset() para cargar el archivo CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles2.css') }}"/>        
</head>
<body>
    <div class="container">
        <h2>Inicio de Sesión</h2>
        <!-- Usa la función route() para definir la acción del formulario -->
        <form action="{{ route('login.submit') }}" method="post" enctype="multipart/form-data">
            @csrf <!-- Agrega el token CSRF para protección -->
            <label for="usuario">Usuario:</label>
            <input
              type="text"
              id="usuario"
              name="usuario"
              placeholder="Usuario:"
              required
            />
    
            <label for="contrasenia_hash">Contraseña:</label>
            <input
              type="password"
              id="contrasenia_hash"
              name="contrasenia_hash"
              placeholder="Contraseña:"
              required
            />
            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</html>