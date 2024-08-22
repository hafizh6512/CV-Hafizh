<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\ChallengeProgressHistory;
use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $today = date('Y-m-d');
        $challenge = Challenge::where('start_date', '<=', $today)
            ->where('end_date', '>=', $today)
            ->get()->all();
        $user = $request->session()->get('auth_user');
        foreach ($challenge as $key => $value) {            
            $check = ChallengeProgressHistory::where('challenge_id', $value->id)
                ->where('user_id', $user['id'])
                ->count();
            $challenge[$key]->total_complete = $check;
        }
        $book = Book::where('is_exclusive',0)->inRandomOrder()->limit(3)->get()->all();
    	return view('home.index', compact('challenge','book'));
    }
}
