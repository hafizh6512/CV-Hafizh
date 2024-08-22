<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reward;
use App\Models\RewardRedeem;
use App\Models\PointSetting;
use App\Models\User;
use App\Models\Book;

class RewardController extends Controller
{
    public function index()
    {
        $score_reset         = PointSetting::where('key', 'score_reset')->first();
        $reward_start_redeem = PointSetting::where('key', 'reward_start_redeem')->first();
        $reward_end_redeem   = PointSetting::where('key', 'reward_end_redeem')->first();

        $data = Reward::get()->all();
        $book = Book::inRandomOrder(3)->get()->all();
        return view('rewards.index', compact('data', 'score_reset', 'reward_start_redeem', 'reward_end_redeem','book'));
    }

    public function create()
    {
        return view('rewards.create');
    }

    public function store(Request $request)
    {

        // $filename='';
        // if($request->file('image')){
        //     $file     = $request->file('image');
        //     $filename = 'rewards_'.date('YmdHi').$file->getClientOriginalName();
        //     $file->move(public_path('assets/images'), $filename);
        // }

        // $data = new Reward;
        // $data->reward       = $request->reward;
        // $data->point_needed = $request->point_needed;
        // $data->image        = $filename;
        // $data->save();

        // return redirect('/rewards')->with('success','Add data success.!');
    }

    public function show($id)
    {
        $data = Reward::find($id);
        return view('rewards.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        /*$filename='';
        if($request->file('image')){
            $file     = $request->file('image');
            $filename = 'rewards_'.date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('assets/images'), $filename);
        }*/
        $data = Reward::find($id);
        $data->reward      = $request->reward;
        $data->coin_reward = $request->coin_reward;
        /*$data->image        = ($filename != '')?$filename:$data->image;*/
        $data->save();

        return redirect('/rewards')->with('success','Update data success!');
    }

    public function destroy($id)
    {
        Reward::find($id)->delete();
        return redirect('/rewards')->with('success','Delete data success!');
    }

    public function index_user(Request $request)
    {
        $user_id    = $request->session()->get('auth_user')['id'];
        $data       = Reward::get()->all();
        $rewardList = RewardRedeem::with(['reward'])->where('user_id', $user_id)->orderBy('id', 'DESC')->get();
        return view('rewards.index_user', compact('data', 'rewardList'));
    }

    public function redeemReward(Request $request)
    {
        $id         = $request->id;
        $user_id    = $request->session()->get('auth_user')['id'];
        $user_point = User::where('id', $user_id)->first()->points;

        $reward       = Reward::where('id', $id)->first();
        $point_needed = $reward->point_needed;


        if ($point_needed > $user_point) {
            return redirect()->back()->with('error', 'You don\'t have enough point for this reward!');
        }

        // Insert to redeem Request
        $redeem = new RewardRedeem;
        $redeem->reward_id = $id;
        $redeem->user_id   = $user_id;
        $redeem->address   = $request->address;
        $redeem->phone     = $request->phone;
        $redeem->save();

        $user = User::where('id', $user_id)->first();
        $user->points = $user_point-$point_needed;
        $user->save();

        return redirect()->back()->with('success', 'Redeem Success!');
    }

    public function listRedeemRequest(Request $request)
    {
        $rewardList = RewardRedeem::with(['reward', 'user'])->orderBy('id', 'DESC')->get();
        return view('rewards.redeem', compact('rewardList'));
    }

    public function changeStatusReward(Request $request)
    {
        $redeem = RewardRedeem::find($request->id);
        $redeem->status = $request->status;
        $redeem->save();
        return redirect()->back()->with('success', 'Change status success!');
    }

    public function getDetailReward($id)
    {
        $data = Reward::where('id', $id)->first();

        return view('point.detailReward', compact('data'));
    }

    public function claimReward(Request $request)
    {
        $id         = $request->id;
        $user_id    = $request->session()->get('auth_user')['id'];

        $reward = Reward::find($id);

        $redeem = new RewardRedeem;
        $redeem->reward_id   = $id;
        $redeem->user_id     = $user_id;
        $redeem->redeem_coin = $reward->coin_reward;
        $redeem->save();

        $user = User::find($user_id);
        $user->score = $user->score+$reward->coin_reward;
        $user->save();

        return redirect()->back()->with('success', 'Redeem Success!');
    }
}
