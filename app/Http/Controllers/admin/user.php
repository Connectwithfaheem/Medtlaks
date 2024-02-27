<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin;

class user extends Controller
{
    //
    public function user()
    {
        $users = admin::all();
        return view('admin.blogs.user', compact('users'));
    }
    public function create()
    {
        return view('admin.blogs.user_create');
    }

    public function Store(Request $request)
    {
        $users = new admin;
        $users->user_name = $request->user_name;
        $users->url = $request->url;
        $users->save();
        return redirect('user')->with('success', 'Recored hes been Saved Successfull.');
    }
    public function user_edit(Request $request)
    {
        $users = admin::find($request->id);

        return view('admin.blogs.user_edit', compact('users'));
    }
    public function user_save(Request $request)
    {
        $users = admin::find($request->id);
        $users->user_name = $request->user_name;
        $users->url = $request->url;
        $users->save();
        return redirect('user')->with('success', 'Recored hes been Saved Successfull.');
    }
    public function user_delete(Request $request)
    {
        try{
        admin::where('id', $request->id)->delete();

        return response()->json(['success'=>true,'msg'=>'Blog has been Deleted successfully.!']);
        // return back()->with('success ', 'Successfully Deleted');
        } catch (\Exception $e) {

            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);

        }
    }
}
