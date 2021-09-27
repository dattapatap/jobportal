<?php

namespace App\Http\Controllers;

use App\Models\Skills;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Skills::where('deleted_at',null)
                   ->orderBy('skills.id','desc')
                   ->get();
           return Datatables::of($data)
                  ->addIndexColumn()
                  ->addColumn('action', function($data){
                           $buttons =  '<a href="'.url("admin/skills/manage/". $data->id ."") .'"class="edit btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            &nbsp;&nbsp<a href="'.url("admin/skills/delete/". $data->id ."") .'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                           return $buttons;
                   })
                   ->editColumn('created_at', function ($data) {
                    return $data->created_at->format('Y-m-d h:m:s');
                   })
                  ->rawColumns(['action'])
                  ->make(true);
       }
       return view('admin.assessment.skills.index');
    }


    public function manageSkills(Request $request, $id='')
    {   
        if($id > 0){
            $arr = Skills::where(['id' => $id])->firstOrFail();
            $result['qc_name'] =$arr->description;
            $result['id'] =$arr->id;
        }else{

            $result['qc_name'] = '';
            $result['id'] = '';
        }
        return view('admin.assessment.skills.edit', $result);
    }


    public function store(Request $request)
    {
        if($request->post('id') < 0){
            $rules = array(
                'name'=>"required|string|max:255|unique:skills,description,NULL,id,deleted_at,NULL",
            );
        }else{
            $rules = array(
                'name'=>"required|string|max:255|unique:skills,description,".$request->post('id').",id,deleted_at,NULL",
            );
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{

            if($request->post('id')>0){
                $qc= Skills::find($request->post('id'));
                $msg = "Skill Updated Successfully";
            }else{
                $qc = new Skills;
                $msg = "Skill Saved Successfully";
            }
            $qc->description = $request->name;
            $qc->save();  
            $request->session()->flash('success',$msg);   
            return redirect('/admin/skills');         
        }
    }

    public function delete(Skills $skills)
    {                   
       $skills->delete();
       return back()->with(['success'=>"Skill Deleted Successfully"]);   
    }




}
