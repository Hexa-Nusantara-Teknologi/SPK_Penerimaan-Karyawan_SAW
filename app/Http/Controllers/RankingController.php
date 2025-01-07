<?php

namespace App\Http\Controllers;

use App\Models\RankingModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RankingController extends Controller
{
    public function index()
    {
        return view('Ranking.index');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = RankingModel::with(['user_activity.user'])->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('user_name', function ($row) {
                    return $row->user_activity && $row->user_activity->user
                        ? $row->user_activity->user->nama
                        : 'Nama tidak ditemukan';
                })
                ->addColumn('score', function ($row) {
                    return $row->user_activity ? $row->user_activity->score : 'Skor tidak ditemukan';
                })
                ->addColumn('status', function ($row) {
                    return $row->status;
                })
                ->make(true);
        }
    }
}
