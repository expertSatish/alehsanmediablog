<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class AlbumController extends Controller
{

    public function index()
    {
        $album = Album::get();
        return view('admin.album.index',compact('album'));
    }

    public function create()
    {
        try{
            return response()->json([
                "success" => true,
                "html" => view('admin.album.ajax.create')->render(),
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
             'album_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

        if ($validator->passes()) {
            try {
                $file = $request->file('album_image');
                $path = public_path(). '/storage/album_image/';
                $filename = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move($path, $filename);  
                Album::create([
                    'author_id'        => auth()->user()->id,
                    'title'            => $request->title,
                    'album_image'       =>$filename,
                     
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

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        try {
            $album = Album::findOrFail($id);
            return response()->json([
                "success" => true,
                "html" => view('admin.album.ajax.edit')->with([
                    'album' => $album,
                ])->render(),
            ]);
        } catch(\Exception $ex){
            return response()->json([
                "success" => false,
                'msgText' =>$ex->getMessage(),
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $requestData['url'] = Str::slug($request->url, '-');
        $request->replace($requestData);
        $validator = Validator::make($requestData, [
        'title' => 'required',
        ]);
        
        if ($validator->passes()) {
            try {
                $album = Album::findOrFail($id);
                $data = array(
                    'title'   => $request->title,
                );

                if($request->hasFile('album_image')){
                    //For image
                    $file = $request->file('album_image');
                    $path = public_path(). '/storage/album_image/';
                    $file_img='storage/album_image/'.$album->album_image;
                    
                    if(isset($album->album_image) && File::exists($file_img))
                    {File::delete($file_img);}
                    $filename = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->move($path, $filename);   
                    $data['album_image'] = $filename;
                }
                $album->update($data);
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
            $blog = Album::findOrFail($id);
            $file_img='storage/album_image/'.$blog->album_image;
            if(isset($blog->album_image) && File::exists($file_img))
            {File::delete($file_img);}
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

    public function getAllImages($id)
    {
        $images = Gallery::where('album_id',$id)->get();
        return view('admin.collection_image',compact('images'));
    }
}
