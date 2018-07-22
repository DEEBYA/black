<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Image;
use App\Book;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin');
    }

      public function create()
    {
        return view('admin.auth.create');
    }

      public function store()
    {
       $this->validate(request(),[
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6',
       ]);
        $req = request(['name','email','password']);
        $req['password'] = bcrypt('password');
       // dd($req);
       $admin = Admin::create($req);

       // auth()->login($admin);

       return redirect('/admin/view-admins');
    }

    public function viewadmin()
    {
        $adminCount = Admin::count();
        $admins = Admin::latest()->paginate(10);
        return view('admin.user.viewadmin',compact('adminCount','admins'));
    }
}
