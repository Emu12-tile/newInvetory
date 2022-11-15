<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {

        $product = Product::paginate(8);
        return view('products.product', compact('product'));
    }
    public function create()
    {
        $category = DB::table('categories')->get();
        return view('products.create', compact('category'));
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'name'     => 'required',

            'category_name' => 'required',
            'description' => 'required'
        ]);

        Product::create($request->all());


        return redirect('product')->with('status', 'about added successfully');
    }
    public function edit($id)
    {
        $category = DB::table('categories')->get();
        $product = Product::find($id);
        return view('products.edit', compact('product', 'category'));
    }
    public function update(Request $request, $id)
    {




        $product = Product::find($id);
        $product->name = $request->Input('name');
        $product->category_name = $request->Input('category_name');
        $product->description = $request->Input('description');
        $product->update();


        return redirect('product')->with('status', 'product updated successfully');
    }
    public function destroy($id)
    {
        $product = Product::find($id);


        $product->delete();
        return redirect('product')->with('status', 'about  deleted successfully');
    }
    public function search()
    {
        $search_text = $_GET['query'];
        $product = Product::where('name',  'LIKE', '%' . $search_text . '%')->get();
        // $cat = Product::where('category_name',  'LIKE', '%' . $search_text . '%')->get();
        return view('products.product', compact('product'));
    }
}
