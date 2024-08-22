<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function index()
    {
        $data = Challenge::get()->all();
        return view('challenge.index', compact('data'));
    }

    public function create()
    {
        return view('challenge.create');
    }

    public function store(Request $request)
    {
        $date_range = explode(' - ', $request->range_date);
        $start_date = date('Y-m-d', strtotime($date_range[0]));
        $end_date   = date('Y-m-d', strtotime($date_range[1]));

        
        $checkRange = Challenge::where('type', $request->type)->where(function($query) use ( $start_date, $end_date){
                $query->whereBetween('start_date', [$start_date, $end_date])
                    ->orWhereBetween('end_date', [$start_date, $end_date]);
                })->get()->all();
        
        if (!empty($checkRange)) {
            return redirect()->back()->with('error', 'Challenge aready exist on '.ucfirst($request->type).' type!');
        }

        $data = new Challenge;
        $data->challenge_name = $request->challenge_name;
        $data->type           = $request->type;
        $data->point_reward   = $request->point_reward;
        $data->total_book     = $request->total_book;
        $data->start_date     = $start_date;
        $data->end_date       = $end_date;
        $data->long           = $request->long;
        $data->save();

        return redirect('/point-setting')->with('success','Add data success!');
    }

    public function show($id)
    {
        $data = Challenge::find($id);
        return view('challenge.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $date_range = explode(' - ', $request->range_date);
        $start_date = date('Y-m-d', strtotime($date_range[0]));
        $end_date   = date('Y-m-d', strtotime($date_range[1]));

        
        $data = Challenge::find($id);
        $data->challenge_name = $request->challenge_name;
        $data->type           = $request->type;
        $data->point_reward   = $request->point_reward;
        $data->total_book     = $request->total_book;
        $data->start_date     = $start_date;
        $data->end_date       = $end_date;
        $data->long           = $request->long;
        $data->save();

        return redirect('/point-setting')->with('success','Update data success!');
    }

    public function destroy($id)
    {
        Challenge::find($id)->delete();
        return redirect('/point-setting')->with('success','Delete data success!');
    }
}
