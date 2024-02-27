<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\SpecialCategory;
use App\Models\SpecialTest;

class SpecialTestController extends Controller
{
    //
    public function SpecialTest()
    {
        $Special = SpecialTest::orderBy('id', 'desc')->get();
        return view('admin.SpecialTest.SpecialTest',compact('Special'));
    }

    public function CreateSpecialTest()
    {

        $Blogs = blog::where('status', 1)->get();
        $categories = SpecialCategory::where('status', 1)->get();
        return view('admin.SpecialTest.CreateSpecialTest', compact('categories', 'Blogs'));
    }
    public function SpecialTestStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'blog_id' => 'required',
        ]);
        $blog = new SpecialTest;
        $blog->title = $request->title;
        $blog->category_id = $request->category_id;
        $blog->blog_id = $request->blog_id;
        $blog->status = $request->status;
        $blog->save();
        return redirect('SpecialTest');
    }

    public function SpecialTestStatus(Request $request)
    {
        $blog = SpecialTest::find($request->id);
        $blog->status = $request->input('status');
        $blog->save();
        return response()->json(['message' => 'Status updated successfully']);
    }

    public function EditSpecialTest(Request $request)
    {
        $Special = SpecialTest::find($request->id);
        $categories = SpecialCategory::where('status', 1)->get();
        $Blogs = blog::where('status', 1)->get();
        return view('admin.SpecialTest.EditSpecialTest', compact('Blogs','Special', 'categories'));
    }

    

    public function SpecialTestEdit(Request $request)
    {

        $blog = SpecialTest::find($request->id);

        $blog->title = $request->title;
        $blog->category_id = $request->category_id;
        $blog->blog_id = $request->blog_id;
        $blog->status = $request->status;
        $blog->status = $request->status;
        $blog->save();
        return redirect('SpecialTest');
    }
    public function SpecialTestDelete(Request $request)
    {
        try{
            SpecialTest::where('id', $request->id)->delete();

        return response()->json(['success'=>true,'msg'=>'Blog has been Deleted successfully.!']);
        // return back()->with('success ', 'Successfully Deleted');
        } catch (\Exception $e) {

            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);

        }
    }
}
