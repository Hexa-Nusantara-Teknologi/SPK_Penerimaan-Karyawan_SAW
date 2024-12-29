<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\SubCriteria;
use Yajra\DataTables\DataTables;
class SubcriteriaController extends Controller
{
    public function index()
    {
        return view('Master-SubKriteria.index');
    }
    public function create()
    {
        $kriteria = Criteria::all();
        return view('Master-SubKriteria.create-subkriteria', compact('kriteria'));
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data =SubCriteria::with('criteria:id,name')
            ->select(['id', 'criteria_id', 'name', 'min_score', 'max_score'])
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('criteria_name', function ($row) {
                    return $row->criteria ? $row->criteria->name : ''; // Menampilkan nama criteria
                })
                ->addColumn('action', function ($row) {
                    return '<div class="d-flex justify-content-center">
                            <a href="' . route('subkriteria.edit', $row->id) . '" class="btn btn-warning btn-sm mr-2">Edit</a>
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
            'name' => 'required|string',
            'min_score' => 'required|string',
            'max_score' => 'required|string',

        ]);

        SubCriteria::create([
            'criteria_id' => $request->criteria_id,
            'name' => $request->name,
            'min_score' => $request->min_score,
            'max_score' => $request->max_score,

        ]);

        return redirect()->route('subkriteria.index')
            ->with('status', 'success')
            ->with('message', 'Subkriteria berhasil disimpan.');
    }

    public function edit($id)
    {
        $kriteria = Criteria::all();
        $subkriteria = SubCriteria::findOrFail($id);
        return view('Master-SubKriteria.edit-subkriteria', compact('subkriteria', 'kriteria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'criteria_id' => 'required|integer',
            'name' => 'required|string',
            'min_score' => 'required|string',
            'max_score' => 'required|string',
        ]);

        $subkriteria = SubCriteria::findOrFail($id);
        $subkriteria->update([
            'criteria_id' => $request->criteria_id,
            'name' => $request->name,
            'min_score' => $request->min_score,
            'max_score' => $request->max_score,

        ]);

        return redirect()->route('subkriteria.index')
            ->with('status', 'success')
            ->with('message', 'subkriteria berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $subkriteria = SubCriteria::findOrFail($id);
        $subkriteria->delete();

        return response()->json(['status' => 'success', 'message' => 'Sub Kriteria berhasil dihapus.']);
    }
}
