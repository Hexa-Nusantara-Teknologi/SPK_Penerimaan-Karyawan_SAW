<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Pertanyaan;
use App\Models\UserActivityModel;
use Illuminate\Http\Request;

class PengerjaanTesController extends Controller
{
    public function index()
    {
        $statusText = UserActivityModel::where('user_id', auth()->id())->value('status_text');

        return view('Pengerjaan-Tes.index', compact('statusText'));
    }

    public function kerjakan(Request $request)
    {

        $pertanyaan = Pertanyaan::with('criteria')->get();

        $groupedPertanyaan = $pertanyaan->groupBy('criteria_id');
        return view('Pengerjaan-Tes.pengerjaan-tes', compact('groupedPertanyaan'));
    }

    public function submitScore(Request $request)
    {
        $userId = auth()->id();

        $answers = $request->input('answers');

        // Inisialisasi skor per kriteria
        $criteriaScores = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
        ];

        // Hitung jumlah maksimal skor untuk setiap kriteria
        $maxScores = [];
        foreach ($criteriaScores as $criteriaId => $score) {
            $maxScores[$criteriaId] = Pertanyaan::where('criteria_id', $criteriaId)->count();
        }

        // Hitung skor mentah berdasarkan jawaban
        foreach ($answers as $questionId => $answer) {
            $question = Pertanyaan::find($questionId);

            if ($question && $question->jawaban_benar == $answer) {
                $criteriaId = $question->criteria_id;
                $criteriaScores[$criteriaId]++;
            }
        }

        // Normalisasi skor ke skala 100
        foreach ($criteriaScores as $criteriaId => $rawScore) {
            if ($maxScores[$criteriaId] > 0) {
                $criteriaScores[$criteriaId] = ($rawScore / $maxScores[$criteriaId]) * 100;
            } else {
                $criteriaScores[$criteriaId] = 0; // Jika tidak ada pertanyaan untuk kriteria ini
            }
        }

        // Simpan atau perbarui data aktivitas pengguna
        $userActivity = UserActivityModel::updateOrCreate(
            ['user_id' => $userId],
            [
                'status_text' => true,
                'start_time' => now(),
                'end_time' => now(),
            ]
        );

        // Simpan skor ke database
        foreach ($criteriaScores as $criteriaId => $score) {
            if ($criteriaId != 3) { // Kriteria ID 3 tidak disimpan
                $userActivity->{"criteria_{$criteriaId}"} = $score;
            }
        }

        $userActivity->save();

        return redirect()->route('index')->with('message', 'Tes selesai!');
    }
}
