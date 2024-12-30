<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Pertanyaan;
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

        return view('Pengerjaan-Tes.pengerjaan-tes', compact('pertanyaan', 'criteria', 'selectedCriteria'));
    }
}
