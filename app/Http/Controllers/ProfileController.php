<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Twilio\Rest\Client;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Mail\SendVerificationCode;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    public function showCompleteProfileForm()
    {
        $userDetail = auth()->user()->userDetail;
        return view('profile.complete', compact('userDetail'));
    }

    public function completeProfile(Request $request)
    {
        $validated = $request->validate([
            'kelas_id' => 'nullable|exists:kelas,id',
            'jurusan_id' => 'nullable|exists:jurusan,id',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'nomor_telepon' => 'required|string|max:15',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu,Lainnya',
            'note' => 'nullable|string|max:500',
        ]);

        $userDetail = auth()->user()->userDetail ?? new \App\Models\UserDetail();

        $userDetail->fill([
            'user_id' => auth()->id(),
            'kelas_id' => $validated['kelas_id'] ?? null,
            'jurusan_id' => $validated['jurusan_id'] ?? null,
            'alamat' => $validated['alamat'],
            'email' => $validated['email'],
            'nomor_telepon' => $validated['nomor_telepon'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'agama' => $validated['agama'],
            'note' => $validated['note'] ?? null,
            'profile_complete' => true,
        ]);

        $userDetail->save();

        return redirect()->route('home')->with('success', 'Profil berhasil dilengkapi.');
    }
    // public function sendVerification(Request $request)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'type' => 'required|string|in:email,nomor_telepon',
    //         'value' => 'required|string|email', // Jika email, validasi sebagai email
    //     ]);

    //     $userDetail = auth()->user()->userDetail;

    //     // Generate kode verifikasi (misalnya 6 digit angka)
    //     $verificationCode = rand(100000, 999999);

    //     // Simpan kode ke userDetail
    //     $userDetail->verification_code = $verificationCode;
    //     $userDetail->save();

    //     // Jika type adalah 'email', kirim email verifikasi
    //     if ($request->type === 'email') {
    //         try {
    //             Mail::to($userDetail->email)->send(new SendVerificationCode($verificationCode));
    //             return response()->json(['message' => 'Kode verifikasi telah dikirim ke email Anda.']);
    //         } catch (\Exception $e) {
    //             // Log the actual error message for debugging
    //             \Log::error('Mail sending failed: ' . $e->getMessage());
    //             return response()->json(['error' => 'Terjadi kesalahan saat mengirim email.'], 500);
    //         }
    //     }

    //     // Untuk nomor telepon, tambahkan logika SMS (jika ada)
    //     return response()->json(['message' => 'Kode verifikasi telah dikirim ke nomor telepon Anda.']);
    // }

    // // Method untuk mengirim SMS menggunakan Twilio
    // protected function sendSms($nomorTelepon, $verificationCode)
    // {
    //     $sid = env('TWILIO_SID');
    //     $token = env('TWILIO_AUTH_TOKEN');
    //     $twilio = new Client($sid, $token);

    //     $twilio->messages->create($nomorTelepon, [
    //         'from' => env('TWILIO_PHONE_NUMBER'),
    //         'body' => "Kode verifikasi Anda adalah: $verificationCode",
    //     ]);
    // }
    // public function verifyPhoneCode(Request $request)
    // {
    //     $request->validate([
    //         'verification_code' => 'required|string',
    //     ]);

    //     $userDetail = auth()->user()->userDetail;

    //     // Cek apakah kode verifikasi cocok
    //     if ($userDetail->verification_code === $request->verification_code) {
    //         // Tandai nomor telepon sebagai terverifikasi
    //         $userDetail->nomor_telepon_verified = true;
    //         $userDetail->save();

    //         return redirect()->route('home')->with('success', 'Nomor telepon berhasil diverifikasi.');
    //     } else {
    //         return back()->withErrors(['verification_code' => 'Kode verifikasi salah.']);
    //     }
    // }

    // public function verifyCode(Request $request)
    // {
    //     $request->validate(['verification_code' => 'required|string']);

    //     $userDetail = auth()->user()->userDetail;

    //     // Memeriksa apakah kode verifikasi cocok
    //     if ($userDetail->verification_code === $request->verification_code) {
    //         // Jika verifikasi email
    //         $userDetail->email_verified = true; // Menandai email sebagai terverifikasi
    //         $userDetail->save();

    //         return redirect()->route('home')->with('success', 'Email berhasil diverifikasi.');
    //     } else {
    //         return back()->withErrors(['verification_code' => 'Kode verifikasi salah.']);
    //     }
    // }
}
