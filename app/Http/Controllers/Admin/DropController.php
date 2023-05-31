<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artical;

class DropController extends Controller
{
    public function index()
    {
        $Artical = Artical::where('aproved','block')->latest()->paginate(10);
        return view('admin.drops.index')->with([
            'articals' => $Artical
        ]);
    }

    public function update(Request $request , $id)
    {
        try {
                $blog = Artical::findOrFail($id);
                $data = array(
                    'aproved' => $request->aproved,
                );
                $blog->update($data);
                return response()->json([
                    'success' => true,
                    'msgText' => 'Drops Success',
                ]);
            } catch(\Exception $ex) {
                return response()->json([
                    'success' => false,
                    'code' => 400,
                    'msgText' => $ex->getMessage(),
                ]);
            }
    }

    public function destroy($id)
    {
        try {
            $blog = Artical::findOrFail($id);
            
            $file_img='storage/articals/'.$blog->image;
            if(isset($blog->image) && File::exists($file_img))
            {File::delete($file_img);}
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
