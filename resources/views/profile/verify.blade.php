<!-- resources/views/profile/verify.blade.php -->
<form action="{{ route('profile.verify') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="verification_code" class="form-label">Masukkan Kode Verifikasi</label>
        <input type="text" name="verification_code" id="verification_code" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Verifikasi</button>
</form>
