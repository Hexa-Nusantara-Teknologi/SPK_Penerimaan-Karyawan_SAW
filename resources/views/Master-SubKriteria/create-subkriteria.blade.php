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

            <form action="{{ route('subkriteria.store') }}" method="POST">
                @csrf

                <!-- Kriteria -->
                <div class="mb-3">
                    <label for="fullName" class="form-label">Kriteria</label>
                    <select class="form-control" id="criteria" name="criteria_id" required>
                        <option value="" disabled selected>Pilih Kriteria</option>
                        @foreach($kriteria as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Nama -->
                <div class="mb-3">
                    <label for="fullName" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="fullName" name="name" required>
                </div>

                <!-- min_score -->
                <div class="mb-3">
                    <label for="min_score" class="form-label">Skor Minimal</label>
                    <input type="text" class="form-control" id="min_score" name="min_score" required>
                </div>

                <!-- max_score -->
                <div class="mb-3">
                    <label for="max_score" class="form-label">Skor Maksimal</label>
                    <input type="text" class="form-control" id="max_score" name="max_score" required>
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
