<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
 
        $contacts = Contact::latest()->paginate(5);
    
        return view('admin.contacts.index')->with([
            'contacts' => $contacts
        ]);
    }
    public function destroy($id)
    {
        try {
            $blog = Contact::findOrFail($id);
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
