<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artical;
use App\Models\Language;
use App\Models\Book;

class DashboardCantroller extends Controller
{
    public function index(){
        
        $articalblockcount = Artical::where('aproved','block')->count();
        $articalactivecount = Artical::where('aproved','active')->count();
        $adminarticalcount = Artical::where('author_id','1')->count();
        $articaltotal = Artical::count();

        $bookblockcount = Book::where('aproved','block')->count();
        $bookactivecount = Book::where('aproved','active')->count();
        $adminbookcount = Book::where('author_id','1')->count();
        $booktotal = Book::count();
        // $articalenglishcount = Artical::where('language_id','2')->count();
        // $articalurducount = Artical::where('language_id','3')->count();
        // $articalarbiccount = Artical::where('language_id','4')->count();
        // $videos = Video::with('user')->where('aproved','active')->orderBy('created_at', 'desc')->limit(2)->get();
        return view('admin.dashboard.index',compact('articalblockcount','articalactivecount','articaltotal','adminarticalcount','bookblockcount','bookactivecount','adminbookcount','booktotal'));
     }
}
