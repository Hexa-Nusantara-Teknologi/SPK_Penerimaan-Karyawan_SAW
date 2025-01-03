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
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>
                            80
                        </td>
                        <td>
                            Lolos
                        </td>
                    </tr>
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
        var table = $j('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.data') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama',
                    name: 'nama',

                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'role',
                    name: 'role'
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

        // Delete button handling
        $j(document).on('click', '.delete-btn', function() {
            var usersId = $j(this).data('id');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "User ini akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $j.ajax({
                        url: '/master-users/' + usersId,
                        type: 'DELETE',
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            Swal.fire('Terhapus!', response.message, 'success');
                            table.ajax.reload();

                        },
                        error: function() {
                            Swal.fire('Gagal!', 'User tidak dapat dihapus.', 'error');
                        }
                    });
                }
            });
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