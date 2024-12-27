@extends('layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid mb-5">
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4>Daftar Soal</h4>
            <!-- Tombol Input Soal -->
            <a href="{{ route('soal.create') }}" class="btn btn-success">Input Soal</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="soal-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Pertanyaan</th>
                        <th>Jawaban A</th>
                        <th>Jawaban B</th>
                        <th>Jawaban C</th>
                        <th>Jawaban D</th>
                        <th>Jawaban Benar</th>
                    </tr>
                </thead>
                <tbody></tbody>
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

<script>
    var $j = jQuery.noConflict();
    $j(document).ready(function() {
        $j('#soal-table').DataTable({
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
                    data: 'criteria_id',
                    name: 'criteria_id'
                },
                {
                    data: 'pertanyaan_text',
                    name: 'pertanyaan_text'
                },
                {
                    data: 'jawaban_a',
                    name: 'jawaban_a'
                },
                {
                    data: 'jawaban_b',
                    name: 'jawaban_b'
                },
                {
                    data: 'jawaban_c',
                    name: 'jawaban_c'
                },
                {
                    data: 'jawaban_d',
                    name: 'jawaban_d'
                },
                {
                    data: 'jawaban_benar',
                    name: 'jawaban_benar'
                },
            ]
        });
    });
</script>

@endsection