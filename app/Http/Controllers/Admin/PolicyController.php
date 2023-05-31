<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Policy;

class PolicyController extends Controller
{
    public function index()
    {
        
        $policy = Policy::latest()->get();
        return view('admin.policy.index')->with([
            'policy' => $policy,
            
        ]);
    }
    public function create()
    {
        
        try{
           
            return response()->json([
                "success" => true,
                "html" => view('admin.policy.ajax.create',)->render(),
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
            
            Policy::create([
                'title' => $request->title,
                'content'=>$request->content,
                 
            ]);

            return redirect(route('admin.manage-policy.index'))->with('success','Add Successfull');
        } catch(\Exception $ex) {
            return redirect(route('admin.manage-policy.index'))->with('error','Error Encountered '.$ex->getMessage());
        }
    }

    public function edit($id)
    {
       
        try {
             
            $policy = Policy::findOrFail($id);
            return response()->json([
                "success" => true,
                "html" => view('admin.policy.ajax.edit')->with([
                    'policy' => $policy,
                   
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
             
            $policy = Policy::findOrFail($id);
            $data = array(
                
                'title' => $request->title,
                'content' => $request->content,
            );
            $policy->update($data);
            return redirect(route('admin.manage-policy.index'))->with('success','Update Successfull');
        } catch(\Exception $ex) {
            return redirect(route('admin.manage-policy.index'))->with('error','Error Encountered '.$ex->getMessage());
        }
    }
}
