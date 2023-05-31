<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Artical;
use App\Models\Video;
use App\Models\User;
use App\Models\Book;
use App\Models\Category;
use App\Models\Contact;
use App\Models\About;
use App\Models\Add;
use App\Models\Album;
use App\Models\Policy;
use App\Models\Term;
use App\Models\Subscribe;
use App\Models\Comment;
use App\Models\Bookcomment;
use App\Models\Gallery;
use App\Models\Videocomment;

use Illuminate\Support\Facades\Validator;



class FrontController extends Controller
{
   
   public function index(){
      
       $recentArticles = Artical::with('user')->where('status','active')->where('aproved','active')->orderBy('created_at', 'desc')->limit(3)->get();
      $articals = Artical::with('user')->where('status','active')->where('aproved','active')->orderBy('viewd', 'desc')->limit(3)->get();
      $mostPopular = Artical::with('user')->where('status','active')->where('aproved','active')->orderBy('viewd', 'desc')->limit(7)->get();
     $articalone = Artical::where('status','active')->where('aproved','active')->orderBy('viewd', 'desc')->first();
      $articalhindi = Artical::with('user')->where('status','active')->where('aproved','active')->where('language_id','1')->orderBy('created_at', 'desc')->limit(3)->get();
      $articalhindione = Artical::with('user')->where('status','active')->where('aproved','active')->where('language_id','1')->orderBy('viewd', 'desc')->first();
      $articalenglish = Artical::with('user')->where('status','active')->where('aproved','active')->where('language_id','2')->orderBy('created_at', 'desc')->limit(3)->get();
      $articalenglishone = Artical::with('user')->where('status','active')->where('aproved','active')->where('language_id','2')->orderBy('created_at', 'desc')->first();
      $articalarbic = Artical::with('user')->where('status','active')->where('aproved','active')->where('language_id','4')->orderBy('created_at', 'desc')->limit(3)->get();
      $articalarbicone = Artical::with('user')->where('status','active')->where('aproved','active')->where('language_id','4')->orderBy('created_at', 'desc')->first();
      $articalhindicount = Artical::where('language_id','1')->where('status','active')->where('aproved','active')->count();
      $articalenglishcount = Artical::where('language_id','2')->where('status','active')->where('aproved','active')->count();
      $articalurducount = Artical::where('language_id','3')->where('status','active')->where('aproved','active')->count();
      $articalarbiccount = Artical::where('language_id','4')->where('status','active')->where('aproved','active')->count();
      $ads01 = Add::first();
      $videos = Video::with('user')->where('aproved','active')->orderBy('created_at', 'desc')->get();
      return view('frontend.index',compact('articals','articalone','videos','articalhindi','articalhindione','articalarbic','articalarbicone',
      'articalenglish','articalenglishone','articalhindicount','articalenglishcount','articalurducount','articalarbiccount','ads01','recentArticles',
   'mostPopular'));
   }

   public function articals($slug){

      $articaldetails = Artical::with('user','category','comment')->where('status','active')->where('aproved','active')->where('url',$slug)->first();
    
      $ads01 = Add::first();
      $articalupdate = Artical::where('url',$slug)->first();
      $articalupdate->viewd += 1;
      $articalupdate->save();

      $relatedarticals = Artical::with('user')->where('status','active')->where('aproved','active')->where('title','LIKE','%'.$articaldetails->title.'%')->get();
      
      $post = Artical::where('url', '=', $slug)->first();

      $shareComponent = \Share::page(
         'https://alehsanmedia.com/post-details/'.$slug,
         'Your share text comes here',
     )
     ->facebook()
     ->twitter()
     ->whatsapp();
     return view('frontend.post_details',compact('articaldetails','relatedarticals','shareComponent','ads01'));
    
   }
   public function videodetail($slug){

      $articalupdate =Video::where('url',$slug)->first();
      $articalupdate->viewd += 1;
      $articalupdate->save();

      $ads01 = Add::first();
      $videodetails = Video::with('user','comment')->where('status','active')->where('aproved','active')->where('url',$slug)->first();
      $relateVideos = Video::with('user')->where('status','active')->where('aproved','active')->where('title','LIKE','%'.$videodetails->title.'%')->get();

      $shareComponent = \Share::page(
         'https://alehsanmedia.com/book-details/'.$slug,
         'Your share text comes here',
     )
     ->facebook()
     ->twitter()
     ->whatsapp();
    
      return view('frontend.video_details',compact('videodetails','relateVideos','shareComponent','ads01'));
   }

