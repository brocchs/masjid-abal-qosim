<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('userRole')->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        if (!Auth::user()->role_id) {
            abort(403, 'User tidak memiliki role yang valid');
        }
        
        $userRole = Auth::user()->userRole;
        if (!$userRole || $userRole->name !== 'Admin IT') {
            abort(403, 'Hanya Admin IT yang dapat menambah user');
        }
        $roles = \App\Models\Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        if (!Auth::user()->role_id) {
            abort(403, 'User tidak memiliki role yang valid');
        }
        
        $userRole = Auth::user()->userRole;
        if (!$userRole || $userRole->name !== 'Admin IT') {
            abort(403, 'Hanya Admin IT yang dapat menambah user');
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6|max:255',
            'role_id' => 'required|exists:roles,id'
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'email.max' => 'Email maksimal 255 karakter'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        if (!Auth::user()->role_id) {
            abort(403, 'User tidak memiliki role yang valid');
        }
        
        $userRole = Auth::user()->userRole;
        if (!$userRole || $userRole->name !== 'Admin IT') {
            abort(403, 'Hanya Admin IT yang dapat mengedit user');
        }
        
        $roles = \App\Models\Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        if (!Auth::user()->role_id) {
            abort(403, 'User tidak memiliki role yang valid');
        }
        
        $userRole = Auth::user()->userRole;
        if (!$userRole || $userRole->name !== 'Admin IT') {
            abort(403, 'Hanya Admin IT yang dapat mengedit user');
        }
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id . '|max:255',
            'password' => 'nullable|min:6|max:255',
            'role_id' => 'required|exists:roles,id'
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'email.max' => 'Email maksimal 255 karakter'
        ]);

        $data = $request->only('name', 'email', 'role_id');
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        if (!Auth::user()->role_id) {
            abort(403, 'User tidak memiliki role yang valid');
        }
        
        $userRole = Auth::user()->userRole;
        if (!$userRole || $userRole->name !== 'Admin IT') {
            abort(403, 'Hanya Admin IT yang dapat menghapus user');
        }
        
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}