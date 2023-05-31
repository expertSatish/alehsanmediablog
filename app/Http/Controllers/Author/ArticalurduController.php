<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artical;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;


class ArticalurduController extends Controller
{
    public function index()
    {
        
        $Artical = Artical::where('language_id',3)->latest()->paginate(5);
        return view('author.articalsurdu.index')->with([
            'articals' => $Artical
        ]);
    }
    public function create()
    {
        try{
            $categoriesd = Category::where('parent_id',0)->with('subcategories')->get();
            return response()->json([
                "success" => true,
                "html" => view('author.articalsurdu.ajax.create',compact('categoriesd'))->render(),
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
            // 'author_id' => 'required',

        ]);
        if ($validator->passes()) {
            try {

                 //For image
                $file = $request->file('image');
                $path = public_path(). '/storage/articals/';
                $filename = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move($path, $filename);   

               
                Artical::create([
                    'language_id' => 3,
                    'author_id' => auth()->user()->id,
                    'title' => $request->title,
                    'category_id' => $request->category,
                    'subcategory_id' => $request->subcategory,
                    'url' => $request->url,
                    //'image' => $request->image->store('blogs'),
                    'image' => $filename,
                    'content' => $request->content,
                    
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
            $artical = Artical::findOrFail($id);
            $categoriesd = Category::where('parent_id',0)->with('subcategories')->get();
         
           
            if($artical->subcategory_id!==null){
                $subcategory = Category::findOrFail($artical->subcategory_id);
            }
            else {
                $subcategory="None";
            }
            return response()->json([
                "success" => true,
                "html" => view('author.articalsurdu.ajax.edit')->with([
                    'artical' => $artical,
                    'categoriesd'=>$categoriesd,
                    'subcategory'=>$subcategory,
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
       // dd($request->subcategory??null);
        $requestData['url'] = Str::slug($request->url, '-');
        $request->replace($requestData);
        $validator = Validator::make($requestData, [
            
            'title' => 'required|max:255',
            'category' => 'required',
            'url' => [ "required",Rule::unique('articals')->ignore($id),"max:255"],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'content' => 'required',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            // 'author' => 'required|max:255',
        ]);
        if ($validator->passes()) {
            try {
                $blog = Artical::findOrFail($id);
                $data = array(
                    'language_id' => 3,
                    'title' => $request->title,
                    'category_id' => $request->category,
                    'subcategory_id' =>($request->subcategory!=="null")?$request->subcategory:null,
                    'url' => $request->url,
                    'content' => $request->content,
                    'author_id' => auth()->user()->id,
                    'meta_title' => $request->meta_title,
                    'meta_keyword' => $request->meta_keyword,
                    'meta_description' => $request->meta_description,
                    'status' => $request->status,
                );

                //For Image
                if($request->hasFile('image')){
                    //For image
                    $file = $request->file('image');
                    $path = public_path(). '/storage/articals/';
                    $file_img='storage/articals/'.$blog->image;
                    
                    if(isset($blog->image) && File::exists($file_img))
                    {File::delete($file_img);}

                    $filename = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->move($path, $filename);   
                    $data['image'] = $filename;
                }


                $blog->update($data);
                return response()->json([
                    'success' => true,
                    'msgText' => 'ertical Updated',
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
            $blog = Artical::findOrFail($id);
            
            $file_img='storage/articals/'.$blog->image;
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
