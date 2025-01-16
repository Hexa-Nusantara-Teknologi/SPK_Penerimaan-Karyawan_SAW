@extends('layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="container mt-5">
            @if($user->role == 'User')
            <div class="welcome-box">
                @if($ranking)
                @if($ranking->status == 'Lolos')
                <div class="welcome-text">
                    <h1>Halo, {{ $user->nama }}! Selamat, Anda berhasil <b>Lolos Seleksi</b>! 🎉</h1>
                    <p>Kami sangat antusias menyambut Anda. Tetap semangat untuk langkah berikutnya!</p>
                </div>
                @elseif($ranking->status == 'Tidak Lolos')
                <div class="welcome-text">
                    <h1>Halo, {{ $user->nama }}. Terima kasih telah berpartisipasi.</h1>
                    <p>Sayangnya, Anda <b>Belum Lolos</b> pada seleksi kali ini. Jangan menyerah, tetap semangat, dan
                        terus mencoba
                        peluang lainnya!</p>
                </div>
                @endif
                @else
                <div class="welcome-text">
                    <h1>Hallo, Selamat Datang {{ $user->nama }}!</h1>
                    <p>Status Anda belum tersedia.</p>
                </div>
                @endif
            </div>
            @elseif($user->role == 'Admin')
            <div class="welcome-box">

                <div class="welcome-text">
                    <h1>Hallo, Selamat Datang {{ $user->nama }}!</h1>

                </div>

            </div>
            @endif

        </div>
    </div>
</div>

@if($user->role == 'User' && $user->status == 'Belum Lengkap')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        title: 'Lengkapi Data Kamu',
        text: 'Klik tombol di bawah ini untuk melengkapi data.',
        icon: 'info',
        confirmButtonText: 'Lengkapi Data',
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "{{ url('data-user') }}";
        }
    });
});
</script>
@endif
<!-- /.cont
ainer-fluid -->
@endsection