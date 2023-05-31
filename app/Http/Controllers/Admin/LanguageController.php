<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;




class LanguageController extends Controller
{
    
    public function index()
    {

        $Languages = Language::latest()->paginate(5);
        // dd($categories);
        return view('admin.language.index')->with([
            'Languages' => $Languages
        ]);
    }
    
    public function create()
    {
     
        try{
            return response()->json([
                "success" => true,
                "html" => view('admin.language.ajax.create')->render(),
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
      
        $request->replace($requestData);
        $validator = Validator::make($requestData, [
             'name' => 'required|unique:blog_categories|max:255',
            ]);
        if ($validator->passes()) {
            try {

                Language::create([
                    'name' => $request->name,
                    
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
            $Language = Language::findOrFail($id);
            return response()->json([
                "success" => true,
                "html" => view('admin.language.ajax.edit')->with([
                    'Language' => $Language
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
        $request->replace($requestData);
        $validator = Validator::make($requestData, [
        'name' => [ "required",Rule::unique('blog_categories')->ignore($id),"max:255"],
         ]);
         
        if ($validator->passes()) {
            try {
                $language = Language::findOrFail($id);
                $data = array(
                    'name' => $request->name,
                    'status' => $request->status,
                );
                
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
            $blog = Language::findOrFail($id);
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
