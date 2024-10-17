<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftarans';
    protected $fillable = [
        'user_id',
        'nisn',
        'alamat',
        'email',
        'nomor_telepon',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'nama_orang_tua',
        'alamat_orang_tua',
        'pekerjaan_orang_tua',
        'jurusan_id',
        'kelas_id',
        'ijazah',
        'transkip_nilai',
        'status',
        'note',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
