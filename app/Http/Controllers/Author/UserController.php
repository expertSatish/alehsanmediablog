<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Hash;
use Illuminate\Support\Facades\File;


use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        return view('author.profile-setting.index')->with([
            'user' => $user
        ]);
    }
 

    public function store(Request $request)
    {
      
        $requestData = $request->all();
        // $requestData['url'] = Str::slug($request->url, '-');
        $request->replace($requestData);
        $validator = Validator::make($requestData, [
            'email' => 'required',
            'mobile_number' => 'required',
            'about_us'=>'required',
            'address' => 'required',
            'map' => 'required',

            // 'url' => 'required',
            // 'meta_title' => 'required',
            // 'meta_keyword' => 'required',
            // 'meta_description' => 'required',
            
        ]);
        if ($validator->passes()) {
            try {
                $data = array(
                    'email' => $request->email,
                    'mobile_number' => $request->mobile_number,
                    'about_us'=> $request->about_us,
                    'address' => $request->address,
                    'map' => $request->map,
                    // 'url' => $request->url,
                    // 'meta_title' => $request->meta_title,
                    // 'meta_keyword' => $request->meta_keyword,
                    // 'meta_description' => $request->meta_description,
                    
                );
                $Book = User::findOrFail(auth()->user()->id);
                if($request->hasFile('profile_photo')){
                    //For image
                    $file = $request->file('profile_photo');
                    $path = public_path(). '/storage/authors/';
                    $file_img='/storage/authors/'.$Book->profile_photo;
                    
                    if(isset($Book->profile_photo) && File::exists($file_img))
                    {File::delete($file_img);}
                    $filename = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->move($path, $filename);   
                    $data['profile_photo'] = $filename;
                }
                
                User::updateOrCreate(['id' => auth()->user()->id],$data);
            return response()->json([
                    'success' => true,
                    'msgText' => 'Updated successfully ! ',
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

    public function changepassword(Request $request){
        $request->validate([
              'old_password' => 'required',
              'new_password' => 'required|confirmed',
          ]);
          // $2y$10$MSi1bZIhM0Rp2RXBkv.s6.goAoOvWZzFPW4cV7u8ehHldVcz4Z0NK
         
          if(!Hash::check($request->old_password, auth()->user()->password)){
              return back()->with("error", "Old Password Doesn't match!");
          }
  
  
          #Update the new Password
          User::whereId(auth()->user()->id)->update([
              'password' => Hash::make($request->new_password)
          ]);
  
          return back()->with("status", "Password changed successfully!");
      }
    
}
