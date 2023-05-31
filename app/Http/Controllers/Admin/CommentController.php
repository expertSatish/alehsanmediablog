<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
 
        $comments = Comment::latest()->paginate(10);
    
        return view('admin.comment.index')->with([
            'comments' => $comments
        ]);
    }
    public function destroy($id)
    {
        try {
            $blog = Comment::findOrFail($id);
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
