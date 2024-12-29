<?php

namespace App\Http\Controllers;
use App\Models\Criteria;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CriteriaController extends Controller
{
    public function index()
    {
        return view('Master-Kriteria.index');
    }
    public function create()
    {
        return view('Master-Kriteria.create-kriteria');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'weight' => 'required|string',

        ]);

        Criteria::create([
            'name' => $request->name,
            'weight' => $request->weight,

        ]);

        return redirect()->route('kriteria.index')
            ->with('status', 'success')
            ->with('message', 'Kriteria berhasil disimpan.');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data =Criteria::select(['id', 'name', 'weight'])
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {
                    return '<div class="d-flex justify-content-center">
                            <a href="' . route('kriteria.edit', $row->id) . '" class="btn btn-warning btn-sm mr-2">Edit</a>
                            <button class="btn btn-danger btn-sm delete-btn" data-id="' . $row->id . '">Delete</button>
                        </div>';
                })
                ->make(true);
        }
    }

    public function edit($id)
    {
        $kriteria = Criteria::findOrFail($id);
        return view('Master-Kriteria.edit-kriteria', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'weight' => 'required|string',

        ]);

        $kriteria = Criteria::findOrFail($id);
        $kriteria->update([
            'name' => $request->name,
            'weight' => $request->weight,

        ]);

        return redirect()->route('kriteria.index')
            ->with('status', 'success')
            ->with('message', 'Kriteria berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kriteria = Criteria::findOrFail($id);
        $kriteria->delete();

        return response()->json(['status' => 'success', 'message' => 'kriteria berhasil dihapus.']);
    }
}