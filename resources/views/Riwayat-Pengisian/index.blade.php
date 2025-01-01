@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid mb-5">
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4>Riwayat Pengisian Soal</h4>
        </div>

        <div class="card-body">
            <table class="table table-bordered" id="soal-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <th>1</th>
                    <th>Johannes</th>
                    <th>Sudah Mengerjakan Tes</th>
                    <th>
                        <a href="{{ route('riwayat.detail') }}" class="btn btn-info btn-sm mr-2">Detail</a>
                    </th>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- <script>
    var $j = jQuery.noConflict();

    $j(document).ready(function() {
        // Initialize DataTable
        var table = $j('#soal-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('soal.data') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }

            ]
        });


        // Flash message handling with SweetAlert2
        @if(session('status') === 'success')
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('
            message ') }}',
            showConfirmButton: true,
            timer: 3000
        });
        @elseif(session('status') === 'error')
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '{{ session('
            message ') }}',
            showConfirmButton: true,
            timer: 3000
        });
        @endif
    });
</script> -->

@endsection