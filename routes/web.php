<?php

use App\Http\Controllers\ServicioController;

Route::get('/servicio/create', [ServicioController::class, 'create'])->name('servicio.create');
Route::post('/servicio/store', [ServicioController::class, 'store'])->name('servicio.store');

use App\Http\Controllers\EmpleadoController;

// Ruta para mostrar el formulario de registro de empleado
Route::get('/empleado/create', [EmpleadoController::class, 'create'])->name('empleado.create');

// Ruta para procesar el formulario
Route::post('/empleado/store', [EmpleadoController::class, 'store'])->name('empleado.store');

use App\Http\Controllers\PacienteController;

// Ruta para mostrar el formulario de paciente
Route::get('/paciente/create', [PacienteController::class, 'create'])->name('paciente.create');

// Ruta para procesar el formulario y guardar los datos
Route::post('/paciente/store', [PacienteController::class, 'store'])->name('paciente.store');