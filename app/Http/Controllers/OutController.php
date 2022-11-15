<?php

namespace App\Http\Controllers;

use App\Models\Out;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {

        $stock_out = Out::paginate(5);
        return view('stock_out.stock_out', compact('stock_out'));
    }
    public function create()
    {
        $req = DB::table('reqs')->get();
        return view('stock_out.create', compact('req'));
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'request_name'     => 'required',

            'count' => 'required',
            'model' => 'required',
            'serial' => 'required'
        ]);

        Out::create($request->all());


        return redirect('stock_out')->with('status', 'about added successfully');
    }
    public function edit($id)
    {
        $req = DB::table('reqs')->get();
        $stock_out = Out::find($id);
        return view('stock_out.edit', compact('req', 'stock_out'));
    }
    public function update(Request $request, $id)
    {




        $stock_out = Out::find($id);
        $stock_out->request_name = $request->Input('request_name');
        $stock_out->count = $request->Input('count');
        $stock_out->model = $request->Input('model');
        $stock_out->serial = $request->Input('serial');
        $stock_out->update();


        return redirect('stock_out')->with('status', 'product updated successfully');
    }
    public function destroy($id)
    {
        $stock_out = Out::find($id);


        $stock_out->delete();
        return redirect('stock_out')->with('status', 'about  deleted successfully');
    }
    public function invoice()
    {
        $stock_out = Out::all();
        // PDF::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('stock_out.out', compact('stock_out'));
        return $pdf->download('out.pdf');
    }
}
