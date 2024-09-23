<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $table = 'jurusans';
    protected $fillable = ['nama_jurusan', 'ketua_jurusan_id'];

    public function ketuaJurusan()
    {
        return $this->belongsTo(User::class, 'ketua_jurusan_id');
    }
}
