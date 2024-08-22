<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\PointSetting;
use App\Models\Challenge;

class PointSettingController extends Controller
{
    public function index(Request $request)
    {
        $data      = PointSetting::get()->all();

        $all_data = [];
        foreach ($data as $key => $value) {
            $all_data[$value->key] = $value->value;
        }
        // debugCode($all_data);
        $challenge = Challenge::get()->all();
        // debugCode($data);
        return view('point_setting.index', compact('data', 'challenge', 'all_data'));
    }

    public function updateSetting(Request $request)
    {
        $posts = $request->all();

        foreach ($posts as $key => $value) {
            if ($key != '_token') {
                $data = PointSetting::where('key', $key)->first();
                if (empty($data)) {
                    $data = new PointSetting;
                }
                $data->key   = $key;
                $data->value = $value;
                $data->save();
            }
        }

        /*$read = PointSetting::where('id', 1)->first();
        $read->value = $request->read;
        $read->save();
        
        $review = PointSetting::where('id', 2)->first();
        $review->value = $request->review;
        $review->save();

        $exclusive = PointSetting::where('id', 3)->first();
        $exclusive->value = $request->exclusive;
        $exclusive->save();

        $exclusive = PointSetting::where('id', 7)->first();
        $exclusive->value = $request->read_coin;
        $exclusive->save();*/

        return redirect()->back()->with('success', 'Update setting success!');
    }

    public function redeemPointToKey(Request $request)
    {
        $user = $request->session()->get('auth_user');

        $total_point      = getUserPoint($user['id']);
        $redeemToKeyPoint = point_key_exchange()->value;
        if ($total_point < $redeemToKeyPoint) {
            return redirect()->back()->with('error', 'Not enough point!');
        }

        $user = User::find($user['id']);
        $user->points = $user->points - $redeemToKeyPoint;
        $user->keys   = $user->keys+1;
        $user->save();

        return redirect()->back()->with('success', 'Redeem Keys Success!');
    }

    public function saveSettingRedeem(Request $request)
    {
        $score_reset = PointSetting::where('id', 4)->first();
        $score_reset->value = $request->score_reset;
        $score_reset->save();

        $reward_start_redeem = PointSetting::where('id', 5)->first();
        $reward_start_redeem->value = $request->reward_start_redeem;
        $reward_start_redeem->save();

        $reward_end_redeem = PointSetting::where('id', 6)->first();
        $reward_end_redeem->value = $request->reward_end_redeem;
        $reward_end_redeem->save();

        return redirect()->back()->with('success', 'Update Information Success!');
    }
}
