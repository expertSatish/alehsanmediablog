<?php

use App\Http\Controllers\AddController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\Admin\DashboardCantroller;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BannerController;
// use App\Http\Controllers\ArticalController;
// use App\Http\Controllers\Admin\BlogController;
// use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\ArticalController;
use App\Http\Controllers\Admin\LanguageController; 
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\SubscribeController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\BookcommentController;
use App\Http\Controllers\Admin\VideocommentCantroller;
use App\Http\Controllers\Admin\DropController;
use App\Http\Controllers\Admin\BookdropController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\PersonalityController;
use App\Http\Controllers\Admin\SubcategoryCantroller;











use App\Http\Controllers\Author\BlogController as AuthorBlogController;
use App\Http\Controllers\Author\LogoutController as AuthorLogoutController;
use App\Http\Controllers\Author\ArticalController as AuthorArticalController;
use App\Http\Controllers\Author\ArticalhindiController as AuthorArticalhindiController;
use App\Http\Controllers\Author\ArticalurduController as AuthorArticalurduController;
use App\Http\Controllers\Author\ArticalarabicController as AuthorArticalarabicController;
use App\Http\Controllers\Author\BookController as AuthorBookController;

use App\Http\Controllers\Author\VideoController as AuthorVideoController;
use App\Http\Controllers\Author\UserController as AuthorUserController;
use App\Http\Controllers\Author\DashboardCantroller as AuthorDashboardCantroller;

use App\Http\Controllers\Web\FrontController;
use App\Http\Controllers\Web\SocialShareButtonsController;


use Illuminate\Support\Facades\DB;



 

 




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Frontend Route

// Route::get('/', function () { return view('frontend.index'); });
// Route::get('/book', function () { return view('frontend.books'); });

// Route::get('/vidoes', function () { return view('frontend.videos'); });

// Route::get('/listing', function () { return view('frontend.listing'); });

// Route::get('/authors', function () { return view('frontend.authors'); });

// Route::get('/about', function () { return view('frontend.about'); });

Route::get('/contact', function () { return view('frontend.contact'); });

// Route::get('/author', function () { return view('frontend.author'); });

// Route::get('/singin', function () { return view('frontend.singup'); });

// Route::get('/singup', function () { return view('frontend.register'); });

Route::resource('/',FrontController::class);
Route::resource('/tests',FrontController::class);
Route::get('/album-gallery', [FrontController::class,"gallery"])->name('albumGallery');
Route::get('/get-all-album_images/{id}', [FrontController::class,"allAlbumImages"])->name('allAlbumImages');

// Route::get('/social-media-share', [SocialShareButtonsController::class,'ShareWidget']);
Route::get('/post-details/{slug}',[FrontController::class, 'articals'])->name('articals');
Route::post('/share-link-count',[FrontController::class, 'updatecontent']);
Route::post('/share-book-count',[FrontController::class, 'updatebookcontent']);
Route::post('/share-video-count',[FrontController::class, 'updatevideocontent']);

Route::get('/video-details/{slug}',[FrontController::class, 'videodetail'])->name('video_details');
Route::get('/videos-all',[FrontController::class, 'videodall'])->name('videodall');

Route::get('/books-all',[FrontController::class, 'bookall'])->name('bookall');
Route::get('/book-details/{slug}',[FrontController::class, 'bookdetails'])->name('book_details');

Route::get('/all-post',[FrontController::class, 'allartical'])->name('allartical');

Route::get('/urdu-listing',[FrontController::class, 'urduartical'])->name('urduartical');

Route::get('/arabic-listing',[FrontController::class, 'arbicartical'])->name('arbicartical');

Route::get('/english-listing',[FrontController::class, 'englishartical'])->name('englishartical');

Route::get('/hindi-listing',[FrontController::class, 'hindihartical'])->name('hindihartical');
Route::get('/authors',[FrontController::class, 'authorlist'])->name('authorlist');

Route::get('/author-listing/{name}',[FrontController::class, 'authorlistingall'])->name('authorlisting');

Route::get('/category/{slug}',[FrontController::class, 'categoryalllist'])->name('categoryalllist');
Route::get('/category/{slug}/{subcategory}',[FrontController::class, 'categoryal'])->name('categoory');

Route::post('/contact-us-post',[FrontController::class,"contactusdd"])->name('contact_us_post');

Route::post('/subscribe-post',[FrontController::class,"subscribe_us_postdd"])->name('subscribe_us_post');
Route::get('/about-us',[FrontController::class, 'aboutus'])->name('aboutusdd');
Route::get('/privacy-policy',[FrontController::class, 'privacypolicy'])->name('privacypolicydd');
Route::get('/terms-&-conditions',[FrontController::class, 'termsconditions'])->name('termsconditionsdd');
Route::post('/comment-post',[FrontController::class,"comment_postdd"])->name('comment_post');
Route::post('/comment-post-book',[FrontController::class,"comment_postddbook"])->name('comment_post_book');
Route::post('/comment-post-video',[FrontController::class,"comment_postvideo"])->name('comment_post_video');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
Route::get('/dashboard', [UserAuthController::class,"index"])->name('dashboard');

});



