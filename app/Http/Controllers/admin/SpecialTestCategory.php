<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpecialCategory;


class SpecialTestCategory extends Controller
{
    //
    public function SpecialTestCategory()
    {
        $special = SpecialCategory::orderBy('id', 'desc')->get();
        return view("admin.SpecialTest.SpecialTestCategory.SpecialTestCategory", compact("special"));
    }
    public function AddSpecialTestCategory()
    {
        return view("admin.SpecialTest.SpecialTestCategory.AddSpecialTestCategory");
    }
    public function SpecialCategoryStore(Request $request)
    {
        $request->validate([
            'category'=>'unique:special_test_category',
        ]);
        $category = new SpecialCategory;
        $category->category = $request->category;
        $category->status = $request->status;
        $category->save();
        return redirect('SpecialTestCategory')->with('success', 'Recored hes been Saved Successfull.');

    }

    public function updateSpecialTest(Request $request)
    {
        $category = SpecialCategory::find($request->id);
        $category->status = $request->input('status');
        $category->save();
        return response()->json(['message' => 'Status updated successfully']);
    }

    public function SpecialCategoryEdit($id)
    {
        $categories = SpecialCategory::find($id);
        return view('admin\SpecialTest\SpecialTestCategory\editSpecialTest', compact('categories'));
    }


    public function SpecialCategoryUpdate(Request $request)
    {
        $request->validate([
            'category' => 'unique:special_test_category',

        ]);

        $category = SpecialCategory::find($request->id);
        $category->category = $request->category;
        $category->status = $request->status;
        $category->save();

        return redirect('SpecialTestCategory')->with('success', 'Record has been Updated Successfully.');
    }

    public function SpecialDeleteCategory(Request $request)
    {
        try{
            SpecialCategory::where('id', $request->id)->delete();

        return response()->json(['success'=>true,'msg'=>'Blog has been Deleted successfully.!']);
        // return back()->with('success ', 'Successfully Deleted');
        } catch (\Exception $e) {

            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);

        }
    }
}
