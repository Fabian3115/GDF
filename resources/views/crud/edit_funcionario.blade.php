@extends('layouts.master')

@section('content')
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Actualización Exitosa',
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
                    <h5>Editar Funcionario</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin_funcionario.update', $funcionario->id) }}">
                        @csrf
                        @method('POST') <!-- Usamos POST para la actualización -->

                        <div class="mb-2">
                            <label class="form-label">Nombre Completo</label>
                            <input type="text" name="name" class="form-control form-control-sm" value="{{ old('name', $funcionario->name) }}" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Correo Electrónico</label>
                            <input type="email" name="email" class="form-control form-control-sm" value="{{ old('email', $funcionario->email) }}" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Contraseña (dejar en blanco para no cambiarla)</label>
                            <input type="password" name="password" class="form-control form-control-sm" placeholder="Nueva contraseña (opcional)">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <input type="hidden" name="role" value="Funcionario">

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-sm">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection