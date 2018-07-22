<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
	public function view()

	{
		$usersCount = User::count();
		$users = User::latest()->paginate(5);
        return view('admin.user.viewuser', compact('users','usersCount'));
	}
}
	