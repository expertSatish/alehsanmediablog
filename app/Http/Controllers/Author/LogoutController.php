<?php
namespace App\Http\Controllers\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')
                ->with('success','Logout successfully.');
    }
}

