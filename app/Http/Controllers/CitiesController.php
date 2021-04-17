<?php
namespace App\Http\Controllers;
use App\Models\City;
use App\Models\State;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;


class CitiesController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = City::where('deleted_at',null)
                   ->with('states')
                   ->orderBy('id','desc')
                   ->get();

           return Datatables::of($data)
                  ->addIndexColumn()
                  ->addColumn('action', function($data){
                           $buttons =  '<a href="'.url("admin/cities/manage/". $data->id ."") .'"class="edit btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            &nbsp;&nbsp<a href="'.url("admin/cities/delete/". $data->id ."") .'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                           return $buttons;
                   })
                   ->editColumn('created_at', function ($data) {
                      return $data->created_at->format('Y-m-d h:m:s');
                   })
                   ->editColumn('state', function ($data) {
                      return $data->states->name;
                   })
                  ->rawColumns(['action'])
                  ->make(true);
       }
       return view('admin.others.city.index');
    }

    public function manageCity(Request $request, $id='')
    {
        if($id > 0){
            $arr = City::where(['id' => $id])->firstOrFail();
            $result['name'] = $arr->name;
            $result['state_id'] =$arr->states->id;
            $result['id'] =$arr->id;
        }else{
            $result['name'] = '';
            $result['state_id'] = '';
            $result['id'] = '';
        }
        $state = State::where('deleted_at', null)->get();
        return view('admin.others.city.edit', compact('state', 'result'));
    }

    public function store(Request $request)
    {


        if($request->post('id') < 0){
            $rules = array(
                'state'       => 'required|numeric|gt:0',
                'name'=>"required|string|max:255|unique:cities,name,NULL,id,deleted_at,NULL",
            );
        }else{
            $rules = array(
                'state'       => 'required|numeric|gt:0',
                'name'=>"required|string|max:255|unique:cities,name,".$request->post('id').",id,deleted_at,NULL",
            );
        }
        $validator = validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();;
        }else{

            if($request->post('id')>0){
                $qc= City::find($request->post('id'));
                $msg = "City Updated Successfully";
            }else{
                $qc = new City;
                $msg = "City Saved Successfully";
            }
            $qc->state_id = $request->state;
            $qc->name = $request->name;
            $qc->save();
            $request->session()->flash('success',$msg);
            return redirect('/admin/cities');
        }
    }


    public function delete($id){
       City::find($id)->delete();
       return back()->with('success', 'City deleted successfully!');
    }

}
