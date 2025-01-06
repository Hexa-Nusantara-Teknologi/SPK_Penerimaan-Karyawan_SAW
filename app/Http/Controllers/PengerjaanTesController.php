<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Pertanyaan;
use App\Models\UserActivityModel;
use Illuminate\Http\Request;

class PengerjaanTesController extends Controller
{
    public function index(){
        $statusText = UserActivityModel::where('user_id', auth()->id())->value('status_text');

    return view('Pengerjaan-Tes.index', compact('statusText'));
    }

    public function kerjakan(Request $request){

       // Ambil semua pertanyaan beserta data kriterianya
    $pertanyaan = Pertanyaan::with('criteria')->get();

    // Kelompokkan pertanyaan berdasarkan criteria_id
    $groupedPertanyaan = $pertanyaan->groupBy('criteria_id');
        return view('Pengerjaan-Tes.pengerjaan-tes', compact('groupedPertanyaan'));
    }

    public function submitScore(Request $request)
{
    $userId = auth()->id();

    $answers = $request->input('answers');

    $criteriaScores = [
        1 => 0,
        2 => 0,
        3 => 0,
        4 => 0,
        5 => 0,
        6 => 0,
    ];

    foreach ($answers as $questionId => $answer) {
        $question = Pertanyaan::find($questionId);

        if ($question && $question->jawaban_benar == $answer) {
            $criteriaId = $question->criteria_id;
            $criteriaScores[$criteriaId]++;
        }
    }

    $userActivity = UserActivityModel::updateOrCreate(
        ['user_id' => $userId],
        [
            'status_text' => true,
            'start_time' => now(),
            'end_time' => now(),
        ]
    );

    foreach ($criteriaScores as $criteriaId => $score) {
        if ($criteriaId != 3) {
            $userActivity->{"criteria_{$criteriaId}"} = $score;
        }
    }

    $userActivity->save();

    return redirect()->route('index')->with('message', 'Tes selesai!');
}
}