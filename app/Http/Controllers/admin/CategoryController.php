<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function Categories(Request $request)
    {
        $categories = Category::latest()->get();
        return view('admin.blogs.categories', compact('categories'));
    }
    public function CategoryCreate(Request $request)
    {
        return view('admin.blogs.category_create');
    }
    public function CategoryStore(Request $request)
    {
        $request->validate([
            'category'=>'unique:categories',
            'custom_url'=>'unique:categories'
        ]);
        $category = new Category;
        $category->category = $request->category;
        $category->custom_url = $request->custom_url;
        $category->status = $request->status;
        $category->save();
        return redirect('blog/category')->with('success', 'Recored hes been Saved Successfull.');

    }
    public function updateStatus(Request $request)
    {
        $category = Category::find($request->id);
        $category->status = $request->input('status');
        $category->save();
        return response()->json(['message' => 'Status updated successfully']);
    }

    public function CategoryEdit($id)
    {
        $categories = Category::find($id);
        return view('admin.blogs.category_edit', compact('categories'));
    }
    public function CategoryUpdate(Request $request)
    {
        $request->validate([
            'category' => 'unique:categories,category,' . $request->id,
            'custom_url'=>'unique:categories'

        ]);

        $category = Category::find($request->id);
        $category->custom_url = $request->custom_url;
        $category->status = $request->status;
        $category->save();

        return redirect('blog/category')->with('success', 'Record has been Updated Successfully.');
    }
    public function DeleteCategory(Request $request)
    {
        try{
        Category::where('id', $request->id)->delete();

        return response()->json(['success'=>true,'msg'=>'Blog has been Deleted successfully.!']);
        // return back()->with('success ', 'Successfully Deleted');
        } catch (\Exception $e) {

            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);

        }
    }
}
