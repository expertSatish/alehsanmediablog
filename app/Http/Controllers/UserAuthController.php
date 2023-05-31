<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    //
    public function index()
    {
        $role= Auth::user()->role;

        if($role=='1')
        {
            return redirect('admin/dashboard'); 
        }
        else if($role=='2')
        {
            //return view('author.dashboard');
            return redirect('author/dashboard'); 

        }
        else
        {
            return "Guest User";
        }
    }
}
