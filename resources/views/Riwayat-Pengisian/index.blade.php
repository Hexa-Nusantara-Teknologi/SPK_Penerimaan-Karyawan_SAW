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

<script>
    var $j = jQuery.noConflict();

    $j(document).ready(function() {
        // Initialize DataTable
        var table = $j('#soal-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('riwayat.data') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'user_id',
                    name: 'user_id'
                },
                {
                    data: 'status_text',
                    name: 'status_text',
                    render: function(data, type, row) {
                        // Mengecek jika status_text = 1, maka ubah menjadi "sudah melakukan test"
                        if (data == 1) {
                            return 'Sudah melakukan test';
                        }
                        // Jika bukan 1, kembalikan "belum melakukan test"
                        return "Belum melakukan test";
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }

            ]
        });
    });
</script>

@endsection