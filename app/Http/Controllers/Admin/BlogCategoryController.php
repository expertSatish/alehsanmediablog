<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::latest()->paginate(10);
        // dd($categories);
        return view('admin.blog-categories.index')->with([
            'categories' => $categories
        ]);
    }

    
    public function create()
    {
        try{
            return response()->json([
                "success" => true,
                "html" => view('admin.blog-categories.ajax.create')->render(),
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
        //
        $requestData = $request->all();
        $requestData['url'] = Str::slug($request->url, '-');
        $request->replace($requestData);
        $validator = Validator::make($requestData, [
             'name' => 'required|unique:blog_categories|max:255',
             'url' => 'required|unique:blog_categories|max:255'
            
            
        ]);
        if ($validator->passes()) {
            try {

                BlogCategory::create([
                    'name' => $request->name,
                    'url' => $request->url,
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
            $category = BlogCategory::findOrFail($id);
            return response()->json([
                "success" => true,
                "html" => view('admin.blog-categories.ajax.edit')->with([
                    'category' => $category
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
        'name' => [ "required",Rule::unique('blog_categories')->ignore($id),"max:255"],
        'url' => [ "required",Rule::unique('blog_categories')->ignore($id),"max:255"],
            
           
        ]);
        if ($validator->passes()) {
            try {
                $category = BlogCategory::findOrFail($id);
                $data = array(
                    'name' => $request->name,
                    'url' => $request->url,
                    'status' => $request->status,
                );

               


                $category->update($data);
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
            $category = BlogCategory::findOrFail($id);
            
            

            $category->delete();
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
