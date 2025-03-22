<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Empleados</title>
    <link rel="stylesheet" href="{{ asset('css/styles1.css') }}">
</head>
<body>
    <div class="container">
        <h2>Registro de Empleados</h2>

        <!-- Mostrar mensaje de éxito -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Mostrar errores de validación -->
        <div id="errorMensaje" style="color: red;"></div>

        <form action="{{ route('empleado.store') }}" method="post" enctype="multipart/form-data" id="formulario">
            @csrf
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre:" required>

            <label for="apellidoP">Apellido Paterno:</label>
            <input type="text" id="apellidoP" name="apellidoP" placeholder="Apellido Paterno:" required>

            <label for="apellidoM">Apellido Materno:</label>
            <input type="text" id="apellidoM" name="apellidoM" placeholder="Apellido Materno:" required>

            <label for="matricula">Matrícula:</label>
            <input type="text" id="matricula" name="matricula" placeholder="Matrícula:" required>

            <label for="IDServicio">Servicio:</label>
            <select id="IDServicio" name="IDServicio" required>
                <option value="1">Urgencias</option>
                <option value="2">Cuidados Intensivos</option>
                <option value="3">Oncología</option>
                <option value="4">Medicina Interna</option>
            </select>

            <label for="sueldo">Sueldo:</label>
            <input type="text" id="sueldo" name="sueldo" placeholder="Sueldo:" required>

            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="email" placeholder="Correo Electrónico:" required>

            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" placeholder="Usuario:" required>

            <label for="contrasenia_hash">Contraseña:</label>
            <input type="password" id="contrasenia_hash" name="contrasenia_hash" placeholder="Contraseña:" required>

            <label class="form-label">Rol de empleado:</label>
            <div class="rol-container">
                <input type="radio" name="roles" id="administrador" value="1" required>
                <label for="administrador">Administrador</label>

                <input type="radio" name="roles" id="medico" value="2">
                <label for="medico">Médico</label>

                <input type="radio" name="roles" id="enfermero" value="3">
                <label for="enfermero">Enfermero</label>
            </div>

            <label for="foto">Foto de Perfil:</label>
            <input type="file" id="foto" name="foto" accept="image/*" required>

            <button type="submit">Registrarse</button>
        </form>
    </div>

    <script>
        document.getElementById("formulario").addEventListener("submit", function (event) {
            let errores = [];

            // Capturar valores del formulario
            let nombre = document.getElementById("nombre").value.trim();
            let apellidoP = document.getElementById("apellidoP").value.trim();
            let apellidoM = document.getElementById("apellidoM").value.trim();
            let matricula = document.getElementById("matricula").value.trim();
            let sueldo = document.getElementById("sueldo").value.trim();
            let correo = document.getElementById("correo").value.trim();
            let usuario = document.getElementById("usuario").value.trim();
            let contrasena = document.getElementById("contrasenia_hash").value;
            let foto = document.getElementById("foto").files[0];

            // Validar nombre y apellidos (solo letras y espacios, máximo 20 caracteres)
            let nombreRegex = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{3,20}$/;
            if (!nombreRegex.test(nombre)) {
                errores.push("El nombre debe tener entre 3 y 20 caracteres y solo letras.");
            }
            if (!nombreRegex.test(apellidoP)) {
                errores.push("El apellido paterno debe tener entre 3 y 20 caracteres.");
            }
            if (!nombreRegex.test(apellidoM)) {
                errores.push("El apellido materno debe tener entre 3 y 20 caracteres.");
            }

            // Validar matrícula (solo números, máximo 10 dígitos)
            if (!/^\d{1,10}$/.test(matricula)) {
                errores.push("La matrícula debe contener solo números y máximo 10 dígitos.");
            }

            // Validar sueldo (número con hasta dos decimales, dentro del rango)
            if (!/^\d+(\.\d{1,2})?$/.test(sueldo) || sueldo < 1000 || sueldo > 100000) {
                errores.push("El sueldo debe ser un número válido entre $1000 y $100000.");
            }

            // Validar correo electrónico
            if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(correo)) {
                errores.push("El correo electrónico no es válido.");
            }

            // Validar usuario (máximo 10 caracteres)
            if (usuario.length > 10 || usuario.length < 3) {
                errores.push("El usuario debe tener entre 3 y 10 caracteres.");
            }

            // Validar contraseña (mínimo 8 caracteres, con mayúscula, minúscula, número y carácter especial)
            if (
                contrasena.length < 8 ||
                !/[A-Z]/.test(contrasena) ||
                !/[a-z]/.test(contrasena) ||
                !/[0-9]/.test(contrasena) ||
                !/[\W]/.test(contrasena)
            ) {
                errores.push(
                    "La contraseña debe tener al menos 8 caracteres, incluyendo una mayúscula, una minúscula, un número y un carácter especial."
                );
            }

            // Validar imagen (solo si se sube)
            if (foto) {
                let tiposPermitidos = ["image/jpeg", "image/png", "image/jpg"];
                if (!tiposPermitidos.includes(foto.type)) {
                    errores.push("Solo se permiten imágenes en formato JPG, JPEG o PNG.");
                }
                if (foto.size > 2 * 1024 * 1024) { // 2MB máximo
                    errores.push("La imagen debe pesar menos de 2MB.");
                }
            } else {
                errores.push("Debes subir una imagen.");
            }

            // Mostrar errores si hay
            let mensajeError = document.getElementById("errorMensaje");
            if (errores.length > 0) {
                event.preventDefault();
                mensajeError.innerHTML = errores.join("<br>");
            } else {
                mensajeError.innerHTML = "";
            }
        });
    </script>
</body>
</html>