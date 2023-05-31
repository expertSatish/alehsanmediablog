<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscribe;
class SubscribeController extends Controller
{
    public function index()
    {
 
        $subscribe = Subscribe::latest()->paginate(5);
    
        return view('admin.subscribe.index')->with([
            'subscribe' => $subscribe
        ]);
    }
    public function destroy($id)
    {
        try {
            $blog = Subscribe::findOrFail($id);
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
