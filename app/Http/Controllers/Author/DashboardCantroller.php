<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artical;
use App\Models\Language;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class DashboardCantroller extends Controller
{
    public function index(){
        
        $articalblockcount = Artical::where('aproved','block')->where('author_id', auth()->user()->id)->count();
        $articalactivecount = Artical::where('aproved','active')->where('author_id', auth()->user()->id)->count();
        $adminarticalcount = Artical::where('author_id','1')->where('author_id', auth()->user()->id)->count();
        $articaltotal = Artical::where('author_id', auth()->user()->id)->count();

        $bookblockcount = Book::where('aproved','block')->where('author_id', auth()->user()->id)->count();
        $bookactivecount = Book::where('aproved','active')->where('author_id', auth()->user()->id)->count();
        $adminbookcount = Book::where('author_id','1')->where('author_id', auth()->user()->id)->count();
        $booktotal = Book::where('author_id', auth()->user()->id)->count();
        // $articalenglishcount = Artical::where('language_id','2')->count();
        // $articalurducount = Artical::where('language_id','3')->count();
        // $articalarbiccount = Artical::where('language_id','4')->count();
        // $videos = Video::with('user')->where('aproved','active')->orderBy('created_at', 'desc')->limit(2)->get();
        return view('author.dashboard.index',compact('articalblockcount','articalactivecount','articaltotal','adminarticalcount','bookblockcount','bookactivecount','adminbookcount','booktotal'));
     }
}
