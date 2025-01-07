<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\RankingModel;
use App\Models\UserActivityModel;
use App\Models\SubCriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class RiwayatPengisianController extends Controller
{
    public function index()
    {
        return view('Riwayat-Pengisian.index');
    }

    public function detail($id)
    {
        $dataUser_activity = UserActivityModel::with('user')->findOrFail($id);

        return view('Riwayat-Pengisian.detail', compact('dataUser_activity', 'id'));
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = UserActivityModel::with('user')->select('user_activity.*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('user_id', function ($row) {
                    return $row->user ? $row->user->nama : 'Nama tidak ditemukan';
                })
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('riwayat.detail', $row->id) . '" class="btn btn-info btn-sm mr-2">Detail</a>';
                })
                ->make(true);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nilaiCV' => 'required|numeric|min:1|max:100',
        ]);

        if ($validator->fails()) {
            return redirect()->route('riwayat.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $dataUser_activity = UserActivityModel::findOrFail($id);
        $dataUser_activity->criteria_3 = $request->input('nilaiCV');
        $dataUser_activity->save();

        $this->calculateScores();
        $this->generateRanking();

        return redirect()->route('riwayat.detail', $id)->with('success', 'Data berhasil diperbarui!');
    }

    private function calculateScores()
    {
        $activities = UserActivityModel::all();
        $criteria = Criteria::all();
        $subcriteria = SubCriteria::all();

        $normalized = [];
        foreach ($criteria as $criterion) {
            $criteriaName = 'criteria_' . $criterion->id;
            $subCriterionRange = $subcriteria->where('criteria_id', $criterion->id);
            $minValue = $subCriterionRange->min('min_score');
            $maxValue = $subCriterionRange->max('max_score');

            $normalized[$criteriaName] = $activities->mapWithKeys(function ($row) use ($criteriaName, $minValue, $maxValue) {
                $value = $row->$criteriaName;
                $normalizedValue = ($maxValue - $minValue > 0) ? ($value - $minValue) / ($maxValue - $minValue) : 0;
                return [$row->id => $normalizedValue];
            });
        }

        foreach ($activities as $activity) {
            $score = 0;

            foreach ($criteria as $criterion) {
                $criteriaName = 'criteria_' . $criterion->id;
                $weight = $criterion->weight / 100;

                $score += $normalized[$criteriaName][$activity->id] * $weight;
            }

            $activity->score = $score;
            $activity->save();
        }
    }

    private function generateRanking()
    {
        DB::transaction(function () {
            // Ambil data user_activity yang sudah diurutkan berdasarkan score
            $userActivities = UserActivityModel::orderBy('score', 'desc')->get();

            foreach ($userActivities as $activity) {
                // Tentukan nilai status berdasarkan score
                $status = $activity->score > 0.80 ? 'lolos' : 'tidak lolos';

                // Periksa apakah data ranking sudah ada
                $existingRanking = RankingModel::where('user_activity_id', $activity->id)->first();

                if ($existingRanking) {
                    // Update data ranking jika sudah ada
                    $existingRanking->update([
                        'status' => $status, // Update status berdasarkan score
                        'updated_at' => now(),
                    ]);
                } else {
                    // Buat data ranking baru jika belum ada
                    RankingModel::create([
                        'user_activity_id' => $activity->id,
                        'status' => $status, // Set status berdasarkan score
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        });
    }
}
