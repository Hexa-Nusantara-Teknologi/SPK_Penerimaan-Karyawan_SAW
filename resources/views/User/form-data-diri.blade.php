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

            <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Nama Lengkap -->
                <div class="mb-3">
                    <label for="fullName" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="fullName" name="nama"
                        value="{{ old('nama', $user->nama) }}" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ old('email', $user->email) }}" required>
                </div>

                <!-- password -->
                <!-- <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        value="{{ old('password', $user->password) }}" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        value="{{ old('password', $user->password) }}" required>
                </div> -->

                <!-- Nomor Telepon -->
                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <input type="tel" class="form-control" id="phone" name="notelp"
                        value="{{ old('notelp', $user->notelp) }}" pattern="\d+" title="Masukkan hanya angka" required>
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea class="form-control" id="address" rows="3" name="alamat"
                        required>{{ old('alamat', $user->alamat) }}</textarea>
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-3">
                    <label for="dob" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="dob" name="tgllahir"
                        value="{{ old('tgllahir', \Carbon\Carbon::parse($user->tgllahir)->format('Y-m-d')) }}" required>
                </div>

                <!-- Pendidikan Terakhir -->
                <div class="mb-3">
                    <label for="education" class="form-label">Pendidikan Terakhir</label>
                    <select class="form-select" id="education" name="pendidikan" required>
                        <option value="SMA/SMK"
                            {{ old('pendidikan', $user->pendidikan) == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                        <option value="D3" {{ old('pendidikan', $user->pendidikan) == 'D3' ? 'selected' : '' }}>D3
                        </option>
                        <option value="D4" {{ old('pendidikan', $user->pendidikan) == 'D4' ? 'selected' : '' }}>D4
                        </option>
                        <option value="S1" {{ old('pendidikan', $user->pendidikan) == 'S1' ? 'selected' : '' }}>S1
                        </option>
                        <option value="S2" {{ old('pendidikan', $user->pendidikan) == 'S2' ? 'selected' : '' }}>S2
                        </option>
                        <option value="Lainnya"
                            {{ old('pendidikan', $user->pendidikan) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                <!-- Upload CV -->
                <div class="mb-3">
                    <label for="cv" class="form-label">Upload CV || Maks. 2MB</label>
                    <input class="form-control" type="file" id="cv" name="cv" {{ !$user->cv ? 'required' : '' }}>
                    @if ($user->cv)
                    <p class="mt-2">CV Saat Ini: <a href="{{ asset('storage/'.$user->cv) }}" target="_blank">Lihat
                            CV</a></p>
                    @endif
                </div>

                <!-- Social Media -->
                <div class="mb-3">
                    <label for="url" class="form-label">Social Media</label>
                    <input type="url" class="form-control" id="url" name="sosmed"
                        value="{{ old('sosmed', $user->sosmed) }}" required>
                </div>

                <!-- Tombol Submit -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Preview file CV
    document.getElementById('cv').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            Swal.fire({
                title: 'File Dipilih',
                text: `File: ${file.name}`,
                icon: 'info',
                confirmButtonText: 'OK'
            });
        }
    });
</script>


@endsection