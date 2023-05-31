<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\file;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('Admin.banner.index', compact('banners'));
    }

    public function store(Request $request)
    {
        $banner = new Banner;
        $banner->titleEnglish = $request->input('titleenglish');
        $banner->titleUrdu = $request->input('titleurdu');
        $banner->titleHindi = $request->input('titlehindi');
        $banner->titleArbic = $request->input('titlearbic');
        $banner->descriptionEnglish = $request->input('descriptionenglish');
        $banner->descriptionUrdu = $request->input('descriptionurdu');
        $banner->descriptionHindi = $request->input('descriptionhindi');
        $banner->descriptionArbic = $request->input('descriptionarbic');
        if ($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/banner/', $filename);
            $banner->image = $filename;
        }
        $banner->save();
        return redirect()->back()->with('status','Banner added Successfully');

    }
    public function edit($id)
    {
       $banner = Banner::find($id);
        return response()->json([
            'status'=>200,
            'banner'=>$banner,
            
        ]);


    }

    public function update(Request $request)
    {
        $bann_id = $request->input('bann_id');
        $banner = Banner::find($bann_id);
        $banner->titleEnglish = $request->input('titleenglish');
        $banner->titleUrdu = $request->input('titleurdu');
         $banner->titleHindi = $request->input('titlehindi');
        $banner->titleArbic = $request->input('titlearbic');
        $banner->descriptionEnglish = $request->input('descriptionenglish');
        $banner->descriptionUrdu = $request->input('descriptionurdu');
        $banner->descriptionHindi = $request->input('descriptionhindi');
        $banner->descriptionArbic = $request->input('descriptionarbic');

         if ($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/banner/', $filename);
            $banner->image = $filename;
        }
         $banner->update();
        return redirect()->back()->with('status','Banner updated Successfully');

    }

    public function destroy(Request $request)
    {
        $bann_id = $request->input('delete_banner_id');
        $banner = Banner::find($bann_id);
        $banner->delete();
        return redirect()->back()->with('status','Banner Deleting Successfully');

    }

}