   public function videodall(){


   //    $users=Video::all()->unique('author_id');
   //    $user_id=[];
   //   foreach($users as $user){
   //    array_push($user_id, $user->author_id);
      
   //     }
   //    $userss=User::whereIn('id', $user_id)->get();
   //    $articals = Artical::with('user')->where('status','active')->where('aproved','active')->orderBy('created_at', 'desc')->limit(4)->get();
      $booksall = Book::with('user')->where('status','active')->where('aproved','active')->paginate(20);
      
       
      $videoall = Video::with('user')->where('status','active')->where('aproved','active')->paginate(10);
      if(count($videoall)==0){
         return redirect()->back()->with('success','Comming Soon');

       }
      
       $mustView = Artical::where('status','active')->where('aproved','active')->where('language_id','2')->orderBy('viewd', 'desc')->first();
       $ads01 = Add::first();

      
     return view('frontend.videos',compact('videoall','booksall','mustView','ads01'));
   }

   public function bookall(){
   //    $users=Book::all()->unique('author_id');
   //    $user_id=[];
   //   foreach($users as $user){
   //    array_push($user_id, $user->author_id);
      
   //     }
   //     $userss=User::whereIn('id', $user_id)->get();
      //  $articals = Artical::with('user')->where('status','active')->where('aproved','active')->orderBy('created_at', 'desc')->limit(4)->get();
   
       $booksall = Book::with('user')->where('status','active')->where('aproved','active')->paginate(10);
       $ads01 = Add::first();
     
       $videoall = Video::with('user')->where('status','active')->where('aproved','active')->paginate(10);
       
        if(count($videoall)==0){
         return redirect()->back()->with('success','Comming Soon');

       }
       return view('frontend.books',compact('booksall','videoall','ads01'));
 
   }


   public function bookdetails($slug){

      //dd($slug);
      $bookdetails = Book::with('user','comment')->where('status','active')->where('url',$slug)->first();
     $books = Book::where('status','active')->orderBy('viewd', 'desc')->limit(3)->get();

      //$relateVideos = Video::with('user')->where('status','active')->where('title','LIKE','%'.$videodetails->title.'%')->get();
 
      $articalupdate =Book::where('url',$slug)->first();
      $articalupdate->viewd += 1;
      $articalupdate->save();
      $shareComponent = \Share::page(
         'https://alehsanmedia.com/book-details/'.$slug,
         'Your share text comes here',
     )
     ->facebook()
     ->twitter()
     ->whatsapp();
     $ads01 = Add::first();
      return view('frontend.book_details',compact('bookdetails','shareComponent','books','ads01'));
   }

   public function urduartical(){

      $users=Artical::all();
       if(count($users)==0){
         return redirect()->back()->with('success','Comming Soon');
       }
      $user_id=[];
     foreach($users as $user){
      if($user->language_id=='3'){
         array_push($user_id, $user->author_id);
      }
      }
      $user_idss  = collect( $user_id )->unique();
      $ads01 = Add::first();
      $userss=User::whereIn('id', $user_idss)->get();
      $articalurdus = Artical::with('user')->where('status','active')->where('aproved','active')->where('language_id','3')
      ->orderBy('created_at', 'desc')->paginate(20);
      $mustView = Artical::where('status','active')->where('aproved','active')->where('language_id','3')->orderBy('viewd', 'desc')->first();
      $featureArticles = Artical::where('status','active')->where('aproved','active')->where('language_id','3')->orderBy('viewd', 'desc')->paginate(11);
      $feature= Artical::where('status','active')->where('aproved','active')->where('language_id','3')->orderBy('viewd', 'desc')->first();
      return view('frontend.urdu_listing',compact('articalurdus','userss','mustView','featureArticles','feature','ads01'));
   }

