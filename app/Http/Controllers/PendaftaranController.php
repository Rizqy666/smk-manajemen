<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendaftarans = Pendaftaran::where('user_id', auth()->user()->id)->first();
        $jurusans = Jurusan::all();
        $user = auth()->user();
        $userDetail = $user->userDetail;
        return view('pendaftaran.index', compact('pendaftarans', 'jurusans', 'userDetail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $pendaftaran = Pendaftaran::where('user_id', auth()->id())->first();

        if ($pendaftaran) {
            // Jika sudah ada, arahkan ke halaman edit
            return redirect()->route('pendaftaran.edit', $pendaftaran->id);
        }

        // Jika belum ada, tampilkan form pendaftaran pertama kali
        return view('pendaftaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nisn' => 'required|numeric|digits_between:1,10',
            'email' => 'required|email|max:255',
            'nomor_telepon' => 'required|string|max:15',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'agama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nama_orang_tua' => 'required|string|max:255',
            'alamat_orang_tua' => 'required|string|max:255',
            'pekerjaan_orang_tua' => 'required|string|max:255',
            'jurusan_id' => 'required|exists:jurusans,id',
            'ijazah' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'transkip_nilai' => 'required|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $validated['user_id'] = auth()->user()->id;

        if ($request->hasFile('ijazah')) {
            $validated['ijazah'] = $request->file('ijazah')->store('ijazah');
        }

        if ($request->hasFile('transkip_nilai')) {
            $validated['transkip_nilai'] = $request->file('transkip_nilai')->store('transkip_nilai');
        }

        Pendaftaran::create($validated);

        return redirect()->route('pendaftaran.index')->with('success', 'Berhasil melakukan pendaftaran.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        //
    }
}
