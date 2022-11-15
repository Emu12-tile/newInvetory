<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $brand = Brand::paginate(6);
        return view('brand.brand', compact('brand'));
    }
    public function create()
    {
        return view('brand.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',

        ]);
        Brand::create($request->all());
        // $category->name = $request->Input('name');
        // $category->save();
        // $listing->profile_image=$request->Input('profile_image');
        // return view('listing.create');
        return redirect('brand')->with('status', 'category added successfully');
    }
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('brand.edit', compact('brand'));
    }
    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);


        $brand->name = $request->Input('name');
        $brand->update();
        // $listing->profile_image=$request->Input('profile_image');
        // return view('listing.create');
        return redirect('brand')->with('status', 'employee updated successfully');
    }
    public function destroy($id)
    {
        $brand = Brand::find($id);


        $brand->delete();
        return redirect('brand')->with('status', 'category  deleted successfully');
    }
}
