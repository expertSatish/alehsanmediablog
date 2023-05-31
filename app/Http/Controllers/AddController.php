<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Add;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class AddController extends Controller
{

    public function index()
    {
        $add = Add::get();
        return view('admin.add.index',compact('add'));
    }

    public function create()
    {
        try{
            return response()->json([
                "success" => true,
                "html" => view('admin.add.ajax.create')->render(),
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
             'add_image01' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
             'add_image02' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

        if ($validator->passes()) {
            try {
                $file = $request->file('add_image01');
                $path = public_path(). '/storage/add_image/';
                $filename = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move($path, $filename);  
                $file = $request->file('add_image02');
                $path = public_path(). '/storage/add_image/';
                $filename2 = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move($path, $filename2);  
                Add::create([
                    'author_id'        => auth()->user()->id,
                    'title'            => $request->title,
                    'add_image01'       =>$filename,
                    'add_image02'       =>$filename2,
                     
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
            $add = Add::findOrFail($id);
            return response()->json([
                "success" => true,
                "html" => view('admin.add.ajax.edit')->with([
                    'add' => $add,
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
                $add = Add::findOrFail($id);
                $data = array(
                    'title'            => $request->title,
                );

                if($request->hasFile('add_image01')){
                    //For image
                    $file = $request->file('add_image01');
                    $path = public_path(). '/storage/add_image/';
                    $file_img='storage/add_image/'.$add->add_image01;
                    
                    if(isset($add->add_image01) && File::exists($file_img))
                    {File::delete($file_img);}
                    $filename = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->move($path, $filename);   
                    $data['add_image01'] = $filename;
                }
                if($request->hasFile('add_image02')) {
                    $file = $request->file('add_image02');
                    $path =public_path(). '/storage/add_image/';
                    $file_img='storage/add_image/'.$add->add_image02;
                    if(isset($add->add_image02) && File::exists($file_img))
                    {File::delete($file_img);}
                    $filename1 =md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->move($path, $filename1);
                    $data['add_image02']=$filename1;
                     
                }
                $add->update($data);
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
            $blog = Add::findOrFail($id);
            $file_img='storage/add_image/'.$blog->add_image;
            if(isset($blog->add_image) && File::exists($file_img))
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
