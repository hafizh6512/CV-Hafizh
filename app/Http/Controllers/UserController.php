<?php

namespace App\Http\Controllers;

use App\Models\PointSetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data    = User::get()->all();
        $data_pc = User::where('roles', 'user')->get()->all();
        return view('user.index', compact('data', 'data_pc'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $checkUser = User::where('username', $request->username)
            ->first();

        if (!empty($checkUser)) {
            return redirect('/users')->with('error', 'Username already exists!');
        }

        $user = new User;
        $user->name     = $request->name;
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->roles    = $request->roles;
        $user->save();

        return redirect('/users')->with('success','Add data success!');
    }

    public function show($id)
    {
        $data = User::find($id);
        return view('user.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {

        $checkUser = User::where('username', $request->username)
            ->where('id', '!=', $id)
            ->first();

        if (!empty($checkUser)) {
            return redirect('/users')->with('error', 'Username already exists!');
        }

        $user = User::find($id);
        $user->name     = $request->name;
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->password = $request->password != '' ? Hash::make($request->password) : $user->password;
        $user->roles    = $request->roles;
        $user->save();

        return redirect('/users')->with('success','Update data success!');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('/users')->with('success','Delete data success!');
    }

    public function listPoints()
    {
        $data =User::where('roles', 'user')->get()->all();
        return view('point.index', compact('data'));
    }

    public function updatePoints(Request $request, $id)
    {
        $user = User::find($id);
        $user->points = $request->points;
        $user->score  = $request->coins;
        $user->save();

        return redirect()->back()->with('success', 'Update Point Success!');
    }

    public function resetPoints(Request $request, $id)
    {
        $user = User::find($id);
        $user->points = 0;
        $user->save();

        return redirect()->back()->with('success', 'Reset Point Success!');
    }

    public function leaderBoard(Request $request)
    {
        $score_reset         = PointSetting::where('key', 'score_reset')->first();
        $reward_start_redeem = PointSetting::where('key', 'reward_start_redeem')->first();
        $reward_end_redeem   = PointSetting::where('key', 'reward_end_redeem')->first();

        $data = User::where('roles', 'user')
            ->orderBy('points', 'DESC')
            ->orderBy('id', 'ASC')
            ->get()
            ->all();

        return view('point.leaderboard', compact('data', 'score_reset', 'reward_start_redeem', 'reward_end_redeem'));
    }

    public function resetLeaderboard(Request $request)
    {
        User::where('points', '>', 0)->update(['points' => 0]);
        return redirect()->back()->with('success', 'Leaderboard has been reset!');
    }


    public function resetLeaderboardCron(Request $request)
    {
        User::where('points', '>', 0)->update(['points' => 0]);
        return "OK";
    }
}
