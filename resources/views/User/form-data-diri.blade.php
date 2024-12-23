@extends('layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid mb-5">

    <!-- Content Row -->
    <div class="row"
        style="background-color: #CDF0EA; border-radius: 8px; padding: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class=" container mt-3">
            <form action="">
                <!-- Nama Lengkap -->
                <div class=" mb-3">
                    <label for="fullName" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="fullName" placeholder="Masukkan nama lengkap" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Masukkan email" required>
                </div>

                <!-- Nomor Telepon -->
                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <input type="tel" class="form-control" id="phone" placeholder="Masukkan nomor telepon" required>
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea class="form-control" id="address" rows="3" placeholder="Masukkan alamat lengkap"
                        required></textarea>
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-3">
                    <label for="dob" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="dob" required>
                </div>

                <!-- Pendidikan Terakhir -->
                <div class="mb-3">
                    <label for="education" class="form-label">Pendidikan Terakhir</label>
                    <select class="form-select" id="education" required>
                        <option selected disabled>Pilih pendidikan terakhir</option>
                        <option value="SMA/SMK">SMA/SMK</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <!-- Upload CV -->
                <div class="mb-3">
                    <label for="cv" class="form-label">Upload CV</label>
                    <input class="form-control" type="file" id="cv" required>
                </div>

                <!-- Social Media -->
                <div class="mb-3">
                    <label for="url" class="form-label">Social Media</label>
                    <input type="url" class="form-control" id="url"
                        placeholder="Masukkan url social media seperti : instagram, linkedin, dll" required>
                </div>

                <!-- Tombol Submit -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>
</div>
<!-- /.container-fluid -->
@endsection