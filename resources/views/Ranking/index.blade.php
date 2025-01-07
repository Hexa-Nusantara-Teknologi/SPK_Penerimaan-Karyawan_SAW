@extends('layouts.app')
@section('content')
<div class="container-fluid mb-5">
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4>Ranking</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="users-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelamar</th>
                        <th>Score</th>
                        <th>Status</th>
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
        var table = $j('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('ranking.data') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'user_name',
                    name: 'user_name'

                },
                {
                    data: 'score',
                    name: 'score'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ]
        });
    });
</script>

@endsection