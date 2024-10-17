<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'Guru User',
                'email' => 'guru@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'guru',
            ],
            [
                'name' => 'Siswa User',
                'email' => 'siswa@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'siswa',
            ],
            [
                'name' => 'Staff User',
                'email' => 'staff@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'staff',
            ],
        ]);

        DB::table('user_details')->insert([
            [
                'user_id' => 1,
                'profile_complete' => 1,
                'email' => 'admin@example.com',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2000-01-01',
                'jenis_kelamin' => 'L',
                'agama' => 'Islam',
                'alamat' => 'Jl. Jend. Sudirman No. 1',
                'nomor_telepon' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        $ketuaJurusan1 = DB::table('users')->where('role', 'guru')->first();
        $ketuaJurusan2 = DB::table('users')->where('role', 'staff')->first();

        if ($ketuaJurusan1 && $ketuaJurusan2) {
            DB::table('jurusans')->insert([
                [
                    'nama_jurusan' => 'Teknik Informatika 1',
                    'ketua_jurusan_id' => $ketuaJurusan1->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_jurusan' => 'Teknik Informatika 2',
                    'ketua_jurusan_id' => $ketuaJurusan1->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_jurusan' => 'Teknik Mesin 1',
                    'ketua_jurusan_id' => $ketuaJurusan2->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_jurusan' => 'Teknik Mesin 2',
                    'ketua_jurusan_id' => $ketuaJurusan2->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
        $walikelas = DB::table('users')->where('role', 'guru')->first();

        if ($walikelas) {
            DB::table('kelas')->insert([
                [
                    'nama_kelas' => 'Teknik Informatika 1',
                    'wali_kelas_id' => $walikelas->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_kelas' => 'Teknik Informatika 2',
                    'wali_kelas_id' => $walikelas->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_kelas' => 'Teknik Mesin 1',
                    'wali_kelas_id' => $walikelas->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_kelas' => 'Teknik Mesin 2',
                    'wali_kelas_id' => $walikelas->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
        User::factory()->count(10)->create();

        DB::table('tahun_ajarans')->insert([
            [
                'tahun_awal' => 2023,
                'tahun_akhir' => 2024,
                'semester' => 'ganjil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tahun_awal' => 2023,
                'tahun_akhir' => 2024,
                'semester' => 'genap',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        $gurus = User::where('role', 'guru')->get();

        foreach ($gurus as $guru) {
            DB::table('mata_pelajarans')->insert([
                'nama_pelajaran' => 'Matematika',
                'guru_pengajar' => $guru->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('mata_pelajarans')->insert([
                'nama_pelajaran' => 'Bahasa Indonesia',
                'guru_pengajar' => $guru->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('mata_pelajarans')->insert([
                'nama_pelajaran' => 'IPA',
                'guru_pengajar' => $guru->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
