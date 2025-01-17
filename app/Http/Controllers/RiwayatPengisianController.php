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
                ->orderColumn('user_id', function ($query, $order) {
                    // Sorting berdasarkan kolom 'nama' dari tabel relasi 'users'
                    $query->join('users', 'users.id', '=', 'user_activity.user_id')
                        ->orderBy('users.nama', $order);
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
        // Mengambil data aktivitas, kriteria, dan subkriteria
        $activities = UserActivityModel::all();
        $criteria = Criteria::all();
        $subcriteria = SubCriteria::all();

        // Cek apakah data kriteria atau aktivitas tersedia
        if ($criteria->isEmpty() || $activities->isEmpty()) {
            logger()->warning('Tidak ada data kriteria atau aktivitas untuk diproses.');
            return;
        }

        $normalized = [];

        // Proses normalisasi nilai
        foreach ($criteria as $criterion) {
            $criteriaName = 'criteria_' . $criterion->id;
            $subCriterionRange = $subcriteria->where('criteria_id', $criterion->id);

            // Cek apakah subkriteria tersedia untuk kriteria ini
            if ($subCriterionRange->isEmpty()) {
                logger()->warning("Subkriteria untuk {$criteriaName} tidak ditemukan.");
                continue;
            }

            // Ambil nilai minimum dan maksimum subkriteria
            $minValue = $subCriterionRange->min('min_score');
            $maxValue = $subCriterionRange->max('max_score');

            // Pastikan tidak ada pembagian dengan nol
            if ($maxValue - $minValue <= 0) {
                logger()->warning("Rentang nilai untuk {$criteriaName} tidak valid (maxValue: {$maxValue}, minValue: {$minValue}).");
                continue;
            }

            // Normalisasi nilai setiap aktivitas berdasarkan kriteria
            $normalized[$criteriaName] = $activities->mapWithKeys(function ($row) use ($criteriaName, $minValue, $maxValue) {
                $value = $row->$criteriaName;
                $normalizedValue = ($value - $minValue) / ($maxValue - $minValue);
                return [$row->id => $normalizedValue];
            });
        }

        // Perhitungan skor total
        foreach ($activities as $activity) {
            $score = 0;

            foreach ($criteria as $criterion) {
                $criteriaName = 'criteria_' . $criterion->id;

                // Lanjutkan jika kriteria tidak memiliki data normalisasi
                if (!isset($normalized[$criteriaName])) {
                    continue;
                }

                $weight = $criterion->weight / 100;
                $score += $normalized[$criteriaName][$activity->id] * $weight;
            }

            // Simpan skor ke database
            $activity->score = $score;
            $activity->save();

            // Logging hasil skor
            logger()->info("Skor untuk aktivitas ID {$activity->id} berhasil dihitung: {$score}");
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
