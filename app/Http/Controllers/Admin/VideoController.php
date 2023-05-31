<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class VideoController extends Controller
{
    public function index()
    {

        $Videos = Video::latest()->paginate(5);
        // dd($categories);
        return view('admin.videos.index')->with([
            'videos' => $Videos
        ]);
    }
    public function create()
    {
     
        try{
            return response()->json([
                "success" => true,
                "html" => view('admin.videos.ajax.create')->render(),
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
       
        $requestData = $request->all();
        $requestData['url'] = Str::slug($request->url, '-');
        
        $request->replace($requestData);
        $validator = Validator::make($requestData, [
             'title' => 'required',
             'title_hindi' => 'required',
             'title_arabic' => 'required',
             'title_urdu' => 'required',
             'url' => 'required|max:255|unique:videos',
             'link' => 'required',
             'vedio_cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

        if ($validator->passes()) {
            try {
                $file = $request->file('vedio_cover');
                $path = public_path(). '/storage/vedio_cover/';
                $filename = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move($path, $filename);  
                
                Video::create([
                    'author_id' => auth()->user()->id,
                    'title' => $request->title,
                    'title_hindi' => $request->title_hindi,
                    'title_arabic' => $request->title_arabic,
                    'title_urdu' => $request->title_urdu,
                    'url' => $request->url,
                    'link' => $request->link,
                    'vedio_cover'=>$filename,
                    'status' => $request->status,
                ]);

                return response()->json([
                    'success' => true,
                    'msgText' => 'Created',
                ]);
            } catch(\Exception $ex) {
                return response()->json([
                    'success' => false,
                    'code' => 400,
                    'msgText' => $ex->getMessage(),
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'code' => 422,
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function edit($id)
    {
        try {
            $Video = Video::findOrFail($id);
            return response()->json([
                "success" => true,
                "html" => view('admin.videos.ajax.edit')->with([
                    'video' => $Video
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
        $requestData = $request->all();
        $requestData['url'] = Str::slug($request->url, '-');
        $request->replace($requestData);


        $validator = Validator::make($requestData, [
        'title' => 'required',
        'title_hindi' => 'required',
        'title_arabic' => 'required',
        'title_urdu' => 'required',
        'url' => [ "required",Rule::unique('videos')->ignore($id),"max:255"],
        'link' => 'required',
        'vedio_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
    
        ]);
        
        if ($validator->passes()) {
            try {
                $language = Video::findOrFail($id);
                $data = array(
                    'title' => $request->title,
                    'title_hindi' => $request->title_hindi,
                    'title_arabic' => $request->title_arabic,
                    'title_urdu' => $request->title_urdu,
                    'url' => $request->url,
                    'link' => $request->link,
                    'status' => $request->status,
                    'aproved'=>$request->aproved,
                );
                if($request->hasFile('vedio_cover')){
                    //For image
                    $file = $request->file('vedio_cover');
                    $path = public_path(). '/storage/vedio_cover/';
                    $file_img='storage/vedio_cover/'.$language->vedio_cover;
                    
                    if(isset($language->vedio_cover) && File::exists($file_img))
                    {File::delete($file_img);}
                    $filename = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->move($path, $filename);   
                    $data['vedio_cover'] = $filename;
                }
                
                $language->update($data);
                return response()->json([
                    'success' => true,
                    'msgText' => 'language Updated',
                ]);
            } catch(\Exception $ex) {
                return response()->json([
                    'success' => false,
                    'code' => 400,
                    'msgText' => $ex->getMessage(),
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'code' => 422,
                'errors' => $validator->errors(),
            ]);
        }
    }
    public function destroy($id)
    {
        try {
            $blog = Video::findOrFail($id);
            $blog->delete();
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