   public function arbicartical(){

      $users=Artical::all();
             if(count($users)==0){
         return redirect()->back()->with('success','Comming Soon');
       }
      $user_id=[];
     foreach($users as $user){

      if($user->language_id=='4'){
        
         array_push($user_id, $user->author_id);
      }
      
      }
      $user_idss  = collect( $user_id )->unique();

     
       $userss=User::whereIn('id', $user_idss)->get();
       $ads01 = Add::first();
       $featureArticles = Artical::where('status','active')->where('aproved','active')->where('language_id','4')->orderBy('id', 'desc')->limit(11)->get();

      $articalarbics = Artical::with('user')->where('status','active')->where('aproved','active')->where('language_id','4')->orderBy('created_at', 'desc')->paginate(20);
      $mustView = Artical::where('status','active')->where('aproved','active')->where('language_id','4')->orderBy('viewd', 'desc')->first();
      return view('frontend.arbic_listing',compact('articalarbics','userss','mustView','featureArticles','ads01'));
   }

   public function englishartical(){

      $users=Artical::all();
               if(count($users)==0){
         return redirect()->back()->with('success','Comming Soon');

       }
    
      $user_id=[];
     foreach($users as $user){

      if($user->language_id=='2'){
        
         array_push($user_id, $user->author_id);
      }
      
      }
      $user_idss  = collect( $user_id )->unique();

     
       $userss=User::whereIn('id', $user_idss)->get();
       $ads01 = Add::first();
       $featureArticles = Artical::where('status','active')->where('aproved','active')->where('language_id','2')->orderBy('id', 'desc')->limit(11)->get();
      $englisharticals = Artical::with('user')->where('status','active')->where('aproved','active')->where('language_id','2')->orderBy('created_at', 'desc')->paginate(20);
      $mustView = Artical::where('status','active')->where('aproved','active')->where('language_id','2')->orderBy('viewd', 'desc')->first();
      return view('frontend.english_listing',compact('englisharticals','userss','mustView','featureArticles','ads01'));
   }

   public function hindihartical(){

      $users=Artical::all();
      
       if(count($users)==0){
         return redirect()->back()->with('success','Comming Soon');

       }
    
      $user_id=[];
     foreach($users as $user){

      if($user->language_id=='1'){
        
         array_push($user_id, $user->author_id);
      }
      
      }
      $user_idss  = collect( $user_id )->unique();

     
       $userss=User::whereIn('id', $user_idss)->get();
       $ads01 = Add::first();
       $featureArticles = Artical::where('status','active')->where('aproved','active')->where('language_id','1')->orderBy('id', 'desc')->limit(11)->get();

      $hindiharticals = Artical::with('user')->where('status','active')->where('aproved','active')->where('language_id','1')->orderBy('created_at', 'desc')->paginate(20);
      $mustView = Artical::where('status','active')->where('aproved','active')->where('language_id','1')->orderBy('viewd', 'desc')->first();
      return view('frontend.hindi_listing',compact('hindiharticals','userss','mustView','featureArticles','ads01'));
   }


   public function allartical(){

      $users=Artical::all();
      $user_id=[];
     foreach($users as $user){

      if($user->language_id=='1'){
        
         array_push($user_id, $user->author_id);
      }
      
      }
      $user_idss  = collect( $user_id )->unique();

     
       $userss=User::whereIn('id', $user_idss)->get();
 
       $ads01 = Add::first();
      // $allarticals = Artical::with('user')->where('status','active')->where('aproved','active')->orderBy('created_at', 'desc')->pagination(20);
      $allarticals = Artical::with('user')->where('status','active')->where('aproved','active')->orderBy('created_at', 'desc')->paginate(20);

      $mostviews = Artical::where('status','active')->where('aproved','active')->orderBy('viewd', 'desc')->limit(11)->get();
      $mustView = Artical::where('status','active')->where('aproved','active')->orderBy('viewd', 'desc')->first();
      $featureArticles = Artical::where('status','active')->where('aproved','active')->orderBy('viewd', 'desc')->limit(11)->get();
      return view('frontend.all_listing',compact('allarticals','userss','mostviews','mustView','featureArticles','ads01'));

   }

   public function authorlist(){
       $allauthors= User::with('articals')->where('status','active')->where('role','2')->orderBy('created_at', 'desc')->paginate(20);
       $ads01 = Add::first();
       $mustView = Artical::where('status','active')->where('aproved','active')->orderBy('viewd', 'desc')->first();
      return view('frontend.author',compact('allauthors','mustView','ads01'));
   }

   public function authorlistingall($name){
       
       $users = User::where('name',$name)->first();
      $author_id = $users->id;
      $ads01 = Add::first();
      $authorlistingalls = Artical::with('user')->where('author_id',$author_id)->where('aproved','active')->where('status','active')->orderBy('created_at', 'desc')->paginate(20);
      $authorlistcount = Artical::where('author_id',$author_id)->count();
      $authorbooks = Book::where('author_id',$author_id)->orderBy('created_at', 'desc')->paginate(5);
      $authorbookcount = Book::where('author_id',$author_id)->count();
      
      $mustView = Artical::where('status','active')->where('aproved','active')->where('author_id',$author_id)->orderBy('viewd', 'desc')->first();
      $categorylists = Artical::where('author_id',$author_id)->get();



      
 

// right 
      $category_ids = [];
foreach($categorylists as $artical){
    array_push($category_ids, $artical->category_id);
}
$category_id = collect($category_ids)->unique()->toArray();
$categorylis = Category::whereIn('id', $category_id)->get();

foreach($categorylis as $categoryli){
    $categoryli->articals = Artical::where('author_id', $author_id)
        ->where('category_id', $categoryli->id)
        ->get();
}





        //   return $categorylis;
        $mustPop= Artical::where('status','active')->where('author_id',$author_id)->where('aproved','active')->orderBy('viewd', 'desc')->first();
   
     
      //return view('frontend.author_listing',compact('authorlistingalls','users'));
       return view('frontend.authordetails',compact('authorlistingalls','users','authorlistcount','authorbookcount','authorbooks',
       'categorylis','mustView','mustPop','ads01'));
       

   }

   public function categoryalllist($slug){

    
      $category = Category::with('articals')->where('url',$slug)->first();
      $categoryname=$category->name;
      $user_id=[];
     foreach($category->articals as $artical){
      array_push($user_id, $artical->author_id);
     }
     $categories = Category::where('url',$slug)->first();
     $allarticle = Artical::where('category_id',$categories->id)->limit(11)->get();
     $user_idss  = collect( $user_id )->unique();
     $ads01 = Add::first();
     $userss=User::whereIn('id', $user_idss)->get();
     $mustView = Artical::where('status','active')->where('aproved','active')->where('category_id',$categories->id)->orderBy('viewd', 'desc')->first();
     $featureArticles = Artical::where('status','active')->where('aproved','active')->where('category_id',$categories->id)->orderBy('viewd', 'desc')->limit(11)->get();
     $mostviews = Artical::where('status','active')->where('aproved','active')->where('category_id',$categories->id)->orderBy('viewd', 'desc')->limit(7)->get();
     $category->setRelation('apps', $category->articals()->paginate(5));
     return view('frontend.category_listing',compact('category','userss','categoryname','categories','allarticle','mustView','mostviews',
     'featureArticles','ads01'));
      
   }
   
    public function categoryal($slug,$subcategory){

      $category = Category::with('articals')->where('url',$slug)->firstorfail();
      
      $categoryname=$category->name;
      $user_id=[];
      foreach($category->articals as $artical){
      array_push($user_id, $artical->author_id);
     }
     $ads01 = Add::first();
     $user_idss  = collect( $user_id )->unique();
     $userss=User::whereIn('id', $user_idss)->get();

       $categories = Category::where('url',$subcategory)->first();
   
      $allarticle = Artical::where('subcategory_id',$categories->id)->limit(11)->get();
       $mustView = Artical::where('status','active')->where('aproved','active')->where('subcategory_id',$categories->id)->orderBy('viewd', 'desc')->first();
      $featureArticles = Artical::where('status','active')->where('aproved','active')->where('subcategory_id',$categories->id)->orderBy('viewd', 'desc')->limit(11)->get();
      $mostviews = Artical::where('status','active')->where('aproved','active')->where('subcategory_id',$categories->id)->orderBy('viewd', 'desc')->limit(7)->get();

     $category->setRelation('apps', $category->articals()->paginate(5));
     return view('frontend.category_listing',compact('category','userss','categoryname','allarticle','categories','mustView',
     'featureArticles','mostviews','ads01'));
      
   }

   public function contactusdd(Request $request){

      $requestData = $request->all();
      $validator = Validator::make($requestData, [
           
            'fullname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
         
         ]);

         Contact::create([
         'name' => $request->fullname,
         'email' => $request->email,
         'phone' => $request->phone,
         'message' => $request->message,
          
     ]);

     return redirect()->back()->with('success','Contact SuccessFull');

   }
   public function aboutus(){
      $about = About::where('id',1)->first();
       
      return view('frontend.about',compact('about'));

   }

   public function privacypolicy(){

      $policy = Policy::where('id',1)->first();
      $ads01 = Add::first();
      return view('frontend.policy',compact('policy','ads01'));

   }
   public function termsconditions(){

      $term = Term::where('id',1)->first();
      $ads01 = Add::first();
      return view('frontend.terms',compact('term','ads01'));

   }
   public function subscribe_us_postdd(Request $request){
      
      $data = Subscribe::where('email',$request->email)->first();
      if(!$data){
         Subscribe::create([
            'email' => $request->email,
         ]);

         return redirect()->back()->with('success','Subscribe SuccessFull');
      }
      else {
         return redirect()->back()->with('success','Allready Subscribe'); 
      }
    }

    public function comment_postdd(Request $request){
      $request->validate([
         'name' => 'required',
         'email' => 'required',
         'message' => 'required',
     ]);
      $commentdd = new Comment();
      $commentdd->name  = $request->name;
      $commentdd->artical_id  =$request->artical_id;
      $commentdd->email  = $request->email;
      $commentdd->phone  = $request->phone;
      $commentdd->message  = $request->message;
      $commentdd->save();
      
      return redirect()->back()->with('success','Comment Added SuccessFully'); 
       
    }

    public function comment_postddbook(Request $request){
      $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
      ]);
      
      $commentdd = new Bookcomment();
      $commentdd->name  = $request->name;
      $commentdd->book_id  =$request->book_id;
      $commentdd->email  = $request->email;
      $commentdd->phone  = $request->phone;
      $commentdd->message  = $request->message;
      $commentdd->save();
      return redirect()->back()->with('success','Comment Added SuccessFully');
      
    }
    public function comment_postvideo(Request $request){
      $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
      ]);
      $commentdd = new Videocomment();
      $commentdd->name  = $request->name;
      $commentdd->video_id  =$request->video_id;
      $commentdd->email  = $request->email;
      $commentdd->phone  = $request->phone;
      $commentdd->message  = $request->message;
      $commentdd->save();
      return redirect()->back()->with('success','Comment Added SuccessFully');
      
    }

   public function updatecontent(Request $request){
      
      $articalupdate =Artical::where('id',$request->artical_iddd)->first();
      $articalupdate->shared += 1;
      $articalupdate->save();
      return response()->json(['success' => true,'code' => 400]);

   }

   public function updatebookcontent(Request $request){
      
      $articalupdate =Book::where('id',$request->artical_iddd)->first();
      $articalupdate->shared += 1;
      $articalupdate->save();
      return response()->json(['success' => true,'code' => 400]);

   }
   public function updatevideocontent(Request $request){
      
      $articalupdate =Video::where('id',$request->video_iddd)->first();
      $articalupdate->shared += 1;
      $articalupdate->save();
      return response()->json(['success' => true,'code' => 400]);

   }

   
public function gallery()
{
   $album = Album::get();
   $ads01 = Add::first();
   return view('frontend.gallery',compact('ads01','album'));
}

public function allAlbumImages($id)
 {
   $album_title = Album::where('id',$id)->first();
   $images = Gallery::where('album_id',$id)->get();
    $count = Gallery::where('album_id',$id)->count();
   return view('frontend.all_gallery_images',compact('images','album_title','count'));
}
}