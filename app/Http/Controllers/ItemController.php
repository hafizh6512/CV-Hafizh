<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemTransaction;

class ItemController extends Controller
{
    public function index()
    {
        $data = Item::get()->all();
        return view('item.index', compact('data'));
    }

    public function create()
    {
        return view('rewards.create');
    }

    public function store(Request $request)
    {

        $filename='';
        if($request->file('image')){
            $file     = $request->file('image');
            $filename = 'item_'.date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('assets/images'), $filename);
        }

        $data = new Item;
        $data->item_name     = $request->item_name;
        $data->coin_exchange = $request->exchange_coin;
        $data->item_image    = $filename;
        $data->save();

        return redirect()->back()->with('success','Add data success!');
    }

    public function update(Request $request, $id)
    {
        $filename='';
        if($request->file('image')){
            $file     = $request->file('image');
            $filename = 'rewards_'.date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('assets/images'), $filename);
        }
        $data = Item::find($id);
        $data->item_name     = $request->item_name;
        $data->coin_exchange = $request->exchange_coin;
        $data->item_image    = ($filename != '')?$filename:$data->item_image;
        $data->save();

        return redirect()->back()->with('success','Update data success!');
    }

    public function destroy($id)
    {
        Item::find($id)->delete();
        return redirect()->back()->with('success','Delete data success!');
    }

    public function itemTransaction()
    {
        $data = ItemTransaction::with(['item'])->orderBy('id', 'DESC')->get()->all();

        return view('item.itemTransaction', compact('data'));
    }

    public function updateItemTransaction(Request $request, $id)
    {
        // debugCode($request->all());

        $data = ItemTransaction::find($id);
        $data->status = $request->status;
        $data->save();

        return redirect()->back()->with('success', 'Status updated!');
    }
}
