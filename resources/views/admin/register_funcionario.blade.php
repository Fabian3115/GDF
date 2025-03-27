@extends('layouts.master')

@section('content')
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Registro Exitoso',
        text: "{{ session('success') }}",
        confirmButtonText: 'Entendido'
    });
</script>
@endif

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

<br>

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <h5>Registro de Funcionario</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('admin_funcionario.store')}}">
                        @csrf

                        <div class="mb-2">
                            <label class="form-label">Nombre Completo</label>
                            <input type="text" name="name" class="form-control form-control-sm" required>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Correo Electrónico</label>
                            <input type="email" name="email" class="form-control form-control-sm" required>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Contraseña</label>
                            <input type="password" name="password" class="form-control form-control-sm" required>
                        </div>

                        <input type="hidden" name="role" value="Funcionario">

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-sm">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
