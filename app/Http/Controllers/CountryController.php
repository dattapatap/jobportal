<?php

namespace App\Http\Controllers;

use App\Models\Country as ModelsCountry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CountryController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ModelsCountry::where('deleted_at', null)
                    ->orderBy('id','desc')
                    ->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                            $buttons =  '<div style="display:flex;">
                                            <a href="'.route("admin.country.edit", $data->id ) .'"class="edit btn btn-warning btn-sm m-1">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="'.route('admin.country.destroy', $data->id) .'" method="POST">
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
        return view('admin.others.country.index');
    }


    public function create()
    {
        return view('admin.others.country.create');
    }


    public function store(Request $request)
    {

        $rules = array(
            'country_name' => 'required|string|unique:countries,name,NULL,id,deleted_at,NULL'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $ctr = new ModelsCountry();
            $ctr->name = $request->post('country_name');
            $ctr->save();
            return redirect()->route('admin.country.index')->with('success', 'Country Added successfully');
        }
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $country = ModelsCountry::findOrFail($id);
        return view('admin.others.country.edit', compact('country'));
    }


    public function update(Request $request, $id)
    {
        $country = ModelsCountry::findOrFail($id);

        $rules = array(
            'country_name' => "required|string|unique:countries,name,".$id.",id,deleted_at,NULL",
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $country->name = $request->post('country_name');
            $country->save();
            return redirect()->route('admin.country.index')->with('success', 'Country Updated successfully');
        }
    }

    public function destroy($id)
    {
        $testSlots = ModelsCountry::find($id);
        $testSlots->delete();
        return redirect()->route('admin.country.index')->with('success', 'Country deleted successfully');
    }
}
