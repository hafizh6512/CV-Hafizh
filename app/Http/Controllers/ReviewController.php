<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;
use App\Models\ChallengeProgressHistory;
use App\Models\Review;

class ReviewController extends Controller
{

    public function index(Request $request)
    {
        $data = Review::with(['book', 'user'])->get()->all();
        return view('review.index', compact('data'));
    }

    public function doReviewBook(Request $request, $id)
    {
        $user_id = $request->session()->get('auth_user')['id'];

        // Check challenge
        $now = date('Y-m-d');
        $challenge = Challenge::where('type', 'review')
            ->where('start_date', '<=',$now)
            ->where('end_date', '>=', $now)
            ->first();
        $is_complete_challenge = 0;
        if (!empty($challenge)) {
            // If challenge exist, user will get challenge point after complete
            // Check if already exist
            $checkExist = ChallengeProgressHistory::where('challenge_id', $challenge->id)
                ->where('book_id', $id)
                ->where('user_id', $user_id)
                ->first();
            if (empty($checkExist)) {
                $clh = new ChallengeProgressHistory;
                $clh->challenge_id = $challenge->id;
                $clh->book_id      = $id;
                $clh->user_id      = $user_id;
                $clh->save();
            }

            $checkTotalCompleteChallenge = ChallengeProgressHistory::where('challenge_id', $challenge->id)
                ->where('user_id', $user_id)->count();

            if ($challenge->total_book == $checkTotalCompleteChallenge) {
                // Will get point from total challenge
                addPointDefaultUser($user_id, 'review', 0, $challenge->point_reward);
                $is_complete_challenge = 1;
            }else{
                // Will get normal point
                addPointDefaultUser($user_id, 'review', 0);
            }
        }else{
            addPointDefaultUser($user_id, 'review', 0);
        }

        $data          = new Review;
        $data->user_id = $user_id;
        $data->book_id = $id;
        $data->review  = $request->comment;
        $data->star    = $request->star;
        $data->save();

        $message = "Review Book Success!";
        if ($is_complete_challenge) {
            $message.=' You already earned point for review challenge!';
        }

        return redirect()->back()->with('success', $message);
    }

    public function update(Request $request, $id)
    {
        $data = Review::find($id);
        $data->star   = $request->star;
        $data->review = $request->comment;
        $data->save();

        return redirect()->back()->with('success', 'Update data success!');
    }

    public function destroy(Request $request, $id)
    {
        Review::find($id)->delete();
        return redirect('/review')->with('success','Delete data success!');
    }
}
