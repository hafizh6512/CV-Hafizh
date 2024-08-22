<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Book;
use App\Models\Challenge;
use App\Models\ChallengeProgressHistory;
use App\Models\ExclusiveBookUser;
use App\Models\ReadHistory;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $data = Book::with(['category'])->get()->all();
        return view('book.index', compact('data'));
    }

    public function create()
    {
        $category = Category::orderBy('category', 'ASC')->get();
        return view('book.create', compact('category'));
    }

    public function store(Request $request)
    {
        // Upload image
        $cover = '';
        if($request->file('cover')){
            $file     = $request->file('cover');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('assets/cover'), $filename);
            $cover = $filename;
        }

        // Upload book
        $book = '';
        if($request->file('file')){
            $file     = $request->file('file');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('assets/book'), $filename);
            $book = $filename;
        }

        $is_exclusive = 0;
        if ($request->is_exclusive != null) {
            $is_exclusive = 1;
        }
        
        $data = new Book;
        $data->title        = $request->title;
        $data->description  = $request->description;
        $data->category_id  = $request->category;
        $data->is_exclusive = $is_exclusive;
        $data->file         = $book;
        $data->image        = $cover;
        $data->save();

        return redirect('/book')->with('success','Add data success!');
    }

    public function show($id)
    {
        $data     = Book::find($id);
        $category = Category::orderBy('category', 'ASC')->get();
        return view('book.edit',compact('data', 'category'));
    }

    public function update(Request $request, $id)
    {
        // debugCode($request->all());
        // Upload image
        $cover = '';
        if($request->file('cover')){
            $file     = $request->file('cover');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('assets/cover'), $filename);
            $cover = $filename;
        }

        // Upload book
        $book = '';
        if($request->file('file')){
            $file     = $request->file('file');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('assets/book'), $filename);
            $book = $filename;
        }

        $is_exclusive = 0;
        if ($request->is_exclusive != null) {
            $is_exclusive = 1;
        }

        $data = Book::find($id);
        $data->title        = $request->title;
        $data->description  = $request->description;
        $data->category_id  = $request->category;
        $data->is_exclusive = $is_exclusive;
        $data->file         = ($book!='')?$book:$data->file;
        $data->image        = ($cover!='')?$cover:$data->image;
        $data->save();

        return redirect('/book')->with('success','Update data success!');
    }

    public function destroy($id)
    {
        Book::find($id)->delete();
        return redirect('/book')->with('success','Delete data success!');
    }

    /*
    * ================================
    */

    public function listBook(Request $request)
    {
        $category = Category::orderBy('category', 'ASC')->get()->all();

        $selected_category = $request->category;
        $search_text       = $request->search;
        $book = Book::query();
        if ($selected_category != '' and $selected_category != 'all') {
            $book = $book->where('category_id', $selected_category);
        }

        if ($search_text!='') {
            $book = $book->where('title', 'like', '%'.$search_text.'%');
        }
        $book = $book->get()->all();
        foreach ($book as $key => $value) {
            $star = Review::where('book_id', $value->id)->avg('star');
            $html_star = html_star($star);
            $book[$key]['html_star'] = $html_star;
        }
        return view('book.listBook', compact('category', 'selected_category', 'book', 'search_text'));
    }

    public function detailBook(Request $request, $id)
    {
        $user_id = $request->session()->get('auth_user')['id'];
        $book    = Book::find($id);
        $star    = Review::where('book_id', $id)->avg('star');
        $history = ReadHistory::where('user_id', $user_id)->where('book_id', $book->id)->orderBy('minutes_milestone', 'DESC')->first(); // Check max read history

        $minutes_milestone = (!empty($history))?$history->minutes_milestone:0;

        $html_star         = html_star($star);
        $book['star']      = (!empty($star))?$star:'0';
        $book['html_star'] = $html_star;

        // Check comment by user
        $userComment = Review::where('book_id', $id)->where('user_id', $user_id)->first();


        $review = Review::where('book_id', $id)->with(['user'])->get()->all();
        foreach ($review as $key => $value) {
            $review[$key]['html_star'] = html_star($value->star);
        }
        return view('book.detail', compact('book', 'review', 'userComment', 'minutes_milestone'));
    }

    public function readBook(Request $request, $id)
    {
        $user_id = $request->session()->get('auth_user')['id'];
        $book    = Book::find($id);
        return view('book.readBook', compact('book'));
    }

    public function earnPointRead(Request $request, $id)
    {
        $user_id = $request->session()->get('auth_user')['id'];

        // Check challenge
        $now = date('Y-m-d');
        $challenge = Challenge::where('type', 'read')
            ->where('start_date', '<=',$now)
            ->where('end_date', '>=', $now)
            
            ->first();
        $is_complete_challenge = 0;

        // Get user history for reading this book
        $nhistory = ReadHistory::where('book_id', $id)
            ->where('user_id', $user_id)
            ->orderBy('id', 'DESC')
            ->first();

        $user_data    = User::where('id', $user_id)->first();
        $user_point   = $user_data->points;
        $user_score   = $user_data->score;
        $point_change = $user_point;
        $coin_change  = $user_score;

        if (empty($nhistory)) {
            // If history empty insert user read history
            $nhistory = new ReadHistory;
            $nhistory->book_id           = $id;
            $nhistory->user_id           = $user_id;
            $nhistory->minutes_milestone = $request->minutes;
            $nhistory->save();

            if (!empty($challenge)) {
                $uhistory = ReadHistory::find($nhistory->id);
                $uhistory->challenge_id = $challenge->id;
                $uhistory->save();

                $checkTotalChallengeRead = ReadHistory::where('challenge_id', $challenge->id)
                    ->where('user_id', $user_id)
                    ->count();

                if ($challenge->total_book == $checkTotalChallengeRead) {
                    $user_point = addPointDefaultUser($user_id, 'read', $request->minutes, $challenge->point_reward);
                    $is_complete_challenge = 1;
                    $point_change          = $user_point-$point_change;
                }else{
                    $user_point   = addPointDefaultUser($user_id, 'read', $request->minutes);
                    $point_change = $user_point-$point_change;
                }
            }else{
                $user_point   = addPointDefaultUser($user_id, 'read', $request->minutes);
                $point_change = $user_point-$point_change;
            }
        }else{
            $now       = date('Y-m-d');
            $last_read = date('Y-m-d',strtotime($nhistory->created_at));
            // debugCode([$now,$last_read]);

            // Check if last read today or not
            if ($last_read != $now) {
                $nhistory = new ReadHistory;
                $nhistory->book_id           = $id;
                $nhistory->user_id           = $user_id;
                $nhistory->minutes_milestone = $request->minutes;
                $nhistory->save();

                if (!empty($challenge)) {
                    $uhistory = ReadHistory::find($nhistory->id);
                    $uhistory->challenge_id = $challenge->id;
                    $uhistory->save();

                    $checkTotalChallengeRead = ReadHistory::where('challenge_id', $challenge->id)
                        ->where('user_id', $user_id)
                        ->count();

                    if ($challenge->total_book == $checkTotalChallengeRead) {
                        $user_point = addPointDefaultUser($user_id, 'read', $request->minutes, $challenge->point_reward);
                        $is_complete_challenge = 1;
                        $point_change          = $user_point-$point_change;
                    }else{
                        $user_point   = addPointDefaultUser($user_id, 'read', $request->minutes);
                        $point_change = $user_point-$point_change;
                    }
                }else{
                    $user_point   = addPointDefaultUser($user_id, 'read', $request->minutes);
                    $point_change = $user_point-$point_change;
                }
            }else{
                if ($nhistory->minutes_milestone < $request->minutes) {
                    $nhistory->book_id           = $id;
                    $nhistory->user_id           = $user_id;
                    $nhistory->minutes_milestone = $request->minutes;
                    $nhistory->save();


                    if (!empty($challenge)) {
                        $uhistory = ReadHistory::find($nhistory->id);
                        $uhistory->challenge_id = $challenge->id;
                        $uhistory->save();

                        $checkTotalChallengeRead = ReadHistory::where('challenge_id', $challenge->id)
                            ->where('user_id', $user_id)
                            ->count();

                        if ($challenge->total_book == $checkTotalChallengeRead) {
                            $user_point = addPointDefaultUser($user_id, 'read', $request->minutes, $challenge->point_reward);
                            $is_complete_challenge = 1;
                            $point_change          = $user_point-$point_change;
                        }else{
                            $user_point   = addPointDefaultUser($user_id, 'read', $request->minutes);
                            $point_change = $user_point-$point_change;
                        }
                    }else{
                        $user_point   = addPointDefaultUser($user_id, 'read', $request->minutes);
                        $point_change = $user_point-$point_change;
                    }
                }
            }
        }

        $coin_change  = getUserScore($user_id)-$coin_change;

        return response()->json(['Success'=> True, 'Point'=>$user_point, 'is_complete_challenge'=>$is_complete_challenge, 'point_change'=>$point_change, 
            'coin_change' => $coin_change, 'user_score' => getUserScore($user_id)]);
    }

    public function unlockBook(Request $request, $book_id)
    {
        $user_id = $request->session()->get('auth_user')['id'];

        $user_keys = getUserKey($user_id);
        if ($user_keys < 1) {
            return redirect()->back()->with('error', 'You don\'t have enough keys to unlock this book!');
        }

        // Check if already open this book for human error
        $check = ExclusiveBookUser::where('user_id', $user_id)
            ->where('book_id', $book_id)->first();

        if (!empty($check)) {
            return redirect()->back()->with('error', 'You already unlock this book!');
        }

        // Add exclusive bok to user collection
        $exs = new ExclusiveBookUser;
        $exs->book_id = $book_id;
        $exs->user_id = $user_id;
        $exs->save();

        // Update user key
        $user = User::find($user_id);
        $user->keys = $user->keys-1;
        $user->save();

        return redirect()->back()->with('success', 'Redeem exclusive book success!');
    }
}
