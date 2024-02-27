<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\GlobalSetup;
use App\Models\cmsPages;
use App\Models\subscirbers;
use App\Models\SpecialCategory;
use App\Models\SpecialTest;
use App\Models\E_bookCategory;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;






class FrontendController extends Controller
{
    //
    public function index()
    {
        $popular = Blog::where('status', 1)->orderBy('id', 'desc')->limit(1)->get();
        $trending = Blog::where('status', 1)->orderBy('id', 'desc')->limit(8)->get();


        $globalsetup = GlobalSetup::orderBy('id', 'desc')->limit(1)->get();
        $categories = Category::where('status', 1)->orderBy('id', 'desc')->limit(10)->get();
        $latest = Blog::latest()->take(1)->get();
        $blogs = Blog::where('status', 1)->orderBy('id', 'desc')->limit(5)->get();
        $Sliderblogs = Blog::where('status', 1)->orderBy('id', 'desc')->limit(3)->get();
        $slider = Blog::where('status', 1)->orderBy('id', 'desc')->limit(4)->get();
        $featuredBlogs = Blog::where('status', 1)->orderBy('id', 'desc')->get();
        $NewBlogs = Blog::where('status', 1)->orderBy('id', 'desc')->paginate(5);
        // $latestBlogs = Blog::where('status', 1)->orderBy('id', 'desc')->get();
        $latestBlogs = Blog::where('status', 1)->orderBy('id', 'desc')->paginate(10);
        return view('frontend.index', compact('popular','trending','categories', 'globalsetup', 'latest','NewBlogs','blogs', 'slider', 'Sliderblogs', 'featuredBlogs', 'latestBlogs'));
    }


    public function StoreSub(Request $request)
    {
        $request->validate([
            'subscriber' => 'required|email|unique:subscriber_tale',
        ]);

        $subscriber = new subscirbers;
        $subscriber->subscriber = $request->subscriber;
        $subscriber->save();

        return response()->json(['message' => 'Subscribed Successfully']);
    }

    public function single(Request $request)
    {
        $custom_url = $request->custom_url ?? '';

        Blog::where('custom_url', $custom_url)->firstOrFail()->increment('count');
        $logo = GlobalSetup::select('logo')->get();
        $popular = Blog::where('status', 1)->orderBy('id', 'desc')->limit(1)->get();
        $blogs = Blog::latest()->take(3)->get();
        $categories = Category::where('status', 1)->orderBy('id', 'desc')->limit(10)->get();
        $featuredBlogs = Blog::latest()->get();
        $latestBlogs = Blog::latest()->take(2)->get();
        $globalsetup = GlobalSetup::orderBy('created_at', 'desc')->limit(1)->get();
        $blogsdetail = Blog::where('custom_url', $custom_url)->firstOrFail();
        $trending = Blog::where('status', 1)->orderBy('created_at', 'desc')->limit(8)->get();



        return view('frontend.single',compact('popular','trending', 'categories', 'blogs', 'blogsdetail', 'featuredBlogs', 'latestBlogs', 'globalsetup'));
    }

    public function ebook()
    {
        $popular = Blog::where('status', 1)->orderBy('id', 'desc')->limit(1)->get();
        $trending = Blog::where('status', 1)->orderBy('id', 'desc')->limit(8)->get();


        $globalsetup = GlobalSetup::orderBy('id', 'desc')->limit(1)->get();
        $categories = Category::where('status', 1)->orderBy('id', 'desc')->limit(10)->get();
        $latest = Blog::latest()->take(1)->get();
        $blogs = Blog::where('status', 1)->orderBy('id', 'desc')->limit(5)->get();
        $Sliderblogs = Blog::where('status', 1)->orderBy('id', 'desc')->limit(3)->get();
        $slider = Blog::where('status', 1)->orderBy('id', 'desc')->limit(4)->get();
        $featuredBlogs = Blog::where('status', 1)->orderBy('id', 'desc')->get();
        $NewBlogs = Blog::where('status', 1)->orderBy('id', 'desc')->paginate(5);
        $latestBlogs = Blog::where('status', 1)->orderBy('id', 'desc')->limit(4)->get();
        $E_Book = E_bookCategory::where('status',1)->orderBy('id','desc')->with('E_BookRelation')->get();

        return view('frontend.ebook', compact('E_Book','popular','trending','categories', 'globalsetup', 'latest','NewBlogs','blogs', 'slider', 'Sliderblogs', 'featuredBlogs', 'latestBlogs'));



    }



