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
                        @foreach($pertanyaan as $key => $question)
                        <div class="mb-4">
                            <h5><b>Soal No. {{ $key + 1 }}</b></h5>
                            <p>{{ $question->pertanyaan_text }}</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]"
                                    value="jawaban_a" id="option{{ $key }}a">
                                <label class="form-check-label"
                                    for="option{{ $key }}a">{{ $question->jawaban_a }}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]"
                                    value="jawaban_b" id="option{{ $key }}b">
                                <label class="form-check-label"
                                    for="option{{ $key }}b">{{ $question->jawaban_b }}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]"
                                    value="jawaban_c" id="option{{ $key }}c">
                                <label class="form-check-label"
                                    for="option{{ $key }}c">{{ $question->jawaban_c }}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]"
                                    value="jawaban_d" id="option{{ $key }}d">
                                <label class="form-check-label"
                                    for="option{{ $key }}d">{{ $question->jawaban_d }}</label>
                            </div>
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
            </div>
        </div>

    </div>
</div>
<!-- /.cont
ainer-fluid -->
@endsection
