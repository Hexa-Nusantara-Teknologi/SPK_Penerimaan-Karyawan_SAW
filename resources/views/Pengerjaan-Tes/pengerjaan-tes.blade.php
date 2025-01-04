@extends('layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid mb-5">
    <!-- Content Row -->
    <div class="row"
        style="background-color: #ffffff; border-radius: 8px; padding: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="col-sm-4">
            <header class="bg-primary text-white py-3 mb-4">
                <div class="container">
                    <h1 class="m-0">Soal {{ $selectedCriteria ? $selectedCriteria->name : 'Semua' }}</h1>

                </div>

            </header>
        </div>

        <div class="col-sm-4">

        </div>

        <div class="col-sm-4">
            <div class="text-danger" style="margin-top: 17% !important; text-align:right;">Sisa Waktu:
                <strong>01:59:56</strong>
            </div>

        </div>



        <div class=" container mt-3">
            <div class="row">
                <!-- Bagian Kiri -->
                <div class="col-md-8">
                    <div class="card px-4 py-4">
                        <form id="quiz-form" action="{{ route('submit-score') }}" method="POST">
                            @csrf
                            @foreach($pertanyaan as $key => $question)
                            <div class="mb-4">
                                <h5><b>Soal No. {{ $key + 1 }}</b></h5>
                                <p>{{ $question->pertanyaan_text }}</p>
                                @foreach(['a', 'b', 'c', 'd'] as $option)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]"
                                        value="jawaban_{{ $option }}"
                                        data-correct-answer="{{ $question->jawaban_benar }}"
                                        id="option{{ $key }}{{ $option }}"
                                        {{ isset($savedAnswers[$question->id]) && $savedAnswers[$question->id] == "jawaban_{$option}" ? 'checked' : '' }}>

                                    <label class="form-check-label" for="option{{ $key }}{{ $option }}">
                                        {{ $question->{'jawaban_' . $option} }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                    </div>
                </div>



                <!-- Bagian Kanan -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pilih Topik Soal</h5>
                            @foreach($criteria as $criterion)
                            <a href="{{ route('kerjakan', ['criteria_id' => $criterion->id]) }}"
                                class="btn btn-outline-secondary m-1">
                                {{ $criterion->name }}
                            </a>
                            @endforeach

                        </div>
                    </div>

                </div>

                <!-- Tombol Submit (Cek Jawaban) -->
                <div class="row mt-4">
                    <div class="col-md-12 text-center">
                        <button id="submit-button" class="btn btn-primary" style="display: none;">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Menyembunyikan tombol submit pada awalnya
    var submitButton = document.getElementById('submit-button');
    submitButton.style.display = 'none';

    // Mengambil semua elemen radio button
    var radioButtons = document.querySelectorAll('input[type="radio"]');

    // Fungsi untuk memeriksa apakah semua soal sudah dijawab
    function checkAllAnswered() {
        var allAnswered = true;

        // Mengecek setiap radio button
        radioButtons.forEach(function(radio) {
            var questionId = radio.name.split('[')[1].split(']')[0]; // Mendapatkan ID soal
            var questionAnswered = document.querySelector('input[name="answers[' + questionId +
                ']"]:checked');

            if (!questionAnswered) {
                allAnswered = false; // Jika ada soal yang belum dijawab
            }
        });

        // Menampilkan tombol submit jika semua soal sudah dijawab
        if (allAnswered) {
            submitButton.style.display = 'block';
        } else {
            submitButton.style.display = 'none';
        }
    }

    // Menambahkan event listener untuk setiap radio button
    radioButtons.forEach(function(radio) {
        radio.addEventListener('change', checkAllAnswered);
    });
});
</script>
@endsection