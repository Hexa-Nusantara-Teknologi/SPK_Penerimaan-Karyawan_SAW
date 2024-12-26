@extends('layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid mb-5">
    <!-- Content Row -->
    <div class="row"
        style="background-color: #ffffff; border-radius: 8px; padding: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class=" container mt-3">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Input Soal</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <form action="{{ route('save.soal') }}" method="POST">
                        @csrf
                        <!-- Kategori Soal -->
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori Soal</label>
                            <select id="kategori" name="kategori_id" class="form-select">
                                <option value="1">Soal Psikotes</option>
                                <option value="2">Soal Soft Skill</option>
                            </select>
                        </div>

                        <!-- Pertanyaan -->
                        <div class="mb-3">
                            <label for="pertanyaan" class="form-label">Pertanyaan</label>
                            <textarea id="pertanyaan" name="pertanyaan" rows="3" class="form-control"
                                placeholder="Masukkan pertanyaan..."></textarea>
                        </div>

                        <!-- Pilihan Jawaban -->
                        <div class="mb-3">
                            <label class="form-label">Pilihan Jawaban</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text">A</span>
                                <input type="text" name="jawaban_a" class="form-control" placeholder="Jawaban A">
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text">B</span>
                                <input type="text" name="jawaban_b" class="form-control" placeholder="Jawaban B">
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text">C</span>
                                <input type="text" name="jawaban_c" class="form-control" placeholder="Jawaban C">
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text">D</span>
                                <input type="text" name="jawaban_d" class="form-control" placeholder="Jawaban D">
                            </div>
                        </div>

                        <!-- Jawaban Benar -->
                        <div class="mb-3">
                            <label for="jawaban_benar" class="form-label">Jawaban Benar</label>
                            <select id="jawaban_benar" name="jawaban_benar" class="form-select">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Simpan Soal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection