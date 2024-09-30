<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;
    protected $table = 'mata_pelajarans';
    protected $fillable = [
        'guru_pengajar',
        'nama_pelajaran',
    ];
    public function gurupengajar()
    {
        return $this->belongsTo(User::class, 'guru_pengajar');
    }
}
