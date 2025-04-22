<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::where('role', 'Admin')->paginate(10);
        return view('superadmin.lista_admin', compact('admins'));
    }   
    public function create()
    {
        return view('superadmin.register_admin');
    }

    public function store(Request $request)
    {
        {
            $request->validate([
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
                'role'     => 'required|in:Admin', // Valida que el rol sea "Admin"
            ]);

            User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'role'     => $request->role, // Usa el valor del formulario ("Admin")
            ]);

            return redirect()->back()->with('success', 'Admin registrado correctamente.');
        }
    }

    public function edit($id){

        $admin = User::findOrFail($id);
        return view('crud.edit_role.edit_admin', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'password' => 'nullable|string|min:8',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->filled('password')) {
            $admin->password = bcrypt($request->password);
        }
        $admin->save(); // Guardar los cambios

        return redirect()->route('superadmin_admin.index')->with('success', 'Administrador actualizado exitosamente.');

    }

    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('cultivos.index');
    }
}
