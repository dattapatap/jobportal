<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

   public function index(){

       $userid = Auth::user();
       $user = DB::table('users')
                ->join('users_admin','users_admin.user_id','=','users.id')
                ->where(['users.id'=>$userid->id])
                ->get()->first();
        return view('admin.profile', compact('user'));
   }

   public function editProfile(Request $request){
            $userid = Auth::user();
            $user = DB::table('users')
                    ->join('users_admin','users_admin.user_id','=','users.id')
                    ->where(['users.id'=>$userid->id])
                    ->get()->first();
            return view('admin.manageprofile', compact('user'));
   }

   public function manageProfile(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'gst' => 'required|string|max:15|min:15',
            'email' => 'required|string|email|max:255|unique:users,email,'.Auth::user()->id,
            'mobile' => 'required|digits:10|unique:users,mobile,'.Auth::user()->id,
            'location' => 'required|string',
            'address' => 'required|string',
            'website' => 'required|string',
            'twiter' => 'required|string',
            'linkedin' => 'required|string',
            'about' => 'required|string',
        ]);

        try{
            $userid = Auth::user()->id;

            DB ::beginTransaction();
            $admin = DB::table('users_admin')->where('user_id', $userid )
                        ->update(['company'=> $request->name, 'address'=> $request->address,
                        'location'=> $request->location, 'gst'=>$request->gst,
                        'twiter'=> $request->twiter, 'linkedin'=> $request->linkedin, 'website'=>$request->website,
                        'about'=> $request->about
                        ]);

            User::where('id',$userid)
                ->update(['mobile'=>$request->mobile, 'email'=>$request->email ]);

            DB::commit();
            session()->flash('success',"Profile Updated Successfully");
            return redirect('/admin/profile');

        }catch(Exception $e){
            DB::rollBack();
            echo $e->getMessage();
            session()->flash('error',"Profile Not Updated, please try again");
            return redirect()->back()->withInput();
        }

   }

   public function uploadProfile(Request $request){
        if ($request->hasFile('profile_pic')) {
            if ($request->file('profile_pic')->isValid()) {
                $validated = $request->validate([
                    'profile_pic' => 'mimes:jpeg,png|max:1024',
                ]);
                $file = $request->file('profile_pic');
                $filename = $file->getClientOriginalName();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(128, 128);
                if(Auth::user()->avatar){
                    Storage::delete('/public/images/profiles/'.Auth::user()->avatar);
                }
                $image_resize->save(public_path().'/storage/images/profiles/' .Auth::user()->id.'_'.$filename);
                $user = Auth::user();
                $user->avatar = Auth::user()->id.'_'.$filename;
                $user->save();
                return response()->json(['success' => 'Your profile has been successfully Upload']);
            }
            return response()->json(['error' => 'Your profile not Uploaded']);
        }
   }

   public function changepassword(){
        return view('admin.changepassword');
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
