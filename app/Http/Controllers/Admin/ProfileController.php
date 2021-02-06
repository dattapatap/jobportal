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
       return view('admin.profile');
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

        $user = Auth::user();
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'Current password does not match!');
        }
        $user->password = Hash::make($request->new_password);
        $user->save();
        return back()->with('success', 'Password successfully changed!');
   }


}
