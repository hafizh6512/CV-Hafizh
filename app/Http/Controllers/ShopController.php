<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemTransaction;
use App\Models\User;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $item= Item::get()->all();
        return view('shop.index', compact('item'));
    }

    public function buyItem(Request $request, $item_id)
    {
        // debugCode($request->all());
        $user_id = $request->session()->get('auth_user')['id'];
        $qty     = $request->qty;
        $status  = 0;
        $phone   = '-';
        $address = '-';

        $user_coin = User::where('id', $user_id)->first()->score;
        $item      = Item::find($item_id);
        $total_exchange = $item->coin_exchange*$qty;
        if ($user_coin < ($total_exchange)) {
            return redirect()->back()->with('error', 'You don\'t have enough Coin');
        }

        if ($item_id == 1) {
            // If buy key

            $itemTrans = new ItemTransaction;
            $itemTrans->item_id    = $item_id;
            $itemTrans->user_id    = $user_id;
            $itemTrans->total_coin = $total_exchange;
            $itemTrans->phone      = $phone;
            $itemTrans->address    = $address;
            $itemTrans->total_item = $qty;
            $itemTrans->status     = 2;
            $itemTrans->save();

            //
            $user = User::find($user_id);
            $user->score = $user->score-$total_exchange;
            $user->keys  = $user->keys+$qty;
            $user->save();

        }else{
            $phone   = $request->phone;
            $address = $request->address;

            $itemTrans = new ItemTransaction;
            $itemTrans->item_id    = $item_id;
            $itemTrans->user_id    = $user_id;
            $itemTrans->total_coin = $total_exchange;
            $itemTrans->phone      = $phone;
            $itemTrans->address    = $address;
            $itemTrans->status     = $status;
            $itemTrans->total_item = $qty;
            $itemTrans->save();

            $user = User::find($user_id);
            $user->score = $user->score-$total_exchange;
            $user->save();
        }

        return redirect()->back()->with('success', 'Buy Item Success! Check shop history!');
    }

    public function shopHistory(Request $request)
    {
        $user_id = $request->session()->get('auth_user')['id'];
        $data = ItemTransaction::with(['item'])->where('user_id', $user_id)->orderBy('id', 'DESC')->get()->all();

        return view('shop.history', compact('data'));
    }
}
