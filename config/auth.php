<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web', // Puedes cambiar esto si deseas que otro guard sea el predeterminado
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Define los guards para la autenticación.
    | Aquí agregamos guards para 'paciente' y 'empleado'.
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'paciente' => [
            'driver' => 'session',
            'provider' => 'pacientes',
        ],

        'empleado' => [
            'driver' => 'session',
            'provider' => 'empleados',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Define los providers para los modelos de usuario.
    | Aquí agregamos providers para 'pacientes' y 'empleados'.
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'pacientes' => [
            'driver' => 'eloquent',
            'model' => App\Models\Paciente::class,
        ],

        'empleados' => [
            'driver' => 'eloquent',
            'model' => App\Models\Empleado::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Configuración para el restablecimiento de contraseñas.
    | Puedes agregar configuraciones específicas para 'pacientes' y 'empleados' si es necesario.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'pacientes' => [
            'provider' => 'pacientes',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'empleados' => [
            'provider' => 'empleados',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Tiempo de espera para la confirmación de contraseña.
    |
    */

    'password_timeout' => 10800,

];