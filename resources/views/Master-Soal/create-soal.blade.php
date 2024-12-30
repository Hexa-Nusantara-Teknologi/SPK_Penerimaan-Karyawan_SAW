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
                <form action="{{ route('soal.store') }}" method="POST">
                    @csrf
                    <!-- Kategori Soal -->
                    <div class="mb-3">
                        <label for="criteria_id" class="form-label">Kategori Soal</label>
                        <select class="form-control" id="criteria" name="criteria_id" required>
                            <option value="" disabled selected>Pilih Kriteria</option>
                            @foreach($kriteria as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pertanyaan -->
                    <div class="mb-3">
                        <label for="pertanyaan_text" class="form-label">Pertanyaan</label>
                        <textarea id="pertanyaan_text" name="pertanyaan_text" rows="3" class="form-control"
                            placeholder="Masukkan pertanyaan..." required></textarea>
                    </div>

                    <!-- Pilihan Jawaban -->
                    <div class="mb-3">
                        <label class="form-label">Pilihan Jawaban</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text">A</span>
                            <input type="text" id="jawaban_a" name="jawaban_a" class="form-control"
                                placeholder="Jawaban A" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">B</span>
                            <input type="text" id="jawaban_b" name="jawaban_b" class="form-control"
                                placeholder="Jawaban B" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">C</span>
                            <input type="text" id="jawaban_c" name="jawaban_c" class="form-control"
                                placeholder="Jawaban C" required>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">D</span>
                            <input type="text" id="jawaban_d" name="jawaban_d" class="form-control"
                                placeholder="Jawaban D" required>
                        </div>
                    </div>

                    <!-- Jawaban Benar -->
                    <div class="mb-3">
                        <label for="jawaban_benar" class="form-label">Jawaban Benar</label>
                        <select id="jawaban_benar" name="jawaban_benar" class="form-select" required disabled>
                            <option value="" disabled selected>Pilih jawaban benar</option>
                            <option value="jawaban_a">A</option>
                            <option value="jawaban_b">B</option>
                            <option value="jawaban_c">C</option>
                            <option value="jawaban_d">D</option>
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    const inputJawabanA = document.getElementById('jawaban_a');
    const inputJawabanB = document.getElementById('jawaban_b');
    const inputJawabanC = document.getElementById('jawaban_c');
    const inputJawabanD = document.getElementById('jawaban_d');
    const dropdownJawabanBenar = document.getElementById('jawaban_benar');

    const checkAllInputsFilled = () => {
        // Periksa apakah semua inputan jawaban sudah terisi
        if (
            inputJawabanA.value.trim() !== '' &&
            inputJawabanB.value.trim() !== '' &&
            inputJawabanC.value.trim() !== '' &&
            inputJawabanD.value.trim() !== ''
        ) {
            dropdownJawabanBenar.disabled = false;
        } else {
            dropdownJawabanBenar.disabled = true;
        }
    };

    // Tambahkan event listener untuk memantau perubahan pada semua input
    [inputJawabanA, inputJawabanB, inputJawabanC, inputJawabanD].forEach(input => {
        input.addEventListener('input', checkAllInputsFilled);
    });
});
</script>
@endsection
