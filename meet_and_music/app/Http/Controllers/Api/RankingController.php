<?php

namespace App\Http\Controllers;

use App\Models\User_xp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

use App\Models\User;

class RankingController extends Controller
{
    public function showRanking()
    {
        $ranking = User_xp::orderBy('xp_atual', 'desc')->get();

        return view('ranking', compact('ranking'));
    }
}