Route::get('/ajax-subcat',function () {
  $cat_id = Request::input('cat_id');
  //$cat_id = $input::get('cat_id');

  
  $subcategories = App\Models\Category::where('parent_id','=',$cat_id)->pluck('name','id');
  //$subcategories = DB::table('categories')->where('parent_id','=',$cat_id)->lists('name');
  return Response::json($subcategories);

});

  

 


    Route::prefix('admin')->name('admin.')->middleware(['auth','isAdmin'])->group(function(){
   
      
      Route::resource('/dashboard',DashboardCantroller::class);
    // Route::get('/dashboard', function () { return view('admin.dashboard.index');});
    // Route::resource('/manage-blog-category',BlogCategoryController::class);
    // Route::resource('/manage-blog',BlogController::class);

    Route::get('/article/sts/{type}/{id}', [ArticalController::class,'Checkstatus']);
    Route::resource('/manage-artical',ArticalController::class);
    Route::resource('/manage-artical-drops',DropController::class);
    Route::resource('/manage-language',LanguageController::class);
    Route::resource('/manage-gallery',GalleryController::class);
    Route::resource('/manage-authors',UserController::class);
    Route::resource('/manage-album',AlbumController::class);
    Route::resource('/manage-add',AddController::class);
    Route::resource('/manage-personality',PersonalityController::class);
    Route::get('/get-all-images/{id}',[AlbumController::class, 'getAllImages'])->name('getAllImages');
    
    Route::resource('/profile-setting',ProfileController::class);
    Route::post('/changepassword',[ProfileController::class,"changepassword"])->name('changepasswordadmin');
    
    Route::resource('/manage-banner',BannerController::class);
    Route::resource('/manage-book',BookController::class);
    Route::resource('/manage-book-drops',BookdropController::class);

    Route::resource('/manage-video',VideoController::class);
    Route::resource('/manage-abouts',AboutController::class);
    Route::resource('/manage-terms',TermController::class);
    Route::resource('/manage-policy',PolicyController::class);
    Route::resource('/manage-contact',ContactController::class);
    Route::resource('/manage-subscribe',SubscribeController::class);
    Route::resource('/manage-category',CategoryController::class);

    Route::get('/getcategoryddd/{cat_id}',[CategoryController::class, 'getcategoryddd'])->name('getcategoryddd');
    

    Route::resource('/manage-sub-category',SubcategoryCantroller::class);

    
    Route::resource('/manage-comments',CommentController::class);
    Route::resource('/manage-book-comments',BookcommentController::class);
    Route::resource('/manage-video-comments',VideocommentCantroller::class);
    Route::get('/logout',[LogoutController::class, 'logout']);
    

    


 

    // Admin banner
    // Route::get('banner', [BannerController::class,"index"]);
    // Route::post('add_banner', [BannerController::class,"store"]);
    // Route::get('edit-banner/{id}', [BannerController::class,"edit"]);
    // Route::put('update-banner', [BannerController::class,"update"]);
    // Route::delete('delete-banner', [BannerController::class,"destroy"]);
    
   // Admin artical start... 
    // Route::get('artical', [ArticalController::class,"index"]);
    // Route::get('newartical/{id?}', [ArticalController::class,"newartical"]);
    // Route::post('add_artical/{id?}', [ArticalController::class,"store"]);
    // Route::get('delete-article/{id?}', [ArticalController::class,"destroy"]);
});




//Author Route
    Route::prefix('author')->middleware(['auth','isAuthor'])->group(function(){
      Route::resource('/dashboard',AuthorDashboardCantroller::class);

      
    // Route::get('/dashboard', function () { return view('Author.dashboard.index');});
    Route::resource('/manage-blog',AuthorBlogController::class);
    Route::get('/logout',[AuthorLogoutController::class, 'logout']);
    Route::resource('/manage-artical',AuthorArticalController::class);

    Route::resource('/manage-video',AuthorVideoController::class);
    Route::resource('/manage-artical-hindi',AuthorArticalhindiController::class);
    Route::resource('/manage-artical-urdu',AuthorArticalurduController::class);
    Route::resource('/manage-artical-arabic',AuthorArticalarabicController::class);
    Route::resource('/profile-setting',AuthorUserController::class);
    Route::resource('/manage-book',AuthorBookController::class);

    
    Route::post('/changepassword',[AuthorUserController::class,"changepassword"])->name('changepasswordauthor');
    
    //Route::get('/dashboard',[UserAuthController::class, 'index']);
    // Route::get('/author-test', function () { return view('Author.authortest');});

    });    


