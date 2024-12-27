@extends('layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid mb-5">
    <!-- Content Row -->
    <div class=" container mt-3">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Input Soal</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('soal.update', $soal->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Kategori Soal -->
                    <div class="mb-3">
                        <label for="criteria_id" class="form-label">Kategori Soal</label>
                        <select id="criteria_id" name="criteria_id" class="form-select" required>
                            <option value="1" {{ $soal->criteria_id == 1 ? 'selected' : '' }}>Soal Psikotes</option>
                            <option value="2" {{ $soal->criteria_id == 2 ? 'selected' : '' }}>Soal Soft Skill</option>
                        </select>
                    </div>

                    <!-- Pertanyaan -->
                    <div class="mb-3">
                        <label for="pertanyaan_text" class="form-label">Pertanyaan</label>
                        <textarea id="pertanyaan_text" name="pertanyaan_text" rows="3" class="form-control"
                            required>{{ $soal->pertanyaan_text }}</textarea>
                    </div>

                    <!-- Pilihan Jawaban -->
                    <div class="mb-3">
                        <label class="form-label">Pilihan Jawaban</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text">A</span>
                            <input type="text" id="jawaban_a" name="jawaban_a" class="form-control"
                                value="{{ $soal->jawaban_a }}" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">B</span>
                            <input type="text" id="jawaban_b" name="jawaban_b" class="form-control"
                                value="{{ $soal->jawaban_b }}" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">C</span>
                            <input type="text" id="jawaban_c" name="jawaban_c" class="form-control"
                                value="{{ $soal->jawaban_c }}" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">D</span>
                            <input type="text" id="jawaban_d" name="jawaban_d" class="form-control"
                                value="{{ $soal->jawaban_d }}" required>
                        </div>
                    </div>

                    <!-- Jawaban Benar -->
                    <div class="mb-3">
                        <label for="jawaban_benar" class="form-label">Jawaban Benar</label>
                        <select id="jawaban_benar" name="jawaban_benar" class="form-select" required>

                            <option value="jawaban_a" {{ $soal->jawaban_benar == 'jawaban_a' ? 'selected' : '' }}>
                                Jawaban A
                            </option>
                            <option value="jawaban_b" {{ $soal->jawaban_benar == 'jawaban_b' ? 'selected' : '' }}>
                                Jawaban B
                            </option>
                            <option value="jawaban_c" {{ $soal->jawaban_benar == 'jawaban_c' ? 'selected' : '' }}>
                                Jawaban C
                            </option>
                            <option value="jawaban_d" {{ $soal->jawaban_benar == 'jawaban_d' ? 'selected' : '' }}>
                                Jawaban D
                            </option>
                        </select>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary mb-3">Simpan Soal</button>
                        <a href="{{ route('soal.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection