<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Belum Lengkap</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.0/sweetalert2.min.css">
</head>

<body>
    <script>
        window.onload = function() {
            Swal.fire({
                icon: 'warning',
                title: 'Profil Belum Lengkap',
                text: 'Anda harus melengkapi profil terlebih dahulu sebelum melanjutkan.',
                confirmButtonText: 'Lengkapi Profil'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('profile.complete') }}";
                }
            });
        };
    </script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.0/sweetalert2.all.min.js"></script>

</body>

</html>
