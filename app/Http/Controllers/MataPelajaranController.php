<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use Illuminate\Contracts\Auth\Guard;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mataPelajaran = MataPelajaran::with('gurupengajar')->get();
        return view('mapel.index', compact('mataPelajaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gurus = User::where('role', 'guru')->get();
        return view('mapel.create', compact('gurus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelajaran' => 'required|string',
            'guru_pengajar' => 'required|integer|exists:users,id|unique:mata_pelajarans,guru_pengajar',
        ]);
        MataPelajaran::create($validated);
        return redirect()->route('mapel.index')->with('success', 'Berhasil menambahkan mata pelajaran.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MataPelajaran $mataPelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataPelajaran $mataPelajaran)
    {
        $gurus = User::where('role', 'guru')->get();
        return view('mapel.edit', compact('mataPelajaran', 'gurus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MataPelajaran $mataPelajaran)
    {
        $validated = $request->validate([
            'nama_pelajaran' => 'required|string',
            'guru_pengajar' => 'required|integer|exists:users,id|unique:mata_pelajarans,guru_pengajar,' . $mataPelajaran->id,
        ]);

        $mataPelajaran->update($validated);

        return redirect()->route('mapel.index')->with('success', 'Berhasil memperbarui mata pelajaran.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataPelajaran $mataPelajaran)
    {
        $mataPelajaran->delete();
        return redirect()->route('mapel.index')->with('success', 'Berhasil menghapus mata pelajaran.');
    }
}
