<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class FuncionarioController extends Controller
{
    public function index_funcionario()
    {
        $funcionarios = User::where('role', 'Funcionario')->paginate(10);
        return view('admin.lista_funcionario', compact('funcionarios'));
        
    }

    public function create_funcionario()
    {
        return view('admin.register_funcionario');
    }

    public function store_funcionario(Request $request)
    {
        {
            $request->validate([
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
                'role'     => 'required|in:Funcionario', // Valida que el rol sea "Funcionario"
            ]);

            User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'role'     => $request->role, // Usa el valor del formulario ("Funcionario")
            ]);

            return redirect()->back()->with('success', 'Funcionario registrado correctamente.');
        }
    }

    public function edit_funcionario($id)
    {
        $funcionario = User::findOrFail($id);
        return view('crud.edit_role.edit_funcionario', compact('funcionario'));
    }

    public function update_funcionario(Request $request, $id)
    {
        $funcionario = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $funcionario->id,
            'password' => 'nullable|string|min:8', // Contraseña opcional
        ]);

        $funcionario->name = $request->name;
        $funcionario->email = $request->email;
        if ($request->filled('password')) {
            $funcionario->password = bcrypt($request->password);
        }
        $funcionario->role = 'Funcionario'; // Rol fijo
        $funcionario->save();

        return redirect()->route('admin_funcionario.index')->with('success', 'Funcionario actualizado exitosamente.');
    }

    public function destroy_funcionario($id)
    {
        $funcionario = User::findOrFail($id);
        $funcionario->delete();
    
        return redirect()->route('cultivos.index');
    }

    public function index_certificado()
    {
        $certificate = Certificate::where('role', 'Funcionario')->paginate(10);
        return view('crud.certificate.index_certificate', compact('certificate'));
    }

    public function create_certificado()
    {
        return view('crud.certificate.create_certificate');
    }
    public function store_certificado()
    {
        
    }
    public function edit_certificado($id)
    {
       
    }
    public function update_certificado(Request $request, $id)
    {
        
    }
    public function destroy_certificado($id)
    {
        
    }
}
