<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'string|required',
                'email' => 'email|required|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
                'role' => 'required|in:admin,siswa,guru,staff',
            ],
            [
                'name.required' => 'Nama pengguna tidak boleh kosong.',
                'name.string' => 'Nama pengguna harus berupa teks.',
                'name.max' => 'Nama pengguna tidak boleh lebih dari 255 karakter.',

                'email.email' => 'Format email tidak valid.',
                'email.required' => 'Email tidak boleh kosong.',
                'email.unique' => 'Email sudah terdaftar, silakan gunakan email lain.',
                'email.max' => 'Email tidak boleh lebih dari 255 karakter.',

                'password.required' => 'Password wajib diisi.',
                'password.string' => 'Password harus berupa teks.',
                'password.min' => 'Password harus minimal 8 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak sesuai.',

                'role.required' => 'Role pengguna wajib dipilih.',
                'role.exists' => 'Role yang dipilih tidak valid.',
            ],
        );
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);
        return redirect()->route('user.index')->with('success', 'Berhasil menambahakn data user.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'password' => 'nullable|string|min:8|confirmed',
                'role' => 'required|in:admin,siswa,guru,staff',
            ],
            [
                'name.required' => 'Nama pengguna tidak boleh kosong.',
                'name.string' => 'Nama pengguna harus berupa teks.',
                'name.max' => 'Nama pengguna tidak boleh lebih dari 255 karakter.',

                'email.email' => 'Format email tidak valid.',
                'email.required' => 'Email tidak boleh kosong.',
                'email.unique' => 'Email sudah terdaftar, silakan gunakan email lain.',
                'email.max' => 'Email tidak boleh lebih dari 255 karakter.',

                'password.required' => 'Password wajib diisi.',
                'password.string' => 'Password harus berupa teks.',
                'password.min' => 'Password harus minimal 8 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak sesuai.',

                'role.required' => 'Role pengguna wajib dipilih.',
                'role.exists' => 'Role yang dipilih tidak valid.',
            ],
        );
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $request->password ? Hash::make($validated['password']) : $user->password,
            'role' => $validated['role'],
        ]);

        return redirect()->route('user.index')->with('success', 'Berhasil memperbaharui data user.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Berhasil menghapus data user.');
    }
}
