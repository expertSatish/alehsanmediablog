<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Term;
use Illuminate\Support\Facades\Validator;

class TermController extends Controller
{
    public function index()
    {
        
        $terms = Term::latest()->get();
        return view('admin.terms.index')->with([
            'terms' => $terms,
            
        ]);
    }
    public function create()
    {
        
        try{
           
            return response()->json([
                "success" => true,
                "html" => view('admin.terms.ajax.create',)->render(),
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
            
            Term::create([
                'title' => $request->title,
                'content'=>$request->content,
                 
            ]);

            return redirect(route('admin.manage-terms.index'))->with('success','Add Successfull');
        } catch(\Exception $ex) {
            return redirect(route('admin.manage-terms.index'))->with('error','Error Encountered '.$ex->getMessage());
        }
    }

    public function edit($id)
    {
       
        try {
             
            $term = Term::findOrFail($id);
            return response()->json([
                "success" => true,
                "html" => view('admin.terms.ajax.edit')->with([
                    'term' => $term,
                   
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
             
            $terms = Term::findOrFail($id);
            $data = array(
                
                'title' => $request->title,
                'content' => $request->content,
            );
            $terms->update($data);
            return redirect(route('admin.manage-terms.index'))->with('success','Update Successfull');
        } catch(\Exception $ex) {
            return redirect(route('admin.manage-terms.index'))->with('error','Error Encountered '.$ex->getMessage());
        }
    }

}
