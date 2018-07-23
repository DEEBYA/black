<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slideCount = SLide::count();
        $slides = Slide::latest()->paginate(2);
        return view('admin.slider.manageslider',compact('slides','slideCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.addslider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if($request->hasFile('slider_img')){
            $filenameWithExt = $request->file('slider_img')->getClientOriginalName();
            // Get Just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get Just ext
            $extension = $request->file('slider_img')->getClientOriginalExtension();
            // Filename To Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Uplopad the image
            $path =$request->file('slider_img')->storeAs('public/slider_img', $fileNameToStore);
        }else{
            $fileNameToStore ='noimage.jpg';          
        }
        $slide = new Slide;
        $slide->title = $request->input('title');   
        $slide->body = $request->input('body'); 
        $slide->slider_img = $fileNameToStore;
        
        $slide->save();

        return redirect('/admin/view-slide');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
    //  */
    // public function show(Slide $slide)
    // {
 
    //     return view('layouts.background',[
    //         'slides' => $slides,
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        $slides = Slide::find($slide);
        return view('admin.slider.editslides', compact('slides','slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        $this->validate($request,[
            'title' => 'required',
            'body'=>'required',
            'slider_img' => 'required'
            ]);

           if($request->hasFile('slider_img')){
            $filenameWithExt = $request->file('slider_img')->getClientOriginalName();
            // Get Just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get Just ext
            $extension = $request->file('slider_img')->getClientOriginalExtension();
            // Filename To Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Uplopad the image
            $path =$request->file('slider_img')->storeAs('public/slider_img', $fileNameToStore);
        }else{
            $fileNameToStore ='noimage.jpg';          
        }

            $slide->update(request(['title']));
            $slide->update(request(['body']));

        if($request->hasFile('slider_img')){
            $slide->slider_img = $fileNameToStore;
        }

       $slide->save();

        return redirect('admin/view-slide');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
         $slide->delete();
        if(request()->wantsJson()){
            return response([], 204);
        }
        return redirect('admin/view-slide');    
    }
}
