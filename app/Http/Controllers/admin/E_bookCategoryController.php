<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\E_bookCategory;

class E_bookCategoryController extends Controller
{
    //
    public function E_bookCategory()
    {
        $category = E_bookCategory::all();
        return view("admin\E_book\E_bookCategory\E_bookCategory", compact("category"));
    }
    public function AddE_bookCategory()
    {
        return view("admin\E_book\E_bookCategory\AddE_bookCategory");
    }
    public function E_bookCategoryStore(Request $request)
    {
        $request->validate([
            'category'=>'unique:e_book_category',
        ]);
        $category = new E_bookCategory;
        $category->category = $request->category;
        $category->status = $request->status;
        $category->save();
        return redirect('E_bookCategory')->with('success', 'Recored hes been Saved Successfull.');

    }

    public function updateE_bookStatus(Request $request)
    {
        $category = E_bookCategory::find($request->id);
        $category->status = $request->input('status');
        $category->save();
        return response()->json(['message' => 'Status updated successfully']);
    }

    public function E_bookCategoryEdit($id)
    {
        $categories = E_bookCategory::find($id);
        return view('admin\E_book\E_bookCategory\editE_bookCategory', compact('categories'));
    }

    public function E_bookCategoryUpdate(Request $request)
    {
        $request->validate([
            'category' => 'unique:special_test_category',

        ]);

        $category = E_bookCategory::find($request->id);
        $category->category = $request->category;
        $category->status = $request->status;
        $category->save();

        return redirect('E_bookCategory')->with('success', 'Record has been Updated Successfully.');
    }
    public function EBookCategoryDelete(Request $request)
    {
        try{
            E_bookCategory::where('id', $request->id)->delete();

        return response()->json(['success'=>true,'msg'=>'Blog has been Deleted successfully.!']);
        // return back()->with('success ', 'Successfully Deleted');
        } catch (\Exception $e) {

            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);

        }
    }
}
