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
            $data = Pertanyaan::select(['id', 'criteria_id', 'pertanyaan_text', 'jawaban_a', 'jawaban_b', 'jawaban_c', 'jawaban_d', 'jawaban_benar'])
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('jawaban_benar', function ($row) {
                    return strtoupper(str_replace('jawaban_', '', $row->jawaban_benar));
                })
                ->addColumn('action', function ($row) {
                    return '<div class="d-flex justify-content-center">
                            <a href="' . route('soal.edit', $row->id) . '" class="btn btn-warning btn-sm mr-2">Edit</a>
                            <button class="btn btn-danger btn-sm delete-btn" data-id="' . $row->id . '">Delete</button>
                        </div>';
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

        Pertanyaan::create([
            'criteria_id' => $request->criteria_id,
            'pertanyaan_text' => $request->pertanyaan_text,
            'jawaban_a' => $request->jawaban_a,
            'jawaban_b' => $request->jawaban_b,
            'jawaban_c' => $request->jawaban_c,
            'jawaban_d' => $request->jawaban_d,
            'jawaban_benar' => $request->jawaban_benar,
        ]);

        return redirect()->route('soal.index')
            ->with('status', 'success')
            ->with('message', 'Soal berhasil disimpan.');
    }

    public function edit($id)
    {
        $soal = Pertanyaan::findOrFail($id);
        return view('Master-Soal.edit-soal', compact('soal'));
    }

    public function update(Request $request, $id)
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

        $soal = Pertanyaan::findOrFail($id);
        $soal->update([
            'criteria_id' => $request->criteria_id,
            'pertanyaan_text' => $request->pertanyaan_text,
            'jawaban_a' => $request->jawaban_a,
            'jawaban_b' => $request->jawaban_b,
            'jawaban_c' => $request->jawaban_c,
            'jawaban_d' => $request->jawaban_d,
            'jawaban_benar' => $request->jawaban_benar,
        ]);

        return redirect()->route('soal.index')
            ->with('status', 'success')
            ->with('message', 'Soal berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $soal = Pertanyaan::findOrFail($id);
        $soal->delete();

        return response()->json(['status' => 'success', 'message' => 'Soal berhasil dihapus.']);
    }
}
