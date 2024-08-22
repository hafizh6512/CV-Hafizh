<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::get()->all();
        return view('category.index', compact('data'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {

        $data = new Category;
        $data->category = $request->category;
        $data->save();

        return redirect('/category')->with('success','Add data success!');
    }

    public function show($id)
    {
        $data = Category::find($id);
        return view('category.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Category::find($id);
        $data->category = $request->category;
        $data->save();

        return redirect('/category')->with('success','Update data success!');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect('/category')->with('success','Delete data success!');
    }
}
