<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\CourseSpecifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CourseSpecificationsController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = CourseSpecifications::where('deleted_at',null)
                   ->with('courses')
                   ->orderBy('id','desc')
                   ->get();
           return DataTables::of($data)
                  ->addIndexColumn()
                  ->addColumn('action', function($data){
                           $buttons =  '<a href="'.url("admin/course/specifications/manage/". $data->id ."") .'"class="edit btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            &nbsp;&nbsp<a href="'.url("admin/courses/specifications/delete/". $data->id ."") .'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                           return $buttons;
                   })
                   ->editColumn('created_at', function ($data) {
                      return $data->created_at->format('Y-m-d h:m:s');
                   })
                   ->editColumn('courses', function ($data) {
                      return $data->courses->name;
                   })
                  ->rawColumns(['action'])
                  ->make(true);
       }
       return view('admin.others.cours_spec.index');
    }

    public function manageSpecification(Request $request, $id='')
    {
        if($id > 0){
            $arr = CourseSpecifications::where(['id' => $id])->firstOrFail();
            $result['name'] = $arr->name;
            $result['course_id'] =$arr->course_id;
            $result['id'] =$arr->id;
        }else{
            $result['name'] = '';
            $result['course_id'] = '';
            $result['id'] = '';
        }
        $courses = Courses::where('deleted_at', null)->get();
        return view('admin.others.cours_spec.edit', compact('courses', 'result'));
    }

    public function store(Request $request)
    {
        $rules = array(
             'course'       => 'required|numeric|gt:0',
             'name'=>"required|string|max:255",
        );     
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{

            if($request->post('id')>0){
                $qc= CourseSpecifications::find($request->post('id'));
                $msg = "Specification Updated Successfully";
            }else{
                $qc = new CourseSpecifications;
                $msg = "Specification Saved Successfully";
            }
            $qc->course_id = $request->post('course');
            $qc->name = $request->post('name');
            $qc->save();  
            $request->session()->flash('success',$msg);   
            return redirect('/admin/course/specifications');         
        }
    }
    public function delete($id){
       CourseSpecifications::find($id)->delete();
       return back()->with('success', 'Specification deleted successfully!');
    }


    public function getAllBySpecifications(Request $request){
        $spec = CourseSpecifications::where('course_id', $request->post('course'))
                                    ->where('deleted_at',null)->get();
        return response()->json(['status'=>true, 'data' => $spec]);
    }

    

}
