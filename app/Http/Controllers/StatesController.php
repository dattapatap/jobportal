<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class StatesController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = State::where('deleted_at',null)
                   ->with('country')
                   ->orderBy('id','desc')
                   ->get();

           return Datatables::of($data)
                  ->addIndexColumn()
                  ->addColumn('action', function($data){
                           $buttons =  '<a href="'.url("admin/states/manage/". $data->id ."") .'"class="edit btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            &nbsp;&nbsp<a href="'.url("admin/states/delete/". $data->id ."") .'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                           return $buttons;
                   })
                   ->editColumn('created_at', function ($data) {
                      return $data->created_at->format('Y-m-d h:m:s');
                   })
                   ->editColumn('country', function ($data) {
                      return $data->country->name;
                   })
                  ->rawColumns(['action'])
                  ->make(true);
       }
       return view('admin.others.states.index');
    }

    public function manageStates(Request $request, $id='')
    {
        if($id > 0){
            $arr = State::where(['id' => $id])->firstOrFail();
            $result['name'] = $arr->name;
            $result['country_id'] =$arr->country->id;
            $result['id'] =$arr->id;
        }else{
            $result['name'] = '';
            $result['country_id'] = '';
            $result['id'] = '';
        }
        $country = Country::where('deleted_at', null)->get();
        return view('admin.others.states.edit', compact('country', 'result'));
    }

    public function store(Request $request)
    {


        if($request->post('id') < 0){
            $rules = array(
                'country'       => 'required|numeric|gt:0',
                'name'=>"required|string|max:255|unique:states,name,NULL,id,deleted_at,NULL",
            );
        }else{
            $rules = array(
                'country'       => 'required|numeric|gt:0',
                'name'=>"required|string|max:255|unique:states,name,".$request->post('id').",id,deleted_at,NULL",
            );
        }

        $validator = validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();;
        }else{

            if($request->post('id')>0){
                $qc= State::find($request->post('id'));
                $msg = "State Updated Successfully";
            }else{
                $qc = new State;
                $msg = "State Saved Successfully";
            }
            $qc->country_id = $request->country;
            $qc->name = $request->name;
            $qc->save();
            $request->session()->flash('success',$msg);
            return redirect('/admin/states');
        }
    }
    public function delete($id){
       State::find($id)->delete();
       return back()->with('success', 'State deleted successfully!');
    }

}
