@extends('layouts.master')

<center>
    <h1>
        Bienvenido {{ Auth::user()->role }} {{ Auth::user()->name }}

    </h1>
</center>

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

<div class="card-body">
    <center>
    <h2>
        "¡Bienvenido al nuevo sistema GDF!" <br>
    </h2>

    <h4>
        Gestiona facilmente tus solicitudes de traslados como funcionario o directivo del Centro
    </h4>
    </center>
</div>
@endsection
