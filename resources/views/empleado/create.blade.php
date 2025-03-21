<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Empleado</title>
</head>
<body>
    <h1>Agregar Empleado</h1>
    <form action="{{ route('empleado.store') }}" method="POST">
        @csrf
        <label for="matricula">Matrícula:</label>
        <input type="number" id="matricula" name="matricula" required><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="apellidoP">Apellido Paterno:</label>
        <input type="text" id="apellidoP" name="apellidoP" required><br>

        <label for="apellidoM">Apellido Materno:</label>
        <input type="text" id="apellidoM" name="apellidoM" required><br>

        <label for="IDServicio">ID Servicio:</label>
        <input type="number" id="IDServicio" name="IDServicio" required><br>

        <label for="sueldo">Sueldo:</label>
        <input type="number" step="0.01" id="sueldo" name="sueldo" required><br>

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" required><br>

        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br>

        <label for="contrasenia_hash">Contraseña:</label>
        <input type="text" id="contrasenia_hash" name="contrasenia_hash" required><br>

        <label for="roles">Roles:</label>
        <input type="number" id="roles" name="roles" required><br>

        <label for="foto">Foto:</label>
        <input type="text" id="foto" name="foto" required><br>

        <button type="submit">Agregar</button>
    </form>
</body>
</html>