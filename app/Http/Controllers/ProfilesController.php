<?php
namespace App\Http\Controllers;
use App\Activity;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Image;
class ProfilesController extends Controller
{
    public function show(User $user)
    {
    	return view('profiles.show',[
    		'profileUser' => $user,
    		'activities' => Activity::feed($user)
    	]);
    }

	public function update_avatar(Request $request)
	{
		if($request->hasFile('avatar')){
			$avatar = $request->file('avatar');
			$filename=time() . '.' . $avatar->getClientOriginalExtension();
			Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));
			$user = Auth::user();
			$user->avatar = $filename;
			$user->save();
		}
		 return back();
	}
}
 