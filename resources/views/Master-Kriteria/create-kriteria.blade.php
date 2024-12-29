@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid mb-5">

    <!-- Content Row -->
    <div class="row"
        style="background-color: #ffffff; border-radius: 10px; padding: 30px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="container mt-3">
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <!-- SweetAlert Success Message -->
            @if (session('success'))
            <script>
            Swal.fire({
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 3000
            });
            </script>
            @endif

            <!-- SweetAlert Error Message -->
            @if ($errors->any())
            <script>
            Swal.fire({
                title: 'Oops!',
                text: '{{ $errors->first() }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            </script>
            @endif

            <form action="{{ route('kriteria.store') }}" method="POST">
                @csrf


                <!-- Nama -->
                <div class="mb-3">
                    <label for="fullName" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="fullName" name="name" required>
                </div>

                <!-- weight -->
                <div class="mb-3">
                    <label for="weight" class="form-label">Bobot</label>
                    <input type="text" class="form-control" id="weight" name="weight" required>
                </div>


                <!-- Tombol Submit -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection