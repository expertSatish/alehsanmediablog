<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Validator;


class AboutController extends Controller
{
    public function index()
    {
        
        $abouts = About::latest()->get();
        return view('admin.abouts.index')->with([
            'abouts' => $abouts,
            
        ]);
    }
    public function create()
    {
        
        try{
           
            return response()->json([
                "success" => true,
                "html" => view('admin.abouts.ajax.create',)->render(),
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
        

        
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
       
        try{
            
            About::create([
                'title' => $request->title,
                'content'=>$content,
                 
            ]);
            return redirect(route('admin.manage-abouts.index'))->with('success','Add Successfull');
        } catch(\Exception $ex) {
            return redirect(route('admin.manage-abouts.index'))->with('error','Error Encountered '.$ex->getMessage());
        }
    }

    public function edit($id)
    {
        
        try {
             
            $about = About::findOrFail($id);
            return response()->json([
                "success" => true,
                "html" => view('admin.abouts.ajax.edit')->with([
                    'about' => $about,
                   
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
        $request->validate([
            'title' => 'required',
            'content' => 'required',
             

        ]);
        try {
             
            $abouts = About::findOrFail($id);
            $data = array(
                
                'title' => $request->title,
                'content' => $request->content,
            );
            $abouts->update($data);
            return redirect(route('admin.manage-abouts.index'))->with('success','Update Successfull');
        } catch(\Exception $ex) {
            return redirect(route('admin.manage-abouts.index'))->with('error','Error Encountered '.$ex->getMessage());
        }
    }


}
