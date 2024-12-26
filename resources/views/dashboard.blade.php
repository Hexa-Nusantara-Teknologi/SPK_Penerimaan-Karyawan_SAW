@extends('layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">



    <!-- Content Row -->

    <div class="row">
        <div class="container mt-5">
            <div class="welcome-box">
                <div class="welcome-text">
                    <h1>Hallo, Selamat Datang {{Auth::user()->nama}}</h1>

                </div>

            </div>
        </div>

    </div>
</div>

@if(Auth::user()->role == 'User' && Auth::user()->status == 'Belum Lengkap')

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
<!-- /.container-fluid -->@endsection