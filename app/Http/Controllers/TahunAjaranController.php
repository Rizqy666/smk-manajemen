<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahunAjaran = TahunAjaran::all();
        return view('tahunajaran.index', compact('tahunAjaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tahunajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tahun_awal' => 'required|integer|min:1900|max:2099',
            'tahun_akhir' => 'required|integer|min:1900|max:2099',
            'semester' => 'required|string|in:ganjil,genap',
        ]);
        if ($validated['tahun_awal'] > $validated['tahun_akhir']) {
            return redirect()
                ->back()
                ->withErrors([
                    'tahun_awal' => 'Tahun awal tidak boleh lebih besar dari tahun akhir.',
                ])
                ->withInput();
        }
        if ($validated['tahun_akhir'] != $validated['tahun_awal'] + 1) {
            return redirect()
                ->back()
                ->withErrors([
                    'tahun_akhir' => 'Tahun akhir harus satu tahun setelah tahun awal.',
                ])
                ->withInput();
        }
        TahunAjaran::create($validated);

        return redirect()->route('tahunAjaran.index')->with('success', 'Tahun ajaran berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(TahunAjaran $tahunAjaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TahunAjaran $tahunAjaran)
    {
        return view('tahunajaran.edit', compact('tahunAjaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TahunAjaran $tahunAjaran)
    {
        $validated = $request->validate([
            'tahun_awal' => 'required|integer|min:1900|max:2099',
            'tahun_akhir' => 'required|integer|min:1900|max:2099',
            'semester' => 'required|string|in:ganjil,genap',
        ]);

        $tahunAjaran->update($validated);

        return redirect()->route('tahunAjaran.index')->with('success', 'Tahun ajaran berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TahunAjaran $tahunAjaran)
    {
        $tahunAjaran->delete();

        return redirect()->route('tahunAjaran.index')->with('success', 'Tahun ajaran berhasil di hapus');
    }
}
