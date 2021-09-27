<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogs()
    {
       $blogs = Blog::where('status', 'Active')->with('user')->orderBy('id','desc')->paginate(10);
       return view('blogs', compact('blogs'));
    }

    public function blogView(Request $request, $id){
        $blog = Blog::where('id', $id)->with('user')->first();
        if($blog){
            $relBlogs = Blog::where('blog_type', $blog->blog_type)->where('id', '!=', $blog->id )->orderBy('id', 'DESC')->limit(7)->get();
            return view('blog-details', compact('blog','relBlogs'));
        }else{
            abort(404,'Blog Not Found');
        }
    }


    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Blog::where('deleted_at', null)
                    ->orderBy('id','desc')
                    ->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $buttons =  '<div style="display:flex;"> <a href="'.route("admin.blogs.edit", $data->id ) .'"class="edit btn btn-warning btn-sm m-1"><i class="fa fa-edit"></i></a>';
                        $checkedStatus = ($data->status == "Active") ? 'checked':'';
                        $buttons .= '<div class="bt-switch ml-2" style="margin-top: 5px;"  data-toggle="tooltip" data-placement="bottom" title="User Status" ><input type="checkbox" '.$checkedStatus.' id="'.$data->id.'" data-on-color="warning" data-off-color="danger" data-on-text="Active" data-off-text="InActive" class="blog_status"></div> </div>';
                        return $buttons;
                    })
                    ->editColumn('created_at', function ($data) {
                        return $data->created_at->format('Y-m-d h:m:s');
                    })
                    ->editColumn('image', function ($data) {
                        $url = asset('storage/images/blogs/'.$data->image);
                        return '<img src="'.$url.'" border="0" width="100" class="img-rounded" align="center" />';
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);
        }
        return view('admin.blogs.index');
    }

    public function create()
    {
        return view('admin.blogs.create');
    }
    public function store(Request $request)
    {
            $validated = $request->validate([
                'header' => 'required|string',
                'type' => 'required|string|max:15',
                'blog_content' => 'required|string',
                'blogimage' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            ]);
            if ($files = $request->file('blogimage')) {

                $file = $request->file('blogimage');
                $filename = $file->getClientOriginalName();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(500, 334);

                if (!file_exists(public_path().'/storage/images/blogs')) {
                    mkdir(public_path().'/storage/images/blogs', 666, true);
                }
                $image_resize->save(public_path().'/storage/images/blogs/image-'.time().'_'.$filename);

                $blogs = new Blog();
                $blogs->header = $request->header;
                $blogs->blog_type = $request->type;
                $blogs->content = $request->blog_content;
                $blogs->status = "Active";
                $blogs->created_by = Auth::user()->id;
                $blogs->image = 'image-'.time().'_'.$filename;

                $blogs->save();
                return response()->json(['success' => 'Your Blog has been successfully Created']);
            }else{
                return response()->json(['error' => 'Please Upload Blog Image']);
            }
    }

    // public function show($id)
    // {
    //     //
    // }

    public function edit($id)
    {
        $blogs = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blogs'));
    }

    public function update(Request $request, $id)
    {
        if($files = $request->file('blogimage'))
            $image = 'mimes:jpeg,jpg,png,gif|required|max:10000';
        else
            $image = '';

        $validated = $request->validate([
            'header' => 'required|string',
            'type' => 'required|string|max:15',
            'blog_content' => 'required|string',
            'blogimage' => $image,
        ]);

        $preBlog = Blog::find($id);

        if ($files = $request->file('blogimage')) {

            if (!file_exists(public_path().'/storage/images/blogs')) {
                  mkdir(public_path().'/storage/images/blogs', 666, true);
            }

            if($preBlog->image){
                Storage::delete('/public/images/blogs/'.$preBlog->image);
            }
            $file = $request->file('blogimage');
            $filename = $file->getClientOriginalName();
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(500, 334);
            $image_resize->save(public_path().'/storage/images/blogs/image-'.time().'_'.$filename);
            $preBlog->image = 'image-'.time().'_'.$filename;
        }
        $preBlog->header = $request->header;
        $preBlog->blog_type = $request->type;
        $preBlog->content = $request->blog_content;
        $preBlog->save();

        $request->session()->flash('success',"Blog Updated");
        return redirect('/admin/blogs');
    }

    public function destroy($id)
    {
    }

    public function changeStatus(Request $request){
        $blg = Blog::find($request->id);
        $blg->status = $request->status;
        $blg->save();
        return response()->json(['success'=>true,'message'=>'Status Changed Successfully']);
    }

}
