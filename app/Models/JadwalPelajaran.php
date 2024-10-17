<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelajaran extends Model
{
    use HasFactory;
    protected $table = 'jadwal_pelajarans';

    protected $fillable = ['mata_pelajaran_id', 'guru_pengajar', 'kelas_id', 'jurusan_id', 'tahun_ajaran_id', 'jam_mulai', 'jam_selesai', 'hari'];

    public function mata_pelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
    }

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_pengajar');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
