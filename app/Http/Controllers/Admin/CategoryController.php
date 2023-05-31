<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Models\Language;

class CategoryController extends Controller
{
    public function index()
    {
 
        $categories = Category::where('parent_id','0')->latest()->paginate(10);
        return view('admin.categories.index')->with([
            'categories' => $categories
        ]);
    }

    public function create()
    {
        try{
            $language=Language::all();
            $firstcategory = Category::where('parent_id','0')->get();
            return response()->json([
                "success" => true,
                "html" => view('admin.categories.ajax.create',compact('language','firstcategory'))->render(),
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
            'name' => 'required|max:255',
            'url' => 'required|max:255|unique:categories',
           // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_title' => 'required|max:60',
            'meta_keyword' => 'required|max:255',
            'meta_description' => 'required|max:160',
            // 'language_id'=>'required',
            // 'menu'=>'required',
            
        ]);
        if ($validator->passes()) {
            
            try {
                
                 //For image
                if($request->hasFile('image'))
                {
                $file = $request->file('image');
                $path = public_path(). '/storage/categories/';
                $filename = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move($path, $filename);  
                }
                else
                {
                    $filename='';
                }
                if($request->hasFile('shortdesc_image'))
                {
                    //For Short Description image
                $shortdesc_file = $request->file('shortdesc_image');
                $shortdesc_path = public_path(). '/storage/categories/shortdesc/';
                $shortdesc_filename = md5($shortdesc_file->getClientOriginalName() . time()) . "." . $shortdesc_file->getClientOriginalExtension();
                $shortdesc_file->move($shortdesc_path, $shortdesc_filename); 

                }
                else
                {
                    $shortdesc_filename='';
                }
                if($request->hasFile('aboutus_image'))
                {
                    //For About us image
                $aboutus_file = $request->file('aboutus_image');
                $aboutus_path = public_path(). '/storage/categories/aboutus/';
                $aboutus_filename = md5($aboutus_file->getClientOriginalName() . time()) . "." . $aboutus_file->getClientOriginalExtension();
                $aboutus_file->move($aboutus_path, $aboutus_filename); 

                }
                else
                {
                    $aboutus_filename='';
                }   

               
                
                $category = Category::create([
                    // 'language_id'=> $request->language_id,
                    // 'menu'=> $request->menu,
                    
                    'name' => $request->name,
                    'url' => $request->url,
                    'image'=>$filename,
                    //'shortdesc_image' => $shortdesc_filename,
                    'shortdesc_content' => $request->shortdesc_content,
                    //'aboutus_image' => $aboutus_filename,
                    //'aboutus_content' => $request->aboutus_content,
                    //'second_title' => $request->second_title,
                    //'second_content' => $request->second_content,
                    'meta_title' => $request->meta_title,
                    'meta_keyword' => $request->meta_keyword,
                    'meta_description' => $request->meta_description,
                    'status' => $request->status,
                ]);
                if($request->parent_id) {
                    $code = 'Category-'.$request->parent_id.'-'.$category->id;
                } else {
                    $code = 'Category-'.$category->id;
                }
                $category->update([
                    'code' => $code
                ]);
                return response()->json([
                    'success' => true,
                    'msgText' => 'Category Created',
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
            $language=Language::all();
            $firstcategory = Category::where('parent_id','0')->get();

            $category = Category::findOrFail($id);
            return response()->json([
                "success" => true,
                "html" => view('admin.categories.ajax.edit')->with([
                    'category' => $category,
                    'language' => $language,
                    'firstcategory'=>$firstcategory,
                ])->render(),
            ]);
        } catch(\Exception $ex) {
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
            'name' => 'required|max:255',
            'url' => [ "required",Rule::unique('categories')->ignore($id),"max:255"],
            //'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_title' => 'required|max:60',
            'meta_keyword' => 'required|max:255',
            'meta_description' => 'required|max:160',
            //'language_id'=> 'required',
            //'menu'=> 'required',
        ]);
        if ($validator->passes()) {
            try{
                
                $category = Category::findOrFail($id);
                $data = array(
                    //'language_id'=> $request->language_id,
                    //'menu'=> $request->menu,
                   
                    'name' => $request->name,
                    'url' => $request->url,
                    'shortdesc_content' => $request->shortdesc_content,
                    //'aboutus_content' => $request->aboutus_content,
                    //'second_title' => $request->second_title,
                   // 'second_content' => $request->second_content,
                    'meta_title' => $request->meta_title,
                    'meta_keyword' => $request->meta_keyword,
                    'meta_description' => $request->meta_description,
                    'status' => $request->status,
                );

                

                //For Image
                if($request->hasFile('image')){
                    //For image
                    $file = $request->file('image');
                    $path = public_path(). '/storage/categories/';
                    if($category->image!=null)
                    {
                    $file_img='storage/categories/'.$category->image;
                    File::delete($file_img);
                    }
                    $filename = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->move($path, $filename);   
                    $data['image'] = $filename;
                }

                //For Short Description Image
                if($request->hasFile('shortdesc_image')){
                    //For image
                    $shortdesc_file = $request->file('shortdesc_image');
                    $shortdesc_path = public_path(). '/storage/categories/shortdesc/';
                    if($category->shortdesc_image!=null)
                    {
                        $shortfile_img='storage/categories/shortdesc/'.$category->shortdesc_image;
                        File::delete($shortfile_img);
                    }

                    $shortdesc_filename = md5($shortdesc_file->getClientOriginalName() . time()) . "." . $shortdesc_file->getClientOriginalExtension();
                    $shortdesc_file->move($shortdesc_path, $shortdesc_filename);   
                    $data['shortdesc_image'] = $shortdesc_filename;
                }

                //For About Us Image
                if($request->hasFile('aboutus_image')){
                    //For image
                    $aboutus_file = $request->file('aboutus_image');
                    $aboutus_path = public_path(). '/storage/categories/aboutus/';
                    
                    
                    if($category->aboutus_image!=null)
                    {
                        $aboutfile_img='storage/categories/aboutus/'.$category->aboutus_image;
                        File::delete($aboutfile_img);
                    }

                    $aboutus_filename = md5($aboutus_file->getClientOriginalName() . time()) . "." . $aboutus_file->getClientOriginalExtension();
                    $aboutus_file->move($aboutus_path, $aboutus_filename);   
                    $data['aboutus_image'] = $aboutus_filename;
                }





                 

                $category->update($data);
                return response()->json([
                    'success' => true,
                    'msgText' => 'Category Updated',
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
        DB::beginTransaction();
        try {
            $category = Category::findorFail($id);
            if($category=='') {
                DB::rollback();
                return response()->json([
                    'success' => false,
                    'msgText' => 'Something went Wrog',
                ]);
            }
            
            
            $file_img='storage/categories/'.$category->image;
            if($category->image!=null)
            {File::delete($file_img);}

            $shortdesc_img='storage/categories/shortdesc/'.$category->shortdesc_image;
            if($category->shortdesc_image!=null)
            {File::delete($shortdesc_img);}

            $aboutus_img='storage/categories/aboutus/'.$category->aboutus_image;
            if($category->aboutus_image!=null)
            {File::delete($aboutus_img);}
            
            $category->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'name' => $category->name
            ]);
        } catch(\Exception $ex){
            DB::rollback();
            return response()->json([
                'success' => false,
                'msgText' => $ex->getMessage(),
            ]);
        }
    }

    public function show($id)
    {
        $parent_category = Category::findOrFail($id);
        $categories = Category::where('parent_id',$parent_category->id)->get();
        return view('admin.categories.children')->with([
            'parent_category' => $parent_category,
            'categories' => $categories
        ]);
    }

 
    //Search bar tabs

}
