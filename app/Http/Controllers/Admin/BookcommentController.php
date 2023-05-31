<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookcomment;

class BookcommentController extends Controller
{  public function index()
    {
 
        $comments = Bookcomment::latest()->paginate(10);
    
        return view('admin.bookcomment.index')->with([
            'comments' => $comments
        ]);
    }
    public function destroy($id)
    {
        try {
            $blog = Bookcomment::findOrFail($id);
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
