<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    // Método para mostrar el formulario de registro de empleado
    public function create()
    {
        return view('empleado'); // Retorna la vista empleado.blade.php
    }

    // Método para procesar el formulario
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidoP' => 'required|string|max:255',
            'apellidoM' => 'required|string|max:255',
            'matricula' => 'required|string|max:255',
            'IDServicio' => 'required|integer',
            'sueldo' => 'required|numeric',
            'email' => 'required|email|max:255',
            'usuario' => 'required|string|max:50', // Ajusta el tamaño según la columna en la base de datos
            'contrasenia_hash' => 'required|string|max:255',
            'roles' => 'required|integer',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Guardar la foto en el servidor
        $fotoPath = $request->file('foto')->store('fotos', 'public');

        // Crear un nuevo registro en la base de datos
        Empleado::create([
            'nombre' => $request->nombre,
            'apellidoP' => $request->apellidoP,
            'apellidoM' => $request->apellidoM,
            'matricula' => $request->matricula,
            'IDServicio' => $request->IDServicio,
            'sueldo' => $request->sueldo,
            'correo' => $request->email,
            'usuario' => $request->usuario,
            'contrasenia_hash' => bcrypt($request->contrasenia_hash), // Encriptar la contraseña
            'roles' => $request->roles,
            'foto' => $fotoPath,
        ]);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('empleado.create')->with('success', 'Empleado registrado correctamente.');
    }
}