<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Language;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{
    public function index()
    {
        
        $banners = Banner::latest()->get();
        return view('admin.main-banner.index')->with([
            'banners' => $banners,
            
        ]);
    }

    public function create()
    {
        
        try{
            $language=Language::all();
            return response()->json([
                "success" => true,
                "html" => view('admin.main-banner.ajax.create',compact('language'))->render(),
            ]);
        }
        catch(\Exception $ex){
            return response()->json([
                "success" => false,
                'msgText' =>$ex->getMessage(),
            ]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'description'=>'required',
            'image' => 'required|image',
            'status' => 'required',
            'language_id' => 'required',
        ]);
        
        try{
            //For image
                $file = $request->file('image');
                $path = public_path(). '/storage/banners/';
                $filename = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move($path, $filename);   

            Banner::create([
                'author_id' => auth()->user()->id,
                'language_id' => $request->language_id,
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'artical_url'=> $request->artical_url,
                'description' => $request->description,
                //'image' => $request->image->store('sliders'),
                'image'=>$filename,
                'status' => $request->status
            ]);
            return redirect(route('admin.manage-banner.index'))->with('success','Add Successfull');
        } catch(\Exception $ex) {
            return redirect(route('admin.manage-banner.index'))->with('error','Error Encountered '.$ex->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $language=Language::all();
            $banner = Banner::findOrFail($id);
            return response()->json([
                "success" => true,
                "html" => view('admin.main-banner.ajax.edit')->with([
                    'banner' => $banner,
                    'language' => $language,
                ])->render(),
            ]);
        } catch(\Exception $ex){
            return response()->json([
                "success" => false,
                'msgText' =>$ex->getMessage(),
            ]);
        }
    }

    public function update(Request $request , $id)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'description' =>'required',
            'image' => 'nullable|image',
            'status' => 'required',
            'language_id' => 'required',

        ]);
        try {
             
            $banner = Banner::findOrFail($id);
            $data = array(
                'author_id' => auth()->user()->id,
                'language_id' => $request->language_id,
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'artical_url'=> $request->artical_url,
                'description' => $request->description,
                'status' => $request->status,
            );
            //For image
            
                if($request->hasFile('image')){
                    $file = $request->file('image');
                    $path = public_path(). '/storage/banners/';
                    $file_img='storage/banners/'.$banner->image;
                    
                    if(isset($banner->image) && File::exists($file_img))
                    {File::delete($file_img);}

                    $filename = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->move($path, $filename);   
                    $data['image'] = $filename;
                }
                $banner->update($data);
            return redirect(route('admin.manage-banner.index'))->with('success','Update Successfull');
        } catch(\Exception $ex) {
            return redirect(route('admin.manage-banner.index'))->with('error','Error Encountered '.$ex->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $banner = Banner::findOrFail($id);
            if(isset($banner->image) && File::exists($banner->image)) {
                File::delete($banner->image);
            }

            $file_img='storage/banners/'.$banner->image;
            if(isset($banner->image) && File::exists($file_img))
            {File::delete($file_img);}

            $banner->delete();
            return response()->json([
                'success' => true,
            ]);
        } catch(\Exception $ex) {
            return response()->json([
                'success' => false,
                'msgText' => $ex->getMessage(),
            ]);
        }
    }
}
