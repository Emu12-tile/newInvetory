<?php

namespace App\Http\Controllers;

use App\Models\Req;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Request as ModelsRequest;

class RequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $status = DB::table('statuses')->get();
        $req = Req::orderBy('stock_name', 'ASC')
            ->paginate(5);
        // ->pluck('product_name', 'id');
        return view('request.request', compact('req', 'status'));
    }

    public function create()
    {
        // Auth::user()->assignRole('admin');
        // Auth::user()->assignRole('head');
        // Auth::user()->assignRole('user');

        // $status = DB::table('statuses')->get();
        // $user = DB::table('users')->get();
        // $stock = DB::table('stocks')->get();

        // return view('request.create', compact('user', 'stock', 'status'));
    }
    public function store(Request $request)
    {
        dd($request->all());

        $req = new Req;

        $req->user_id = auth()->user()->id;
        //   $req->department_id=auth()->user()->('head');
        $req->stock_name->$request->stock_name;
        $req->count = $request->count;

        $req->department_id->$request->head;
        $req->dept_status = $request->dept_status;


        $req->store_status = $request->store_status;

        $req->save();
        // $this->validate($request, [
        //     'user-id'     => 'required',
        //     'stock_name'    => 'required',
        //     'count'            => 'required',
        //     'department_id'        => 'required',
        //     'dept_status'            => 'required',
        //     'store_status'        => 'required'
        // ]);

        // Req::create($request->all());

        return redirect('request')->with('status', 'about added successfully');
    }
    public function edit($id)
    {
        $status = DB::table('statuses')->get();
        $user = DB::table('users')->get();
        $stock = DB::table('stocks')->get();
        $req = Req::find($id);
        return view('request.edit', compact('user', 'stock', 'req', 'status'));
    }
    public function update(Request $request, $id)
    {


        // $this->validate($request, [
        //     'name'     => 'required',

        //     'category_id'    => ' required',
        //     'description' => 'required'

        // ]);
        $req = Req::find($id);

        $req->user_name = $request->Input('user_name');
        $req->stock_name = $request->Input('stock_name');
        $req->count = $request->Input('count');
        $req->head = $request->Input('head');
        $req->dept_status = $request->Input('dept_status');
        $req->store_manager = $request->Input('store_manager');
        // $req->description = $request->Input('description');
        $req->store_status = $request->Input('store_status');
        $req->update();


        return redirect('request')->with('status', 'product updated successfully');
    }
    public function destroy($id)
    {
        $req = Req::find($id);


        $req->delete();
        return redirect('request')->with('status', 'about  deleted successfully');
    }
    public function search()
    {
        $search_text = $_GET['query'];
        $req = Req::where('name',  'LIKE', '%' . $search_text . '%')->get();

        return view('request.request', compact('req'));
    }

    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {
            $item = Req::find($request->item);

            if ($item) {
                $item->dept_status = $request->status;
                // $item->store_status = $request->status;
                $item->update();

                return response()->json(array("success" => true));
            }
        }
    }
    public function chanStatus(Request $request)
    {
        if ($request->ajax()) {
            $item = Req::find($request->item);

            if ($item) {
                // $item->dept_status = $request->status;
                $item->store_status = $request->status;
                $item->update();

                return response()->json(array("success" => true));
            }
        }
    }
}
