<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Recruiter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Image;

class ProfileController extends Controller
{
   public function index(){
       $user = auth()->User()->load('recruiter');
       return view('recruiter.profile', compact('user'));
   }

   public function uploadProfile(Request $request){
            
    if ($request->hasFile('profile_pic')) {
        if ($request->file('profile_pic')->isValid()) {
            $validated = $request->validate([
                'profile_pic' => 'mimes:jpeg,png|max:1024',
            ]);
            
            $file = $request->file('profile_pic');
            $filename = $file->getClientOriginalName();
            // Remove unwanted characters
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
    // abort(500, 'Could not upload image :(');
   }

}
