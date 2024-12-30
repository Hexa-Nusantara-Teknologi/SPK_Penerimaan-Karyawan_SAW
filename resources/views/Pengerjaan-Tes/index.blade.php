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
                <a href="{{'/tes'}}" class="btn btn-success btn-lg">Mulai Tes</a>
            </div>
        </div>
        <div class="card-footer text-center">
            <small class="text-muted">Tes ini dirancang untuk memberikan evaluasi yang adil. Waktu pengerjaan akan
                tercatat.</small>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
