<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {

        $dept = Department::paginate(15);
        return view('department.department', compact('dept'));
    }
    public function create()
    {
        $user = DB::table('users')->get();
        return view('department.create', compact('user'));
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'name'     => 'required',

            'head' => 'required',

        ]);

        Department::create($request->all());


        return redirect('department')->with('status', 'about added successfully');
    }
    public function edit($id)
    {
        $user = DB::table('users')->get();
        $dept = Department::find($id);
        return view('department.edit', compact('user', 'dept'));
    }
    public function update(Request $request, $id)
    {




        $dept = Department::find($id);
        $dept->name = $request->Input('name');
        $dept->head = $request->Input('head');

        $dept->update();


        return redirect('department')->with('status', 'product updated successfully');
    }
    public function destroy($id)
    {
        $dept = Department::find($id);


        $dept->delete();
        return redirect('department')->with('status', 'about  deleted successfully');
    }
}
