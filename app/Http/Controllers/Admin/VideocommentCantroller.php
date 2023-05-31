<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Videocomment;
class VideocommentCantroller extends Controller
{
    public function index()
    {
 
        $comments = Videocomment::latest()->paginate(10);
    
        return view('admin.videocomment.index')->with([
            'comments' => $comments
        ]);
    }
    public function destroy($id)
    {
        try {
            $blog = Videocomment::findOrFail($id);
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
