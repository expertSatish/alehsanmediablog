<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookdropController extends Controller
{
    public function index()
    {
        $Books = Book::where('aproved','block')->latest()->paginate(10);
        return view('admin.bookdrops.index')->with([
            'books' => $Books
        ]);
    }

    public function update(Request $request , $id)
    {
        try {
                $blog = Book::findOrFail($id);
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
            $blog = Book::findOrFail($id);
            
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
