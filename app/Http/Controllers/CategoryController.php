<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $category = Category::paginate(6);
        return view('categories.category', compact('category'));
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',

        ]);
        Category::create($request->all());
        // $category->name = $request->Input('name');
        // $category->save();
        // $listing->profile_image=$request->Input('profile_image');
        // return view('listing.create');
        return redirect('category')->with('status', 'category added successfully');
    }
    public function edit($id)
    {
        $category = category::find($id);
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);


        $category->name = $request->Input('name');
        $category->update();
        // $listing->profile_image=$request->Input('profile_image');
        // return view('listing.create');
        return redirect('category')->with('status', 'employee updated successfully');
    }
    public function destroy($id)
    {
        $category = Category::find($id);


        $category->delete();
        return redirect('category')->with('status', 'category  deleted successfully');
    }
}
