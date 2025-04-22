@extends('layouts.master')

@section('content')
@if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Acceso Denegado',
            text: "{{ session('error') }}",
            confirmButtonText: 'Entendido'
        });
    </script>
@endif

<div class="flex items-center justify-center min-h-screen bg-gradient-to-r from-gray-900 via-slate-800 to-gray-900 px-6 py-12">
    <div class="bg-white/10 backdrop-blur-md border border-gray-700 shadow-2xl rounded-3xl p-10 max-w-3xl w-full text-center text-white">

        <h1 class="text-4xl font-extrabold mb-4 text-yellow-400">
            Panel del Superadministrador
        </h1>

        <h2 class="text-2xl mb-6">
            Bienvenido {{ Auth::user()->role }} {{ Auth::user()->name }}
        </h2>

        <p class="text-lg text-gray-300 mb-8 leading-relaxed">
            Desde este panel tienes control total del sistema. Gestiona usuarios, monitorea solicitudes y configura el entorno institucional con eficiencia y seguridad.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 justify-center">
            <a href="#" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-semibold py-3 px-6 rounded-xl shadow-lg transition">
                👥 Gestionar Usuarios
            </a>
            <a href="#" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-3 px-6 rounded-xl shadow-lg transition">
                📄 Revisar Solicitudes
            </a>
            <a href="#" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-xl shadow-lg transition">
                🛡️ Auditorías del Sistema
            </a>
            <a href="#" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-xl shadow-lg transition">
                ⚙️ Configuración General
            </a>
        </div>
    </div>
</div>
@endsection
