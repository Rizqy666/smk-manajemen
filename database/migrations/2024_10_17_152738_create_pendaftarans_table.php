<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nisn');
            $table->text('alamat')->references('alamat')->on('user_details')->onDelete('cascade');
            $table->string('email')->references('email')->on('users')->onDelete('cascade');
            $table->string('nomor_telepon', 15)->references('nomor_telepon')->on('user_details')->onDelete('cascade');
            $table->string('tempat_lahir')->references('tempat_lahir')->on('user_details')->onDelete('cascade');
            $table->date('tanggal_lahir')->references('tanggal_lahir')->on('user_details')->onDelete('cascade');
            $table->enum('jenis_kelamin', ['L', 'P'])->references('jenis_kelamin')->on('user_details')->onDelete('cascade');
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya'])->references('agama')->on('user_details')->onDelete('cascade');
            $table->string('nama_orang_tua');
            $table->string('alamat_orang_tua');
            $table->string('pekerjaan_orang_tua');
            $table->foreignId('jurusan_id')->constrained('jurusans')->onDelete('cascade');
            $table->foreignId('kelas_id')->nullable()->constrained()->onDelete('set null');
            $table->string('ijazah');
            $table->string('transkip_nilai');
            $table->enum('status', ['pending', 'terima', 'tolak'])->default('pending');
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
