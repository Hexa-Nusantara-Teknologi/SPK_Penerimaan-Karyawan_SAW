<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SoalController extends Controller
{
    public function index()
    {
        return view('Master-Soal.index');
    }

    public function create()
    {
        return view('Master-Soal.create-soal');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = Pertanyaan::select(['criteria_id', 'pertanyaan_text', 'jawaban_a', 'jawaban_b', 'jawaban_c', 'jawaban_d', 'jawaban_benar'])
                ->get();

            return DataTables::of($data)
                ->addIndexColumn() // Menambahkan nomor urut
                ->editColumn('criteria_id', function ($row) {
                    return $row->criteria_id == 1 ? 'Soal Psikotes' : 'Soal Soft Skill';
                })
                ->editColumn('jawaban_benar', function ($row) {
                    return strtoupper(str_replace('jawaban_', '', $row->jawaban_benar)); // Menampilkan A/B/C/D
                })
                ->make(true);
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'criteria_id' => 'required|integer',
            'pertanyaan_text' => 'required|string',
            'jawaban_a' => 'required|string',
            'jawaban_b' => 'required|string',
            'jawaban_c' => 'required|string',
            'jawaban_d' => 'required|string',
            'jawaban_benar' => 'required|string|in:jawaban_a,jawaban_b,jawaban_c,jawaban_d',
        ]);

        try {
            Pertanyaan::create([
                'criteria_id' => $request->criteria_id,
                'pertanyaan_text' => $request->pertanyaan_text,
                'jawaban_a' => $request->jawaban_a,
                'jawaban_b' => $request->jawaban_b,
                'jawaban_c' => $request->jawaban_c,
                'jawaban_d' => $request->jawaban_d,
                'jawaban_benar' => $request->jawaban_benar,
            ]);
            return redirect()->back()->with('success', 'Soal berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan soal: ' . $e->getMessage());
        }
    }
}
