<?php

namespace App\Http\Controllers\Recruiter;


use App\Http\Controllers\Controller;
use App\Models\EmployerPackage;
use App\Models\City;
use App\Models\EmployerPoints;
use App\Models\Industries;
use App\Models\JobPositions;
use App\Models\Jobs;
use App\Models\PaymentSetting;
use App\Models\Recruiter;
use App\Models\User;
use App\Notifications\PostJob;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobsController extends Controller
{
   public function index(){
       $user = auth()->User();
       $jobs = Jobs::where('rec_id', $user->recruiter->id)
                        ->with('industry', 'jobrole', 'location', 'recruiter')
                        ->where('deleted_at', null)
                        ->orderBy('created_at', 'desc')
                        ->paginate(5);
       return view('recruiter.jobs.postjobs',  compact('jobs'));
   }

   public function viewjobs(Jobs $jobs){
       $jobs = Jobs::where('id', $jobs->id)->with('industry', 'jobrole', 'location', 'recruiter')->first();
       return view('recruiter.jobs.viewjobs', compact('jobs'));
   }

   public function editjobs(Jobs $jobs){
        $industry = Industries::where('deleted_at',null)->get();
        $positions = JobPositions::where('deleted_at',null)->get();
        $city = City::where('deleted_at',null)->get();

        $jobs = Jobs::findorFail($jobs->id);
        return view('recruiter.jobs.editjob', compact('industry','positions', 'city', 'jobs'));
   }

   public function viewnewjobform(){
        $industry = Industries::where('deleted_at',null)->get();
        $positions = JobPositions::where('deleted_at',null)->get();
        $city = City::where('deleted_at',null)->get();

        return view('recruiter.jobs.addjob', compact('industry','positions', 'city'));
   }
   public function create(Request $request){
            $request->validate([
                'job_title' => 'required|string|max:255',
                'job_role' => 'required|string|max:255',
                'job_industry' => 'required|string|max:255',
                'job_type' => 'required|string',
                'min_salary' => 'required|numeric|min:5000|max:99000',
                'max_salary' => 'required|numeric|gt:min_salary|min:5000|max:90000',
                'min_exp' => 'required|numeric|min:0|',
                'max_exp' => 'required|numeric|min:1|gt:min_exp',
                'job_location' => 'required|string',
                'job_eligibility' => 'required|string',
                'job_tot_positions' => 'required|numeric|min:0|max:50|not_in:0',
                'job_desc' => 'required|string'
            ]);

            $recruiter = Auth::user()->recruiter;
            $poits = EmployerPoints::where('rec_id',  $recruiter->id)->value('wallet_points');
            $paymntSet = PaymentSetting::find(1);
            $post_job = $paymntSet->post_job;

            if($poits){
                if($poits > $post_job ){
                    DB::beginTransaction();
                    try{
                            $jobs = new Jobs;
                            $jobs->job_title = $request->job_title;
                            $jobs->job_role = $request->job_role;
                            $jobs->job_industry = $request->job_industry;
                            $jobs->job_type = $request->job_type;
                            $jobs->min_salary = $request->min_salary;
                            $jobs->max_salary = $request->max_salary;
                            $jobs->min_exp = $request->min_exp;
                            $jobs->max_exp = $request->max_exp;
                            $jobs->job_location = $request->job_location;
                            $jobs->job_eligibility = $request->job_eligibility;
                            $jobs->job_tot_positions = $request->job_tot_positions;
                            $jobs->job_desc = $request->job_desc;
                            $jobs->status = true;
                            $jobs->rec_id = Auth::user()->recruiter->id;
                            $jobs->save();


                            DB::table('points_deduction')->insert(['rec_id' => $recruiter->id, 'deduction_type' => 4, 'deduction_points' => $post_job, 'status' => 1]);
                            $decrement = DB::table('employer_points')->where('rec_id',$recruiter->id);
                            $decrement->decrement('wallet_points', round($post_job,2));

                            Auth::user()->notify(new PostJob($recruiter->company_name));


                            // $package = EmployerPackage::where('rec_id', Auth::user()->recruiter->id)
                            //                             ->where('package_status', 'Active')
                            //                             ->orderBy('id', 'ASC')
                            //                             ->get();
                            // if(isset($package)){
                            //     for($ctr=0; $ctr < count($package); $ctr++){
                            //         if( $package[$ctr]->avl_points  > 100){
                            //             DB::table('employer_packages')
                            //                     ->where('id', $package[$ctr]->id)
                            //                     ->decrement('avl_points', 100);
                            //             break;
                            //             return;
                            //         }else if($package[$ctr]->avl_points  < 100){
                            //             $totPoints = $package[$ctr]->avl_points;
                            //             DB::table('employer_packages')
                            //                     ->where('id', $package[$ctr]->id)
                            //                     ->update(['avl_points'=> '0', 'package_status' => 'InActive']);

                            //             $poittoupdate = 100 - $totPoints;
                            //             DB::table('employer_packages')
                            //                     ->where('id', $package[$ctr+1]->id)
                            //                     ->decrement('avl_points', $poittoupdate );
                            //             break;
                            //             return;
                            //         }
                            //     }


                            DB::commit();
                            $request->session()->flash('success', 'Job Posted Successfully!');
                            return redirect('/recruiter/postedjobs');
                    }catch(Exception $ex){
                        DB::rollback();
                        return back()->with('error', 'Job not posted, please try again!')->withInput();
                    }
                }else{
                    $msg  = '<a href="'. url('recruiter/packages') . '" style="color:#000206;" target="_new"> click here  </a>';
                    return back()->with('error', 'Dont have enough points, select new package'.$msg )->withInput();
                }
            }else{
               $msg  = '<a href="'. url('recruiter/packages') . '" style="color:#000206;" target="_new" > click here  </a>';
               return back()->with('error', 'Dont have enough points, select new package'.$msg )->withInput();
            }

   }


   public function update(Request $request){
    $request->validate([
        'job_title' => 'required|string|max:255',
        'job_role' => 'required|string|max:255',
        'job_industry' => 'required|string|max:255',
        'job_type' => 'required|string',
        'min_salary' => 'required|numeric|min:5000',
        'max_salary' => 'required|numeric|gt:min_salary|max:900000',
        'min_exp' => 'required|numeric|min:0|',
        'max_exp' => 'required|numeric|min:1|gt:min_exp',
        'job_location' => 'required|string',
        'job_eligibility' => 'required|string',
        'job_tot_positions' => 'required|numeric|min:0|max:50|not_in:0',
        'job_desc' => 'required|string'
    ]);


    $jobs = Jobs::find($request->post('job_id'));
    if($jobs){
            try{
                $jobs->job_title = $request->job_title;
                $jobs->job_role = $request->job_role;
                $jobs->job_industry = $request->job_industry;
                $jobs->job_type = $request->job_type;
                $jobs->min_salary = $request->min_salary;
                $jobs->max_salary = $request->max_salary;
                $jobs->min_exp = $request->min_exp;
                $jobs->max_exp = $request->max_exp;
                $jobs->job_location = $request->job_location;
                $jobs->job_eligibility = $request->job_eligibility;
                $jobs->job_tot_positions = $request->job_tot_positions;
                $jobs->job_desc = $request->job_desc;
                $jobs->rec_id = Auth::user()->recruiter->id;
                $jobs->save();
                $request->session()->flash('success', 'Job Updated Successfully!');
                return redirect('/recruiter/postedjobs');
            }catch(Exception $ex){
                return back()->with('error', 'Job not updated, please try again!')->withInput();
            }
        }else{
            abort(404, 'Job Not Found');
        }
    }

   public function changeStatus(Jobs $jobs){
        $jobs = Jobs::findOrFail($jobs->id);
        if($jobs->status==1){
            $jobs->status=false;
            $jobs->save();
        }else{
            $jobs->status=true;
            $jobs->save();
        }
        return redirect()->back()->with('success', "Job status changed");
   }

   public function delete(Jobs $jobs){
        $jobs = Jobs::findOrFail($jobs->id);
        $jobs->delete();
        return redirect()->back()->with('success', "Job deleted successfully");

   }


}
