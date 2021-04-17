<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\Country;
use Barryvdh\Debugbar\DataCollector\ModelsCollector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AuditController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Audit::where('deleted_at', null)
                    ->with('countries')
                    ->orderBy('id','desc')
                    ->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                            $buttons =  '<div style="display:flex;">
                                            <a href="'.route("admin.audit.edit", $data->id ) .'"class="edit btn btn-warning btn-sm m-1">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="'.route('admin.audit.destroy', $data->id) .'" method="POST">
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
                    ->editColumn('country', function ($data) {
                        return $data->countries->name;
                    })
                    ->rawColumns(['action','country'])
                    ->make(true);
        }
        return view('admin.others.audit.index');
    }


    public function create()
    {
        $countries = Country::where('deleted_at', null)
                            ->get();
        return view('admin.others.audit.create', compact('countries'));
    }


    public function store(Request $request)
    {

        $rules = array(
            'country' => 'required|numeric',
            'name' => 'required|string|unique:audits,authority,NULL,id,deleted_at,NULL,country,'.$request->post('country')
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $ctr = new Audit();
            $ctr->country = $request->post('country');
            $ctr->authority = $request->post('name');
            $ctr->save();
            return redirect()->route('admin.audit.index')->with('success', 'Audit Added successfully');
        }
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $audit = Audit::findOrFail($id);
        $countries = Country::where('deleted_at', null)
                            ->get();
        return view('admin.others.audit.edit', compact('countries', 'audit'));
    }


    public function update(Request $request, $id)
    {
        $audit = Audit::findOrFail($id);
        $rules = array(
            'country' => "required|numeric",
            'name' => 'required|string|unique:audits,authority,'.$id.',id,deleted_at,NULL,country,'.$request->post('country')
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $audit->country = $request->post('country');
            $audit->authority = $request->post('name');
            $audit->save();
            return redirect()->route('admin.audit.index')->with('success', 'Audit Updated successfully');
        }
    }

    public function destroy($id)
    {
        $audit = Audit::find($id);
        $audit->delete();
        return redirect()->route('admin.audit.index')->with('success', 'Audit deleted successfully');
    }
}
