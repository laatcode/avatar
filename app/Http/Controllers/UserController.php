<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use Storage;

class UserController extends Controller
{
    public function profile(){
      return view('profile', [
        'user' => Auth::user()
      ]);
    }

    public function updateAvatar(Request $request){
      if($request->hasFile('avatar')){
        $image = $request->file('avatar');

        Image::make($image)->resize(300, 300)->save($image);
        $avatar = $image->store('profileImages', 'public');

        $user = Auth::user();
        $oldImage = $user->avatar;

        $user->avatar = $avatar;
        $user->save();

        if(strpos($oldImage, 'default.jpg') ===false ){
          Storage::disk('public')->delete($oldImage);
        }

        return view('profile', [
          'user' => $user
        ]);
      }
    }
}
