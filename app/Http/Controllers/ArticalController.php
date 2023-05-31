<?php

namespace App\Http\Controllers;

use App\Models\Artical;
use Illuminate\Http\Request;

class ArticalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articals = Artical::all();
        return view('Admin.artical.index',compact('articals'));
    }
     public function newartical($key="")
    {
       $articl =Artical::find($key); 
        return view('Admin.artical.newartical', compact('articl'));
    }

   
    public function store(Request $request)
    {
        $articl = new Artical;
        $message = 'Artical added Successfully';
        if (!empty($request->id)) {
            $message = 'Artical updated Successfully';
            $articl = Artical::find($request->id);
        }

        $articl->title_cat = $request->input('category');
        $articl->title_eng = $request->input('titleenglish');
        $articl->title_hin = $request->input('titlehindi');
        $articl->title_urd = $request->input('titleurdu');
        $articl->title_arb = $request->input('titlearbic');
        $articl->d_english = $request->input('descriptionenglish');
        $articl->d_hindi = $request->input('descriptionhindi');
        $articl->d_urdu = $request->input('descriptionurdu');
        $articl->d_arbic = $request->input('descriptionarbic');
        $articl->shortd_english = $request->input('shortdescriptionenglish');
        $articl->shortd_hindi = $request->input('shortdescriptionhindi');
        $articl->shortd_urdu = $request->input('shortdescriptionurdu');
        $articl->shortd_arbic = $request->input('shortdescriptionarbic');
        if ($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/banner/', $filename);
            $articl->image = $filename;
        }
        $articl->save();
        return redirect('admin/artical')->with('status',$message);
        
    }
    public function destroy(Request $request, $id)
    {
        
        $articl = Artical::find($id);
        $articl->delete();
        return redirect('admin/artical')->with('status','Deleted Successfully');
        
    }
    
   

  
} 
