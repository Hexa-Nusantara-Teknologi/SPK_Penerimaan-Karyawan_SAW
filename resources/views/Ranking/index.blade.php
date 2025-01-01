@extends('layouts.app')
@section('content')
<div class="container-fluid mb-5">
    <div class="card">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active " href="#">Penilaian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">bobot Penilaian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Result</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="card">
        <!-- <div class="card-header text-black d-flex justify-content-between align-items-center">
            <h5>list Penilaian</h5>
        </div> -->
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4>list Penilaian</h4>
        </div>


        <div class="card-body">
            <table class="table table-bordered" id="users-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelamar</th>
                        <th>Soal Psikotes</th>
                        <th>Soal Soft Skill</th>
                        <th>CV</th>
                        <th>Radikalisme</th>
                        <th>Terorisme</th>
                        <th>Pengalaman Kerja</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>--Choose--</option>
                                <option value="Sangat Baik">Sangat Baik</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Buruk">Buruk</option>
                                <option value="Sangat Buruk">Sangat Buruk</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>--Choose--</option>
                                <option value="Sangat Baik">Sangat Baik</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Buruk">Buruk</option>
                                <option value="Sangat Buruk">Sangat Buruk</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>--Choose--</option>
                                <option value="Sangat Baik">Sangat Baik</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Buruk">Buruk</option>
                                <option value="Sangat Buruk">Sangat Buruk</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>--Choose--</option>
                                <option value="Sangat Baik">Sangat Baik</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Buruk">Buruk</option>
                                <option value="Sangat Buruk">Sangat Buruk</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>--Choose--</option>
                                <option value="Sangat Baik">Sangat Baik</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Buruk">Buruk</option>
                                <option value="Sangat Buruk">Sangat Buruk</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>--Choose--</option>
                                <option value="Sangat Baik">Sangat Baik</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Buruk">Buruk</option>
                                <option value="Sangat Buruk">Sangat Buruk</option>
                            </select>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary">Save</button>
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