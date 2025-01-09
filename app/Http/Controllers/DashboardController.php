<?php

namespace App\Http\Controllers;

use App\Models\RankingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil data ranking untuk user yang sedang login
        $ranking = RankingModel::whereHas('user_activity', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->first();

        return view('dashboard', compact('user', 'ranking'));
    }
}