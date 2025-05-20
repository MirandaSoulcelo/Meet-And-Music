<?php

namespace App\Http\Controllers;

use App\Models\User_xp;


use App\Http\Controllers\Controller;



class RankingController extends Controller
{
    public function showRanking()
    {
        $ranking = User_xp::orderBy('nivel_atual', 'desc')->get()->all();

        return view('ranking', compact('ranking'));
    }


    public function index()
{
    $ranking = User_xp::with('user')->orderByDesc('nivel_atual')->get();

    return response()->json($ranking);
}
}
