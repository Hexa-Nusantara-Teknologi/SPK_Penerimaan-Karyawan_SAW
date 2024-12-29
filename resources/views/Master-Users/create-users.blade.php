@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid mb-5">

    <!-- Content Row -->
    <div class="row"
        style="background-color: #ffffff; border-radius: 10px; padding: 30px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="text-black">
            <h4 class="mb-2">Input Users</h4>
        </div>
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

            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Nama Lengkap -->
                <div class="mb-3">
                    <label for="fullName" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="fullName" name="nama" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <!-- password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        required>
                </div>

                <!-- Nomor Telepon -->
                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <input type="tel" class="form-control" id="phone" name="notelp" pattern="\d+"
                        title="Masukkan hanya angka" required>
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea class="form-control" id="address" rows="3" name="alamat" required></textarea>
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-3">
                    <label for="dob" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="dob" name="tgllahir" required>
                </div>

                <!-- Pendidikan Terakhir -->
                <div class="mb-3">
                    <label for="education" class="form-label">Pendidikan Terakhir</label>
                    <select class="form-select" id="education" name="pendidikan" required>
                        <option value="" disabled selected>Pilih Pendidikan Terakhir</option>
                        <option value="SMA/SMK" {{ old('pendidikan') == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                        <option value="D3" {{ old('pendidikan') == 'D3' ? 'selected' : '' }}>D3</option>
                        <option value="D4" {{ old('pendidikan') == 'D4' ? 'selected' : '' }}>D4</option>
                        <option value="S1" {{ old('pendidikan') == 'S1' ? 'selected' : '' }}>S1</option>
                        <option value="S2" {{ old('pendidikan') == 'S2' ? 'selected' : '' }}>S2</option>
                        <option value="Lainnya" {{ old('pendidikan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                <!-- Upload CV -->
                <div class="mb-3">
                    <label for="cv" class="form-label">Upload CV || Maks. 2MB</label>
                    <input class="form-control" type="file" id="cv" name="cv" required>

                </div>

                <!-- Social Media -->
                <div class="mb-3">
                    <label for="url" class="form-label">Social Media</label>
                    <input type="url" class="form-control" id="url" name="sosmed" required>
                </div>

                <!-- Role -->
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" id="role" name="role" required>
                        <option value="" disabled selected>Pilih Role User</option>
                        <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="User" {{ old('role') == 'User' ? 'selected' : '' }}>User</option>
                    </select>
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="" disabled selected>Pilih Status User</option>
                        <option value="Admin" {{ old('status') == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="Lengkap" {{ old('status') == 'Lengkap' ? 'selected' : '' }}>Lengkap</option>
                        <option value="Belum Lengkap" {{ old('status') == 'Belum Lengkap' ? 'selected' : '' }}>Belum
                            Lengkap</option>

                    </select>
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