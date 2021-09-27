<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Recruiter;
use App\Models\EmployerPackage;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

   public function index(){
       $user = Auth::user();
        
       $packages = EmployerPackage::where('rec_id', Auth::user()->recruiter->id)
                        ->where('package_status', 'Active')
                        ->orderBy('id', 'ASC')
                        ->with('package')
                        ->first();
       $points = EmployerPackage::where('rec_id', Auth::user()->recruiter->id)->where('package_status', 'Active')
                                ->sum('avl_points');

     // dd($packages);

       return view('recruiter.profile', compact('user', 'packages', 'points'));


   }    

   public function editProfile(){
        $user = Auth::user()->recruiter;
        return view('recruiter.manageprofile', compact('user'));
   }

   public function uploadProfile(Request $request){
        if ($request->hasFile('profile_pic')) {
            if ($request->file('profile_pic')->isValid()) {
                $validated = $request->validate([
                    'profile_pic' => 'mimes:jpeg,png|max:1024',
                ]);

                $user = Auth::user();

                $file = $request->file('profile_pic');
                $filename = $file->getClientOriginalName();
                // Remove unwanted characters
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(128, 128);
                if($user->avatar){
                    Storage::delete('/public/images/profiles/'.$user->avatar);
                }
                $image_resize->save(public_path().'/storage/images/profiles/' .$user->id.'_'.$filename);

                $user->avatar = $user->id.'_'.$filename;
                $user->save();
                return response()->json(['success' => 'Your profile has been successfully Upload']);
            }
            return response()->json(['error' => 'Your profile not Uploaded']);
        }
   }

   public function manageProfile(Request $request){
            $request->validate([
                'comp_name' => 'required|string|max:255',
                'contact_person' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.Auth::user()->id,
                'mobile' => 'required|digits:10|unique:users,mobile,'.Auth::user()->id,
                'location' => 'required|string',
                'proffession' => 'required|string',
                'website' => 'required|string',
                'twiter' => 'required|string',
                'linkedin' => 'required|string',
                'about' => 'required|string',
            ]);

            try{
                $userid = Auth::user()->id;

                DB ::beginTransaction();
                $recruiter = Recruiter::where('user_id', $userid )
                            ->update(['company_name'=> $request->comp_name, 'contact_person'=> $request->contact_person,
                             'location'=> $request->location, 'proffession'=>$request->proffession,
                             'twiter'=> $request->twiter, 'linkedin'=> $request->linkedin, 'website'=>$request->website,
                             'about'=> $request->about
                              ]);

                User::where('id',$userid)
                    ->update(['mobile'=>$request->mobile, 'email'=>$request->email ]);

                DB::commit();
                session()->flash('success',"Profile Updated Successfully");
                return redirect('/recruiter/profile');

            }catch(Exception $e){
                DB::rollBack();
                echo $e->getMessage();
                session()->flash('error',"Profile Not Updated, please try again");
                return redirect()->back()->withInput();
            }

   }

   public function changepassword(){
        $user = Auth::user()->recruiter;
        return view('recruiter.changepassword', compact('user'));
   }
   public function updatePassword( Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|same:confirm_password',
            'confirm_password' => 'required',
        ]);

        if (!Hash::check($request->post('old_password'), auth()->user()->password)) {
            return back()->with('error', 'Current password does not match!');
        }
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();
        return back()->with('success', 'Password successfully changed!');
   }


}
