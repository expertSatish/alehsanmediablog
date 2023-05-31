<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function index()
    {
        
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blogs.index')->with([
            'blogs' => $blogs
        ]);
    }

    public function create()
    {
        try{
            return response()->json([
                "success" => true,
                "html" => view('admin.blogs.ajax.create')->render(),
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
            'title' => 'required|max:255',
            'category' => 'required',
            'url' => 'required|max:255|unique:blogs',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'content' => 'required',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'author' => 'required|max:255',

        ]);
        if ($validator->passes()) {
            try {

                 //For image
                $file = $request->file('image');
                $path = public_path(). '/storage/blogs/';
                $filename = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move($path, $filename);   


                Blog::create([
                    'title' => $request->title,
                    'category' => $request->category,
                    'url' => $request->url,
                    //'image' => $request->image->store('blogs'),
                    'image' => $filename,
                    'content' => $request->content,
                    'author' => $request->author,
                    'meta_title' => $request->meta_title,
                    'meta_keyword' => $request->meta_keyword,
                    'meta_description' => $request->meta_description,
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
            $blog = Blog::findOrFail($id);
            return response()->json([
                "success" => true,
                "html" => view('admin.blogs.ajax.edit')->with([
                    'blog' => $blog
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
            'title' => 'required|max:255',
            'category' => 'required',
            'url' => [ "required",Rule::unique('blogs')->ignore($id),"max:255"],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'content' => 'required',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'author' => 'required|max:255',
        ]);
        if ($validator->passes()) {
            try {
                $blog = Blog::findOrFail($id);
                $data = array(
                    'title' => $request->title,
                    'category' => $request->category,
                    'url' => $request->url,
                    'content' => $request->content,
                    'author' => $request->author,
                    'meta_title' => $request->meta_title,
                    'meta_keyword' => $request->meta_keyword,
                    'meta_description' => $request->meta_description,
                    'status' => $request->status,
                );

                //For Image
                if($request->hasFile('image')){
                    //For image
                    $file = $request->file('image');
                    $path = public_path(). '/storage/blogs/';
                    $file_img='storage/blogs/'.$blog->image;
                    
                    if(isset($blog->image) && File::exists($file_img))
                    {File::delete($file_img);}

                    $filename = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->move($path, $filename);   
                    $data['image'] = $filename;
                }


                $blog->update($data);
                return response()->json([
                    'success' => true,
                    'msgText' => 'Blog Updated',
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
            $blog = Blog::findOrFail($id);
            
            $file_img='storage/blogs/'.$blog->image;
            if(isset($blog->image) && File::exists($file_img))
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
}
