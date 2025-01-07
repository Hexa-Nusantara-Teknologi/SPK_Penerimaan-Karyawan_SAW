@extends('layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid mb-5">
    <div class="card shadow">
        <div class="card-header text-center bg-primary text-white">
            <h3>Selamat Datang di Tes Penerimaan Karyawan</h3>
        </div>
        <div class="card-body">
            <p class="text-center">Halo <strong>{{Auth::user()->nama}}</strong>,</p>
            <p class="text-center">
                Anda akan memulai tes penerimaan karyawan. Tes ini terdiri dari 5 bagian yaitu:
            </p>
            <ul>
                <li><strong>Psikotes</strong>: Mengukur kemampuan logika dan pemikiran analitis Anda.</li>
                <li><strong>Soft Skill</strong>: Menilai kemampuan interpersonal dan komunikasi Anda.</li>
                <li><strong>Radikalisme</strong>: Menilai pandangan moderasi Anda.</li>
                <li><strong>Terorisme</strong>: Menilai komitmen Anda terhadap nilai-nilai kebangsaan.</li>
                <li><strong>Pengalaman Kerja</strong>: Menilai relevansi pengalaman Anda dengan posisi ini.</li>
            </ul>
            <p class="text-center">
                Pastikan Anda berada di tempat yang nyaman dan memiliki waktu cukup untuk menyelesaikan tes ini.
            </p>

            <div class="d-flex justify-content-center">
                @if($statusText == 1)
                <button class="btn btn-success btn-lg" disabled>Anda telah mengerjakan tes</button>
                @else
                <a href="{{ '/tes' }}" class="btn btn-success btn-lg">Mulai Tes</a>
                @endif
            </div>
        </div>
        <div class="card-footer text-center">
            <small class="text-muted">Tes ini dirancang untuk memberikan evaluasi yang adil. Waktu pengerjaan akan
                tercatat.</small>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

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
@endsection