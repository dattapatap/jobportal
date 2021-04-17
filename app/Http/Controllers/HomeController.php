<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\City;
use App\Models\Employee\EmpJobApplied;
use App\Models\Employee\EmpJobSaved;
use App\Models\Industries;
use App\Models\JobPositions;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void\
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $inds = Industries::where('deleted_at', null)->orderBy('name','ASC')->get();
        $locations = City::where('deleted_at', null)->orderBy('name','DESC')->get();
        $jobs = Jobs::where('deleted_at', null)->where('status', TRUE)->limit(6)->orderBy('created_at', 'DESC')->get();
        $blogs = Blog::where('status', 'Active')->with('user')->orderBy('id','desc')->get();
        return view('index', compact('inds', 'locations', 'jobs', 'blogs'));
    }

    public function alljobs(Request $request){
        $jobs = Jobs::where('deleted_at', NULL)->where('status',TRUE)->orderBy('id','DESC')->paginate(15);
        $industry = Industries::where('deleted_at', null)->orderBy('name', 'ASC')->get();
        $locations = City::where('deleted_at', null)->orderBy('name', 'DESC')->get();
        return view('jobs', compact('jobs', 'industry', 'locations'));

    }


    public function jobSearch(Request $request){
        $jobs = Jobs::Join('job_positions', 'job_positions.id','=', 'jobs.job_role')
                    ->where(function($query) use($request){

                    $searchKey = $request->search_key;
                    $search_location = $request->search_location;
                    $search_category = $request->search_category;

                    $query-> Where('jobs.job_title','like', '%' . $searchKey . '%');
                    $query-> orWhere('job_positions.name','like', '%' . $searchKey . '%');

                    if($search_location > 0)
                        $query->where('jobs.job_location','like', '%' . $search_location . '%');

                    if($search_category > 0)
                        $query->where('jobs.job_industry','like', '%' . $search_category . '%');

        })->orderBy('jobs.id','desc')->paginate(15);

        $industry = Industries::where('deleted_at', null)->orderBy('name', 'ASC')->get();
        $locations = City::where('deleted_at', null)->orderBy('name', 'DESC')->get();
        return view('jobs', compact('jobs', 'industry', 'locations'));

    }

    public function jobView(Request $request, $id){
        $job = Jobs::findOrFail($id);
        if(isset(auth()->user()->employee)){
            $empId = auth()->user()->employee->id;
            $jobapplied = EmpJobApplied::where('emp_id', $empId)->where('job_id', $id)->first();
            $jobSaved = EmpJobSaved::where('emp_id', $empId)->where('job_id', $id)->first();

            $relatedJobs = Jobs::where('job_role',$job->job_role)
            ->orWhere('job_industry', $job->job_industry)
            ->orWhere('job_type', $job->job_type)->limit(10)->get();

            return view('job-details', compact('job', 'jobapplied','jobSaved','relatedJobs'));
        }
        $relatedJobs = Jobs::where('job_role',$job->job_role)
                        ->orWhere('job_industry', $job->job_industry)
                        ->orWhere('job_type', $job->job_type)->limit(10)->get();

        return view('job-details', compact('job', 'relatedJobs'));
    }

    public function topSearch(Request $request){
        $key = $request->top_search;
        $jobs = Jobs::Join('job_positions', 'job_positions.id','=', 'jobs.job_role')
                    ->where(function($query) use($request){
                    $query-> Where('jobs.job_title','like', '%' . $request->top_search . '%');
                    $query-> orWhere('jobs.job_type','like', '%' . $request->top_search . '%');
                    $query-> orWhere('job_positions.name','like', '%' . $request->top_search . '%');
        })->orderBy('jobs.id','desc')->paginate(15);
        $industry = Industries::where('deleted_at', null)->orderBy('name', 'ASC')->get();
        $locations = City::where('deleted_at', null)->orderBy('name', 'DESC')->get();
        return view('jobs', compact('jobs', 'industry', 'locations'));
    }

    public function filterJobsPage(Request $request){
        $category = $request->category;
        $jobs = Jobs::where(function($query) use($request){
            $min_sal = $request->has('minsalery') ? $request->has('minsalery') : null;
            $max_sal =  $request->has('maxsalery') ? $request->has('maxsalery') : $max_sal = null;

            if(isset($min_sal) && isset($max_sal)){
                $query-> Where('min_salary','>=', $request->minsalery);
                $query-> where('max_salary','<=',  $request->maxsalery);
            }

            $category = $request->has('category');
            if($category){
                $category = $request->category;
                $index = 0;
                foreach ($category as $cat) {
                    if($index==0){
                        $query->where('job_industry','=', $cat);
                    }else{
                        $query->orwhere('job_industry','=', $cat);
                    }
                    $index++;
                }
            }

            $loc = $request->has('location');
            if($loc){
                $location = $request->location;
                $index = 0;
                foreach ($location as $locat) {
                    if($index==0){
                        $query->where('job_location','=', $locat);
                    }else{
                        $query->orwhere('job_location','=', $locat);
                    }
                    $index++;
                }
            }

            $exp = $request->has('experience');
            if($exp){
                $experience = $request->experience;
                $index = 0;
                foreach ($experience as $epxr) {
                    if($index==0){
                        if($epxr == 0)
                            $query->where('min_exp','=', $epxr);
                        else
                            $query->where('min_exp','>=', $epxr);
                    }else{
                        if($epxr == 0)
                            $query->orWhere('min_exp','=', $epxr);
                        else
                            $query->orWhere('min_exp','>=', $epxr);
                    }
                    $index++;
                }
            }
            $job_type =$request->has('job_type');
            if($job_type){
                $jobType = $request->job_type;
                $index=0;
                foreach ($jobType as $jbType) {
                    if($index==0){
                      $query->where('job_type','=', $jbType);
                    }else{
                      $query->orwhere('job_type','=', $jbType);
                    }
                    $index++;
                }
            }
            $query->orderBy('id','DESC');
        })->orderBy('id','desc')->paginate(15);

        $industry = Industries::where('deleted_at', null)->orderBy('name', 'ASC')->get();
        $locations = City::where('deleted_at', null)->orderBy('name', 'DESC')->get();
        return view('jobs', compact('jobs', 'industry', 'locations'));
    }

    //Search By Categories
    public function searchByCategories(Request $request){
        $key = $request->segment(count($request->segments()));
        $jobs = Jobs::Join('industries', 'industries.id','=', 'jobs.job_industry')
                        ->where(function($query) use($key){
                        $query-> Where('industries.name','like', '%' . $key . '%');
                })->orderBy('jobs.id','desc')->paginate(15);

                $industry = Industries::where('deleted_at', null)->orderBy('name', 'ASC')->get();
                $locations = City::where('deleted_at', null)->orderBy('name', 'DESC')->get();
                return view('jobs', compact('jobs', 'industry', 'locations'));
    }


}
