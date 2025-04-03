@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Funcionarios</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($funcionarios as $funcionario)
                    <tr>
                        <td>{{ $funcionario->id }}</td>
                        <td>{{ $funcionario->name }}</td>
                        <td>{{ $funcionario->email }}</td>
                        <td class="px-4 py-2 text-center">
                            <div class="flex justify-center">
                                <a href="{{route('admin_funcionario.edit', $funcionario ->id )}}" class="btn btn-success btn-sm">Editar</a>
                                <a href="{{route('admin_funcionario.destroy', $funcionario->id )}}" class="btn btn-danger btn-sm">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Para paginación -->
        {{ $funcionarios->links() }}
    </div>
@endsection