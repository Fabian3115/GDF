@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Administradores</h1>
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
                @foreach ($admins as $admin)
                    <tr>
                        <td>{{ $admin->id }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td class="px-4 py-2 text-center">
                            <div class="flex justify-center">
                                <a href="{{route('superadmin_admin.edit', $admin ->id )}}" class="btn btn-success btn-sm">Editar</a>
                                <a href="{{route('superadmin_admin.destroy', $admin->id )}}" class="btn btn-danger btn-sm">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Para paginación, si la usas -->
        {{ $admins->links() }}
    </div>
@endsection