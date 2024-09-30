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
                    'nama_jurusan' => 'Teknik Informatika 3',
                    'ketua_jurusan_id' => $ketuaJurusan1->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_jurusan' => 'Teknik Informatika 4',
                    'ketua_jurusan_id' => $ketuaJurusan1->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_jurusan' => 'Teknik Informatika 5',
                    'ketua_jurusan_id' => $ketuaJurusan1->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_jurusan' => 'Teknik Informatika 6',
                    'ketua_jurusan_id' => $ketuaJurusan1->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_jurusan' => 'Teknik Informatika 7',
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
                [
                    'nama_jurusan' => 'Teknik Mesin 3',
                    'ketua_jurusan_id' => $ketuaJurusan2->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_jurusan' => 'Teknik Mesin 4',
                    'ketua_jurusan_id' => $ketuaJurusan2->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_jurusan' => 'Teknik Mesin 5',
                    'ketua_jurusan_id' => $ketuaJurusan2->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_jurusan' => 'Teknik Mesin 6',
                    'ketua_jurusan_id' => $ketuaJurusan2->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_jurusan' => 'Teknik Mesin 7',
                    'ketua_jurusan_id' => $ketuaJurusan2->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_jurusan' => 'Teknik Mesin 8',
                    'ketua_jurusan_id' => $ketuaJurusan2->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_jurusan' => 'Teknik Mesin 10',
                    'ketua_jurusan_id' => $ketuaJurusan2->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_jurusan' => 'Teknik Mesin 11',
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
                    'nama_kelas' => 'Teknik Informatika 3',
                    'wali_kelas_id' => $walikelas->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_kelas' => 'Teknik Informatika 4',
                    'wali_kelas_id' => $walikelas->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_kelas' => 'Teknik Informatika 5',
                    'wali_kelas_id' => $walikelas->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_kelas' => 'Teknik Informatika 6',
                    'wali_kelas_id' => $walikelas->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_kelas' => 'Teknik Informatika 7',
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
                [
                    'nama_kelas' => 'Teknik Mesin 3',
                    'wali_kelas_id' => $walikelas->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_kelas' => 'Teknik Mesin 4',
                    'wali_kelas_id' => $walikelas->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_kelas' => 'Teknik Mesin 5',
                    'wali_kelas_id' => $walikelas->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_kelas' => 'Teknik Mesin 6',
                    'wali_kelas_id' => $walikelas->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_kelas' => 'Teknik Mesin 7',
                    'wali_kelas_id' => $walikelas->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_kelas' => 'Teknik Mesin 8',
                    'wali_kelas_id' => $walikelas->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_kelas' => 'Teknik Mesin 10',
                    'wali_kelas_id' => $walikelas->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_kelas' => 'Teknik Mesin 11',
                    'wali_kelas_id' => $walikelas->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
        User::factory()->count(20)->create();
    }
}
