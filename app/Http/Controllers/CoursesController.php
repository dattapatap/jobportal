<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use \Illuminate\Support\Str;

class CoursesController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Courses::where('deleted_at',null)
                   ->with('education')
                   ->orderBy('id','desc')
                   ->get();
           return DataTables::of($data)
                  ->addIndexColumn()
                  ->addColumn('action', function($data){
                           $buttons =  '<a href="'.url("admin/courses/manage/". $data->id ."") .'"class="edit btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            &nbsp;&nbsp<a href="'.url("admin/courses/delete/". $data->id ."") .'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                           return $buttons;
                   })
                   ->editColumn('created_at', function ($data) {
                      return $data->created_at->format('Y-m-d h:m:s');
                   })
                   ->editColumn('education', function ($data) {
                      return $data->education->name;
                   })
                  ->rawColumns(['action'])
                  ->make(true);
       }
       return view('admin.others.courses.index');
    }

    public function manageCourses(Request $request, $id='')
    {
        if($id > 0){
            $arr = Courses::where(['id' => $id])->firstOrFail();
            $result['name'] = $arr->name;
            $result['edu_id'] =$arr->edu_id;
            $result['id'] =$arr->id;
        }else{
            $result['name'] = '';
            $result['edu_id'] = '';
            $result['id'] = '';
        }
        $education = Education::where('deleted_at', null)->get();
        return view('admin.others.courses.edit', compact('education', 'result'));
    }

    public function store(Request $request)
    {
        if($request->post('id') < 0){
            $rules = array(
                'education'       => 'required|numeric|gt:0',
                'name'=>"required|string|max:255|unique:courses,name,NULL,id,deleted_at,NULL",
            );
        }else{
            $rules = array(
                'education'       => 'required|numeric|gt:0',
                'name'=>"required|string|max:255|unique:courses,name,".$request->post('id').",id,deleted_at,NULL",
            );
        }

        $validator = validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();;
        }else{

            if($request->post('id')>0){
                $qc= Courses::find($request->post('id'));
                $msg = "Courses Updated Successfully";
            }else{
                $qc = new Courses;
                $msg = "Course Saved Successfully";
            }
            $qc->edu_id = $request->post('education');
            $qc->name = Str::upper($request->post('name'));
            $qc->save();
            $request->session()->flash('success',$msg);
            return redirect('/admin/courses');
        }
    }
    public function delete($id){
       Courses::find($id)->delete();
       return back()->with('success', 'Course deleted successfully!');
    }

    public function getAllByEducation(Request $request){
        $courses = Courses::where('edu_id', $request->post('edu'))
                            ->where('deleted_at',null)->get();

        return response()->json(['status'=>true, 'data' => $courses]);
    }


}
