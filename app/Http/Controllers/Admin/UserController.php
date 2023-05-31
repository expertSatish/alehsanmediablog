<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Hash;
 
class UserController extends Controller
{
    
    public function index()
    {
     
        $Users = User::where('role',2)->latest()->paginate(15);
        return view('admin.users.index')->with([
            'Users' => $Users
        ]);
    }

    public function create()
    {
     
        try{
            return response()->json([
                "success" => true,
                "html" => view('admin.users.ajax.create')->render(),
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
             'name' => 'required',
             'email' => 'required|unique:users',
             'password' => 'required',
             'profile_photo' => 'required|image|mimes:jpeg,png,jpg,svg',
             'address' => 'required',
             
            ]);

        if ($validator->passes()) {
            try {
                $file = $request->file('profile_photo');
                $path = public_path(). '/storage/authors/';
                $filename = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move($path, $filename);  
               
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => 2,
                    'status' => $request->status,
                    'address' => $request->address,
                    'instagram' => $request->instagram,
                    'you_tube' => $request->you_tube,
                    'twitter' => $request->twitter,
                    'about_us' => $request->about_us,
                    'short_intro_english' => $request->short_intro_english,
                    'short_intro_urdu' => $request->short_intro_urdu,
                    'profile_photo' => $filename,
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
            $User = User::findOrFail($id);
            return response()->json([
                "success" => true,
                "html" => view('admin.users.ajax.edit')->with([
                    'user' => $User
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
        
        if ($id) {
            try {
                $user = User::findOrFail($id);
                $data = array(
                    'name' => $request->name,
                    'email' => $request->email,
                    'status' => $request->status,
                    'address' => $request->address,
                    'instagram' => $request->instagram,
                    'you_tube' => $request->you_tube,
                    'twitter' => $request->twitter,
                    'about_us' => $request->about_us,
                    'short_intro_english' => $request->short_intro_english,
                    'short_intro_urdu' => $request->short_intro_urdu,
                );
                if($request->hasFile('profile_photo')){
                    //For image
                    $file = $request->file('profile_photo');
                    $path = public_path(). '/storage/authors/';
                    $file_img='storage/authors/'.$user->profile_photo;
                    
                    if(isset($user->profile_photo) && File::exists($file_img))
                    {File::delete($file_img);}
                    $filename = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->move($path, $filename);   
                    $data['profile_photo'] = $filename;
                }
                
                $user->update($data);
                return response()->json([
                    'success' => true,
                    'msgText' => 'User Status Updated',
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
                
            ]);
        }
    }

}
