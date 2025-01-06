@extends('layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid mb-5">
    <!-- Content Row -->
    <div class="row"
        style="background-color: #ffffff; border-radius: 8px; padding: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="col-sm-4">

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
                <div class="col-md-12">
                    <div class="card px-4 py-4">
                        <form id="quiz-form" action="{{ route('submit-score') }}" method="POST">
                            @csrf
                            @foreach ($groupedPertanyaan as $criteriaId => $questions)
                            <div class="container mb-5">
                                <h1 class=" m-0 mb-4 text-center">
                                    <b style="color: #4e73df; text-decoration: underline; text-align:center;">Soal
                                        {{ $questions->first()->criteria->name ?? 'Tanpa Kriteria' }}</b>
                                </h1>

                                @foreach ($questions as $key => $question)
                                <div class="mb-4">
                                    <h5><b>Soal No. {{ $key + 1 }}</b></h5>
                                    <p>{{ $question->pertanyaan_text }}</p>

                                    @foreach (['a', 'b', 'c', 'd'] as $option)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]"
                                            value="jawaban_{{ $option }}" id="option{{ $question->id }}{{ $option }}"
                                            {{ isset($savedAnswers[$question->id]) && $savedAnswers[$question->id] == "jawaban_{$option}" ? 'checked' : '' }}>

                                        <label class="form-check-label" for="option{{ $question->id }}{{ $option }}">
                                            {{ $question->{'jawaban_' . $option} }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                            <hr>
                            @endforeach
                            <div class="row mt-4">
                                <div class="col-md-12 text-center">
                                    <button id="submit-button" class="btn btn-primary"
                                        style="display: none;">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>





            </div>
        </div>

    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var submitButton = document.getElementById('submit-button');
    submitButton.style.display = 'none';

    var radioButtons = document.querySelectorAll('input[type="radio"]');

    function checkAllAnswered() {
        var allAnswered = true;

        radioButtons.forEach(function(radio) {
            var questionId = radio.name.split('[')[1].split(']')[0];
            var questionAnswered = document.querySelector('input[name="answers[' + questionId +
                ']"]:checked');

            if (!questionAnswered) {
                allAnswered = false;
            }
        });

        if (allAnswered) {
            submitButton.style.display = 'block';
        } else {
            submitButton.style.display = 'none';
        }
    }

    radioButtons.forEach(function(radio) {
        radio.addEventListener('change', checkAllAnswered);
    });

    checkAllAnswered();
});
</script>


@endsection
