<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class OrganisationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Organisation::where('deleted_at', null)
                    ->orderBy('id','desc')
                    ->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                            $buttons =  '<div style="display:flex;">
                                            <a href="'.route("admin.organisation.edit", $data->id ) .'"class="edit btn btn-warning btn-sm m-1">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="'.route('admin.organisation.destroy', $data->id) .'" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                                    <button class="btn btn-sm btn-danger m-1 delete-confirm"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>';
                            return $buttons;
                    })
                    ->editColumn('created_at', function ($data) {
                        return $data->created_at->format('Y-m-d h:m:s');
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.others.organisation.index');
    }


    public function create()
    {
        return view('admin.others.organisation.create');
    }


    public function store(Request $request)
    {

        $rules = array(
            'name' => 'required|string|unique:organisations,name,NULL,id,deleted_at,NULL'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $ctr = new Organisation();
            $ctr->name = $request->post('name');
            $ctr->save();
            return redirect()->route('admin.organisation.index')->with('success', 'Organisation Added successfully');
        }
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $organisation = Organisation::findOrFail($id);
        return view('admin.others.organisation.edit', compact('organisation'));
    }


    public function update(Request $request, $id)
    {
        $organisation = Organisation::findOrFail($id);

        $rules = array(
            'name' => "required|string|unique:organisations,name,".$id.",id,deleted_at,NULL",
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $organisation->name = $request->post('name');
            $organisation->save();
            return redirect()->route('admin.organisation.index')->with('success', 'Organisation Updated successfully');
        }
    }

    public function destroy($id)
    {
        $organisation = Organisation::find($id);
        $organisation->delete();
        return redirect()->route('admin.organisation.index')->with('success', 'Organisation deleted successfully');
    }
}
