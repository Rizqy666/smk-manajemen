<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use App\Models\JadwalPelajaran;
use GuzzleHttp\RetryMiddleware;

class JadwalPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwalPelajaran = JadwalPelajaran::all();

        return view('jadwalpelajaran.index', compact('jadwalPelajaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jadwalPelajaran = JadwalPelajaran::all();
        $mataPelajaran = MataPelajaran::all();
        $gurus = User::where('role', 'guru')->get();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $tahunAjaran = TahunAjaran::all();
        return view('jadwalpelajaran.create', compact('jadwalPelajaran', 'mataPelajaran', 'gurus', 'kelas', 'jurusan', 'tahunAjaran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'mata_pelajaran_id' => 'required|integer|exists:mata_pelajarans,id',
            'guru_pengajar' => 'required|integer|exists:users,id',
            'kelas_id' => 'required|integer|exists:kelas,id',
            'jurusan_id' => 'required|integer|exists:jurusans,id',
            'tahun_ajaran_id' => 'required|integer|exists:tahun_ajarans,id',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'hari' => 'required|in:senin,selasa,rabu,kamis,jumat,sabtu',
        ]);

        $bentrok = JadwalPelajaran::where('guru_pengajar', $validated['guru_pengajar'])
            ->where('hari', $validated['hari'])
            ->where('kelas_id', '!=', $validated['kelas_id'])
            ->where(function ($query) use ($validated) {
                $query
                    ->where(function ($q) use ($validated) {
                        $q->whereBetween('jam_mulai', [$validated['jam_mulai'], $validated['jam_selesai']])->orWhereBetween('jam_selesai', [$validated['jam_mulai'], $validated['jam_selesai']]);
                    })
                    ->orWhere(function ($q) use ($validated) {
                        $q->where('jam_mulai', '<=', $validated['jam_mulai'])->where('jam_selesai', '>=', $validated['jam_selesai']);
                    });
            })
            ->exists();

        if ($bentrok) {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Jadwal bentrok dengan jadwal lain di rentang waktu tersebut.'])
                ->withInput();
        }

        JadwalPelajaran::create($validated);

        return redirect()->route('jadwalPelajaran.index')->with('success', 'Berhasil menambahkan data jadwal pelajaran.');
    }

    /**
     * Display the specified resource.
     */
    public function show($kelas_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalPelajaran $jadwalPelajaran)
    {
        $mataPelajaran = MataPelajaran::all();
        $gurus = User::where('role', 'guru')->get();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $tahunAjaran = TahunAjaran::all();
        return view('jadwalpelajaran.edit', compact('jadwalPelajaran', 'mataPelajaran', 'gurus', 'kelas', 'jurusan', 'tahunAjaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalPelajaran $jadwalPelajaran)
    {
        $validated = $request->validate([
            'mata_pelajaran_id' => 'required|integer|exists:mata_pelajarans,id',
            'guru_pengajar' => 'required|integer|exists:users,id',
            'kelas_id' => 'required|integer|exists:kelas,id',
            'jurusan_id' => 'required|integer|exists:jurusans,id',
            'tahun_ajaran_id' => 'required|integer|exists:tahun_ajarans,id',
            'jam_mulai' => 'nullable',
            'jam_selesai' => 'nullable|after:jam_mulai',
            'hari' => 'required|in:senin,selasa,rabu,kamis,jumat,sabtu',
        ]);
        $bentrok = JadwalPelajaran::where('mata_pelajaran_id', $validated['mata_pelajaran_id'])
            ->where('guru_pengajar', $validated['guru_pengajar'])
            ->where('hari', $validated['hari'])
            ->where('kelas_id', '!=', $validated['kelas_id'])
            ->where(function ($query) use ($validated) {
                $query
                    ->whereBetween('jam_mulai', [$validated['jam_mulai'], $validated['jam_selesai']])
                    ->orWhereBetween('jam_selesai', [$validated['jam_mulai'], $validated['jam_selesai']])
                    ->orWhere(function ($query) use ($validated) {
                        $query->where('jam_mulai', '<=', $validated['jam_mulai'])->where('jam_selesai', '>=', $validated['jam_selesai']);
                    });
            })
            ->exists();

        if ($bentrok) {
            return redirect()->back()->with('error', 'Jadwal bentrok dengan jadwal lain.')->withInput();
        }
        $jadwalPelajaran->update($validated);

        return redirect()->route('jadwalPelajaran.index')->with('success', 'Berhasil memperbarui jadwal pelajaran.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalPelajaran $jadwalPelajaran)
    {
        $jadwalPelajaran->delete();
        return redirect()->route('jadwalPelajaran.index')->with('success', 'Berhasil menghapus data jadwal pelajaran.');
    }

    public function getGuruPengajar($mataPelajaranId)
    {
        $mataPelajaran = MataPelajaran::find($mataPelajaranId);
        $guruPengajar = User::find($mataPelajaran->guru_pengajar);
        $allGurus = User::where('role', 'guru')->get();
        return response()->json([
            'guru_pengajar' => $guruPengajar,
            'all_gurus' => $allGurus,
        ]);
    }

    public function showAllJadwal()
    {
        $kelas = Kelas::with('jadwalPelajaran.mata_Pelajaran', 'jadwalPelajaran.guru')->get();

    return view('jadwalPelajaran.show', compact('kelas'));
    }

    // public function showScheduleByClass($kelas_id)
    // {
    //     $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];
    //     $allKelas = Kelas::all();
    //     $schedulesByClass = [];

    //     foreach ($allKelas as $kelas) {
    //         $schedulesByClass[$kelas->id] = JadwalPelajaran::with(['guru', 'mapel'])
    //             ->where('kelas_id', $kelas->id)
    //             ->whereIn('hari', $days)
    //             ->orderBy('hari')
    //             ->orderBy('jam_mulai')
    //             ->get();
    //     }
    //     return view('jadwalpelajaran.show', compact('schedulesByClass', 'days', 'allKelas'));
    // }
}
