@extends('layouts.master')

@section('content')
<div class="card-body">
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
</div>

<div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-100 px-4 py-8">
    <div class="bg-white/80 backdrop-blur-md shadow-lg rounded-2xl p-10 w-full max-w-3xl text-center border border-gray-200">

        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
            ¡Bienvenido {{ Auth::user()->role }} {{ Auth::user()->name }}!
        </h1>

        <h2 class="text-xl md:text-2xl text-gray-600 font-semibold mb-6">
            Bienvenido al nuevo sistema <span class="text-blue-600">GDF</span>
        </h2>

        <p class="text-lg text-gray-700 mb-4 leading-relaxed">
            Gestiona fácilmente tus solicitudes de <span class="font-semibold text-indigo-600">traslado</span> como funcionario o directivo del centro. 
        </p>

        <div class="mt-6">
            <a href="#" class="bg-blue-600 text-white px-6 py-3 rounded-full text-sm font-semibold hover:bg-blue-700 transition">
                Ver mis solicitudes
            </a>
        </div>
    </div>
</div>
@endsection
