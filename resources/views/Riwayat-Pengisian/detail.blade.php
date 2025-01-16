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

            <form action="{{ route('riwayat.update', $dataUser_activity->id) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Nama -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama"
                        value="{{ $dataUser_activity->user ? $dataUser_activity->user->nama : 'Nama tidak ditemukan' }}"
                        readonly>
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" class="form-control" id="status" name="status"
                        value="{{ $dataUser_activity->status_text }}" readonly>
                </div>

                <!-- Criteria -->
                <div class="mb-3">
                    <label for="Criteria" class="form-label">Criteria 1</label>
                    <input type="text" class="form-control" id="criteria_1" name="criteria_1"
                        value="{{ $dataUser_activity->criteria_1 }}" readonly>
                </div>

                <!-- Criteria -->
                <div class="mb-3">
                    <label for="Criteria" class="form-label">Criteria 2</label>
                    <input type="text" class="form-control" id="criteria_2" name="criteria_2"
                        value="{{ $dataUser_activity->criteria_2 }}" readonly>
                </div>

                <!-- Criteria -->
                <div class="mb-3">
                    <label for="Criteria" class="form-label">Criteria 3</label>
                    <input type="text" class="form-control" id="criteria_3" name="criteria_3"
                        value="{{ $dataUser_activity->criteria_3 ? $dataUser_activity->criteria_3 : 'Input dulu nilai CV' }}"
                        readonly>
                </div>

                <!-- Criteria -->
                <div class="mb-3">
                    <label for="Criteria" class="form-label">Criteria 4</label>
                    <input type="text" class="form-control" id="criteria_4" name="criteria_4"
                        value="{{ $dataUser_activity->criteria_4 }}" readonly>
                </div>

                <!-- Criteria -->
                <div class="mb-3">
                    <label for="Criteria" class="form-label">Criteria 5</label>
                    <input type="text" class="form-control" id="criteria_5" name="criteria_5"
                        value="{{ $dataUser_activity->criteria_5 }}" readonly>
                </div>

                <!-- Criteria -->
                <div class="mb-3">
                    <label for="Criteria" class="form-label">Criteria 6</label>
                    <input type="text" class="form-control" id="criteria_6" name="criteria_6"
                        value="{{ $dataUser_activity->criteria_6 }}" readonly>
                </div>

                <!-- Button Download CV User -->
                <div class="mb-3">
                    <a href="{{ Storage::url($dataUser_activity->user->cv) }}"
                        download="{{ $dataUser_activity->user->cv }}" class="btn btn-primary btn-sm">
                        Download CV
                    </a>
                </div>

                <!-- Input Nilai CV -->
                <div class="mb-3">
                    <label for="nilaiCV" class="form-label">Input Nilai CV</label>
                    <input type="number" class="form-control" id="nilaiCV" name="nilaiCV"
                        value="{{ $dataUser_activity->criteria_3 }}" placeholder="Nilai min 1 || max 100" min="1"
                        max="100" required>
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
