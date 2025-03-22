<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro De Empleados</title>
    <link rel="stylesheet" href="{{ asset('css/styles1.css') }}">
</head>
<body>
    <div class="container">
        <h2>Registro</h2>
        <form action="{{ route('empleado.store') }}" method="post" enctype="multipart/form-data" onsubmit="return validarFormulario()" id="formulario">
            @csrf
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre:" required>

            <label for="apellidoP">Apellido Paterno:</label>
            <input type="text" id="apellidoP" name="apellidoP" placeholder="Apellido Paterno:" required>

            <label for="apellidoM">Apellido Materno:</label>
            <input type="text" id="apellidoM" name="apellidoM" placeholder="Apellido Materno:" required>

            <label for="matricula">Matricula:</label>
            <input type="text" id="matricula" name="matricula" placeholder="Matricula:" required>

            <label for="servicio">Servicio:</label>
            <select id="servicio" name="IDServicio" required>
                <option value="1">Urgencias</option>
                <option value="2">Cuidados Intensivos</option>
                <option value="3">Oncologia</option>
                <option value="4">Medicina Interna</option>
            </select>

            <label for="sueldo">Sueldo:</label>
            <input type="text" id="sueldo" name="sueldo" placeholder="Sueldo:" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" placeholder="Correo Electrónico:" required>

            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" placeholder="Usuario:" required>

            <label for="contrasenia_hash">Contraseña:</label>
            <input type="password" id="contrasenia_hash" name="contrasenia_hash" placeholder="Contraseña:" required>

            <label class="form-label">Rol de empleado:</label>
            <div class="rol-container">
                <input type="radio" name="roles" id="administrador" value="1" required>
                <label for="administrador">Administrador</label>

                <input type="radio" name="roles" id="medico" value="2">
                <label for="medico">Medico</label>

                <input type="radio" name="roles" id="enfermero" value="3">
                <label for="enfermero">Enfermero</label>
            </div>

            <label for="foto">Foto de Perfil:</label>
            <input type="file" id="foto" name="foto" accept="image/*" required>

            <button type="submit">Registrarse</button>
        </form>
    </div>

    <p id="errorMensaje" style="color: red;"></p>

    <script>
        document.getElementById("formulario").addEventListener("submit", function (event) {
            let contrasena = document.getElementById("contrasenia_hash").value;
            let mensaje = document.getElementById("mensaje");
            mensaje.innerHTML = ""; // Limpiar mensajes previos
            let errores = [];

            if (contrasena.length < 8) {
                errores.push("Debe tener al menos 8 caracteres.");
            }
            if (!/[A-Z]/.test(contrasena)) {
                errores.push("Debe tener al menos una letra mayúscula.");
            }
            if (!/[a-z]/.test(contrasena)) {
                errores.push("Debe tener al menos una letra minúscula.");
            }
            if (!/[0-9]/.test(contrasena)) {
                errores.push("Debe tener al menos un número.");
            }
            if (!/[\W]/.test(contrasena)) {
                errores.push("Debe tener al menos un carácter especial (@, #, $, etc.).");
            }

            if (errores.length > 0) {
                mensaje.innerHTML = errores.join("<br>"); // Mostrar errores
                event.preventDefault(); // Evitar el envío del formulario si hay errores
            }
        });

        function validarFormulario() {
            let foto = document.getElementById("foto").files[0];
            let errorMensaje = document.getElementById("errorMensaje");

            if (foto) {
                let tiposPermitidos = ["image/jpeg", "image/png", "image/jpg"];
                if (!tiposPermitidos.includes(foto.type)) {
                    errorMensaje.innerText = "Solo se permiten imágenes en formato JPG, JPEG o PNG.";
                    return false;
                }
                if (foto.size > 2 * 1024 * 1024) { // 2MB máximo
                    errorMensaje.innerText = "La imagen debe pesar menos de 2MB.";
                    return false;
                }
            }

            return true;
        }
    </script>
</body>
</html>