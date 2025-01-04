<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Pertanyaan;
use App\Models\UserActivityModel;
use Illuminate\Http\Request;

class PengerjaanTesController extends Controller
{
    public function index(){
        return view('Pengerjaan-Tes.index');
    }

    public function kerjakan(Request $request){

        $criteriaId = $request->input('criteria_id', 1); // Ambil parameter criteria_id dari request

        // Ambil pertanyaan sesuai dengan criteria_id yang dipilih, jika ada
        $pertanyaan = $criteriaId
            ? Pertanyaan::where('criteria_id', $criteriaId)->get()
            : Pertanyaan::all(); // Filter jika ada criteria_id, jika tidak tampilkan semua

        // Ambil daftar kriteria untuk tombol filter, kecuali kriteria CV
        $criteria = Criteria::where('name', '!=', 'CV')->get();

        // Ambil nama kriteria yang dipilih berdasarkan criteria_id
        $selectedCriteria = Criteria::find($criteriaId);

        // Jika ada jawaban yang disubmit, simpan jawaban ke session
    if ($request->has('answers')) {
        session(['answers' => $request->input('answers')]);
    }

    // Ambil jawaban yang sudah ada di session, jika ada
    $savedAnswers = session('answers', []);

        return view('Pengerjaan-Tes.pengerjaan-tes', compact('pertanyaan', 'criteria', 'selectedCriteria', 'savedAnswers'));
    }

    public function submitScore(Request $request)
{
    $userId = auth()->id(); // ID pengguna yang sedang login

    // Ambil semua jawaban yang dikirimkan
    $answers = $request->input('answers');

    // Hitung skor untuk setiap kriteria
    $criteriaScores = [
        1 => 0, // Inisialisasi skor untuk criteria_1
        2 => 0, // Inisialisasi skor untuk criteria_2
        3 => 0, // Inisialisasi skor untuk criteria_3
        4 => 0, // Inisialisasi skor untuk criteria_4
        5 => 0, // Inisialisasi skor untuk criteria_5
        6 => 0, // Inisialisasi skor untuk criteria_6
    ];

    foreach ($answers as $questionId => $answer) {
        $question = Pertanyaan::find($questionId);

        if ($question && $question->jawaban_benar == $answer) {
            // Jika jawaban benar, tambahkan skor pada kriteria terkait
            $criteriaId = $question->criteria_id;
            $criteriaScores[$criteriaId]++; // Increment skor untuk kriteria terkait
        }
    }

    // Update atau buat data user_activity
    $userActivity = UserActivityModel::updateOrCreate(
        ['user_id' => $userId],
        [
            'status_text' => true, // Sesuaikan dengan status pengerjaan (misalnya, true jika selesai)
            'start_time' => now(), // Waktu mulai pengerjaan
            'end_time' => now(), // Waktu selesai pengerjaan
        ]
    );

    // Update kolom untuk setiap kriteria yang ada
    foreach ($criteriaScores as $criteriaId => $score) {
        // Periksa apakah kriteria ini termasuk dalam pengerjaan tes
        if ($criteriaId != 3) { // Jika kriteria tidak 3 (CV)
            $userActivity->{"criteria_{$criteriaId}"} = $score;
        }
    }

    $userActivity->save();

    // Redirect atau tampilkan hasil
    return redirect()->route('index')->with('message', 'Tes selesai!');
}
}