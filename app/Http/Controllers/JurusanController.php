<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        return view('jurusan.index', compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gurus = User::where('role', 'guru')->get();
        return view('jurusan.create', compact('gurus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_jurusan' => 'required|string|unique:jurusans,nama_jurusan',
            'ketua_jurusan_id' => 'required|integer|exists:users,id|unique:jurusans,ketua_jurusan_id',
        ]);
        Jurusan::create($validated);
        return redirect()->route('jurusan.index')->with('success', 'Berhasil menambahkan data jurusan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $jurusan)
    {
        $gurus = User::where('role', 'guru')->get();
        return view('jurusan.edit', compact('jurusan', 'gurus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $validated = $request->validate([
            'nama_jurusan' => 'required|string|unique:jurusans,nama_jurusan,' . $jurusan->id,
            'ketua_jurusan_id' => 'required|integer|exists:users,id|unique:jurusans,ketua_jurusan_id,' . $jurusan->id,
        ]);
        $jurusan->update($validated);
        return redirect()->route('jurusan.index')->with('success', 'Berhasil memperbarui data jurusan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
        return redirect()->route('jurusan.index')->with('success', 'Berhasil menghapus data jurusan.');
    }
}
