<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {

        $stock = Stock::paginate(6);
        return view('stock.stock', compact('stock'));
    }


    public function create()
    {
        $product = DB::table('products')->get();
        $brand = DB::table('brands')->get();

        return view('stock.create', compact('product', 'brand'));
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $stock = new Stock;
        $stock->product_name = $request->product_name;
        $stock->count = $request->count;
        $stock->brand_name = $request->brand_name;
        $stock->specification = $request->specification;
        $stock->brand_name = $request->brand_name;
        // $this->validate($request, [
        //     'product_name'     => 'required',

        //     'count' => 'required',
        //     'brand_name' => 'required',
        //     'specification' => 'required',
        //     'description' => 'required'
        // ]);
        $stock->user_id = auth()->user()->id;
        $stock->description = $request->description;
        $stock->save();



        return redirect('stock')->with('status', 'about added successfully');
    }
    public function edit($id)
    {
        $product = DB::table('products')->get();
        $brand = DB::table('brands')->get();
        $stock = Stock::find($id);
        return view('stock.edit', compact('product', 'brand', 'stock'));
    }
    public function update(Request $request, $id)
    {


        // $this->validate($request, [
        //     'name'     => 'required',

        //     'category_id'    => ' required',
        //     'description' => 'required'

        // ]);
        $stock = Stock::find($id);
        $stock->product_name = $request->Input('product_name');
        $stock->count = $request->Input('count');
        $stock->brand_name = $request->Input('brand_name');
        $stock->specification = $request->Input('specification');
        $stock->brand_name = $request->Input('brand_name');
        $stock->description = $request->Input('description');
        $stock->update();


        return redirect('stock')->with('status', 'product updated successfully');
    }
    public function destroy($id)
    {
        $stock = Stock::find($id);


        $stock->delete();
        return redirect('stock')->with('status', 'about  deleted successfully');
    }
}
