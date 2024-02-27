<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\E_bookCategory;
use App\Models\e_book;

class E_bookController extends Controller
{
    //
    public function E_book(){
        $books = E_book::all();
        return view("admin\E_book\E_book",compact("books"));
    }

    public function E_BookCreate(Request $request)
    {
        $categories = E_bookCategory::where('status', 1)->get();

        return view('admin\E_book\CreateE_Book', compact('categories'));
    }
    public function E_BookStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'thumbnail' => 'required',
            'googleDrive' => 'required',
        ]);
        $imageName = time().'.'.$request->thumbnail->extension();
        $request->thumbnail->move(public_path('E_bookThumbnail'), $imageName);

        $eBook = new e_book;
        $eBook->title = $request->title;
        $eBook->category_id = $request->category_id;
        $eBook->drive = $request->googleDrive;
        $eBook->thumbnail = $imageName;
        $eBook->status = $request->status;
        $eBook->save();
        return redirect('E_book');
    }
    public function E_bookEdit($id)
    {
        $eBook =  e_book::find($id);
        $categories = E_bookCategory::where('status', 1)->get();

        return view('admin\E_book\editE_Book', compact('categories','eBook'));
    }

    public function StatusUpdateE_book(Request $request)
    {
        $book = e_book::find($request->id);
        $book->status = $request->input('status');
        $book->save();
        return response()->json(['message' => 'Status updated successfully']);
    }
    public function E_BookUpdate(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'googleDrive' => 'required',
        ]);
        $eBook = e_book::find($request->id);
        if(isset($request->thumbnail)){

            $imageName = time().'.'.$request->thumbnail->extension();
            $request->thumbnail->move(public_path('E_bookThumbnail'), $imageName);
            $eBook->thumbnail = $imageName;
        }

        $eBook->title = $request->title;
        $eBook->category_id = $request->category_id;
        $eBook->drive = $request->googleDrive;
        $eBook->thumbnail = $imageName;
        $eBook->status = $request->status;
        $eBook->save();
        return redirect('E_book');
    }
    public function E_BookDelete(Request $request)
    {
        try{
            e_book::where('id', $request->id)->delete();

        return response()->json(['success'=>true,'msg'=>'Blog has been Deleted successfully.!']);
        // return back()->with('success ', 'Successfully Deleted');
        } catch (\Exception $e) {

            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);

        }
    }
}