    public function contact()
    {
        $latestBlogs = Blog::where('status', 1)->latest()->get();
        $popular = Blog::where('status', 1)->orderBy('id', 'desc')->limit(1)->get();

        // $logo = GlobalSetup::select('logo')->get();
        $categories = Category::where('status', 1)->orderBy('id', 'desc')->limit(10)->get();
        $trending = Blog::where('status', 1)->orderBy('created_at', 'desc')->limit(8)->get();
        $globalsetup = GlobalSetup::orderBy('created_at', 'desc')->limit(1)->get();
        $latestBlogs = Blog::where('status',1)->latest()->get();

        return view('frontend.contact', compact('popular','categories','trending','globalsetup'));
    }
    public function Special()
    {
           // $logo = GlobalSetup::select('logo')->get();
        $SpecialTest = SpecialCategory::where('status',1)->orderBy('id','desc')->with('SpecialRelation', 'SpecialRelation.blog')->get();
        $categories = Category::where('status', 1)->orderBy('id', 'desc')->limit(10)->get();
        $popular = Blog::where('status', 1)->orderBy('id', 'desc')->limit(1)->get();
        $globalsetup = GlobalSetup::orderBy('created_at', 'desc')->limit(1)->get();
        return view('frontend.SpecialTest', compact('categories', 'globalsetup','popular','SpecialTest'));
    }
    public function category()
    {
        $trending = Blog::where('status', 1)->orderBy('created_at', 'desc')->limit(8)->get();
        $popular = Blog::where('status', 1)->orderBy('id', 'desc')->limit(1)->get();

        // $logo = GlobalSetup::select('logo')->get();
        $categories = Category::where('status', 1)->orderBy('id', 'desc')->limit(10)->get();
        $trending = Blog::where('status', 1)->orderBy('created_at', 'desc')->limit(8)->get();
        $globalsetup = GlobalSetup::orderBy('created_at', 'desc')->limit(1)->get();

        return view('frontend.category_posts', compact('trending', 'categories', 'globalsetup','popular'));
    }
    public function topBlogs()
    {
        $trending = Blog::where('status', 1)->orderBy('created_at', 'desc')->limit(8)->get();
        $popular = Blog::where('status', 1)->orderBy('id', 'desc')->limit(1)->get();

        // $logo = GlobalSetup::select('logo')->get();
        $categories = Category::where('status', 1)->orderBy('id', 'desc')->limit(10)->get();
        $globalsetup = GlobalSetup::orderBy('created_at', 'desc')->limit(1)->get();

        $latestBlogs = Blog::where('status',1)->orderBy('id', 'desc')->paginate(10);
        return view('frontend.TopBlogs', compact('categories','trending','latestBlogs', 'globalsetup','popular'));
    }


    public function getSuggestions(Request $request)
    {
        $keyword = $request->input('keyword');
        $results = Blog::where('title', 'like', '%' . $keyword . '%')->get();
        return response()->json(['results' => $results]);
    }
    public function Privacy(Request $request)
    {
        $popular = Blog::where('status', 1)->orderBy('id', 'desc')->limit(1)->get();

        $globalsetup = GlobalSetup::orderBy('created_at', 'desc')->get();
        $privacy = cmsPages::where('status', 1)->orderBy('created_at', 'desc')->get();
        $categories = Category::where('status', 1)->orderBy('id', 'desc')->limit(10)->get();
        return view('frontend.PrivacyPolicy', compact('globalsetup', 'privacy', 'categories','popular'));
    }
    public function Terms(Request $request)
    {
        $popular = Blog::where('status', 1)->orderBy('id', 'desc')->limit(1)->get();

        $globalsetup = GlobalSetup::orderBy('created_at', 'desc')->get();
        $terms = cmsPages::where('status', 1)->orderBy('created_at', 'desc')->limit(1)->get();
        $categories = Category::where('status', 1)->orderBy('id', 'desc')->limit(10)->get();
        return view('frontend.terms_condition', compact('globalsetup', 'terms', 'categories','popular'));
    }
    public function About(Request $request)
    {
        $popular = Blog::where('status', 1)->orderBy('id', 'desc')->limit(1)->get();

        $globalsetup = GlobalSetup::orderBy('created_at', 'desc')->get();

        return view('frontend.about', compact('globalsetup','popular'));
    }
    public function showCategoryPosts($custom_url)
    {
        $popular = Blog::where('status', 1)->orderBy('id', 'desc')->limit(1)->get();

        $trending = Blog::where('status', 1)->orderBy('created_at', 'desc')->limit(8)->get();
        $categories = Category::where('status', 1)->orderBy('id', 'desc')->limit(10)->get();
        $category = Category::where('custom_url', $custom_url)->firstOrFail();
        $blogs = Blog::where('category_id', $category->id)->get();
        $globalsetup = GlobalSetup::orderBy('created_at', 'desc')->limit(1)->get();
        return view('frontend/category_posts', compact('popular','globalsetup', 'categories', 'blogs', 'category', 'trending'));
    }







}
