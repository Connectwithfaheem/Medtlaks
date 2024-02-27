<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\admin;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
    public function Blog(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $blogs =Blog::where('title','LIKE', "$search%" )->get();
        }else{

            $blogs = Blog::latest()->get();
        }
        $blogs =compact('blogs', 'search');
        return view('admin.blogs.blog', compact('blogs','search'))->with($blogs);
    }

    public function BlogCreate(Request $request)
    {
        $categories = Category::where('status', 1)->get();
        $admin = admin::all();

        return view('admin.blogs.create', compact('admin','categories'));
    }
    public function BlogStore(Request $request)
    {
        $input = $request->all();
        $category = $input['category_id'];
      $input['category_id'] = implode(',', $category);
      if($thumbnail = $request->file('thumbnail')){
          $destinationPath = "image/";
          $thumbnailImg = date('YmdHis') . '.' . $thumbnail->getClientOriginalExtension();
          $thumbnail->move($destinationPath , $thumbnailImg);
          $input['thumbnail'] = "$thumbnailImg";
       }


       Blog::create($input);
        return redirect('blog')->with(['success'=>'Blog has been created successfull.']);
    }
    public function updateStatus(Request $request)
    {
        $blog = Blog::find($request->id);
        $blog->status = $request->input('status');
        $blog->save();
        return response()->json(['message' => 'Status updated successfully']);
    }
    public function EditBlog($id)
    {
        $blogs = Blog::find($id);
        $categories = Category::where('status', 1)->get();
        $admin = admin::all();
        return view('admin.blogs.update', compact('admin','blogs', 'categories'));
    }
    public function BlogUpdate(Request $request)
    {

        $blogs =  Blog::find($request->id);
        $input = $request->all();
        $category = $input['category_id'];
        $input['category_id'] = implode(',', $category);
     if($thumbnail = $request->file('thumbnail')){
        $destinationPath = "image/";
        $thumbnailImg = date('YmdHis') . '.' . $thumbnail->getClientOriginalExtension();
        $thumbnail->move($destinationPath , $thumbnailImg);
        $input['thumbnail'] = "$thumbnailImg";
     }else{
        unset($input['thumbnail']);
     }
       $blogs->update($input);
       return redirect('blog')->with(['success'=>'Blog has been Updated successfull.']);
    }


    // Delete Blog
    public function DeleteBlog(Request $request)
    {
        try{
            Blog::where('id', $request->id)->delete();

        return response()->json(['success'=>true,'msg'=>'Blog has been Deleted successfully.!']);
        // return back()->with('success ', 'Successfully Deleted');
        } catch (\Exception $e) {

            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);

        }
    }
    public function DeleteComments(Request $request)
    {
        try{
            Comment::where('id', $request->id)->delete();

        return response()->json(['success'=>true,'msg'=>'Blog has been Deleted successfully.!']);
        // return back()->with('success ', 'Successfully Deleted');
        } catch (\Exception $e) {

            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);

        }
    }
    public function ViewBlog($id)
    {
        $blogs = Blog::find($id);
        $categories = Category::where('status', 1)->get();
        $Comments = Comment::where('blog_id',$blogs->id)->with('customers')->get();
        $admin = admin::all();
        return view('admin.blogs.viewBlog',compact('admin','blogs', 'categories','Comments'));
    }
    public function CommentStatus(Request $request)
    {
        $blog = Comment::find($request->id);
        $blog->status = $request->input('status');
        $blog->save();
        return response()->json(['message' => 'Status updated successfully']);
    }
    // app/Http/Controllers/PostController.php





}
